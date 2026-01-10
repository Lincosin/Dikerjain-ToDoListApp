<!DOCTYPE html>
<html lang="id" class="">
<head>
    <meta charset="UTF-8">
    <title>DIKERJAIN | Kalender</title>
    <script src="/src/js/theme.js"></script>
    <link rel="icon" type="image/png" href="src/img/logo.jpeg"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        /* Memastikan sel kalender tetap kotak dan proporsional */
        .calendar-day { 
            height: 55px; 
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    <script>
        tailwind.config = { darkMode: 'class' }
    </script>
</head>

<body class="bg-white dark:bg-slate-900 h-screen w-screen overflow-hidden font-sans">

<div class="h-screen w-screen flex">

    <?php if(file_exists(__DIR__ . '/../../src/component/sidebar.php')) 
      include __DIR__ . '/../../src/component/sidebar.php'; ?>

    <main class="flex-1 bg-white dark:bg-slate-900 flex flex-col border-l border-slate-100 dark:border-slate-700 overflow-hidden">
        
        <header class="p-6 border-b border-slate-50 dark:border-slate-700 flex justify-between items-center bg-white dark:bg-slate-900 shrink-0">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-200 tracking-tight">Eksplore schedule <i class="fa-solid fa-calendar-days"></i></h1>
                <p class="text-[10px] text-slate-400 dark:text-slate-300 font-semibold uppercase tracking-widest mt-1">Manage your daily productivity</p>
            </div>
            <div class="flex items-center bg-slate-100 dark:bg-slate-700 p-1 rounded-lg gap-1">
                <button id="prevMonth" class="px-3 py-1 hover:bg-white dark:hover:bg-slate-600 rounded transition-all text-xs"><i class="fa-solid fa-caret-left dark:text-slate-200"></i></button>
                <span id="monthYear" class="text-[10px] font-semibold text-slate-700 dark:text-slate-200 px-4 min-w-[120px] text-center"></span>
                <button id="nextMonth" class="px-3 py-1 hover:bg-white dark:hover:bg-slate-600 rounded transition-all text-xs"><i class="fa-solid fa-caret-right dark:text-slate-200"></i></button>
            </div>
        </header>

        <div class="w-full p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/20 dark:bg-slate-800" style="height: 48vh;">
            <div class="grid grid-cols-7 text-center mb-3">
                <?php foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $day): ?>
                    <div class="text-[9px] font-semibold text-slate-300 dark:text-slate-400 uppercase tracking-[0.2em]"><?= $day ?></div>
                <?php endforeach; ?>
            </div>
            <div id="calendarGrid" class="grid grid-cols-7 gap-[1px] border border-slate-100 dark:border-slate-700 bg-slate-100 dark:bg-slate-700">
                </div>
        </div>

        <div class="flex-1 overflow-y-auto no-scrollbar p-8 bg-white dark:bg-slate-900">
            <div class="flex items-center justify-between mb-6 border-b border-slate-50 dark:border-slate-700 pb-4">
                <h2 class="text-sm font-semibold text-slate-800 dark:text-slate-200 uppercase tracking-widest flex items-center gap-2">
                    <i class="fa-solid fa-clipboard-list"></i> Deadline Details <span id="detailMonthLabel" class="text-blue-600 dark:text-blue-400"></span>
                </h2>
                <span class="text-[10px] font-bold text-slate-400 dark:text-slate-300 bg-slate-100 dark:bg-slate-700 px-2 py-1 rounded"> <?= count($rows) ?> Tugas </span>
            </div>
            
            <div class="flex flex-col gap-3">
                <?php if(empty($rows)): ?>
                    <div class="py-10 text-center border-2 border-dashed border-slate-50 dark:border-slate-700">
                        <p class="text-[10px] text-slate-300 dark:text-slate-400 font-bold uppercase tracking-widest">
                            Belum ada tugas bulan ini
                        </p>
                    </div>
                <?php else: ?>
                    <?php foreach($rows as $task): 
                        $isToday = (date('Y-m-d', strtotime($task['due_date'])) == date('Y-m-d'));
                    ?>
                        <div class="group flex items-center gap-6 p-4 border border-slate-50 dark:border-slate-700 hover:bg-blue-50/30 dark:hover:bg-slate-800 transition-all cursor-default">
                            <div class="w-12 text-center border-r border-slate-100 dark:border-slate-700 pr-4">
                                <span class="text-[9px] font-bold text-slate-400 dark:text-slate-300 block uppercase">
                                    <?= date('M', strtotime($task['due_date'])) ?>
                                </span>
                                <span class="text-lg font-black text-slate-800 dark:text-slate-200 leading-none">
                                    <?= date('d', strtotime($task['due_date'])) ?>
                                </span>
                            </div>

                            <div class="flex-1">
                                <div class="flex justify-between items-end mb-2">
                                    <h4 class="font-bold text-slate-800 dark:text-slate-200 text-[12px]">
                                        <?= htmlspecialchars($task['title']) ?>
                                    </h4>
                                    <span class="text-[10px] font-black text-blue-600 dark:text-blue-400">
                                        <?= ($task['status'] === 'done') ? '100%' : '50%' ?>
                                    </span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-100 dark:bg-slate-700 overflow-hidden">
                                    <div class="h-full bg-blue-600 transition-all duration-1000" 
                                        style="width: <?= ($task['status'] === 'done') ? '100' : '50' ?>%">
                                    </div>
                                </div>
                                <p class="text-[9px] font-bold text-slate-300 dark:text-slate-400 uppercase mt-2 tracking-tighter">
                                    Deadline: <?= date('d F Y', strtotime($task['due_date'])) ?>
                                </p>
                            </div>

                            <div class="shrink-0">
                                <?php if ($task['status'] === 'done'): ?>
                                    <span class="px-3 py-1 bg-green-600 dark:bg-green-500 text-white text-[9px] font-black uppercase tracking-tighter">Done</span>
                                <?php elseif ($isToday): ?>
                                    <span class="px-3 py-1 bg-red-600 dark:bg-red-500 text-white text-[9px] font-black uppercase tracking-tighter">Urgent</span>
                                <?php else: ?>
                                    <span class="px-3 py-1 border border-slate-200 dark:border-slate-600 text-slate-400 dark:text-slate-300 text-[9px] font-black uppercase tracking-tighter">In Progress</span>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

    </main>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        const tasks = <?= json_encode($tasksByDate) ?>; // keyed by tanggal
        let today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        const grid = document.getElementById("calendarGrid");
        const monthYear = document.getElementById("monthYear");
        const detailLabel = document.getElementById("detailMonthLabel");

        function renderCalendar() {
            grid.innerHTML = "";
            monthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;
            detailLabel.textContent = `${monthNames[currentMonth]} ${currentYear}`;

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            for (let i = 0; i < firstDay; i++) {
                grid.innerHTML += `<div class="calendar-day bg-white/40"></div>`;
            }

            for (let d = 1; d <= daysInMonth; d++) {
                const dateKey = `${currentYear}-${String(currentMonth + 1).padStart(2, "0")}-${String(d).padStart(2, "0")}`;
                const isToday = d === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
                const hasTask = tasks[dateKey];   // cek apakah ada tugas di tanggal ini

                let bgClass = isToday 
                    ? 'bg-blue-600 text-white shadow-lg z-10' 
                    : 'bg-white text-slate-600 hover:bg-slate-50';

                let indicator = hasTask 
                    ? '<div class="absolute top-1 right-1 w-1.5 h-1.5 bg-red-500 rounded-full border border-white"></div>' 
                    : '';

                grid.innerHTML += `
                    <div class="calendar-day relative transition-all cursor-pointer border-r border-b border-slate-50 ${bgClass}" data-date="${dateKey}">
                        <span class="text-[11px] font-black">${d}</span>
                        ${indicator}
                    </div>
                `;
            }
        }

        document.getElementById("prevMonth").onclick = () => { currentMonth--; if(currentMonth < 0){ currentMonth=11; currentYear--; } renderCalendar(); };
        document.getElementById("nextMonth").onclick = () => { currentMonth++; if(currentMonth > 11){ currentMonth=0; currentYear++; } renderCalendar(); };
        
        renderCalendar();
    });
</script>
</body>
</html>