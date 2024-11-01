const DestinationsSelector = (() => {
    const apiBaseUrl = 'http://tourbinou.test/api';

    const initSelect2 = () => {
        $('#destinationSelect').select2();
    };

    const load = () => {
        $('#destinationSelect').prop('disabled', true);

        $.ajax({
            url: `${apiBaseUrl}/destinations`,
            method: 'GET',
            success: (data) => {
                populate(data.destinations);
                setPreselected();
            },
            error: (err) => {
                console.error('Erro ao carregar destinos:', err);
            }
        });
    };

    const populate = (destinations) => {
        $('#destinationSelect').empty().append(new Option("Selecione um destino..", ""));

        destinations.forEach((destination) => {
            $('#destinationSelect').append(new Option(`${destination.text}`, destination.id));
        });

        $('#destinationSelect').prop('disabled', false);
    };

    const setPreselected = () => {
        const preselectedValue = $('#destinationSelect').data('value');
        if (preselectedValue) {
            $('#destinationSelect').val(preselectedValue).trigger('change');
        }
    };

    const init = () => {
        initSelect2();
        load();
    };

    return {
        init
    };
})();

$(document).ready(() => {
    DestinationsSelector.init();
});
