document.getElementById('editarUsuarioForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const usuario = document.getElementById('usuario').value.trim();
    const password = document.getElementById('password').value.trim();

    if (usuario === '' || password === '') {
        mostrarAlerta('error', 'Por favor, completa todos los campos.');
        return; 
    }

    const formData = new FormData(this);
    const response = await fetch('app/controller/editar.php', {
        method: 'POST',
        body: formData
    });

    const result = await response.json();

    if (result.status === 'success') {
        mostrarAlerta('success', result.message);
        setTimeout(() => {
            window.location.href = 'home'; 
        }, 2000); 
    } else {
        mostrarAlerta('error', result.message);
    }
});
