function previewImage(input, previewId) {
    const preview = document.getElementById(previewId);
    preview.src = input.value;
}