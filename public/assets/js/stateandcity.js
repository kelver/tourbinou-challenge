const LocationSelector = (() => {
    const apiBaseUrl = 'http://tourbinou.test/api';

    const initSelect2 = () => {
        $('#stateSelect').select2();
        $('#citySelect').select2();
    };

    const loadStates = () => {
        $.ajax({
            url: `${apiBaseUrl}/states`,
            method: 'GET',
            success: (data) => {
                populateStates(data.states);
                setPreselectedState();
            },
            error: (err) => {
                console.error('Erro ao carregar estados:', err);
            }
        });
    };

    const populateStates = (states) => {
        states.forEach((state) => {
            $('#stateSelect').append(new Option(`(${state.abbr}) ${state.name}`, state.id));
        });
        $('#stateSelect').prop('disabled', false);
    };

    const loadCities = (stateId) => {
        $.ajax({
            url: `${apiBaseUrl}/states/${stateId}/cities`,
            method: 'GET',
            success: (data) => {
                populateCities(data.cities);
                setPreselectedCity();
            },
            error: (err) => {
                console.error('Erro ao carregar cidades:', err);
            }
        });
    };

    const populateCities = (cities) => {
        $('#citySelect').empty().append(new Option("Selecione uma cidade", "")).prop('disabled', true);
        cities.forEach((city) => {
            $('#citySelect').append(new Option(city.name, city.id));
        });
        $('#citySelect').prop('disabled', false);
    };

    const setupEventListeners = () => {
        $('#stateSelect').on('change', function() {
            const stateId = $(this).val();
            $('#citySelect').prop('disabled', true).empty().append(new Option("Selecione uma cidade", ""));
            if (stateId) {
                loadCities(stateId);
            }
        });
    };

    const setPreselectedState = () => {
        const stateId = $('#stateSelect').data('value');
        if (stateId) {
            $('#stateSelect').val(stateId).trigger('change'); // Atualiza o estado
        }
    };

    const setPreselectedCity = () => {
        const cityId = $('#citySelect').data('value');
        if (cityId) {
            $('#citySelect').val(cityId);
        }
    };

    const init = () => {
        initSelect2();
        loadStates();
        setupEventListeners();
    };

    return {
        init
    };
})();

$(document).ready(() => {
    LocationSelector.init();
});
