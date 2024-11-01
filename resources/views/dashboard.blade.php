<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full flex justify-between items-center mb-6">
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    Painel de Controle
                </h2>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Card Section -->
                    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
                        <!-- Grid -->
                        <div class="grid sm:grid-cols-2 lg:grid-cols-2 gap-4 sm:gap-6">
                            <!-- Card -->
                            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                <div class="inline-flex justify-center items-center">
                                    <span class="size-2 inline-block bg-pink-600 rounded-full me-2"></span>
                                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Passeios</span>
                                </div>

                                <div class="text-center">
                                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                                        {{ $tripsCount }}
                                    </h3>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('trips.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500 focus:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400">
                                        Acessar
                                    </a>
                                </div>
                            </div>
                            <!-- End Card -->

                            <!-- Card -->
                            <div class="flex flex-col gap-y-3 lg:gap-y-5 p-4 md:p-5 bg-white border shadow-sm rounded-xl dark:bg-neutral-900 dark:border-neutral-800">
                                <div class="inline-flex justify-center items-center">
                                    <span class="size-2 inline-block bg-green-500 rounded-full me-2"></span>
                                    <span class="text-xs font-semibold uppercase text-gray-600 dark:text-neutral-400">Destinos</span>
                                </div>

                                <div class="text-center">
                                    <h3 class="text-3xl sm:text-4xl lg:text-5xl font-semibold text-gray-800 dark:text-neutral-200">
                                        {{ $destinationsCount }}
                                    </h3>
                                </div>

                                <div class="text-center">
                                    <a href="{{ route('destinations.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-blue-600 text-blue-600 hover:border-blue-500 hover:text-blue-500 focus:outline-none focus:border-blue-500 focus:text-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:border-blue-500 dark:text-blue-500 dark:hover:text-blue-400 dark:hover:border-blue-400">
                                        Acessar
                                    </a>
                                </div>
                            </div>
                            <!-- End Card -->
                        </div>
                        <!-- End Grid -->
                    </div>
                    <!-- End Card Section -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
