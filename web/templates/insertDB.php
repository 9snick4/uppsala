<?php
    require("dbConnect.php");
    $db = get_db();
    $query = "";
    try
    {
        switch($_POST["form-id"])
        {
            case 'c':
                $query = "INSERT INTO City 
                (CityName, Latitude, Longitude,CityPopulation, Extension, Elevation, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:CityName, :Latitude, :Longitude,:CityPopulation, :Extension, :Elevation,NOW(),NOW(),1, 1)";
                $statement = $db->prepare($query);
                $statement->bindValue(':CityName', $_POST["city-textfield"]);
                $statement->bindValue(':Latitude', $_POST["latitude-textfield"]);
                $statement->bindValue(':Longitude', $_POST["longitude-textfield"]);
                $statement->bindValue(':CityPopulation', $_POST["population-textfield"]);
                $statement->bindValue(':Extension', $_POST["extension-textfield"]);
                $statement->bindValue(':Elevation', $_POST["elevation-textfield"]);
                $statement->execute();
            break;
            case 'm':
                $query = "INSERT INTO MapCity
                (MapID, GameID, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:MapID, :GameID, NOW(),NOW(),1, 1)";
                $statement = $db->prepare($query);
                $statement->bindValue(':MapID', $_POST["map-select"]);
                $statement->bindValue(':GameID', $_POST["game-select"]);
                $statement->execute();
            break;
            case 'g':
                $query = "INSERT INTO Gamer 
                (GamerName, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:GamerName, NOW(),NOW(),1, 1)";
                $statement = $db->prepare($query);
                $statement->bindValue(':GamerName', $_POST["gamer-textfield"]);
                $statement->execute();
            break;
            case 'a':
                $query = "INSERT INTO Map 
                (MapName, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:MapName, NOW(),NOW(),1, 1)";
                $statement = $db->prepare($query);
                $statement->bindValue(':MapName', $_POST["map-textfield"]);
                $statement->execute();
            break;
        }
        
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }
    echo "success!";  
?>
