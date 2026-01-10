<!-- Modal Edit Overlay -->
<div id="EditTaskModal" class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">
    <div class="bg-white dark:bg-slate-800 rounded-xl shadow-lg w-full max-w-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800 dark:text-slate-200">Edit Task</h2>
            <button onclick="closeModalEdit()" class="text-gray-400 dark:text-slate-200 hover:text-gray-600 dark:hover:text-slate-400 text-2xl">&times;</button>
        </div>

        <!-- Form -->
        <form method="POST" action="index.php?page=tasks&action=update" id="editTaskForm">
            <input type="hidden" name="id" id="editTaskId">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Title</label>
                <input type="text" name="title" id="editTaskTitle"
                    class="w-full border border-gray-300 dark:border-slate-600 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm dark:bg-slate-700 dark:text-slate-200">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-slate-300 mb-1">Due Date</label>
                <input type="datetime-local" name="due_date" id="editTaskDate"
                    class="w-full border border-gray-300 dark:border-slate-600 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm dark:bg-slate-700 dark:text-slate-200">
            </div>
        </form>

        <!-- Actions -->
        <div>
            <a id="advanceEditLink" href="" class="text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2 dark:text-indigo-400 dark:hover:text-indigo-300">
                Advance Edit
            </a>
        </div>
        <div class="flex justify-between items-center mt-6">
            <!-- Delete (form terpisah) -->
            <form method="POST" action="index.php?page=tasks&action=delete">
                <input type="hidden" name="id" id="deleteTaskId">
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-red-600 dark:bg-red-500 text-white hover:bg-red-700 dark:hover:bg-red-400 text-sm">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </form>

            <!-- Cancel + Save -->
            <div class="flex gap-3">
                <button type="button" onclick="closeModalEdit()"
                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-slate-600 text-gray-600 dark:text-slate-300 hover:bg-gray-100 dark:hover:bg-slate-700 text-sm">
                    Cancel
                </button>
                <!-- Save submit ke form update -->
                <button type="submit" form="editTaskForm"
                    class="px-4 py-2 rounded-lg bg-indigo-600 dark:bg-indigo-500 text-white hover:bg-indigo-700 dark:hover:bg-indigo-400 text-sm">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>