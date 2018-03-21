$(document).on('ajaxComplete ready', function () {
    // Initialize game Inputs.
    $('select.igdb-game-select:not([data-initialized])').each(function () {
        new Choices('.igdb-game-select',{

        });
        $(this).attr('data-initialized', '');


        /*$(this).attr('data-initialized', '');
        new Choices($(this));
        console.log('test');*/

        /*
        $(this)
            .attr('data-initialized', '')
            .select2({
                minimumInputLength: 3,
                ajax: {
                    url: window.location.protocol + "//" + window.location.host + "/igdb/search",
                    dataType: 'json',
                    quietMillis: 250,
                    data: function (term, page) {
                        return {
                            q: term
                        };
                    },
                    results: function (data, page) {
                        // parse the results into the format expected by Select2.
                        // since we are using custom formatting functions we do not need to alter the remote JSON data
                        return { results: data };
                    },
                    cache: true
                },
                formatResult: formatGame,
                formatSelection: formatGameSelection,
                escapeMarkup: function (m) { return m; }
            });*/
    });
});