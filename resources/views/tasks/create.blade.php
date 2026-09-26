<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Add New Task</title>

<style>

    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
        background: #f8f8f8;
        color: #292929;
    }

    /* NAVIGATION */

    nav {
        height: 70px;
        background: #151515;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 7%;
    }

    .logo {
        font-size: 22px;
        font-weight: bold;
    }

    .logo span {
        color: #e53935;
    }

    .nav-link {
        color: white;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
    }

    .nav-link:hover {
        background: #e53935;
    }

    /* HEADER */

    .page-header {
        background: linear-gradient(135deg, #b71c1c, #e53935);
        color: white;
        padding: 40px 7%;
    }

    .page-header h1 {
        margin: 0;
    }

    .page-header p {
        margin-bottom: 0;
        opacity: 0.9;
    }

    /* FORM */

    .container {
        width: 90%;
        max-width: 700px;
        margin: 35px auto;
    }

    .form-card {
        background: white;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 7px 25px rgba(0,0,0,0.08);
    }

    .form-title {
        margin-bottom: 25px;
    }

    .form-title h2 {
        margin: 0;
    }

    .form-title p {
        color: #777;
    }

    label {
        display: block;
        margin-top: 18px;
        margin-bottom: 7px;
        font-weight: bold;
    }

    input,
    textarea,
    select {
        width: 100%;
        padding: 13px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        font-size: 14px;
    }

    textarea {
        height: 120px;
        resize: vertical;
    }

    input:focus,
    textarea:focus,
    select:focus {
        outline: none;
        border-color: #e53935;
        box-shadow: 0 0 0 3px #ffebee;
    }

    .add-button {
        width: 100%;
        margin-top: 25px;
        border: none;
        background: #e53935;
        color: white;
        padding: 14px;
        border-radius: 8px;
        font-weight: bold;
        cursor: pointer;
        font-size: 15px;
    }

    .add-button:hover {
        background: #b71c1c;
    }

    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #b71c1c;
        text-decoration: none;
        font-weight: bold;
    }

    .error {
        background: #ffebee;
        border-left: 5px solid #e53935;
        padding: 15px;
        border-radius: 8px;
        color: #b71c1c;
    }

</style>
```

</head>

<body>

<nav>

```
<div class="logo">
    Personal <span>Task Manager</span>
</div>

<a href="/" class="nav-link">
    Dashboard
</a>
```

</nav>

<section class="page-header">

```
<h1>Add New Task</h1>

<p>Create a task and keep your work organized.</p>
```

</section>

<div class="container">

```
<div class="form-card">

    <div class="form-title">

        <h2>Task Information</h2>

        <p>Fill in the details below.</p>

    </div>


    @if($errors->any())

        <div class="error">

            <strong>Please fix the following:</strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form action="/tasks" method="POST">

        @csrf

        <label for="task_name">
            Task Name
        </label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            value="{{ old('task_name') }}"
            placeholder="Enter your task"
            required
        >


        <label for="description">
            Description
        </label>

        <textarea
            id="description"
            name="description"
            placeholder="Enter task description..."
        >{{ old('description') }}</textarea>


        <label for="status">
            Status
        </label>

        <select id="status" name="status">

            <option value="Pending"
                {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>


        <label for="due_date">
            Due Date
        </label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date') }}"
        >


        <button
            type="submit"
            class="add-button"
        >
            + Add Task
        </button>

    </form>


    <a href="/" class="back-link">
        ← Back to Dashboard
    </a>

</div>
```

</div>

</body>
</html>
