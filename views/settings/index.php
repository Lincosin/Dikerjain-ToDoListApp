<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN | Settings</title>
  <link rel="icon" type="image/png" href="src/img/logo.jpeg"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F6F3EE] text-slate-800 h-screen w-screen overflow-hidden">

<div class="h-screen w-screen flex">

<?php 
  require_once __DIR__ . '/../../src/component/sidebar.php';
?>

<!-- CONTENT -->
<section class="flex-1 bg-white p-10 overflow-y-auto">

<h1 class="text-3xl font-bold mb-8">Pengaturan ⚙️</h1>

<!-- PROFILE -->
<div class="bg-slate-50 border rounded-xl p-6 mb-8 flex items-center justify-between">
  <!-- Bagian kiri: avatar + info -->
  <div class="flex items-center gap-6">
    <img id="avatar" src="https://ui-avatars.com/api/?name=<?= urlencode($username ?? 'G') ?>&background=0D8ABC&color=fff" 
         class="w-20 h-20 rounded-full border-2 border-white shadow-sm" alt="Profile">

    <div>
      <h2 class="text-xl font-semibold"><?= htmlspecialchars($username) ?></h2>
      <p class="text-slate-500"><?= htmlspecialchars($email) ?></p>
      <button onclick="openProfile()" class="mt-3 text-sm text-blue-600 hover:underline">
        Ubah Profil
      </button>
    </div>
  </div>

  <!-- Bagian kanan: logout -->
  <form method="POST" action="index.php?page=user&action=logout">
    <button class="bg-slate-100 px-4 py-2 rounded text-red-600 font-medium hover:bg-slate-200"><i class="fa-solid fa-right-from-bracket"></i>
      Logout
    </button>
  </form>
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

</section>
</div>

<!-- MODAL PROFILE -->
<div id="profileModal" class="fixed inset-0 bg-black/40 hidden items-center justify-center">
  <div class="bg-white rounded-xl p-6 w-[400px]">
    <h2 class="text-xl font-semibold mb-4">Ubah Profil</h2>

    <form method="POST" action="index.php?page=settings&action=update">
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

function randomColor() { 
  return Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0'); 
  } 
  const avatar = document.getElementById("avatar"); 
  const url = new URL(avatar.src); 
  const name = url.searchParams.get("name"); 
  const bgColor = randomColor(); 
  avatar.src = `https://ui-avatars.com/api/?name=${name}&background=${bgColor}&color=fff`;

</script>

</body>
</html>