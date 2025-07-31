<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>
    <style>
        .logInBtn {
            position: fixed;
            top: 20px;
            right: 130px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .logInBtn:hover {
            background-color: #0056B3;
        }

        .registerBtn {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .registerBtn:hover {
            background-color: #0056B3;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .content {
            padding: 0 70px;
        }
    </style>
</head>

<body>
    <div class="content">
        <h1>Welcome to My Task Manager</h1>
        <h2>Welcome to TaskMaster. Your all-in-one task management solution designed to simplify your
            workflow and boost your productivity. Whether you're a student juggling assignments, a professional handling
            projects, or a team collaborating remotely, TaskMaster helps you plan, prioritize, and complete your tasks
            with ease. Create tasks, set deadlines, track progress, and stay in control — anytime, anywhere. Start
            managing your time smarter, not harder.</h2>
    </div>

    @if (Route::has('login'))
        <div style="text-align: right;">
            @auth
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="logInBtn">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="registerBtn">Register</a>
                @endif
            @endauth
        </div>
    @endif
</body>

</html>
