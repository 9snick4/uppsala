<?php
    require("dbConnect.php");
    $db = get_db();
    $query = "";
    try
    {
        switch($_POST["form-id"])
        {
            case 'c':
                $query = "UPDATE City 
                SET CityName = :CityName, Latitude = :Latitude, Longitude = :Longitude,CityPopulation = :CityPopulation, Extension = :Extension, Elevation = :Elevation 
                WHERE cityID = :cityID";
                $statement = $db->prepare($query);
                $statement->bindValue(':CityName', $_POST["city-textfield"]);
                $statement->bindValue(':Latitude', $_POST["latitude-textfield"]);
                $statement->bindValue(':Longitude', $_POST["longitude-textfield"]);
                $statement->bindValue(':CityPopulation', $_POST["population-textfield"]);
                $statement->bindValue(':Extension', $_POST["extension-textfield"]);
                $statement->bindValue(':Elevation', $_POST["elevation-textfield"]);
                $statement->bindValue(':cityID', $_POST["row-id"]);
                $statement->execute();
            break;
            case 'g':
                $query = "UPDATE Gamer 
                SET GamerName = :GamerName
                WHERE gamerID = :gamerID";
                $statement = $db->prepare($query);
                $statement->bindValue(':GamerName', $_POST["gamer-textfield"]);
                $statement->bindValue(':gamerID', $_POST["row-id"]);
                $statement->execute();
            break;
            case 'm':
                $query = "UPDATE Map 
                SET MapName = :MapName
                WHERE MapID = :mapID";
                $statement = $db->prepare($query);
                $statement->bindValue(':MapName', $_POST["map-textfield"]);
                $statement->bindValue(':mapID', $_POST["row-id"]);
                $statement->execute();
            break;
            default;
                echo "Input error";
        }
        
    }
    catch (Exception $ex)
    {
        echo "Error with DB. Details: $ex";
        die();
    }
    echo "Success!";  
?>
