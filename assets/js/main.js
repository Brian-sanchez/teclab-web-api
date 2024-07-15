$(document).ready(function () {
    $(".btn-agregar").click(function (e) {
        const listName = $(".title-list").first().text().toLowerCase();
        const urlActual = window.location.href;
        const partesList = listName.split(' ');

        let partesUrl = urlActual.split('/');

        partesUrl.pop();

        partesUrl.push(`${partesList[2]}.php`);
        
        const nuevaUrl = partesUrl.join('/');

        window.location.href = nuevaUrl;
    });
});