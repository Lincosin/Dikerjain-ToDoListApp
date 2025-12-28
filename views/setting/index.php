<?php
session_start();

/* SIMPAN PROFILE */
if (isset($_POST['saveProfile'])) {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['email'] = $_POST['email'];
  header("Location: settings.php");
  exit;
}

$username = $_SESSION['username'] ?? 'User';
$email = $_SESSION['email'] ?? 'user@email.com';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN | Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F6F3EE] text-slate-800 h-screen w-screen overflow-hidden">

<div class="h-screen w-screen flex">

<!-- SIDEBAR -->
<aside class="w-64 bg-white border-r px-6 py-8 hidden md:flex flex-col">
  <h1 class="text-2xl font-extrabold text-blue-700 mb-10">DIKERJAIN</h1>

  <h3 class="text-sm text-slate-400 mb-6">
    Selamat datang, <?= htmlspecialchars($username) ?>!
  </h3>

  <nav class="flex-1 space-y-4 text-slate-600">
    <a class="flex items-center gap-3 hover:text-blue-600" href="#">📒 Notes</a>
    <a class="flex items-center gap-3 hover:text-blue-600" href="#">✅ Tasks</a>
    <a class="flex items-center gap-3 hover:text-blue-600" href="kalender.php">📅 Kalender</a>
    <a class="flex items-center gap-3 font-medium text-blue-600" href="settings.php">⚙️ Settings</a>
  </nav>

  <div class="text-sm text-slate-400 border-t pt-4">
    © 2025 Dikerjain
  </div>
</aside>

<!-- CONTENT -->
<section class="flex-1 bg-white p-10 overflow-y-auto">

<h1 class="text-3xl font-bold mb-8">Pengaturan ⚙️</h1>

<!-- PROFILE -->
<div class="bg-slate-50 border rounded-xl p-6 mb-8 flex items-center gap-6">
  <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center text-3xl font-bold text-blue-600">
    <?= strtoupper($username[0]) ?>
  </div>

  <div>
    <h2 class="text-xl font-semibold"><?= htmlspecialchars($username) ?></h2>
    <p class="text-slate-500"><?= htmlspecialchars($email) ?></p>
    <button onclick="openProfile()" class="mt-3 text-sm text-blue-600 hover:underline">
      Ubah Profil
    </button>
  </div>
</div>

<!-- PENGATURAN UMUM -->
<div class="mb-10">
  <h2 class="text-lg font-semibold mb-4">Pengaturan Umum</h2>

  <!-- NOTIFIKASI -->
  <div class="flex justify-between items-center border rounded-lg p-4">
    <span>Notifikasi</span>
    <label class="relative inline-flex items-center cursor-pointer">
      <input type="checkbox" checked class="sr-only peer">
      <div class="w-11 h-6 bg-slate-300 rounded-full
                  peer-checked:bg-blue-600
                  after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                  after:bg-white after:rounded-full after:h-5 after:w-5
                  after:transition-all peer-checked:after:translate-x-5">
      </div>
    </label>
  </div>
</div>

<!-- LOGOUT -->
<div class="border-t pt-6">
  <form method="POST" action="logout.php">
    <button class="text-red-600 font-medium hover:underline">
      Logout
    </button>
  </form>
</div>

</section>
</div>

<!-- MODAL PROFILE -->
<div id="profileModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center">
  <div class="bg-white rounded-xl p-6 w-[400px]">
    <h2 class="text-xl font-semibold mb-4">Ubah Profil</h2>

    <form method="POST">
      <div class="mb-4">
        <label class="text-sm">Username</label>
        <input name="username" value="<?= htmlspecialchars($username) ?>"
          class="w-full border rounded px-3 py-2">
      </div>

      <div class="mb-4">
        <label class="text-sm">Email</label>
        <input name="email" value="<?= htmlspecialchars($email) ?>"
          class="w-full border rounded px-3 py-2">
      </div>

      <div class="flex justify-end gap-3">
        <button type="button" onclick="closeProfile()" class="px-4 py-2 border rounded">
          Batal
        </button>
        <button name="saveProfile" class="px-4 py-2 bg-blue-600 text-white rounded">
          Simpan
        </button>
      </div>
    </form>
  </div>
</div>

<!-- SCRIPT -->
<script>
const profileModal = document.getElementById("profileModal");

function openProfile() {
  profileModal.classList.remove("hidden");
  profileModal.classList.add("flex");
}
function closeProfile() {
  profileModal.classList.add("hidden");
}
</script>

</body>
</html>