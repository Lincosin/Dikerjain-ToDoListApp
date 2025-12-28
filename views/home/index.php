<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN</title>
  <link rel="icon" type="image/png" href="src/img/logo.jpeg"/>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Menghilangkan scrollbar pada Chrome/Safari dan Firefox tanpa mematikan fungsinya */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
  </style>
</head>

<body class="bg-[#f8fafc] h-screen w-screen overflow-hidden">

  <div class="h-screen w-screen flex">
    <?php require_once __DIR__ . '/../../src/component/sidebar.php'; ?>

    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
      
      <header class="bg-white border-b border-slate-200 px-8 py-4 flex items-center justify-between sticky top-0 z-10">
          <div class="flex-1 flex justify-center">
              <div class="relative w-full max-w-lg">
                  <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                  </span>
                  <input type="text" class="w-full bg-slate-100 border-none rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-blue-500 transition-all" placeholder="Cari tugas Anda...">
              </div>
          </div>

          <div class="flex items-center gap-3 ml-4">
              <div class="text-right hidden sm:block">
                  <p class="text-sm font-bold text-slate-700 leading-none"><span class="font-normal">Hi,</span> <?= htmlspecialchars($username) ?></p>
              </div>
              <img id="avatar" src="https://ui-avatars.com/api/?name=<?= urlencode($username ?? 'G') ?>&background=0D8ABC&color=fff" class="w-9 h-9 rounded-full border-2 border-white shadow-sm" alt="Profile">
          </div>
      </header>

      <main class="flex-1 overflow-y-auto no-scrollbar p-8">
        <div class="flex flex-col xl:flex-row gap-8">
            
            <div class="flex-1 min-w-0">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php 
                    $columns = [
                        ['title' => 'To-Do', 'bg' => 'bg-blue-500'],
                        ['title' => 'On Progress', 'bg' => 'bg-purple-500'],
                        ['title' => 'On Review', 'bg' => 'bg-amber-500'],
                        ['title' => 'Done', 'bg' => 'bg-emerald-500']
                    ];

                    foreach ($columns as $col): 
                    ?>
                    <div class="flex flex-col min-w-0">
                        <div class="flex items-center justify-between mb-4 px-1">
                            <div class="flex items-center gap-2">
                                <div class="w-1.5 h-5 <?= $col['bg'] ?> rounded-full"></div>
                                <h3 class="font-bold text-slate-700 text-sm tracking-wide"><?= $col['title'] ?></h3>
                                <span class="bg-slate-200 text-slate-600 text-[10px] px-2 py-0.5 rounded-full font-bold">1</span>
                            </div>
                            <button class="text-slate-400 hover:text-blue-600 font-bold text-xl">+</button>
                        </div>

                        <div class="space-y-4">
                            <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all cursor-grab active:cursor-grabbing">
                                <h4 class="font-bold text-slate-800 text-[13px] mb-1 leading-snug">Project Wireframe</h4>
                                <p class="text-[11px] text-slate-400 mb-4 line-clamp-2">Membuat struktur visual awal untuk aplikasi.</p>
                                <div class="flex items-center justify-between">
                                    <img class="w-5 h-5 rounded-full" src="https://i.pravatar.cc/30?u=1">
                                    <span class="text-[10px] text-slate-400 font-bold italic">Pending</span>
                                </div>
                            </div>
                            <button class="w-full py-3 border-2 border-dashed border-slate-200 rounded-2xl text-slate-400 text-[11px] font-bold hover:border-blue-300 hover:text-blue-500 transition-all uppercase tracking-widest">+ Add New Task</button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="w-full xl:w-80 flex flex-col gap-8">
                
                <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="font-black text-slate-800 text-sm uppercase tracking-wider">Upcoming Tasks</h3>
                        <a href="#" class="text-blue-500 text-[10px] font-bold hover:underline">See All</a>
                    </div>
                    <div class="space-y-4">
                        <?php if (!empty($todayTasks)): 
                            foreach (array_slice($todayTasks, 0, 3) as $task): ?>
                            <div class="flex items-center gap-4 group cursor-pointer hover:bg-slate-50 p-2 rounded-xl transition-all">
                                <div class="w-10 h-10 bg-slate-50 rounded-xl flex flex-col items-center justify-center border border-slate-100 group-hover:bg-blue-50 transition-colors">
                                    <span class="text-[9px] font-bold text-blue-500 leading-none uppercase"><?= date('M', strtotime($task['due_date'])) ?></span>
                                    <span class="text-xs font-black text-slate-700"><?= date('d', strtotime($task['due_date'])) ?></span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="text-xs font-bold text-slate-700 truncate"><?= htmlspecialchars($task['title']) ?></h4>
                                    <p class="text-[9px] text-slate-400 italic">Deadline Mendekat</p>
                                </div>
                            </div>
                        <?php endforeach; else: ?>
                            <p class="text-[10px] text-slate-400 italic text-center py-2">Tidak ada tugas terdekat.</p>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100">
                    <div class="flex items-center justify-between mb-6">
                        <h3 id="calendarMonth" class="font-black text-slate-800 text-sm uppercase tracking-wider">Desember 2025</h3>
                        <div class="flex gap-1">
                            <button onclick="changeMonth(-1)" class="w-7 h-7 flex items-center justify-center rounded-lg hover:bg-slate-100 text-slate-400 font-bold transition-all hover:text-blue-600"><</button>
                            <button onclick="changeMonth(1)" class="w-7 h-7 flex items-center justify-center rounded-lg hover:bg-slate-100 text-slate-400 font-bold transition-all hover:text-blue-600">></button>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-7 gap-y-2 mb-2 text-center">
                        <?php foreach (['S','M','T','W','T','F','S'] as $dayName): ?>
                            <span class="text-[10px] font-bold text-slate-300 uppercase"><?= $dayName ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div id="calendarGrid" class="grid grid-cols-7 text-center"></div>
                </div>

            </div> </div>
      </main>
    </div>
  </div>

  <!-- <div id="modalOverlay" class="fixed inset-0 bg-slate-900/70 backdrop-blur-md flex items-center justify-center z-[100] p-4">
      <div class="bg-white rounded-[2.5rem] p-8 max-w-md w-full shadow-2xl transform transition-all border border-slate-100">
          <div class="text-center mb-6">
              <div class="w-16 h-16 bg-orange-50 text-3xl flex items-center justify-center rounded-2xl mx-auto mb-4 border border-orange-100 shadow-sm">🚀</div>
              <h2 class="text-2xl font-black text-slate-800 mb-1 leading-tight">Hola Amigo!</h2>
              <p class="text-slate-500 text-sm">Kamu punya beberapa tugas <span class="text-orange-500 font-bold">Pending</span> nih. Yuk, fokus selesaikan hari ini!</p>
          </div>
          <button onclick="closeModal()" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-blue-200 transition-all hover:scale-[1.02] active:scale-[0.98]">
              Siap, Kerjakan!
          </button>
      </div>
  </div> -->

  <script>
      // Mengirim data tugas dari PHP ke JS agar kalender bisa memberi tanda titik merah
      const taskData = <?= json_encode($todayTasks ?? []) ?>;
      
      let date = new Date();
      let currMonth = date.getMonth();
      let currYear = date.getFullYear();

      // Memastikan start kalender dari Des 2025 sesuai permintaan
      if(currYear < 2025 || (currYear === 2025 && currMonth < 11)) {
          currMonth = 11;
          currYear = 2025;
      }

      function renderCalendar() {
          const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
          const calendarGrid = document.querySelector("#calendarGrid");
          const monthTitle = document.querySelector("#calendarMonth");
          
          let firstDayOfMonth = new Date(currYear, currMonth, 1).getDay();
          let lastDateOfMonth = new Date(currYear, currMonth + 1, 0).getDate();
          
          monthTitle.innerText = `${monthNames[currMonth]} ${currYear}`;
          calendarGrid.innerHTML = "";

          // Menambahkan slot kosong untuk hari sebelum tanggal 1
          for (let i = 0; i < firstDayOfMonth; i++) {
              calendarGrid.innerHTML += `<span></span>`;
          }

          // Render Angka Tanggal
          for (let i = 1; i <= lastDateOfMonth; i++) {
              let isToday = i === new Date().getDate() && currMonth === new Date().getMonth() && currYear === new Date().getFullYear();
              
              // Cek apakah tanggal ini ada tugas di database
              let formattedDate = `${currYear}-${String(currMonth + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
              let hasTask = taskData.some(t => t.due_date.startsWith(formattedDate));

              calendarGrid.innerHTML += `
                  <div class="relative flex flex-col items-center justify-center py-1 group cursor-pointer">
                      <span class="text-[11px] font-bold h-7 w-7 flex items-center justify-center rounded-full transition-all
                          ${isToday ? 'bg-blue-600 text-white shadow-lg shadow-blue-200' : 'text-slate-600 hover:bg-slate-50'}">
                          ${i}
                      </span>
                      ${hasTask ? '<div class="absolute -bottom-0.5 w-1 h-1 bg-red-500 rounded-full"></div>' : ''}
                  </div>`;
          }
      }

      // Navigasi Bulan (Batas 2099)
      function changeMonth(step) {
          currMonth += step;
          if (currMonth < 0 || currMonth > 11) {
              date = new Date(currYear, currMonth, new Date().getDate());
              currYear = date.getFullYear();
              currMonth = date.getMonth();
          } else {
              date = new Date();
          }

          // Batas Bawah: Desember 2025
          if (currYear < 2025 || (currYear === 2025 && currMonth < 11)) {
              currYear = 2025; currMonth = 11;
          }
          // Batas Atas: Desember 2099
          if (currYear > 2099) {
              currYear = 2099; currMonth = 11;
          }

          renderCalendar();
      }

      // Fungsi menutup modal
      function closeModal() {
          const modal = document.getElementById('modalOverlay');
          modal.style.opacity = '0';
          modal.style.transform = 'scale(0.95)';
          setTimeout(() => modal.style.display = 'none', 300);
      }

      // Jalankan kalender saat pertama kali dimuat
      renderCalendar();


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