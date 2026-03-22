const video = document.getElementById('bg-compra-realizada');
const container = document.getElementById('container-compra-realizada');

video?.addEventListener('ended', () => {
    container.style.opacity = 1;
});