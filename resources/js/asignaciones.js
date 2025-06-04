import Swal from 'sweetalert2'

window.eliminarAsignacion = function(id) {
    Swal.fire({
        title: "¿DESEA ELIMINAR ESTA ASIGNACION?",

        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        icon:'warning',
        cancelButtonColor: "#d33",
        cancelButtonText: "CANCELAR",
        confirmButtonText: "ELIMINAR"
    }).then((result) => {
        if (result.isConfirmed) {

            Swal.fire({
                title: "asignacion eliminada",
                text: "La asignacion fue eliminada correctamente.",
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
