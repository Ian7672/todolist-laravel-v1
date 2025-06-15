<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**F
     * Tampilkan semua task milik user yang sedang login
     */
    public function index()
    {
        // Ambil task yang belum selesai (tampil di atas) - diurutkan berdasarkan deadline
        $activeTasks = Task::where('user_id', Auth::id())
            ->where('completed', false)
            ->orderBy('deadline', 'asc')
            ->get();

        // Ambil task yang sudah selesai (tampil di bawah) - diurutkan berdasarkan completed_at terbaru
        $completedTasks = Task::where('user_id', Auth::id())
            ->where('completed', true)
            ->orderBy('completed_at', 'desc')
            ->get();

        return view('tasks.index', compact('activeTasks', 'completedTasks'));
    }

    /**
     * Tampilkan form tambah task
     */
    public function create()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        return view('tasks.create', compact('tomorrow'));
    }

    /**
     * Simpan task baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'completed' => false,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil ditambahkan!');
    }

    /**
     * Update task (untuk inline edit)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task berhasil diperbarui!');
    }

    /**
     * Hapus task
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dihapus!');
    }

    /**
     * Toggle status selesai/tidak (untuk checkbox dan button)
     */
    public function toggle(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // Jika request dari AJAX (checkbox)
        if ($request->expectsJson()) {
            $completed = $request->boolean('completed');
            $task->completed = $completed;

            if ($completed) {
                $task->completed_at = now();
            } else {
                $task->completed_at = null;
            }

            $task->save();
            return response()->json(['success' => true]);
        }

        // Jika request biasa (button toggle)
        $task->completed = !$task->completed;

        if ($task->completed) {
            $task->completed_at = now();
        } else {
            $task->completed_at = null;
        }

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Status task berhasil diubah!');
    }
}
