// Simulando una base de datos local para publicaciones
let publicaciones = [];

// Función para cargar las publicaciones
function cargarPublicaciones() {
    const listaPublicaciones = document.getElementById('lista-publicaciones');
    listaPublicaciones.innerHTML = ''; // Limpiar la lista antes de cargar

    publicaciones.forEach(publicacion => {
        const div = document.createElement('div');
        div.classList.add('publicacion');
        div.innerHTML = `
            <h3>${publicacion.nombre}</h3>
            <p>${publicacion.contenido}</p>
            <small>${new Date(publicacion.fecha).toLocaleString()}</small>
        `;
        listaPublicaciones.appendChild(div);
    });
}

// Función para manejar el envío del formulario de nueva publicación
document.getElementById('form-publicacion').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevenir el comportamiento por defecto del formulario

    const contenido = event.target.querySelector('textarea').value;
    
    // Simulando un usuario que publica
    const nuevoPublicacion = {
        nombre: 'Usuario Anónimo', // Esto puede ser el nombre del usuario
        contenido: contenido,
        fecha: new Date().toISOString()
    };

    publicaciones.push(nuevoPublicacion); // Agregar nueva publicación a la "base de datos"
    cargarPublicaciones(); // Recargar la lista de publicaciones

    // Limpiar el campo de texto
    event.target.reset();
});

// Cargar las publicaciones al iniciar la página
document.addEventListener('DOMContentLoaded', cargarPublicaciones);
