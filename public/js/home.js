const cargarProductos = () => {
    fetch("app/controller/Productos.php")
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const tbody = document.querySelector('tbody');
                tbody.innerHTML = ''; 
                data.data.forEach(producto => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${producto.id_producto}</td>
                        <td>${producto.producto}</td>
                        <td>${producto.precio}</td>
                        <td>${producto.cantidad}</td>
                        <td>
                            <button class="btn btn-warning" onclick="abrirModalActualizar(${producto.id_producto}, '${producto.producto}', ${producto.precio}, ${producto.cantidad})">Actualizar</button>
                            <button class="btn btn-danger" onclick="eliminarProducto(${producto.id_producto})">Eliminar</button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            } else {
                swal("Error", data.message, "error");
            }
        })
        .catch(error => {
            swal("Error", "No se pudo cargar los productos.", "error");
        });
};

const abrirModalActualizar = (id, nombre, precio, cantidad) => {
    document.getElementById('id_producto').value = id;
    document.getElementById('nombre_producto_modal').value = nombre;
    document.getElementById('precio_producto_modal').value = precio;
    document.getElementById('cantidad_producto_modal').value = cantidad;
    $('#modalActualizar').modal('show');
};

document.getElementById('formAgregarProducto').addEventListener('submit', (event) => {
    event.preventDefault(); 
    const formData = new FormData(event.target);

    fetch("app/controller/Productos.php", {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal("Éxito", data.message, "success");
            cargarProductos(); 
            event.target.reset(); 
        } else {
            swal("Error", data.message, "error");
        }
    })
    .catch(error => {
        swal("Error", "No se pudo agregar el producto.", "error");
    });
});

document.getElementById('formActualizarProducto').addEventListener('submit', (event) => {
    event.preventDefault(); 
    const formData = new FormData(event.target);

    fetch("app/controller/Productos.php", {
        method: 'POST',
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            swal("Éxito", data.message, "success");
            cargarProductos(); 
            $('#modalActualizar').modal('hide'); 
        } else {
            swal("Error", data.message, "error");
        }
    })
    .catch(error => {
        swal("Error", "No se pudo actualizar el producto.", "error");
    });
});

const eliminarProducto = (id) => {
    swal({
        title: "¿Estás seguro?",
        text: "No podrás recuperar este producto una vez eliminado.",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            fetch("app/controller/Productos.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ id_producto: id }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    swal("Éxito", data.message, "success");
                    cargarProductos(); 
                } else {
                    swal("Error", data.message, "error");
                }
            })
            .catch(error => {
                swal("Error", "No se pudo eliminar el producto.", "error");
            });
        }
    });
};

document.addEventListener('DOMContentLoaded', cargarProductos);

document.getElementById('cerrarSesionBtn').addEventListener('click', function() {
    swal({
        title: "¿Estás seguro?",
        text: "Estás a punto de cerrar la sesión",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willLogout) => {
        if (willLogout) {
            swal("¡Sesión cerrada!", {
                icon: "success",
            }).then(() => {
                window.location.href = 'login'; 
            });
        }
    });
});
$(document).ready(function () {
    $('#myTable').DataTable({
        language: "./public/json/lenguaje.json"
    });
});
