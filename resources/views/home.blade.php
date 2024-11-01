@use('Illuminate\Support\Str')
@use('\App\Enums\TimeEnum')
<x-guest-external-layout>
    <div class="min-w-full py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex items-center">
            <div class="min-w-full grid grid-cols-4 justify-center gap-4">
                @forelse($trips as $key => $trip)
                    <div class="w-full flex flex-col bg-white border shadow-sm rounded-md hover:shadow-lg focus:outline-none focus:shadow-lg transition dark:bg-neutral-900 dark:border-neutral-700 dark:shadow-neutral-700/70" href="#">
                        <img class="w-full h-auto rounded-t-xl p-3"
                             src="https://picsum.photos/id/2{{$key}}/100/100"
                             alt="{{ $trip->name }}">
                        <div class="p-4 md:p-5">
                            <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                                {{ $trip->name }}
                            </h3>
                            <p class="mt-1 text-gray-500 dark:text-neutral-400">
                                {{ Str::words($trip->description, 5) }}
                            </p>
                            <div class="my-2">
                              <span class="py-1 px-2 inline-flex items-center gap-x-1 text-sm font-bold bg-primary-600 text-white rounded-md dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                                {{ $trip->destination->city->name }} - {{ $trip->destination->city->state->abbr }}
                              </span>
                            </div>
                            <div class="my-2">
                              <span class="py-1 px-2 inline-flex items-center gap-x-1 text-sm font-bold bg-primary-600 text-white rounded-md dark:bg-teal-500/10 dark:text-teal-500">
                                <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                  <path d="m9 12 2 2 4-4"></path>
                                </svg>
                                {{ TimeEnum::getTranslatedValues()[$trip->time] }}
                              </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                        Nenhum passeio encontrado.
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-guest-external-layout>
