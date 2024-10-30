<div class="py-12 bg-graybg">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">

        <div class="w-full flex justify-between items-center mb-6">
            <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
                Passeios
            </h2>
            <a href="{{ route('trips.create-edit') }}" class="py-2 px-4 bg-primary-600 text-white rounded-lg text-sm font-medium shadow-md hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Cadastrar Passeio
            </a>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start text-md font-bold text-gray-900 uppercase">Nome</th>
                                    <th scope="col" class="px-6 py-3 text-start text-md font-bold text-gray-900 uppercase">Horário</th>
                                    <th scope="col" class="px-6 py-3 text-start text-md font-bold text-gray-900 uppercase">Destino</th>
                                    <th scope="col" class="px-6 py-3 text-end text-md font-bold text-gray-900 uppercase"></th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                @foreach($trips as $trip)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $trip->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $trip->translated_time }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                            {{ $trip->destination->city->name }} ({{ $trip->destination->city->state->abbr }})
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                            <div class="flex gap-2 w-full justify-end">
                                                <a href="#" class="text-gray-900 decoration-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" width="18px" viewBox="0 -960 960 960" fill="#000"><path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/></svg>
                                                </a>
                                                <a href="#" class="text-gray-900 decoration-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" width="18px" viewBox="0 -960 960 960" fill="#000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <div class="m-4">
                                {{ $trips->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
