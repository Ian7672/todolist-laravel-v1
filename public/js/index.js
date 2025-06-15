    document.querySelectorAll('input[type="checkbox"][name="completed"]').forEach((checkbox) => {
      checkbox.addEventListener('change', function () {
        const form = this.closest('form');
        const listItem = this.closest('li');

        fetch(form.action, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            completed: this.checked
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            // Refresh halaman untuk memperbarui tampilan dan urutan
            window.location.reload();
          } else {
            alert('Terjadi kesalahan saat memperbarui status tugas.');
            this.checked = !this.checked; // Kembalikan checkbox ke state sebelumnya
          }
        })
        .catch(error => {
          console.error('Error:', error);
          alert("Terjadi kesalahan saat mengirim data.");
          this.checked = !this.checked; // Kembalikan checkbox ke state sebelumnya
        });
      });
    });
  