<!-- Modal Edit Overlay -->
<div id="EditTaskModal" class="fixed inset-0 bg-black bg-opacity-40 hidden flex items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-gray-800">Edit Task</h2>
            <button onclick="closeModalEdit()" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
        </div>

        <!-- Form -->
        <form method="POST" action="index.php?page=tasks&action=update" id="editTaskForm">
            <input type="hidden" name="id" id="editTaskId">
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                <input type="text" name="title" id="editTaskTitle"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                <input type="datetime-local" name="due_date" id="editTaskDate"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm">
            </div>
        </form>

        <!-- Actions -->
        <div>
            <a id="advanceEditLink" href="" class="text-indigo-600 hover:text-indigo-700 hover:underline underline-offset-2">
                Advance Edit
            </a>
        </div>
        <div class="flex justify-between items-center mt-6">
            <!-- Delete (form terpisah) -->
            <form method="POST" action="index.php?page=tasks&action=delete">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <button type="submit"
                    class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-red-700 text-sm">
                    <i class="fa-solid fa-trash-can"></i> Delete
                </button>
            </form>

            <!-- Cancel + Save -->
            <div class="flex gap-3">
                <button type="button" onclick="closeModalEdit()"
                    class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-100 text-sm">
                    Cancel
                </button>
                <!-- Save submit ke form update -->
                <button type="submit" form="editTaskForm"
                    class="px-4 py-2 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 text-sm">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>