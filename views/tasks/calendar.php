<!-- Sidebar Right -->
<div class="w-full xl:w-80 flex flex-col gap-8">
    <div class="bg-white rounded-[2rem] p-6 shadow-sm border border-slate-100">
        <div class="flex items-center justify-between mb-6">
            <h3 id="calendarMonth" class="font-black text-slate-800 text-sm uppercase tracking-wider"></h3>
            <div class="flex gap-1">
                <button onclick="changeMonth(-1)" class="w-7 h-7 flex items-center justify-center rounded-lg hover:bg-slate-100 text-slate-400 font-bold transition-all hover:text-blue-600">
                    <</button>
                        <button onclick="changeMonth(1)" class="w-7 h-7 flex items-center justify-center rounded-lg hover:bg-slate-100 text-slate-400 font-bold transition-all hover:text-blue-600">></button>
            </div>
        </div>
        <div class="grid grid-cols-7 gap-y-2 mb-2 text-center">
            <?php foreach (['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $dayName): ?>
                <span class="text-[10px] font-bold text-slate-300 uppercase">
                    <?= $dayName ?></span> <?php endforeach; ?>
        </div>
        <div id="calendarGrid" class="grid grid-cols-7 text-center">
        </div>
    </div>
</div>