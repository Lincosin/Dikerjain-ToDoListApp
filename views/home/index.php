<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN | Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#f5f3ef] h-screen w-screen overflow-hidden">

  <div class="h-screen w-screen flex">

    <?php 
      require_once __DIR__ . '/../../src/component/sidebar.php'; 
    ?>



    <!-- Page container -->
    <main class="flex-1 px-4 sm:px-6 lg:px-8 py-8">
      <header class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
      <div>
        <h1 class="text-2xl sm:text-3xl font-semibold">Good morning, Amy!</h1>
        <p class="mt-1 text-gray-600">You have <span class="font-medium">4 tasks</span> for today and <span class="font-medium">12 tasks</span> for this week.</p>
      </div>
    </header>
    <div class="flex flex-col md:flex-row md:items-center bg-gray-200">
      
    </div>

    </main>

    <section class="hidden lg:flex flex-col flex-1 bg-white p-10 overflow-y-auto">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">  
    <h1 class="text-3xl font-bold mb-4">
        Tulis Ide Aplikasi 💡
      </h1>
      <div class="flex items-center gap-3">
        <button class="inline-flex items-center gap-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 shadow-sm transition">
          <span class="text-lg">+</span>
          <span class="font-medium">New task</span>
        </button>
        <img src="https://i.pravatar.cc/40?img=8" alt="Profile" class="h-10 w-10 rounded-full ring-2 ring-white shadow-sm"/>
      </div>
    </div>

      <div class="flex gap-2 mb-6">
        <span class="text-xs bg-orange-100 text-orange-600 px-3 py-1 rounded-full">#ideas</span>
        <span class="text-xs bg-blue-100 text-blue-600 px-3 py-1 rounded-full">#to-do</span>
        <span class="text-xs bg-green-100 text-green-600 px-3 py-1 rounded-full">#planning</span>
      </div>

      <p class="text-slate-600 leading-relaxed max-w-2xl">
        Buat aplikasi manajemen tugas sederhana untuk membantu pengguna
        mengatur pekerjaan harian, fokus, dan produktif tanpa stres.
      </p>

      <h2 class="mt-10 text-xl font-semibold">Hari Ini</h2>

      <ul class="mt-4 space-y-3 text-slate-600">
        <li class="flex items-center gap-3">
          <input type="checkbox" checked>
          Desain UI Dashboard
        </li>
        <li class="flex items-center gap-3">
          <input type="checkbox">
          Implementasi CRUD Task
        </li>
        <li class="flex items-center gap-3">
          <input type="checkbox">
          Testing
        </li>
      </ul>

    </section>

  </div>

<script>
window.addEventListener("pageshow", function (event) {
    if (event.persisted) {
        window.location.reload();
    }
});
</script>
</body>
</html>