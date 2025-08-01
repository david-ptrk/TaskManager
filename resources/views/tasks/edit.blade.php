<x-app-layout>
    <div class="p-6 max-w-md mx-auto bg-white shadow-md-rounded">
        <h2 class="text-2x1 font-bold mb-4">Edit Task</h2>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block font-semibold">Title</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}" required
                    class="w-full border border-gray-300 rounded p-2">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-semibold">Description</label>
                <input type="text" name="description" id="description"
                    class="w-full border border-gray-300 rounded p-2" value="{{ $task->description }}">
            </div>

            <div class="mb-4">
                <label for="priority" class="block font-semibold">Priority</label>
                <select name="priority" id="priority" class="w-full border border-gray-300 rounded p-2">
                    <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>
                    <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>
                </select>
            </div>

            <button type="button" onclick="window.location='{{ route('dashboard') }}'"
                class="text-black px-4 py-2 rounded" style="background-color: rgb(227, 227, 5);">Cancel</button>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded"
                style="background-color: #3b82f6;">Update Task</button>
        </form>
    </div>
</x-app-layout>
