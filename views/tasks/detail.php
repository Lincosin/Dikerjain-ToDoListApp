<!-- overlay detail -->
<div id="popupOverlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40" onclick="togglePopup()"></div>                        
    <div id="popup" class="fixed top-0 right-0 h-full w-[500px] 
        bg-white shadow-2xl rounded-l
        transform translate-x-full transition-all duration-500 ease-in-out z-50">
        <div class="p-6 space-y-6 animate-fadeIn">
                
            <!-- Header -->
            <div class="flex justify-between items-center border-b pb-4">
                <h4 class="text-lg font-bold flex items-center gap-2">
                <i class="fa-solid fa-clipboard-list text-stone-400"></i>
                Task Detail
                </h4>
                <button onclick="togglePopup()" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                Tutup
                </button>
            </div>

            <!-- Title -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-circle-info text-green-500"></i>
                <span class="text-lg font-bold">Title:</span>
                <div id="PopUPViewTitle" class="text-base font-medium"></div>
            </div>

            <!-- Date -->
            <div class="flex items-center gap-2">
                <i class="fa-solid fa-calendar-alt text-red-500"></i>
                <span class="text-lg font-bold">Deadline:</span>
                <span id="PopUPViewDate" class="text-sm font-medium bg-red-100 text-red-700 px-2 py-0.5 rounded"></span>
            </div>

            <div class="flex items-center gap-2">
                <i class="fa-solid fa-check-to-slot text-blue-500 mt-1"></i>
                <span class="text-lg font-bold">Status:</span>
                <div id="PopUPViewStatus" class="text-base font-medium"></div>
            </div>

            <!-- Description -->
            <div class="flex items-start gap-2">
                <i class="fa-solid fa-align-left text-yellow-500 mt-1"></i>
                <div id="PopUPViewDescription" class="text-sm text-slate-600 bg-yellow-50 p-3 rounded-lg shadow-inner w-full"></div>
            </div>
        </div>
    </div>