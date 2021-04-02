/*  CONVERTISSEUR ADRESSE EN COORDONNEE   */

let adresse = document.getElementById('adresse');
let ville = document.getElementById('ville');
let codePostal = document.getElementById('codePostal');
let btn = document.getElementById('btn')

btn.addEventListener('click', function () {

    /*  UTILISATION DE L'API    */
    fetch('https://nominatim.openstreetmap.org/?addressdetails=1&q=' + adresse.value + '+' + ville.value + '+' + codePostal.value + '&format=json&limit=1')
        .then((response) => response.json())
        .then((data) => {
            $.ajax({
                method: 'POST',
                url: 'index.php?page=insert',
                data: {
                    lat: data[0].lat,
                    lon: data[0].lon
                },
                success: function (e) {
                    // console.log('success');
                    window.location = 'index.php'
                },
                error: function () {
                    alert('Erreur')
                }
            })
        })

})

/*  FIN CONVERTISSEUR   */