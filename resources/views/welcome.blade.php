<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    {{-- <div class="content">
        <h1>Welcome to My Task Manager</h1>
        <h2>Welcome to TaskMaster. Your all-in-one task management solution designed to simplify your
            workflow and boost your productivity. Whether you're a student juggling assignments, a professional handling
            projects, or a team collaborating remotely, TaskMaster helps you plan, prioritize, and complete your tasks
            with ease. Create tasks, set deadlines, track progress, and stay in control — anytime, anywhere. Start
            managing your time smarter, not harder.</h2>
    </div> --}}
    <h1 id="heading">Task Manager</h1>

    <div id="quote"></div>

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

    <script src="{{ asset('js/welcome.js') }}"></script>
</body>

</html>
