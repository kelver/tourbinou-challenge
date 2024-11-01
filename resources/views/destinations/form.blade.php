<div class="w-full p-4">
    <form method="POST" action="{{ isset($destination) ? route('destinations.update', $destination) : route('destinations.store') }}">
        @csrf
        @if(isset($destination))
            @method('PUT')
        @endif

        <div class="w-full flex flex-col">
            <div class="grid grid-cols-3 gap-3">
                <div class="w-full flex flex-col">
                    <label for="state">Estado</label>
                    <select class="form-control select2" name="state_id"
                        id="stateSelect" data-value="{{ old('state_id', $destination->state_id ?? '') }}">>
                        <option value="">Selecione um estado..</option>
                    </select>
                </div>
                <div class="w-full flex flex-col col-span-2">
                    <label for="city">Cidade</label>

                    <select class="form-control select2" name="city_id"
                        id="citySelect" data-value="{{ old('city_id', $destination->city_id ?? '') }}">
                        <option value="">Selecione uma cidade..</option>
                    </select>
                </div>
            </div>
            <div class="w-full flex justify-end gap-4 px-4 py-6">
                <a href="{{ route('destinations.index') }}" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:outline-none focus:border-red-400 focus:text-red-400 disabled:opacity-50 disabled:pointer-events-none">
                    Cancelar
                </a>
                <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 focus:outline-none focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
                    Salvar
                </button>
            </div>
        </div>
    </form>
    <script>

        $(document).ready(function() {
            @if(isset($destination))
                $('#stateSelect').val('{{ $destination->state_id }}').trigger('change'); // Atualiza o estado
                $('#citySelect').val('{{ $destination->city_id }}').trigger('change'); // Atualiza a cidade
            @endif
        });
    </script>
</div>
