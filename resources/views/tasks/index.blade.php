<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

```
<title>Personal Task Manager</title>

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

    /* ================= NAVIGATION ================= */

    nav {
        height: 70px;
        background: #151515;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 7%;
        box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }

    .logo {
        font-size: 22px;
        font-weight: bold;
        letter-spacing: 0.5px;
    }

    .logo span {
        color: #e53935;
    }

    .nav-links {
        display: flex;
        gap: 10px;
    }

    .nav-link {
        color: white;
        text-decoration: none;
        padding: 10px 16px;
        border-radius: 8px;
        font-size: 14px;
    }

    .nav-link:hover {
        background: #e53935;
    }

    /* ================= HERO ================= */

    .hero {
        background: linear-gradient(135deg, #b71c1c, #e53935);
        color: white;
        padding: 55px 7%;
        position: relative;
        overflow: hidden;
    }

    .hero::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border: 50px solid rgba(255,255,255,0.08);
        border-radius: 50%;
        right: -70px;
        top: -100px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        margin: 0;
        font-size: 38px;
    }

    .hero p {
        margin-top: 10px;
        font-size: 16px;
        opacity: 0.9;
    }

    /* ================= MAIN ================= */

    .container {
        width: 90%;
        max-width: 1150px;
        margin: 35px auto;
    }

    /* ================= DASHBOARD ================= */

    .dashboard-title {
        margin-bottom: 18px;
    }

    .dashboard-title h2 {
        margin: 0;
        font-size: 24px;
    }

    .dashboard-title p {
        margin-top: 5px;
        color: #777;
    }

    .stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 35px;
    }

    .stat-card {
        background: white;
        border-radius: 14px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.07);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 5px;
        height: 100%;
        background: #e53935;
    }

    .stat-card h3 {
        margin: 0;
        color: #777;
        font-size: 14px;
        font-weight: normal;
    }

    .stat-number {
        margin-top: 10px;
        font-size: 34px;
        font-weight: bold;
        color: #b71c1c;
    }

    /* ================= TASK HEADER ================= */

    .task-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 18px;
    }

    .task-header h2 {
        margin: 0;
    }

    .add-button {
        background: #e53935;
        color: white;
        text-decoration: none;
        padding: 12px 18px;
        border-radius: 9px;
        font-weight: bold;
        box-shadow: 0 5px 12px rgba(229,57,53,0.25);
        transition: 0.2s;
    }

    .add-button:hover {
        background: #b71c1c;
        transform: translateY(-2px);
    }

    /* ================= SUCCESS ================= */

    .success {
        background: #e8f5e9;
        border-left: 5px solid #43a047;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 25px;
        color: #2e7d32;
    }

    /* ================= TABLE ================= */

    .table-card {
        background: white;
        border-radius: 14px;
        padding: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.07);
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background: #292929;
        color: white;
        padding: 15px;
        text-align: left;
        font-size: 14px;
    }

    th:first-child {
        border-radius: 8px 0 0 8px;
    }

    th:last-child {
        border-radius: 0 8px 8px 0;
    }

    td {
        padding: 15px;
        border-bottom: 1px solid #eeeeee;
        vertical-align: middle;
    }

    tbody tr {
        transition: 0.2s;
    }

    tbody tr:hover {
        background: #fff5f5;
    }

    .task-name {
        font-weight: bold;
        color: #333;
    }

    .description {
        color: #777;
        max-width: 250px;
    }

    /* ================= STATUS ================= */

    .status {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .pending {
        background: #fff3cd;
        color: #856404;
    }

    .completed {
        background: #e8f5e9;
        color: #2e7d32;
    }

    /* ================= ACTIONS ================= */

    .actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .actions form {
        margin: 0;
    }

    .edit-button,
    .complete-button,
    .delete-button {
        border: none;
        padding: 8px 11px;
        border-radius: 7px;
        font-size: 12px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
    }

    .edit-button {
        background: #eeeeee;
        color: #333;
    }

    .edit-button:hover {
        background: #d6d6d6;
    }

    .complete-button {
        background: #e53935;
        color: white;
    }

    .complete-button:hover {
        background: #b71c1c;
    }

    .delete-button {
        background: #292929;
        color: white;
    }

    .delete-button:hover {
        background: #000000;
    }

    /* ================= EMPTY ================= */

    .empty {
        background: white;
        border-radius: 14px;
        padding: 60px 20px;
        text-align: center;
        box-shadow: 0 5px 20px rgba(0,0,0,0.07);
    }

    .empty-icon {
        font-size: 45px;
        margin-bottom: 10px;
    }

    .empty h3 {
        margin-bottom: 8px;
    }

    .empty p {
        color: #777;
        margin-bottom: 25px;
    }

    /* ================= RESPONSIVE ================= */

    @media (max-width: 800px) {

        .stats {
            grid-template-columns: 1fr;
        }

        .task-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .hero h1 {
            font-size: 29px;
        }

        nav {
            padding: 0 5%;
        }
    }
</style>
```

</head>

<body>

<!-- NAVIGATION -->

<nav>

```
<div class="logo">
    Personal <span>Task Manager</span>
</div>

<div class="nav-links">

    <a href="/" class="nav-link">
        Dashboard
    </a>

</div>
```

</nav>

<!-- HERO -->

<section class="hero">

```
<div class="hero-content">

    <h1>Stay Organized. Stay Productive.</h1>

    <p>
        Manage your daily tasks and keep track of your progress.
    </p>

</div>
```

</section>

<div class="container">

```
@if(session('success'))

    <div class="success">
        ✓ {{ session('success') }}
    </div>

@endif


<!-- DASHBOARD -->

<div class="dashboard-title">

    <h2>Dashboard</h2>

    <p>
        Here's an overview of your tasks.
    </p>

</div>


<div class="stats">

    <div class="stat-card">

        <h3>Total Tasks</h3>

        <div class="stat-number">
            {{ $tasks->count() }}
        </div>

    </div>


    <div class="stat-card">

        <h3>Pending Tasks</h3>

        <div class="stat-number">
            {{ $tasks->where('status', 'Pending')->count() }}
        </div>

    </div>


    <div class="stat-card">

        <h3>Completed Tasks</h3>

        <div class="stat-number">
            {{ $tasks->where('status', 'Completed')->count() }}
        </div>

    </div>

</div>


<!-- TASK HEADER -->

<div class="task-header">

    <h2>My Tasks</h2>

    <a href="/tasks/create" class="add-button">
        + Add New Task
    </a>

</div>


@if($tasks->count() > 0)

    <div class="table-card">

        <table>

            <thead>

                <tr>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>

            </thead>


            <tbody>

                @foreach($tasks as $task)

                    <tr>

                        <td class="task-name">
                            {{ $task->task_name }}
                        </td>


                        <td class="description">
                            {{ $task->description ?: 'No description' }}
                        </td>


                        <td>

                            @if($task->status === 'Pending')

                                <span class="status pending">
                                    Pending
                                </span>

                            @else

                                <span class="status completed">
                                    Completed
                                </span>

                            @endif

                        </td>


                        <td>
                            {{ $task->due_date ?: 'No due date' }}
                        </td>


                        <td>

                            <div class="actions">

                                <!-- EDIT -->

                                <a
                                    href="/tasks/{{ $task->id }}/edit"
                                    class="edit-button"
                                >
                                    Edit
                                </a>


                                <!-- STATUS -->

                                <form
                                    action="/tasks/{{ $task->id }}/status"
                                    method="POST"
                                >

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        type="submit"
                                        class="complete-button"
                                    >
                                        {{ $task->status === 'Pending' ? 'Complete' : 'Set Pending' }}
                                    </button>

                                </form>


                                <!-- DELETE -->

                                <form
                                    action="/tasks/{{ $task->id }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete-button"
                                        onclick="return confirm('Are you sure you want to delete this task?')"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@else

    <div class="empty">

        <div class="empty-icon">
            📋
        </div>

        <h3>No Tasks Yet</h3>

        <p>
            You don't have any tasks yet. Create your first task to get started.
        </p>

        <a href="/tasks/create" class="add-button">
            + Create First Task
        </a>

    </div>

@endif
```

</div>

</body>
</html>
