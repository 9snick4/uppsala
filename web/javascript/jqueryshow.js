function showAjaxList(t)
{
    $.get( "templates/query_list.php", { table: t}).done(function(data) {
            var result = JSON.parse(data);
            var columnNames = Object.keys(result[0]);   
            var table = $('<table>').addClass('table').addClass('table-hover').addClass('table-responsive'); //.append($('<thead>')).append($('<th>'));
            var thead = $('<thead>').append($('<th>'));
            for(i=0; i<columnNames.length; i++){
                var col = $('<th>').attr("scope","col").text(columnNames[i]).css('textTransform', 'capitalize');
                thead.append(col);
            }
            table.append(thead);
            var tbody = $('<tbody>') 
            for(i=0; i<result.length; i++) {
                var tr =$('<tr>').append($('<td>').text(i));
                for (j = 0; j<columnNames.length; j++) {
                    var row = $('<td>').text(result[i][columnNames[j]]);
                    tr.append(row);
                }
                tbody.append(tr);
            }
            table.append(tbody);
            $('#table-placeholder').html(table);
        });
        
        
}