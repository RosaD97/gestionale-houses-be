import './bootstrap';
import '~resources/scss/app.scss';
// import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

// function showPreviewProduct(event) {
//     if (event.target.files.length > 0) {
//         const src = URL.createObjectURL(event.target.files[0]);
//         const preview = document.getElementById("file-image-preview");
//         preview.src = src;
//         preview.style.display = "block";
//         // preview.classList.add('mt-4', 'mb-3');
//     }
// }


if (document.readyState === "complete" || document.readyState === "interactive") {

    async function inviaDati() {
        event.preventDefault()

        let params = new FormData(inviaCasaForm);
        console.log(params)
        for (let entry of params) {
            console.log(entry);
        }

        const lat = document.getElementById('latitude');
        const lon = document.getElementById('longitude');

        const citta = document.getElementById('citta').value;
        const via = document.getElementById('via').value;



        // nascondere api key 

        const url = `https://geocode.maps.co/search?q=${via}+${citta}&api_key=65f178114a0aa076552608jqu1d5c87`;

        let newLat = 0;
        let newLon = 0;

        await fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Errore HTTP, status ' + response.status);
                }
                return response.json();
            })
            .then(data => {
                const resp = data[0];
                console.log('Risposta ricevuta:', resp);
                newLat = resp.lat;
                newLon = resp.lon;
                // const newLon = resp.lon;
                // console.log('Nuove coordinate:', newLat, newLon);
            })
            .catch(error => {
                console.error('Si è verificato un errore durante la richiesta:', error);
            });

        lat.value = newLat;
        lon.value = newLon;

        console.log('latid', lat.value, 'lon', lon.value)

        params = new FormData(inviaCasaForm);

        for (let entry of params) {
            console.log(entry);
        }

        // getAdderess();

        inviaCasaForm.removeEventListener('submit', inviaDati)
        inviaCasaForm.submit()
    }

    let inviaCasaForm = document.getElementById('invia-casa-form');
    if (inviaCasaForm) {
        inviaCasaForm.addEventListener('submit', inviaDati)
    }
}

