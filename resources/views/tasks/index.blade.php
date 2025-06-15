<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>To-Do List Modern</title>
    <link rel="stylesheet" href="css/index.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>📝</text></svg>">

</head>

<body>
    <div class="container">
        @include('tasks.profile')
        @include('tasks.add')
        @include('tasks.statistic')
        @include('tasks.uncompleted')
        @include('tasks.completed')
        @include('tasks.empty')
        @include('tasks.error')

        <div class="footer">
            <p style="color:white; margin-top:10px;">
                © 2025 <strong>todolist-laravel-v1</strong> by <a href="https://github.com/Ian7672" style="color:#ccc;"
                    target="_blank">Ian7672</a>. All rights reserved.
            </p>

        </div>
    </div>

    <script src="index.js"></script>

</body>

</html>
