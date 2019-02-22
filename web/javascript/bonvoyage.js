function placeCity(city, board, neighbor, direction, above)
{
    switch (direction)
    {
        //put in north section
        case 'n':
            //one step ahead if above is true           
            var neighborIndex = board.northCities.indexOf(neighbor);
            above ? board.northCities.splice(neighborIndex + 1,0,city) : board.northCities.splice(neighborIndex,0,city);
            break;
        // south 
        case 's':
            var neighborIndex = board.southCities.indexOf(neighbor);            
            above ? board.southCities.splice(neighborIndex + 1,0,city) : board.southCities.splice(neighborIndex,0,city);
            break;
        //west
        case 'w':
            var neighborIndex = board.westCities.indexOf(neighbor);            
            above ? board.westCities.splice(neighborIndex + 1,0,city) : board.westCities.splice(neighborIndex,0,city);
            break;
        //east
        case 'e':
            var neighborIndex = board.eastCities.indexOf(neighbor);            
            above ? board.eastCities.splice(neighborIndex + 1,0,city) : board.eastCities.splice(neighborIndex,0,city);
            break;
    }
}


function drawCard(city, modal)
{
    var card = $("<div>").addClass("card_container");
    var row = $("<div>").addClass("row");
    var col7 = $("<div>").addClass("col-7");
    var directions = $("<div>").addClass("row").addClass("directions")
        .append($("<img>").attr("src","img/left-arrow.png").addClass("arrow"))
        .append($("<span>").addClass("degrees").addClass("hidden").text(city.latitude));
    col7.append(directions);
    var directions2 = $("<div>").addClass("row").addClass("directions")
        .append($("<img>").attr("src","img/left-arrow.png").addClass("arrow"))
        .append($("<span>").addClass("degrees").addClass("hidden").text(city.longitude));
    col7.append(directions2);
    var cityContainer = $("<div>").addClass("row").addClass("city_container")
        .append($("<span>").addClass("city").text(city.cityname))
        .append($("<span>").addClass("state").text(city.cityid));
    col7.append(directions2);
    row.append(col7);
    var col4 = $("<div>").addClass("col-4").addClass("state_image").append($("<div>").addClass("state_flag"));
    row.append(col4);
    card.append(row);
    card.on('click', function() {
        $(modal).modal(options);
        Cookies.set("neighbor", city.cityid);
    });
    return card;
}

function draw(board, center, table, hand) 
{
    //clean table
    var container = $("<div>").addClass("map_container");
    //loop for each array
    var centercontainer = $("<div>").addClass("center-container");
    centercontainer.append(drawCard(center, '#center-modal'));
    container.append(centercontainer);
    var northContainer = $("<div>").addClass("north-container");
    var southContainer = $("<div>").addClass("south-container");
    var eastContainer = $("<div>").addClass("east-container");
    var westContainer = $("<div>").addClass("west-container");
    for (var i = 0; i < board.northCities.length; i++)
    {
        northContainer.append(drawCard(board.northCities[i]), '#north-modal');
    }
    for (var i = 0; i < board.southCities.length; i++)
    {
        southContainer.append(drawCard(board.southCities[i]), '#south-modal');
    }

    for (var i = 0; i < board.eastCities.length; i++)
    {
        eastContainer.append(drawCard(board.eastCities[i]), '#east-modal');
    }
    for (var i = 0; i < board.westCities.length; i++)
    {
        westContainer.append(drawCard(board.westCities[i]), '#west-modal');
    }
    //update table
    table.html(container);
    $("#hand-container").html(drawCard(hand, ''));
}

function drawPoints(board, center) {
    var points = 0;
    for (var i = 0; i < board.northCities.length; i++)
    {
        if (i===0 && center.latitude < board.northCities[i].latitude) {
            points++;
        }
        else if (board.northCities[i-1].latitude < board.northCities[i].latitude){
            points++;
        }
    }
    for (var i = 0; i < board.southCities.length; i++)
    {
        if (i===0 && center.latitude > board.southCities[i].latitude) {
            points++;
        }
        else if (board.southCities[i-1].latitude > board.southCities[i].latitude){
            points++;
        }
    }

    for (var i = 0; i < board.eastCities.length; i++)
    {
        if (i===0 && center.longitude < board.eastCities[i].longitude) {
            points++;
        }
        else if (board.eastCities[i-1].longitude < board.eastCities[i].longitude){
            points++;
        }
    }
    for (var i = 0; i < board.westCities.length; i++)
    {
        if (i===0 && center.longitude > board.westCities[i].longitude) {
            points++;
        }
        else if (board.westCities[i-1].longitude > board.westCities[i].latilongitudetude){
            points++;
        }
    }
    $("#points-placeholder").text("Game over. You scored " + points + " points. Click play to play again");

}

function playCard(direction, above) {
    //get cookies
    var board = Cookies.getJSON("board");
    var center = Cookies.getJSON("center");
    var neighbor = Cookies.getJSON("neighbor");
    var hand = Cookies.getJSON("hand");
    //act out the game
    placeCity(hand,board,neighbor,direction,above);
    Cookies.set("board",board);
    hand = Cookies.getJSON("deck").pop();
    Cookies.set("hand",hand);
    draw(board,center,$('#board-placeholder'),hand);
    //is it game over?
    if (hand === undefined)
    {
        drawPoints(board, center);
        $(".card-container").on("click", function() {});
        $(".degrees").removeClass("hidden");
        // $.post('insertGame.php')
    }
    
}