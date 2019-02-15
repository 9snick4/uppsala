function showAjaxList(t)
{
    $.get( "templates/query_list.php", { table: t}).done(function(data) {
            var result = JSON.parse(data);
            var columnNames = Object.keys(result[0]);   
            var table = $('<table>').addClass('table').addClass('table-hover').addClass('table-responsive'); 
            var thead = $('<thead>').append($('<th>'));
            var modalName = "";
            switch (t)
            {
               case 'c':
               modalName="#city-modal";
               break;
               case 'u':
               modalName="#gamer-modal";
               break;
               case 'm':
               modalName="#map-modal";
               break; 
            }
            if (modalName !== "")
                var modalbutton = $('<button>').attr("type","button").attr("data-toggle","modal").attr("data-target",modalName).addClass("btn").addClass("btn-primary").val("Edit");
            for(i=0; i<columnNames.length; i++){
                var col = $('<th>').attr("scope","col").text(columnNames[i]).css('textTransform', 'capitalize');
                thead.append(col);
            }
            if (modalName !== "")
                thead.append($('<th>').attr("scope","col").text("Edit"));
            table.append(thead);
            var tbody = $('<tbody>') 
            for(i=0; i<result.length; i++) {
                var tr =$('<tr>').append($('<td>').text(i));
                for (j = 0; j<columnNames.length; j++) {
                    var row = $('<td>').text(result[i][columnNames[j]]);
                    tr.append(row);
                }
                if (modalName !== "") {
                    modalbutton.attr("data-id", result[i][0]);
                    tr.append($('<td>').html(modalbutton));
                    modalbutton = $('<button>').attr("type","button").attr("data-toggle","modal").attr("data-target",modalName).addClass("btn").addClass("btn-primary").val("Edit");
                }
                tbody.append(tr);
            }
            table.append(tbody);
            $('#table-placeholder').html(table);
            if (modalName !== "")
                $(modalName).on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var id = button.data('id'); // Extract info from data-id attribute
                    var modal = $(this);
                    modal.find('input.id').val(id);
                });
        });
        
        
}

function showForm(t)
{
    var form = "";
    switch (t) {
        case 'm':
        form = 'includes/map_form.php';
        break;
        case 'c':
        form = 'includes/city_form.php';
        break;
        case 'g':
        form = 'includes/gamers_form.php';
        break;
        case 'a':
        form = 'includes/city_map_form.php';
        break;
    }
    $('#form-placeholder').load(form);       
        
}


function postForm(){        
    $.post("templates/insertDB.php", $("#reg-form").serialize(), function(data) {
        alert(data);
    });
}
