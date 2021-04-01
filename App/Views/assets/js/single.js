let lat = document.getElementById('latUserInfo').innerHTML;
let lon = document.getElementById('lonUserInfo').innerHTML;
let adrSingle = document.getElementById('addressSingle');


fetch('https://nominatim.openstreetmap.org/reverse?format=geojson&lat=' + lat + '&lon=' + lon)
    .then((response) => response.json())
    .then((data) => {
        let numero = data.features[0].properties.address.house_number;
        let rue = data.features[0].properties.address.road;
        let ville = data.features[0].properties.address.city;
        let postcode = data.features[0].properties.address.postcode;
        adrSingle.innerHTML = numero + ' ' + rue + ', ' + ville + ', ' + postcode;
        adrSingle.href = `https://www.google.com/maps/place/${numero}+${rue},+${postcode}+${ville}/`;
    })