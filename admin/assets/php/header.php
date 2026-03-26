
    <!-- TopNavBar Shell -->
    <header class="flex justify-between items-center h-16 px-8 ml-64 w-[calc(100%-16rem)] fixed top-0 bg-slate-950/80 backdrop-blur-md border-b border-slate-800/30 z-40">
        <div class="flex items-center gap-4 flex-1">
            <div class="relative w-96">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-lg" data-icon="search">search</span>
                <input class="w-full bg-surface-container-low border-none rounded-xl pl-10 pr-4 py-2 text-sm focus:ring-1 focus:ring-blue-500/50 text-on-background placeholder:text-on-surface-variant/50" placeholder="Search inquiries..." type="text" />
            </div>
        </div>
        <div class="flex items-center gap-6">
            <button id="dark-mode-toggle" class="text-slate-400 hover:text-blue-400 transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="dark_mode">dark_mode</span>
            </button>
            <button class="text-slate-400 hover:text-blue-400 transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="notifications">notifications</span>
            </button>
            <button class="text-slate-400 hover:text-blue-400 transition-all flex items-center">
                <span class="material-symbols-outlined" data-icon="help_outline">help_outline</span>
            </button>
            <div class="h-8 w-[1px] bg-slate-800/50"></div>
            <span class="font-inter text-sm font-extrabold tracking-tight text-white">Admin</span>
        </div>
    </header>