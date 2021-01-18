$(function() {
    $(document).on('click', '#div-anuncio', function() {
        //alert($(this).prop('id'));

        var id_casa = document.getElementById('ID_CASA').innerHTML;
        var pagina = 'publicacion.php?id=' + id_casa;
        var segundos = 12500;

        function redireccion() {
            document.location.href = pagina;
        }

        setTimeout(redireccion(), segundos);

    });
});