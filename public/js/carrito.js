// Obtener todos los formularios
var formularios = document.querySelectorAll('form');

// Iterar sobre cada formulario
formularios.forEach(function (formulario) {
    var mas = formulario.querySelector('.mas');
    var menos = formulario.querySelector('.menos');
    var cantidad = formulario.querySelector('.cantidad');

    // Verificar que los elementos existan antes de agregar listeners
    if (mas && menos && cantidad) {
        mas.addEventListener('click', function () {
            cantidad.value = parseInt(cantidad.value) + 1;
        });

        menos.addEventListener('click', function () {
            var valor = parseInt(cantidad.value);
            if (valor > 1) {
                cantidad.value = valor - 1;
            }
        });
    }
});
