<!-- Modal Add Overlay -->
<div id="taskModal" class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Add New Task</h2>
            <button onclick="closeModalAdd()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <!-- Form -->
        <form method="POST" action="index.php?page=tasks&action=create" id="addTaskForm">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" placeholder="Insert Title..." required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                <input type="datetime-local" name="due_date" id="editTaskDate" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>
        </form>

        <!-- Actions -->
        <div class="flex justify-between gap-3">
            <a href="index.php?page=tasks&action=createAdvance" class="text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2"> Advance Task </a>
            <div class="flex justify-end gap-3">
                <button type="button" onclick="closeModalAdd()" class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100">
                Cancel
                </button>
                <button type="submit"  form="addTaskForm" class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700">
                Save
                </button>
             </div>
        </div>
    </div>
</div>