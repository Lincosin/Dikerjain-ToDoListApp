
        <aside class="w-64 bg-white border-r px-6 py-8 hidden md:flex flex-col">
          <h1 class="text-2xl font-extrabold text-blue-700 mb-10">
            DIKERJAIN
          </h1>

          <h3 class="text-sm text-slate-400 mb-6">Selamat datang, <?= htmlspecialchars($username) ?>!</h3>

          <nav class="flex-1 space-y-4 text-slate-600">
            <a class="flex items-center gap-3 text-blue-600" href="index.php?page=note">
              📒 Notes
            </a>
            <a class="flex items-center gap-3 hover:text-blue-600" href="#">
              ✅ Tasks
            </a>
            <a class="flex items-center gap-3 hover:text-blue-600" href="index.php?page=calendar">
              📅 Kalender
            </a>
            <a class="flex items-center gap-3 hover:text-blue-600" href="#">
              ⚙️ Settings
            </a>
            <form action="index.php?page=user&action=logout" method="POST">
              <button type="submit" class="flex items-center mt-[350px] py-2 px-5 bg-transparent hover:text-blue-600" type="submit">
                Logout
              </button>
            </form>
          </nav>

          <div class="text-sm text-slate-400 border-t pt-4">
            © 2025 Dikerjain
          </div>
        </aside>