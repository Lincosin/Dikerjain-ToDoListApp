<?php
session_start();
$username = $_SESSION['username'] ?? 'User';

/*
  SIMULASI DATA DARI DATABASE
  nanti tinggal ganti pakai query MySQL
*/
$tasks = [
  "2025-12-27" => ["Meeting Project"]
];

$notes = [
  "2025-12-18" => ["Catatan Kuliah"]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN | Kalender</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#F6F3EE] h-screen w-screen overflow-hidden">

<div class="h-screen w-screen flex">

<!-- SIDEBAR (AMAN – TIDAK DIUBAH) -->
<aside class="w-64 bg-white border-r px-6 py-8 hidden md:flex flex-col">
  <h1 class="text-2xl font-extrabold text-blue-700 mb-10">DIKERJAIN</h1>

  <h3 class="text-sm text-slate-400 mb-6">
    Selamat datang, <?= htmlspecialchars($username) ?>!
  </h3>

  <nav class="flex-1 space-y-4 text-slate-600">
    <a class="flex items-center gap-3 hover:text-blue-600" href="#">📒 Notes</a>
    <a class="flex items-center gap-3 hover:text-blue-600" href="#">✅ Tasks</a>
    <a class="flex items-center gap-3 font-medium text-blue-600" href="#">📅 Kalender</a>
    <a class="flex items-center gap-3 hover:text-blue-600" href="#">⚙️ Settings</a>
  </nav>

  <div class="text-sm text-slate-400 border-t pt-4">
    © 2025 Dikerjain
  </div>
</aside>

<!-- KONTEN -->
<section class="flex-1 bg-white p-10 overflow-y-auto">

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">
  <h1 class="text-3xl font-bold">Kalender 📅</h1>

  <div class="flex items-center gap-4">
    <button id="prevMonth" class="px-3 py-1 border rounded">◀</button>
    <span id="monthYear" class="font-semibold"></span>
    <button id="nextMonth" class="px-3 py-1 border rounded">▶</button>
    <select id="yearSelect" class="border rounded px-3 py-1 ml-2"></select>
  </div>
</div>

<!-- HARI -->
<div class="grid grid-cols-7 text-center text-sm font-semibold text-slate-500 mb-4">
  <div>Min</div><div>Sen</div><div>Sel</div>
  <div>Rab</div><div>Kam</div><div>Jum</div><div>Sab</div>
</div>

<div id="calendarGrid" class="grid grid-cols-7 gap-4"></div>

</section>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {

  const monthNames = [
    "Januari","Februari","Maret","April","Mei","Juni",
    "Juli","Agustus","September","Oktober","November","Desember"
  ];

  const tasks = <?= json_encode($tasks) ?>;
  const notes = <?= json_encode($notes) ?>;

  let today = new Date();
  let currentMonth = today.getMonth();
  let currentYear = today.getFullYear();

  const grid = document.getElementById("calendarGrid");
  const monthYear = document.getElementById("monthYear");
  const yearSelect = document.getElementById("yearSelect");

  for (let y = 2025; y <= 2099; y++) {
    yearSelect.innerHTML += `<option ${y===currentYear?'selected':''}>${y}</option>`;
  }

  function renderCalendar() {
    grid.innerHTML = "";
    monthYear.textContent = monthNames[currentMonth] + " " + currentYear;

    const firstDay = new Date(currentYear, currentMonth, 1).getDay();
    const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

    for (let i = 0; i < firstDay; i++) grid.innerHTML += "<div></div>";

    for (let d = 1; d <= daysInMonth; d++) {
      const dateKey =
        currentYear + "-" +
        String(currentMonth+1).padStart(2,"0") + "-" +
        String(d).padStart(2,"0");

      let classes = "p-3 rounded-lg border";

      if (
        d === today.getDate() &&
        currentMonth === today.getMonth() &&
        currentYear === today.getFullYear()
      ) {
        classes += " bg-blue-100 border-blue-400";
      }

      let html = `<div class="font-semibold">${d}</div>`;

      if (tasks[dateKey]) {
        html += `<span class="block text-xs bg-green-100 text-green-700 rounded px-2 mt-1">Task</span>`;
      }

      if (notes[dateKey]) {
        html += `<span class="block text-xs bg-yellow-100 text-yellow-700 rounded px-2 mt-1">Note</span>`;
      }

      grid.innerHTML += `<div class="${classes}">${html}</div>`;
    }
  }

  document.getElementById("prevMonth").onclick = () => {
    currentMonth--;
    if (currentMonth < 0) { currentMonth = 11; currentYear--; }
    yearSelect.value = currentYear;
    renderCalendar();
  };

  document.getElementById("nextMonth").onclick = () => {
    currentMonth++;
    if (currentMonth > 11) { currentMonth = 0; currentYear++; }
    yearSelect.value = currentYear;
    renderCalendar();
  };

  yearSelect.onchange = e => {
    currentYear = parseInt(e.target.value);
    renderCalendar();
  };

  renderCalendar();
});
</script>

</body>
</html>