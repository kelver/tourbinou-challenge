<div class="w-full p-4">
    <style>
        .select2-selection__rendered {
            line-height: 40px !important;
        }
        .select2-container .select2-selection--single {
            height: 42px !important;
        }
        .select2-selection__arrow {
            height: 41px !important;
        }
    </style>

    <form method="POST" action="{{ isset($trips) ? route('trips.update', $trips) : route('trips.store') }}">
        @csrf
        @if(isset($trips))
            @method('PUT')
        @endif

        <div class="w-full flex flex-col">
            <div class="grid grid-cols-3 gap-3">
                <div class="w-full flex flex-col">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $trips->name ?? '') }}"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg
                        text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
                        disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                        dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="Nome do passeio.">
                </div>
                <div class="w-full flex flex-col">
                    <label for="time">Horário</label>
                    <select class="form-control" name="time" id="time">
                        <option value="">Selecione um horário</option>
                        @foreach($times as $value => $label)
                            <option value="{{ $value }}" {{ (old('time', $trips->time ?? '') == $value) ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full flex flex-col">
                    <label for="destinationSelect">Destino</label>

                    <select class="form-control select2" name="destination_id"
                            id="destinationSelect" data-value="{{ old('destination_id', $trips->destination_id ?? '') }}">
                        <option value="">Selecione um destino..</option>
                    </select>
                </div>
                <div class="w-full flex flex-col col-span-3">
                    <label for="description">Descrição</label>

                    <textarea id="description" name="description"
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500
                        focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900
                        dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500
                        dark:focus:ring-neutral-600 resize-none" rows="8" placeholder="Digite sua descrição."
                        aria-describedby="hs-textarea-helper-text">{{ old('description', $trips->description ?? '') }}</textarea>
                </div>
            </div>
            <div class="w-full flex justify-end gap-4 px-4 py-6">
                <a href="{{ route('trips.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:outline-none focus:border-red-400 focus:text-red-400 disabled:opacity-50 disabled:pointer-events-none">
                    Cancelar
                </a>
                <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 focus:outline-none focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
                    Salvar
                </button>
            </div>
        </div>
    </form>
</div>
