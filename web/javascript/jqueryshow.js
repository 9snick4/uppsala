function showAjaxList(t)
{
    $.get( "templates/query_list.php", { table: t}).done(function(data) {
            alert(data);
    });
}