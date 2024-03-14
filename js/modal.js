// Función para abrir el modal
function openModal(idPaciente) {
    document.getElementById('modal_' + idPaciente).style.display = "block";
}

// Función para cerrar el modal
function closeModal(idPaciente) {
    document.getElementById('modal_' + idPaciente).style.display = "none";
}

// Función para cargar el historial clínico seleccionado
function cargarHistorialSeleccionado(idPaciente) {
    var historialId = document.getElementById('historial_select_' + idPaciente).value;
    var textarea = document.getElementById('historial_' + idPaciente);

    // Aquí deberías usar AJAX para obtener el historial clínico seleccionado del servidor
    // y luego mostrarlo en el textarea
    // Puedes utilizar jQuery para simplificar el proceso de AJAX
}

// Función para guardar el historial
function guardarHistorial(idPaciente) {
    // Aquí puedes agregar la lógica para guardar el historial clínico modificado
}


