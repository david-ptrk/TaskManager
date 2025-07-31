<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <style>
        input,
        select {
            color: black;
        }
    </style>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form action="{{ route('tasks.store') }}" method="POST" class="flex flex-wrap items-center gap-4">
            @csrf
            <input type="text" name="title" placeholder="Task title" required class="px-2 py-1 border rounded">
            <input type="text" name="description" placeholder="Task description" class="px-2 py-1 border rounded">
            <label for="priority" class="text-sm">Priority:</label>
            <select name="priority" id="priority" required class="px-2 py-1 border rounded">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">
                Add Task
            </button>
        </form>
    </div>

    {{-- <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                </div>
            </div>
        </div>
    </div> --}}


    {{-- <div class="p-6 text-gray-900 dark:text-gray-100">
        <ul>
            @forelse ($tasks as $task)
                <li>
                    <strong>{{ $task->title }}</strong><br>
                    <small>{{ $task->description }}</small><br>
                    <span
                        style="color: @if ($task->priority === 'high') red @elseif($task->priority === 'medium') orange @else green @endif;">
                        Priority: {{ Str::ucfirst($task->priority) }}
                    </span>
                </li>
            @empty
                <p>No tasks yet.</p>
            @endforelse
        </ul>
    </div> --}}

    <style>
        .task-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .task-card {
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .task-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .task-card h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .task-card p {
            font-size: 15px;
            color: #555;
        }

        .task-priority {
            margin-top: 10px;
            font-weight: bold;
            color: white;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .priority-low {
            background-color: green;
        }

        .priority-medium {
            background-color: orange;
        }

        .priority-high {
            background-color: red;
        }
    </style>

    <div class="p-6 task-grid">
        @forelse ($tasks as $task)
            <div class="task-card">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <span class="task-priority priority-{{ $task->priority }}">
                    {{ Str::ucfirst($task->priority) }}
                </span>
            </div>
        @empty
            <p>No tasks yet.</p>
        @endforelse
    </div>

</x-app-layout>
