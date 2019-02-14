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
                VALUES(:CityName, :Latitude, :Longitude, :Extension, :Elevation,NOW(),NOW(),1, 1)";
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
                VALUES(:MapName, NOW(),NOW(),1, 1)";
                $statement->bindValue(':MapName', $_POST["map-textfield"]);
                $statement->execute();
            break;
            case 'g':
                $query = "INSERT INTO Gamer 
                (GamerName, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:GamerName, NOW(),NOW(),1, 1)";
                $statement->bindValue(':GamerName', $_POST["gamer-textfield"]);
                $statement->execute();
            break;
            case 'a':
                $query = "INSERT INTO Map 
                (MapName, CreatedOn,ModifiedOn,CreatedBy,ModifiedBy) 
                VALUES(:MapName, NOW(),NOW(),1, 1)";
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
?>

CityName VARCHAR(58) NOT NULL,
    Latitude FLOAT NOT NULL,
    Longitude FLOAT NOT NULL,
    CityPopulation INT NOT NULL,
	Extension FLOAT NOT NULL,
	Elevation INT NOT NULL,   CreatedOn TIMESTAMP NOT NULL,
    ModifiedOn TIMESTAMP NOT NULL,
    CreatedBy INT REFERENCES Gamer(GamerID) NOT NULL,
    ModifiedBy INT REFERENCES Gamer(GamerID) NOT NULL