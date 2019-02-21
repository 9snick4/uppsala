function placeCity(city, board, neighbor, direction)
{
    switch (direction)
    {
        //put north of neighbor = ahead of it by latitude
        case 'n':
            var neighborIndex = board.latitudeCities.indexOf(neighbor);
            board.latitudeCities.splice(neighborIndex + 1,0,city);
            break;
            // south = behind it by latitude
        case 's':
            var neighborIndex = board.latitudeCities.indexOf(neighbor);
            board.latitudeCities.splice(neighborIndex,0,city);
            break;
            //west = ahead by longitude
        case 'w':
            var neighborIndex = board.longitudeCities.indexOf(neighbor);
            board.longitudeCities.splice(neighborIndex + 1,0,city);
            break;
            //east = behind by longitude
        case 'e':
            var neighborIndex = board.longitudeCities.indexOf(neighbor);
            board.longitudeCities.splice(neighborIndex,0,city);
           break;
    }
}

function draw(board, center, table) 
{
    //clean table
    table.html("");

    for (var i = 0; i < board.latitudeCities.length; i++);
    {
        //we've hit the center
        if(board.latitudeCities[i] === center)
        {
            //so we need to draw the longitudinal cities
            for (var j = 0; j < board.longitudeCities.length; j++)
            {
                
            }
        }
    }
}