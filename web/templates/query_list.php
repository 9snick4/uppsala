<?php
try
{
  require("dbConnect.php");
  $db = get_db();

  $stmt = "";
  switch ($table)
  {
  case 'm':
    $stmt = $db->prepare('SELECT mapname FROM map ORDER BY mapname');
    break;
  case 'c':
    $stmt = $db->prepare('SELECT cityname AS City,Latitude,Longitude,Elevation,citypopulation AS Population,mapname AS Map 
                          FROM city INNER JOIN mapcity ON city.cityid = mapcity.cityid INNER JOIN map ON mapcity.mapid = map.mapid
                          ORDER BY cityname, mapname');
    break;
  case 'g':
    $stmt = $db->prepare('SELECT gamername AS Name,gamedate AS Date,gametime AS Time,points,mapname AS Map 
                          FROM game INNER JOIN gamer ON game.gamerid = gamer.gamerid INNER JOIN map ON game.mapid = map.mapid
                          ORDER BY gamedate, gametime DESC');
    break;
  case 'u':
  $stmt = $db->prepare('SELECT gamername FROM gamer ORDER BY gamername');
    break;
  }
  $stmt->execute();
  echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
?>