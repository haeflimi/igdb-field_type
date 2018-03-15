$(document).on('ajaxComplete ready', function () {
    // Initialize game Inputs.
    $('input.igdb-game-select:not([data-initialized])').each(function () {
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
            });
    });
});

function formatGame (game) {
    if (game.loading) return game.name;
    var date = new Date( game.first_release_date );
    var markup = "<div class='select2-result-repository clearfix'>" +
        "<div class='select2-result-game-cover'><img src='" + game.cover.url + "' /></div>" +
        "<div class='select2-result-game-name'><p>" + game.name + "<span class='text-muted'> (" + date.getFullYear() + ")</span></p></div>" +
        "</div>";
    return markup;
}

function formatGameSelection (game) {
    return game.name;
}