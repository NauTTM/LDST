// ///////////////////////////// BOTON DESPLEGABLE ////////////////////////////

document.addEventListener('DOMContentLoaded', function() {
    var dropdown = document.querySelector('.dropbtn');
    var dropdownContent = document.querySelector('.dropdown-content');

    dropdown.addEventListener('click', function() {
        dropdownContent.classList.toggle('show');
    });

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            if (dropdownContent.classList.contains('show')) {
                dropdownContent.classList.remove('show');
            }
        }
    };

   
});







// ///////////////////////////// INICIO DE SESION //////////////////////////////////

const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', function(event) {
    // Obtenemos los valores del formulario
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
});







// ///////////////////////////// VIDEO //////////////////////////////////


/*var myVideo = document.getElementById("video");

function playPause() {
    if (myVideo.paused) {
        myVideo.play();
    } else {
        myVideo.pause();
    }
} */
