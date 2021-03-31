/*   CARTE   */

// Variables
let search = document.getElementById('location-search');    // Input Adresse
let btnSearch = document.getElementById('btnSearch');       // Bouton "RECHERCHER"
let maCarte = document.getElementById('maCarte');           // La carte
let select = document.getElementById('sitter-select');      // Select Role
let legende = document.getElementById('legende');           // Légende de la carte


var carte = L.map('maCarte'); // On initialise la carte

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(carte);


// SEARCH VILLE SUR LA CARTE
btnSearch.addEventListener('click', function () { // Quand on click sur "Rechecher" => Va convertir la valeur de l'input en coordonnées GPS.
    fetch('https://nominatim.openstreetmap.org/?addressdetails=1&q=' + search.value + '&format=json&limit=1')
        .then((response) => response.json())
        .then((data) => {
            let latSearch = data[0].lat;
            let lonSearch = data[0].lon;
            maCarte.style.display = 'block';
            window.location = '#maCarte';
            legende.style.display = 'flex';
            carte.setView([latSearch, lonSearch], 14); // La vue de la carte est définie en fonction de la latitude et longitude de l'adresse rentrée.
        })

    //console.log(select.value) // Affiche la valeur du select
    /*switch (select.value) {
        case 'selectA':
            break
        case'selectB':
            'babysitter';
            break
        case'selectC':
            'creche';
            break
        default: null;
    }*/
    /* if (select.value === selectA) { on affiche les assistantes maternelle }
    * if (select.value === selectB) { on affiche les baby-sitter }
    * if (select.value === selectC) { on affiche les crèche } */
})


$.ajax({ // On récupère les infos en BDD
    method: 'GET',
    url: 'index.php?page=map',
    dataType: 'JSON',
    data: {},
    success: function (res) {
        res.forEach(e => {

            /* MARKER */

            var titlePopup = '<h1 class="popupTitle">'+e.prenom+' '+e.nom+'</h1>';

            var myIcon = ''; // Icon de base vide ( se remplit en fonction du rôle ).

            // Crèche ICON
            var crecheIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            // Assistante maternelle ICON
            var assistIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-gold.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });

            // Baby_sitter ICON
            var babyIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });


            /*  DECLARATION / CONVERSION  des infos de l'utilisateur ( et en fonction de son rôle ).  */
            switch (e.role) {
                case 'creche':
                    e.role = 'Crèche';
                    myIcon = crecheIcon;
                    titlePopup = '<h1 class="popupTitle">'+e.nom_entreprise+'</h1>';
                    break;
                case 'assistantemater':
                    e.role = 'Assistant(e) Maternelle';
                    myIcon = assistIcon;
                    break;
                case 'babysitter':
                    e.role = 'Baby-sitter';
                    myIcon = babyIcon;
                    break;
                default:
                    null;
            }
            var rolePopup = '<span class="popupRole">'+e.role+'</span>';

            /* CONTENU DE LA POPUP */
            let customPopup = '<div class="containerPopupCreche">';
                customPopup +=  '<div class="popTop">';
                customPopup +=          titlePopup;
                customPopup +=       rolePopup   /*'<span class="popupRole">'+e.role+'</span>'*/;
                customPopup +=      '</div>'
                customPopup +=      '<div class="popMidEmail">';
                customPopup +=        '<div class="popMidEmailLeft">';
                customPopup +=          '<p>E-mail:</p>';
                customPopup +=        '</div>';
                customPopup +=        '<div class="popMidEmailRight">';
                customPopup +=          '<p>'+e.email+'</p>';
                customPopup +=        '</div>';
                customPopup +=      '</div>';
                customPopup +=      '<div class="popMidTel">';
                customPopup +=        '<div class="popMidTelLeft">';
                customPopup +=          '<p>Téléphone:</p>';
                customPopup +=        '</div>';
                customPopup +=        '<div class="popMidTelRight">';
                customPopup +=          '<p>0'+e.tel_portable+'</p>';
                                    if (e.tel_fixe != 0) { customPopup += '<p>0'+e.tel_fixe+'</p>'}
                customPopup +=        '</div>';
                customPopup +=      '</div>';
                customPopup +=      '<div class="popBot">';
                customPopup +=        '<a href="#">voir plus</a>';
                customPopup +=      '</div>';
                customPopup +=    '</div>';


            let marker = L.marker([e.lat, e.lon], {icon: myIcon}).addTo(carte).bindPopup(customPopup);

        })
    }
})

/*   FIN CARTE   */

