$(document).ready(function () {
    /* Eliminar Producto */
    $(document).on('click', '.eliminar_producto', function () {
        var $tr = $(this).closest('tr');

        var datos = $tr.children('td').map(function () {
            return $(this).text();
        });

        var codigoBorrar = $tr.find('input[type="hidden"]').val();
        var formulario = $('.formulario_eliminar_producto');
        formulario.attr("action", "/admin/products/" + codigoBorrar);
        $('.codigo_borrar').val(codigoBorrar);
        $('.nombreProducto').text(datos[2]);
    });
});
