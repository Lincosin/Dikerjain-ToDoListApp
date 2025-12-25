<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN | Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F6F3EE] h-screen w-screen overflow-hidden">

  <!-- App Wrapper -->
  <div class="h-screen w-screen flex">

    <!-- Sidebar -->
    <!-- <aside class="w-64 bg-white border-r px-6 py-8 hidden md:flex flex-col">
      <h1 class="text-2xl font-extrabold text-blue-700 mb-10">
        DIKERJAIN
      </h1>

      <h3 class="text-sm text-slate-400 mb-6">Selamat datang,  <?= htmlspecialchars($username) ?>!</h3>

      <nav class="flex-1 space-y-4 text-slate-600">
        <a class="flex items-center gap-3 font-medium text-blue-600" href="#">
          📒 Notes
        </a>
        <a class="flex items-center gap-3 hover:text-blue-600" href="#">
          ✅ Tasks
        </a>
        <a class="flex items-center gap-3 hover:text-blue-600" href="#">
          📅 Kalender
        </a>
        <a class="flex items-center gap-3 hover:text-blue-600" href="#">
          ⚙️ Settings
        </a>
        <form action="" method="POST">
          <button name="logout" class="flex items-center mt-[350px] py-2 px-5 color black bg-transparent hover:text-blue-600" type="submit">logout</button>
        </form>
      </nav>

      <div class="text-sm text-slate-400 border-t pt-4">
        © 2025 Dikerjain
      </div>
    </aside> -->

    <?php 
      require_once __DIR__ . '/../../src/component/sidebar.php'; 
    ?>

    <main class="w-full md:w-[360px] bg-white border-r p-6 overflow-y-auto">
      
      <input
        type="text"
        placeholder="Cari tugas..."
        class="w-full px-4 py-2 mb-6 rounded-lg border focus:outline-none focus:ring focus:ring-blue-200"
      >

      <h2 class="text-lg font-bold mb-4">Tasks</h2>

      <div class="space-y-4">
        <div class="p-4 rounded-xl border hover:bg-slate-50 cursor-pointer">
          <h3 class="font-semibold">Belanja Bulanan</h3>
          <p class="text-sm text-slate-500">Beras, telur, minyak</p>
          <span class="text-xs text-slate-400">Hari ini</span>
        </div>

        <div class="p-4 rounded-xl border hover:bg-slate-50 cursor-pointer">
          <h3 class="font-semibold">Baca Buku</h3>
          <p class="text-sm text-slate-500">Atomic Habits</p>
          <span class="text-xs text-slate-400">Besok</span>
        </div>

        <div class="p-4 rounded-xl bg-orange-200 cursor-pointer">
          <h3 class="font-semibold">Tulis Ide Aplikasi 💡</h3>
          <p class="text-sm text-slate-700">Fitur to-do list</p>
          <span class="text-xs text-slate-600">1 hari lalu</span>
        </div>

        <div class="p-4 rounded-xl border hover:bg-slate-50 cursor-pointer">
          <h3 class="font-semibold">Olahraga</h3>
          <p class="text-sm text-slate-500">Lari pagi</p>
          <span class="text-xs text-slate-400">2 hari lalu</span>
        </div>

      </div>
    </main>

    <section class="hidden lg:flex flex-col flex-1 bg-white p-10 overflow-y-auto">
      <h1 class="text-3xl font-bold mb-4">
        Tulis Ide Aplikasi 💡
      </h1>

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