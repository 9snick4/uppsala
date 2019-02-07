function showAjaxList(t)
{
    $.get( "templates/query_list.php", { table: t}).done(function(data) {
            var result = JSON.parse(data);
            var columnNames = Object.keys(result[0]);   
            var table = $('<table>').addClass('table').addClass('table-hover').addClass('table-responsive').append($('<thead>')).append($('<th>'));
            for(i=0; i<columnNames.length; i++){
                var col = $('<th>').attr("scope","col").text(columnNames[i]).css('textTransform', 'capitalize');
                table.append(col);
            }
            table.append($('<tbody>'));
            for(i=0; i<result.length; i++) {
                for (j = 0; i<columnNames.length; j++) {
                    var row = $('<tr>').text(result[0][columnNames[j]]);
                    table.append(row);
                }
            }
            $('#table-placeholder').append(table);
        });
        
        
}