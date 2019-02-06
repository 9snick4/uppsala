<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);
  $table = $_POST["table"];
  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
$stmt = "";
switch ($table)
{
  case 'm':
   $stmt = $db->prepare('SELECT mapname FROM map ORDER BY mapname');
    break;
  case 'c':
    $stmt = $db->prepare('SELECT cityname AS City ,Latitute,Longitude,Elevation,citypopulation AS Population,mapname AS Map 
                          FROM city INNER JOIN mapcity ON city.cityid = mapcity.cityid INNER JOIN map ON mapcity.mapid = map.mapid
                          ORDER BY cityname, mapname');
    break;
  case 'g':
    $stmt = $db->prepare('SELECT gamername AS Name,gamedate AS Date,gametime AS Time,points,mapname AS Map 
                          FROM game INNER JOIN gamer ON game.gamerid = gamer.gamerid INNER JOIN map ON game.mapid = map.mapid
                          ORDER BY gamedate, gametime DESC');
  case 'u':
  $stmt = $db->prepare('SELECT gamername FROM gamer ORDER BY gamername');
    break;
}
//$stmt->bindValue(':id', $table, PDO::PARAM_INT);
$stmt->execute();
echo json_encode(fetchAll(PDO::FETCH_ASSOC));
?>