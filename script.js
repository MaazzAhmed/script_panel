(function() {
    var host = document.currentScript.getAttribute('data-host');
    var id = document.currentScript.getAttribute('data-id');
    var field = document.currentScript.getAttribute('data-field');

    if (host && id && field) {
        var url = host + '/fetch_' + field + '.php?id=' + id;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                if (data[field]) {
                    document.write('<p>' + field.replace('_', ' ').toUpperCase() + ': ' + data[field] + '</p>');
                } else {
                    console.error('Error fetching data: ', data.error);
                }
            })
            .catch(err => console.error('Fetch error: ', err));
    } else {
        console.error('Missing required data attributes');
    }
})();

