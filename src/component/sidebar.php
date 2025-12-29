<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_SESSION['username'] ?? 'Guest';
$email = $_SESSION['email'] ?? 'Guest';
?>

<aside class="w-64 bg-white border-r px-6 py-8 hidden md:flex flex-col h-screen sticky top-0">
    <img src="/src/img/logo.jpeg" class="w-36" alt="">
    <p class="text-xs text-slate-400 mb-10">Let's start our productive days!</p>

    <nav class="flex flex-col gap-2 flex-grow text-slate-600 font-medium">
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'home') ? 'bg-blue-50 text-blue-700' : 'hover:bg-slate-50 hover:text-blue-600' ?>" 
           href="index.php?page=home">
            <span class="text-lg">🏠</span> Home
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'tasks') ? 'bg-blue-50 text-blue-700' : 'hover:bg-slate-50 hover:text-blue-600' ?>" 
           href="index.php?page=tasks">
            <span class="text-lg">✅</span> Tasks
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'calendar') ? 'bg-blue-50 text-blue-700' : 'hover:bg-slate-50 hover:text-blue-600' ?>" 
           href="index.php?page=calendar">
            <span class="text-lg">📅</span> Kalender
        </a>
        <a class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all <?= ($page == 'settings') ? 'bg-blue-50 text-blue-700' : 'hover:bg-slate-50 hover:text-blue-600' ?>" 
           href="index.php?page=settings">
            <span class="text-lg">⚙️</span> Settings
        </a>
    </nav>

    <div class="mt-auto">
        <form action="index.php?page=user&action=logout" method="POST">
            <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 text-slate-500 hover:text-red-600 transition-colors group">
                <span class="text-lg group-hover:scale-110 transition-transform">🚪</span> 
                <span class="font-bold">Logout</span>
            </button>
        </form>

        <div class="border-t border-slate-100 pt-6 px-4">
            <div class="text-[10px] text-slate-400 uppercase tracking-wider">
                © 2025 Dikerjain
            </div>
        </div>
    </div>
</aside>