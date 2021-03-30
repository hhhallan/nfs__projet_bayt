/* CARTE */
// Initialisation de la carte
var carte = L.map('maCarte').setView([49.443232, 1.099971], 12);


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png?{foo}', {
    foo: 'bar', // changer bar par role (creche etc)
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(carte);

$.ajax({
    method: 'GET',
    url: 'index.php?page=map',
    dataType: 'JSON',
    data: { },
    success: function (res) {
        console.log('success')
        console.log(res)
    }
})

// Creer une nouvelle classe echo json_encode(avec les données)  * NE PAS OUBLIER LE HEADER

