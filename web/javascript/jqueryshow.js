function showAjaxList(t)
{
    $.get( "templates/query_list.php", { table: t}).done(function(data) {
            var result = JSON.parse(data);
            alert(Object.keys(result[0]));   
        });
        
        
}