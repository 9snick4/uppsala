function showAjaxList(t)
{
    $.get( "test.php", { table: t}).done(function(data) {
            alert(data);
    });
}