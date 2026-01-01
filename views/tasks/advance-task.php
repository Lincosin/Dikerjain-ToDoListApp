<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advance Task</title>
    <link rel="icon" type="image/png" href="src/img/logo.jpeg"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" bg-[#5F9598] h-screen w-screen overflow-hidden">
    <div class="flex min-h-screen">
    <?php require_once __DIR__ . '/../../src/component/sidebar.php'; ?>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        
        <!-- Header (di dalam konten utama) -->
        <header class="bg-white px-6 py-4 shadow-md mb-4">
            <div class="flex items-center justify-between">
                <!-- Left: Info -->
                <div>
                    <div class="text-sm text-[#061E29] mb-1"><a href="index.php?page=tasks" class="hover:text-black hover:underline">Task</a> / <span class="text-black font-medium">New Advance Task</span></div>
                    <h1 class="text-2xl font-bold text-black mb-2"><span class="mr-2"><i class="fa-solid fa-list-check"></i></span>Create New Task</h1>
                </div>

                <!-- Right: User Info -->
                <div class="flex items-center gap-4">
                    <form action="index.php?page=tasks">
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        Back
                    </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Form -->
        <form method="POST" action="index.php?page=tasks&action=createAdvance" class="flex-1 p-6">
            <div class="w-full h-full bg-white rounded-lg shadow-md p-6">

                <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">

                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" name="title" type="text" placeholder="Task Title" required>
                </div>

                <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
                <textarea class="shadow appearance-none border rounded w-full h-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="description" name="description" placeholder="Task Description" required></textarea>
                </div>

                <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="due_date">Due Date</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="due_date" name="due_date" type="datetime-local" required>
                </div>

                <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                    Create Task
                </button>
                </div>

            </div>
            </form>
    </div>
</div>
</body>
</html>