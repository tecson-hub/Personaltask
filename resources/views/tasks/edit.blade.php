<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            color: #1e3a5f;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
        }

        h1 {
            color: #1565c0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #bbdefb;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 120px;
        }

        button {
            margin-top: 20px;
            background: #1565c0;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #0d47a1;
        }

        .back-button {
            color: #1565c0;
            text-decoration: none;
        }

        .error {
            background: #ffebee;
            border: 1px solid #ef9a9a;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    @if($errors->any())
        <div class="error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- UPDATE TASK FORM --}}
    <form action="/tasks/{{ $task->id }}" method="POST">

        @csrf

        @method('PUT')

        <label for="task_name">Task Name</label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name', $task->task_name) }}"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
        >{{ old('description', $task->description) }}</textarea>

        <label for="status">Status</label>

        <select id="status" name="status">

            <option
                value="Pending"
                {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="Completed"
                {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>

        </select>

        <label for="due_date">Due Date</label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date', $task->due_date) }}"
        >

        <button type="submit">
            Update Task
        </button>

    </form>

    <br>

    {{-- BACK TO TASKS --}}
    <a href="/" class="back-button">
        ← Back to Tasks
    </a>

</div>

</body>
</html>