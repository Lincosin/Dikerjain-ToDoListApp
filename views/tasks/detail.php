<!-- overlay detail -->
<div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="togglePopup()"></div>                        
    <div id="popup" class="fixed top-0 right-0 h-full w-[500px] 
        bg-white dark:bg-slate-800 shadow-2xl rounded-l
        transform translate-x-full transition-all duration-500 ease-in-out z-50">
        <div class="p-6 space-y-6 animate-fadeIn">
                
            <!-- Header -->
            <div class="flex justify-between items-center border-b dark:border-slate-700 pb-4">
                <h4 class="text-lg font-bold flex items-center gap-2 dark:text-slate-200">
                <i class="fa-solid fa-clipboard-list text-stone-400 dark:text-slate-300"></i>
                Task Detail
                </h4>
                <button onclick="togglePopup()" class="px-3 py-1 bg-red-500 dark:bg-red-500 text-white rounded hover:bg-red-600 dark:hover:bg-red-400 transition">
                Tutup
                </button>
            </div>

            <!-- Title -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-green-500 dark:text-green-400"></i>
                <span class="text-lg font-bold dark:text-slate-200">Title:</span>
                <div id="PopUPViewTitle" class="text-base font-medium dark:text-slate-200"></div>
            </div>

            <!-- Date -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-calendar-alt text-red-500 dark:text-red-400"></i>
                <span class="text-lg font-bold dark:text-slate-200">Deadline:</span>
                <span id="PopUPViewDate" class="text-sm font-medium bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 px-2 py-0.5 rounded"></span>
            </div>

            <!-- Status -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-check-to-slot text-blue-500 dark:text-blue-400 mt-1"></i>
                <span class="text-lg font-bold dark:text-slate-200">Status:</span>
                <div id="PopUPViewStatus" class="text-base font-medium dark:text-slate-200"></div>
            </div>

            <!-- Description -->
            <div class="flex items-start gap-2">
                <i class="fa-solid fa-align-left text-yellow-500 dark:text-yellow-400 mt-1"></i>
                <div id="PopUPViewDescription" class="text-sm text-slate-600 dark:text-slate-200 bg-yellow-50 dark:bg-slate-700 p-3 rounded-lg shadow-inner w-full"></div>
            </div>
        </div>
    </div>