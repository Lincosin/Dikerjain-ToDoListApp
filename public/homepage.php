<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="grid grid-cols-4 grid-rows-5 md:grid-cols gap-2">
        <div class="grid row-span-5 border border-black">
            <div class="grid grid-rows-6 gap-2 p-4">
                <div class="row-span-1 border border-stone-700 p-2">
                    <h1 class="text-2xl font-bold">Add ToDo</h1>
                </div>
                <div class="row-span-5 border border-stone-700 p-2">
                    <form id="todo-form" class="flex flex-col gap-2">
                        <input type="text" id="todo-input" class="border border-gray-300 p-2" placeholder="Enter a new task" required>
                        <button type="submit" class="bg-blue-500 text-white p-2">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="grid col-span-3 row-span-5 border border-stone-700">
            <div class="grid grid-rows-6 gap-2 p-4">
                <div class="row-span-1 border border-black p-2">
                    <h1 class="text-2xl font-bold">ToDo List</h1>
                </div>
                <div class="row-span-5 border border-black p-2 overflow-y-auto">
                    <ul id="todo-list" class="list-disc list-inside">
                        <!-- ToDo items will be dynamically added here -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</body>
</html>