<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div id="inputForm" class="p-6 text-gray-900 dark:text-gray-100">
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
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded" id="addTask">
                Add Task
            </button>
        </form>
    </div>

    <div class="p-6 task-grid">
        @forelse ($tasks as $task)
            <div class="task-card">
                <h3>{{ $task->title }}</h3>
                <p>{{ $task->description }}</p>
                <span class="task-priority priority-{{ $task->priority }}">
                    {{ Str::ucfirst($task->priority) }}
                </span>

                <a href="{{ route('tasks.edit', $task->id) }}">
                    <i id="edit" class="fa-solid fa-pen"></i>
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i id="delete" class="fa-regular fa-circle-xmark"></i>
                    </button>
                </form>
            </div>
        @empty
            <p style="color: white;">No tasks yet.</p>
        @endforelse
    </div>

</x-app-layout>
