document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    formData.append('action', 'login');

    fetch('app/controller/Usuarios.php', { 
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Éxito', data.message, 'success').then(() => {
                window.location.href = 'inicio'; 
            });
        } else {
            Swal.fire('Error', data.message, 'error');
        }
    })
    .catch(() => {
        Swal.fire('Error', 'Ocurrió un error en el servidor.', 'error');
    });
});
