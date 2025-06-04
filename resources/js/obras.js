import Swal from 'sweetalert2'

window.eliminarObras = function(id) {
    Swal.fire({
        title: "¿DESEA ELIMINAR ESTA OBRA?",

        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        icon:'warning',
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "ELIMINAR"
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: "obra eliminada",
                text: "La obra fue eliminada correctamente.",
                icon:'success',
                position: "center",
                showConfirmButton: false,
                timer: 2500,

            });

            setTimeout(() => {
                document.getElementById(id).submit()
            }, "2500");

        }
    })
}
