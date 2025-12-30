<div class="space-y-4" id="taskBoard">
    <?php if (empty($tasks)): ?>
        <p class="text-gray-400 text-sm">There is no tasks in this day.</p>
    <?php else: ?>
        <?php foreach ($tasks as $task): ?>
            <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition-all">
                <h4 class="font-bold text-slate-800 text-[13px] mb-1 leading-snug">
                    <?= htmlspecialchars($task['title']) ?>
                </h4>
                <p class="text-[11px] text-slate-400 mb-4">
                    <?= htmlspecialchars($task['due_date'] ?? 'No due date') ?>
                </p>
                <div class="flex items-center justify-between">
                    <span class="text-[10px] text-slate-400 font-bold italic">
                        <?= ucfirst($task['status']) ?>
                    </span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>