<?php
    require("dbConnect.php");
    $db = get_db();
    $query = "";
    try
    {
        switch($_POST["form-id"])
        {
            case 'c':
                $query = "DELETE FROM City 
                WHERE cityID = :cityID";
                $statement = $db->prepare($query);
                $statement->bindValue(':cityID', $_POST["row-id"]);
                $statement->execute();
            break;
            case 'g':
                $query = "DELETE FROM Gamer 
                WHERE gamerID = :gamerID";
                $statement = $db->prepare($query);
                $statement->bindValue(':gamerID', $_POST["row-id"]);
                $statement->execute();
            break;
            case 'm':
                $query = "DELETE FROM Map 
                WHERE MapID = :mapID";
                $statement = $db->prepare($query);
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
