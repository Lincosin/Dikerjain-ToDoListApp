<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['username'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Guest';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
<aside class="w-64 bg-white dark:bg-slate-900 border-r dark:border-slate-700 px-6 py-4 hidden md:flex flex-col h-screen sticky top-0">
    <img src="/src/img/logo.jpeg" class="w-36" id="logo" alt="logo">
    <p class="text-xs text-slate-400 dark:text-slate-300 mb-10">Let's start our productive days!</p>

    <nav class="flex flex-col gap-2 flex-grow text-slate-600 dark:text-slate-100 font-medium">
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'tasks') ? 'active' : '' ?> ' hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600" 
           href="index.php?page=tasks">
            <span class="text-lg"><i class="fa-solid fa-list-check"></i></span> My Tasks
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'calendar') ? 'active' : '' ?> ' hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600" 
           href="index.php?page=calendar">
            <span class="text-lg"><i class="fa-solid fa-calendar"></i></span> Calendar
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'settings') ? 'active' : '' ?> ' hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-blue-600" 
           href="index.php?page=settings">
            <span class="text-lg"><i class="fa-solid fa-gear"></i></span> Settings
        </a>
    </nav>

    <div class="mt-auto">
        <div class="border-t border-slate-100 dark:border-slate-700 pt-6 px-4">
            <div class="text-[10px] text-slate-400 dark:text-slate-300 uppercase tracking-wider">
                &copy; <span id="year"></span> Dikerjain </div>
        </div>
    </div>
</aside>
<script> 
document.getElementById("year").textContent = new Date().getFullYear(); 
// Ambil path terakhir dari URL, contoh: /app/tasks -> "tasks" 
const current = window.location.pathname.split('/').filter(Boolean).pop() || 'dashboard'; 
// Toggle kelas aktif 
document.querySelectorAll('#sidebar a').forEach(link => { 
    const isActive = link.dataset.route === current; 
    link.classList.toggle('bg-gray-100', isActive); 
    link.classList.toggle('text-indigo-600', isActive); 
    link.classList.toggle('font-medium', isActive); 
    // indikator bulat di kiri 
    const dot = link.querySelector('span.w-2'); if (dot) { 
        dot.classList.toggle('bg-indigo-500', isActive); 
        dot.classList.toggle('bg-gray-300', !isActive); } 
        // aksesibilitas 
        link.setAttribute('aria-current', isActive ? 'page' : 'false'); 
        });
</script>