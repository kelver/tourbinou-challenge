<x-app-layout>
    <div class="py-12 bg-graybg">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full flex justify-between items-center mb-6">
                <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                    Destinos
                </h2>
                <a href="{{ route('destinations.index') }}" class="py-2 px-4 bg-primary-600 text-white rounded-lg text-sm font-medium shadow-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                    Voltar
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-m-1.5 overflow-x-auto">
                        <div class="p-1.5 min-w-full inline-block align-middle">
                            <div class="overflow-hidden">
                                @include('destinations.form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
