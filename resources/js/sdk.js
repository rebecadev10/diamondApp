window.addEventListener('DOMContentLoaded', () => {
    // Inicializa el SDK de Facebook solo después de que el DOM se haya cargado
    initFacebookSDK();
});

function initFacebookSDK() {
    // Inicializar el SDK de Facebook
    FB.init({
        appId: '959038345229144',
        xfbml: true,
        version: 'v19.0'
    });
}

let btnRegister = document.getElementById('btnRegister');

btnRegister.addEventListener('click', () => {
    // Iniciar sesión con Facebook solo después de que el botón sea clicado
    FB.login(function(response) {
        if (response.authResponse) {
            console.log('Inicio de sesión exitoso con Facebook:', response.authResponse);
            // Si el usuario inició sesión con éxito, obtener su información de perfil
            fetchUserProfile();
        } else {
            console.log('Inicio de sesión con Facebook cancelado o no autorizado.');
        }
    });
});

// Obtener la información del perfil del usuario desde Facebook
function fetchUserProfile() {
    FB.api('/me', { fields: 'name, email' }, function(response) {
        if (response.error) {
            console.log('Error al obtener la información del perfil:', response.error);
        } else {
            console.log('Información del perfil de Facebook:', response);
            // Mostrar la información del perfil en el contenedor
            document.getElementById('profile').innerHTML = "Bienvenido, " + response.name + ". Tu dirección de correo electrónico es " + response.email;
        }
    });
}
