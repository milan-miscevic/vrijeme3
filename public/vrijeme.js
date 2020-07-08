document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('span[data-url]').forEach(function(el) {
        fetch(el.dataset.url)
            .then(data => data.text())
            .then(data => {
                el.innerHTML = data;
            }).catch(error => {
                el.innerHTML = 'Error';
            });
    });
});
