window.onload = function() {
    if (window.location.search.indexOf('alertmsg') > -1) {
        var url = new URL(window.location);
        url.searchParams.delete('alertmsg');
        window.history.replaceState({}, document.title, url.toString());
    }
}