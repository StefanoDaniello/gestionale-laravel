import './bootstrap';
import '~resources/scss/app.scss';
import '~icons/bootstrap-icons.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const image = document.getElementById("upload_image");
if (image) {
    image.addEventListener("change", function () {
        // console.log(image.files[0]);
        // prendo l' elemento img dove voglio prendere la preview
        const preview = document.getElementById("uploadPreview");
        // creo nuovo elemento file reader
        const oFReader = new FileReader();
        // uso il metodo readAsDataURL per leggere l'immagine
        oFReader.readAsDataURL(image.files[0]);
        // al termine della lettura
        oFReader.onload = function (oFREvent) {
            // aggiungo l'immagine all'elemento upload_imageconst 
            preview.src = oFREvent.target.result;
        };
    });
}