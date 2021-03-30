

/* CARTE */
// Initialisation de la carte
var carte = L.map('maCarte').setView([49.443232, 1.099971], 12);


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
    foo: 'bar', // changer bar par role (creche etc)
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(carte);

$.ajax({
    method: 'POST',
    url: '../App/Views/ajax/map_select.php',
    dataType: 'JSON',
    data: { },
    success: function (data) {
        console.log('success')
    }
})

// Creer une nouvelle classe echo json_encode(avec les données)  * NE PAS OUBLIER LE HEADER
