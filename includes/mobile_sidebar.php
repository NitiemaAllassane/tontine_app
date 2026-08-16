<!-- Overlay visible seulement sur mobile -->
<div id="sidebar-overlay" class="fixed inset-0 bg-black/40 z-40 hidden md:hidden"></div>


<aside 
    id="sidebar-mobile" 
    class="fixed top-0 left-0 h-full w-64 bg-white z-50 p-6 -translate-x-full 
    transition-transform duration-300 flex flex-col justify-center gap-24 md:hidden overflow-y-auto"
>
    <div class="flex flex-col gap-6">
        

        <!-- Member pages -->
        <a href="../pages/profil.php" class="flex gap-2">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-coins-icon lucide-coins size-6">
                    <path d="M13.744 17.736a6 6 0 1 1-7.48-7.48"/>
                    <path d="M15 6h1v4"/><path d="m6.134 14.768.866-.5 2 3.464"/>
                <circle cx="16" cy="8" r="6"/></svg>
            </span>
            <span class="text-lg">Mes paiements</span>
        </a>

        <a href="../pages/infos.php" class="flex gap-2">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-user-icon lucide-user size-6">
                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
            </span>
            <span class="text-lg">Infos personnels</span>
        </a>


        <!-- Pages Admin -->
        <a href="../pages/members.php" class="flex gap-2">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-users-round-icon lucide-users-round">
                    <path d="M18 21a8 8 0 0 0-16 0"/>
                    <circle cx="10" cy="8" r="5"/>
                    <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3"/>
                </svg>
            </span>
            <span class="text-lg">Listes des Membres</span>
        </a>

        <a href="../pages/payments.php" class="flex gap-2">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-banknote-icon lucide-banknote">
                    <rect width="20" height="12" x="2" y="6" rx="2"/>
                    <circle cx="12" cy="12" r="2"/><path d="M6 12h.01M18 12h.01"/>
                </svg>
            </span>
            <span class="text-lg">Paiements Des Membres</span>
        </a>

        <a href="../pages/config.php" class="flex items-center gap-2">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-calendar-days-icon lucide-calendar-days">
                    <path d="M8 2v3"/><path d="M16 2v3"/>
                    <rect x="3" y="3" width="18" height="18" rx="2"/>
                    <path d="M3 9h18"/><path d="M8 13h.01"/><path d="M12 13h.01"/>
                    <path d="M16 13h.01"/><path d="M8 17h.01"/><path d="M12 17h.01"/>
                    <path d="M16 17h.01"/>
                </svg>
                </svg>
            </span>
            <span class="text-lg">Temps de la tontine</span>
        </a>

        <a href="../pages/settings.php" class="flex items-center gap-2">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-settings-icon lucide-settings size-6">
                    <path d="M9.671 4.136a2.34 2.34 0 0 1 4.659 0 2.34 2.34 
                    0 0 0 3.319 1.915 2.34 2.34 0 0 1 2.33 4.033 2.34 2.34 0 0 0 0 
                    3.831 2.34 2.34 0 0 1-2.33 4.033 2.34 2.34 0 0 0-3.319 1.915 
                    2.34 2.34 0 0 1-4.659 0 2.34 2.34 0 0 0-3.32-1.915 2.34 2.34 0 
                    0 1-2.33-4.033 2.34 2.34 0 0 0 0-3.831A2.34 2.34 0 0 1 6.35 6.051a2.34 
                    2.34 0 0 0 3.319-1.915"/><circle cx="12" cy="12" r="3"/>
                </svg>
            </span>
            <span class="text-lg">Parametres</span>
        </a>
    </div>

    <div>
        <a href="../feats/admin/logout.php" class="flex items-center gap-2 text-red-600">
            <span>
                <svg 
                    xmlns="http://www.w3.org/2000/svg" 
                    width="24" 
                    height="24" 
                    viewBox="0 0 24 24" 
                    fill="none" 
                    stroke="currentColor" 
                    stroke-width="2" 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    class="lucide lucide-log-out-icon lucide-log-out size-6">
                    <path d="m16 17 5-5-5-5"/><path d="M21 12H9"/>
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                </svg>
            </span>
            <span class="text-lg">Se deconnecter</span>
        </a>
    </div>
</aside>