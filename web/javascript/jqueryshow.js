function showAjaxList(t)
{
    $.get( "test.php", { table: t})
        .done(funcion(data){
            alert(data);
    });
}