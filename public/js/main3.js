document.getElementById('editarUsuarioForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const response = await fetch('editar.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();

    if (result.status === 'success') {
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: result.message
        }).then(() => {
            window.location.href = 'login'; 
        });
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: result.message
        });
    }
});