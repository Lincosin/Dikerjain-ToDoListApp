<?php
$username = $_SESSION['username'] ?? 'User';
$tasks = $tasks ?? [];

// List rincian tugas untuk bagian bawah
$allMonthTasks = [];
foreach ($tasks as $date => $taskArray) {
    foreach ($taskArray as $t) {
        $allMonthTasks[] = [
            'date' => $date,
            'title' => $t,
            // Simulasi progress, bisa dihubungkan ke kolom 'status' di DB nanti
            'progress' => ($date < date('Y-m-d')) ? 100 : rand(20, 85) 
        ];
    }
}
usort($allMonthTasks, function($a, $b) { return strcmp($a['date'], $b['date']); });
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DIKERJAIN | Kalender</title>
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
</head>

<body class="bg-white h-screen w-screen overflow-hidden font-sans">
<div class="h-screen w-screen flex">

    <?php if(file_exists(__DIR__ . '/../../src/component/sidebar.php')) 
      include __DIR__ . '/../../src/component/sidebar.php'; ?>

    <main class="flex-1 bg-white flex flex-col border-l border-slate-100 overflow-hidden">
        
        <header class="p-6 border-b border-slate-50 flex justify-between items-center bg-white shrink-0">
            <div>
                <h1 class="text-2xl font-semibold text-slate-800 tracking-tight">Eksplorasi Jadwal 📅</h1>
                <p class="text-[10px] text-slate-400 font-semibold uppercase tracking-widest mt-1">Kelola produktivitas harian Anda</p>
            </div>
            <div class="flex items-center bg-slate-100 p-1 rounded-lg gap-1">
                <button id="prevMonth" class="px-3 py-1 hover:bg-white rounded transition-all text-xs"><i class="fa-solid fa-caret-left"></i></button>
                <span id="monthYear" class="text-[10px] font-semibold text-slate-700 uppercase tracking-widest px-4 min-w-[120px] text-center"></span>
                <button id="nextMonth" class="px-3 py-1 hover:bg-white rounded transition-all text-xs"><i class="fa-solid fa-caret-right"></i></button>
            </div>
        </header>

        <div class="w-full p-6 border-b border-slate-100 bg-slate-50/20" style="height: 48vh;">
            <div class="grid grid-cols-7 text-center mb-3">
                <?php foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $day): ?>
                    <div class="text-[9px] font-black text-slate-300 uppercase tracking-[0.2em]"><?= $day ?></div>
                <?php endforeach; ?>
            </div>
            <div id="calendarGrid" class="grid grid-cols-7 gap-[1px] border border-slate-100 bg-slate-100">
                </div>
        </div>

        <div class="flex-1 overflow-y-auto no-scrollbar p-8 bg-white">
            <div class="flex items-center justify-between mb-6 border-b border-slate-50 pb-4">
                <h2 class="text-sm font-semibold text-slate-800 uppercase tracking-widest flex items-center gap-2">
                    📋 Rincian Deadline <span id="detailMonthLabel" class="text-blue-600"></span>
                </h2>
                <span class="text-[10px] font-bold text-slate-400 bg-slate-100 px-2 py-1 rounded"><?= count($allMonthTasks) ?> Tugas</span>
            </div>
            
            <div class="flex flex-col gap-3">
                <?php if(empty($allMonthTasks)): ?>
                    <div class="py-10 text-center border-2 border-dashed border-slate-50">
                        <p class="text-[10px] text-slate-300 font-bold uppercase tracking-widest">Belum ada tugas bulan ini</p>
                    </div>
                <?php else: ?>
                    <?php foreach($allMonthTasks as $item): 
                        $isToday = ($item['date'] == date('Y-m-d'));
                    ?>
                        <div class="group flex items-center gap-6 p-4 border border-slate-50 hover:bg-blue-50/30 transition-all cursor-default">
                            <div class="w-12 text-center border-r border-slate-100 pr-4">
                                <span class="text-[9px] font-bold text-slate-400 block uppercase"><?= date('M', strtotime($item['date'])) ?></span>
                                <span class="text-lg font-black text-slate-800 leading-none"><?= date('d', strtotime($item['date'])) ?></span>
                            </div>

                            <div class="flex-1">
                                <div class="flex justify-between items-end mb-2">
                                    <h4 class="font-bold text-slate-800 text-[12px]"><?= htmlspecialchars($item['title']) ?></h4>
                                    <span class="text-[10px] font-black text-blue-600"><?= $item['progress'] ?>%</span>
                                </div>
                                <div class="w-full h-1.5 bg-slate-100 overflow-hidden">
                                    <div class="h-full bg-blue-600 transition-all duration-1000" style="width: <?= $item['progress'] ?>%"></div>
                                </div>
                                <p class="text-[9px] font-bold text-slate-300 uppercase mt-2 tracking-tighter">Deadline: <?= date('d F Y', strtotime($item['date'])) ?></p>
                            </div>

                            <div class="shrink-0">
                                <?php if($isToday): ?>
                                    <span class="px-3 py-1 bg-red-600 text-white text-[9px] font-black uppercase tracking-tighter">Urgent</span>
                                <?php else: ?>
                                    <span class="px-3 py-1 border border-slate-200 text-slate-400 text-[9px] font-black uppercase tracking-tighter">In Progress</span>
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
    const tasks = <?= json_encode($tasks) ?>;
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

        // Slot kosong awal bulan
        for (let i = 0; i < firstDay; i++) {
            grid.innerHTML += `<div class="calendar-day bg-white/40"></div>`;
        }

        // Render Tanggal
        for (let d = 1; d <= daysInMonth; d++) {
            const dateKey = `${currentYear}-${String(currentMonth + 1).padStart(2, "0")}-${String(d).padStart(2, "0")}`;
            const isToday = d === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
            const hasTask = tasks[dateKey];
            
            // Hari ini: Full warna Biru (Notice)
            let bgClass = isToday ? 'bg-blue-600 text-white shadow-lg z-10' : 'bg-white text-slate-600 hover:bg-slate-50';
            // Deadline: Indikator titik merah di pojok kanan atas
            let indicator = hasTask ? '<div class="absolute top-1 right-1 w-1.5 h-1.5 bg-red-500 rounded-full border border-white"></div>' : '';

            grid.innerHTML += `
                <div class="calendar-day relative transition-all cursor-pointer border-r border-b border-slate-50 ${bgClass}">
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