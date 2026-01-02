<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>DIKERJAIN</title>
  <link rel="icon" type="image/png" href="src/img/logo.jpeg" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Menghilangkan scrollbar pada Chrome/Safari dan Firefox tanpa mematikan fungsinya */
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }

    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .animate-fadeIn {
      animation: fadeIn 0.4s ease-in-out;
    }
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
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
              </svg>
            </span>
            <input type="text" id="searchTask"
              class="w-full bg-slate-100 border-none rounded-full py-2 pl-10 pr-4 text-sm focus:ring-2 focus:ring-blue-500 transition-all"
              placeholder="Cari tugas Anda...">
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
            <div class="mb-8 flex items-center justify-between">
              <div>
                <h1 class="text-2xl font-bold text-slate-700">My Tasks</h1>
                <span class="block border-b-4 rounded-full w-5 border-blue-600"></span>
              </div>
              <button onclick="openModalAdd()" class="text-white hover:text-slate-300 bg-slate-400 hover:bg-blue-700 rounded-md px-2 py-3 w-32 flex items-center justify-center font-medium text-sm transition-all">
                + Add Task
              </button>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
              <?php
              $columns = [
                'todo'    => ['title' => 'To-Do (Today)', 'bg' => 'bg-blue-500'],
                'pending' => ['title' => 'Pending', 'bg' => 'bg-purple-500'],
                'done'    => ['title' => 'Done', 'bg' => 'bg-emerald-500']
              ];

              foreach ($columns as $status => $col):
              ?>
                <div class="flex flex-col min-w-0">
                  <!-- Header -->
                  <div class="flex items-center justify-between mb-4 px-1">
                    <div class="flex items-center gap-2">
                      <div class="w-1.5 h-5 <?= $col['bg'] ?> rounded-full"></div>
                      <h3 class="font-bold text-slate-700 text-sm tracking-wide"><?= $col['title'] ?></h3>
                      <span class="bg-slate-200 text-slate-600 text-[10px] px-2 py-0.5 rounded-full font-bold">
                        <?= count(array_filter($tasks, fn($t) => $t['status'] === $status)) ?>
                      </span>
                    </div>
                  </div>

                  <!-- Task Cards -->
                  <div class="space-y-4" id="taskBoard">
                    <?php foreach ($tasks as $task): ?>
                      <?php if ($status === 'todo'): ?>
                        <?php if ($task['status'] === 'pending' && date('Y-m-d', strtotime($task['due_date'])) === date('Y-m-d')): ?>
                          <div class="task-card bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all cursor-pointer"
                            onclick="togglePopup(
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>',
                                            '<?= htmlspecialchars($task['description'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['status'], ENT_QUOTES) ?>'
                                        )">
                            <div class="flex items-center justify-between mb-1">
                              <h4 class="font-bold text-slate-800 text-[13px] leading-snug">
                                <?= htmlspecialchars($task['title']) ?>
                              </h4>
                              <button onclick="event.stopPropagation(); openModalEdit(
                                            '<?= htmlspecialchars($task['id'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>'
                                          )">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </div>
                            <p class="text-[11px] text-slate-400 mb-4">
                              <?= htmlspecialchars($task['due_date'] ?? 'No due date') ?>
                            </p>
                            <div class="flex items-center justify-between">
                              <span class="text-[10px] text-slate-400 font-bold italic">
                                <?= ucfirst($task['status']) ?>
                              </span>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif ($status === 'pending'): ?>
                        <?php if ($task['status'] === 'pending'): ?>
                          <div class="task-card bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all cursor-pointer"
                            onclick="togglePopup(
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>',
                                            '<?= htmlspecialchars($task['description'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['status'], ENT_QUOTES) ?>'
                                        )">
                            <div class="flex items-center justify-between mb-1">
                              <h4 class="font-bold text-slate-800 text-[13px] leading-snug">
                                <?= htmlspecialchars($task['title']) ?>
                              </h4>
                              <button onclick="event.stopPropagation(); openModalEdit(
                                            '<?= htmlspecialchars($task['id'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>'
                                          )">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </div>
                            <p class="text-[11px] text-slate-400 mb-4">
                              <?= htmlspecialchars($task['due_date'] ?? 'No due date') ?>
                            </p>
                            <div class="flex items-center justify-between">
                              <span class="text-[10px] text-slate-400 font-bold italic">
                                <?= ucfirst($task['status']) ?>
                              </span>
                              <div>
                                <form method="POST" action="index.php?page=tasks&action=markAsDone">
                                  <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                  <input type="hidden" name="status" value="done">
                                  <input type="checkbox" onchange="this.form.submit()" <?= $task['status'] === 'done' ? 'checked' : '' ?>>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php elseif ($status === 'done'): ?>
                        <?php if ($task['status'] === 'done'): ?>
                          <div class="task-card bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all cursor-pointer"
                            onclick="togglePopup(
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>',
                                            '<?= htmlspecialchars($task['description'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['status'], ENT_QUOTES) ?>'
                                        )">
                            <div class="flex items-center justify-between mb-1">
                              <h4 class="font-bold text-slate-800 text-[13px] leading-snug">
                                <?= htmlspecialchars($task['title']) ?>
                              </h4>
                              <button onclick="event.stopPropagation(); openModalEdit(
                                            '<?= htmlspecialchars($task['id'], ENT_QUOTES) ?>',
                                            '<?= htmlspecialchars($task['title'], ENT_QUOTES) ?>', 
                                            '<?= $task['due_date'] ?>'
                                          )">
                                <i class="fa-solid fa-pen-to-square"></i>
                              </button>
                            </div>
                            <p class="text-[11px] text-slate-400 mb-4">
                              <?= htmlspecialchars($task['due_date'] ?? 'No due date') ?>
                            </p>
                            <div class="flex items-center justify-between">
                              <span class="text-[10px] text-slate-400 font-bold italic">
                                <?= ucfirst($task['status']) ?>
                              </span>
                              <div>
                                <form method="POST" action="index.php?page=tasks&action=toggleStatus">
                                  <input type="hidden" name="id" value="<?= $task['id'] ?>">
                                  <input type="hidden" name="status" value="<?= $task['status'] === 'done' ? 'pending' : 'done' ?>">
                                  <input type="checkbox" onchange="this.form.submit()" <?= $task['status'] === 'done' ? 'checked' : '' ?>>
                                </form>
                              </div>
                            </div>
                          </div>
                        <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <?php require_once 'detail.php'; ?>
          <?php require_once 'simple-task.php'; ?>
          <?php require_once 'simple-edit.php'; ?>
          <?php require_once 'calendar.php'; ?>
        </div>
      </main>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
        const searchInput = document.getElementById("searchTask");
        const taskCards = document.querySelectorAll("#taskBoard .task-card");

        searchInput.addEventListener("input", function() {
            const keyword = this.value.toLowerCase();

            taskCards.forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(keyword) ? "block" : "none";
            });
        });
    });

    const now = new Date();
    const offset = now.getTimezoneOffset(); // dalam menit
    const localTime = new Date(now.getTime() - offset * 60000);
    const formatted = localTime.toISOString().slice(0, 16);
    document.getElementById('editTaskDate').value = formatted;

    const taskData = <?= json_encode($todayTasks ?? []) ?>;
    let today = new Date();
    let currMonth = today.getMonth(); // ambil bulan sekarang
    let currYear = today.getFullYear(); // ambil tahun sekarang

    let selectedDate = null;

    function renderCalendar() {
      const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
      const calendarGrid = document.querySelector("#calendarGrid");
      const monthTitle = document.querySelector("#calendarMonth");

      let firstDayOfMonth = new Date(currYear, currMonth, 1).getDay();
      let lastDateOfMonth = new Date(currYear, currMonth + 1, 0).getDate();

      monthTitle.innerText = `${monthNames[currMonth]} ${currYear}`;
      calendarGrid.innerHTML = "";


      for (let i = 0; i < firstDayOfMonth; i++) {
        calendarGrid.innerHTML += `<span></span>`;
      }

      for (let i = 1; i <= lastDateOfMonth; i++) {
        let today = new Date();
        let formattedDate = `${currYear}-${String(currMonth+1).padStart(2,'0')}-${String(i).padStart(2,'0')}`;

        let isToday = i === today.getDate() && currMonth === today.getMonth() && currYear === today.getFullYear();
        let isSelected = formattedDate === selectedDate;
        let hasTask = taskData.some(t => t.due_date.startsWith(formattedDate));

        // Tentukan kelas CSS
        let baseClass = "text-[11px] font-bold h-7 w-7 flex items-center justify-center rounded-full transition-all";
        let styleClass = "";
        if (isSelected) {
          styleClass = "bg-blue-700 text-white shadow-md"; // klik
        } else if (isToday) {
          styleClass = "bg-blue-300 text-white shadow"; // hari ini
        } else {
          styleClass = "text-slate-600 hover:bg-slate-50"; // default
        }

        calendarGrid.innerHTML += `
            <div onclick="selectDate('${formattedDate}')" class="relative flex flex-col items-center justify-center py-1 group cursor-pointer">
              <span class="${baseClass} ${styleClass}">${i}</span>
              ${hasTask ? '<div class="absolute -bottom-0.5 w-1 h-1 bg-red-500 rounded-full"></div>' : ''}
            </div>`;
      }
    }

    function selectDate(date) {
      selectedDate = date;
      renderCalendar();
      loadTasks(date);
    }

    function changeMonth(step) {
      currMonth += step;
      if (currMonth < 0) {
        currMonth = 11;
        currYear--;
      } else if (currMonth > 11) {
        currMonth = 0;
        currYear++;
      }

      // batas bawah: Des 2025
      if (currYear < 2025 || (currYear === 2025 && currMonth < 11)) {
        currYear = 2025;
        currMonth = 11;
      }
      // batas atas: Des 2099
      if (currYear > 2099) {
        currYear = 2099;
        currMonth = 11;
      }

      renderCalendar();
    }

    // render pertama kali
    renderCalendar();

    function loadTasks(date) {
      fetch("index.php?page=tasks&action=filterByDate&date=" + date)
        .then(res => res.text())
        .then(html => {
          document.getElementById("taskBoard").innerHTML = html;
        });
    }

    function randomColor() {
      return Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0');
    }
    const avatar = document.getElementById("avatar");
    const url = new URL(avatar.src);
    const name = url.searchParams.get("name");
    const bgColor = randomColor();
    avatar.src = `https://ui-avatars.com/api/?name=${name}&background=${bgColor}&color=fff`;

    function openModalAdd() {
      document.getElementById('taskModal').classList.remove('hidden');
    }

    function closeModalAdd() {
      document.getElementById('taskModal').classList.add('hidden');
    }

    function openModalEdit(id, title, dueDate) {
      document.getElementById('editTaskId').value = id;
      document.getElementById('editTaskTitle').value = title;
      document.getElementById('editTaskDate').value = dueDate;

      document.getElementById('advanceEditLink').href =
        "index.php?page=tasks&action=updateAdvance&id=" + id;
      
      document.getElementById("deleteTaskId").value = id;

      document.getElementById('EditTaskModal').classList.remove('hidden');
    }

    function closeModalEdit() {
      document.getElementById('EditTaskModal').classList.add('hidden');
    }

    function markAsDone(taskId) {
      fetch(`index.php?page=tasks&action=markAsDone&id=${taskId}`, {
          method: 'POST'
        })
        .then(() => {
          if (selectedDate) {
            loadTasks(selectedDate);
          }
        });
    }

    function togglePopup(viewTitle, viewDate, viewDescription, viewStatus) {
      // Title
      document.getElementById('PopUPViewTitle').innerText = viewTitle || "";

      // Date
      document.getElementById('PopUPViewDate').innerText = viewDate || "";

      // Description
      const descEl = document.getElementById('PopUPViewDescription');
      descEl.innerText = viewDescription && viewDescription.trim() !== "" ?
        viewDescription :
        "Tidak ada deskripsi tugas.";

      // Status
      const statusEl = document.getElementById('PopUPViewStatus');
      statusEl.innerText = viewStatus || "";
      statusEl.className = "text-base font-medium px-2 py-1 rounded";
      if (viewStatus && viewStatus.toLowerCase() === "done") {
        statusEl.classList.add("bg-green-200", "text-green-800");
      } else if (viewStatus && viewStatus.toLowerCase() === "pending") {
        statusEl.classList.add("bg-indigo-200", "text-indigo-800");
      }

      // Popup + overlay toggle
      const popup = document.getElementById('popup');
      const overlay = document.getElementById('popupOverlay');
      popup.classList.toggle('translate-x-full');
      popup.classList.toggle('translate-x-0');
      overlay.classList.toggle('hidden');
    }

    document.getElementById('popupOverlay').addEventListener('click', () => {
      const popup = document.getElementById('popup');
      const overlay = document.getElementById('popupOverlay');

      if (!overlay.classList.contains('hidden')) {
        popup.classList.add('translate-x-full');
        popup.classList.remove('translate-x-0');
        overlay.classList.add('hidden');
      }
    });
  </script>
</body>
</html>