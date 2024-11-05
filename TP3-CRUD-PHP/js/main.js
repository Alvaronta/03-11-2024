function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.src = input.value;
}

function mostrarEditar(id) {
    document.getElementById('editar-' + id).style.display = 'block';
}

function cerrarEditar(id) {
    document.getElementById('editar-' + id).style.display = 'none';
}