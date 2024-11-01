<header class="flex w-full bg-white text-sm py-3 shadow-md">
    <nav class="max-w-[85rem] w-full mx-auto px-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="flex-none text-xl font-semibold dark:text-white focus:outline-none focus:opacity-80 me-5">
            <x-application-logo class="fill-current text-gray-500" width="200" />
        </a>

        <!-- Navigation Links (Collapsible) -->
        <div class="hidden sm:flex items-center gap-x-5 flex-grow">
            <a href="/trips" class="font-medium text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-400">
                Passeios
            </a>
            <a href="/destinations" class="font-medium text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-400">
                Destinos
            </a>
        </div>

        <!-- Menu Toggle for Mobile -->
        <div class="flex items-center gap-x-2">
            <button type="button" class="sm:hidden flex justify-center items-center rounded-lg text-gray-800 focus:outline-none focus:bg-gray-50" id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
                <svg class="hs-collapse-open:hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                <svg class="hs-collapse-open:block hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>

            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg bg-transparent text-gray-800 shadow-sm hover:text-primary-600 focus:outline-none focus:bg-gray-50">
                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px">
                        <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/>
                    </svg>
                    Sair
                </button>
            </form>
        </div>

        <!-- Collapsible Menu (Mobile) -->
        <div id="hs-navbar-alignment" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:hidden" aria-labelledby="hs-navbar-alignment-collapse">
            <div class="flex flex-col gap-5 mt-5">
                <a href="/trips" class="font-medium text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-400">
                    Passeios
                </a>
                <a href="/destinations" class="font-medium text-gray-800 hover:text-gray-600 focus:outline-none focus:text-gray-400">
                    Destinos
                </a>
            </div>
        </div>
    </nav>
</header>
