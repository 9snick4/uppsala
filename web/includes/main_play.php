<script src="javascript/bonvoyage.js"> </script>

<div class="container" id="bootstrap_override">
  <div class="map-container" id ='board-placeholder'>
  </div>
  <div id="hand-container"></div>
  <div id="points-container"></div>
</div>
<?php


	require("phpobjects/city.php");
	$citiesDeck = array();
	//if(!isset($_SESSION["gameid"]))
	//{
	require("templates/dbConnect.php");
	$db = get_db();
	$pdo=$db->prepare("SELECT nextval('game_gameid_seq')");
	$pdo->execute();
	$_SESSION["gameid"] = $pdo->fetch(PDO::FETCH_BOTH)[0];
	$_SESSION["gamerid"] = $_GET["gamer_select"];
	$_SESSION["mapid"] = $_GET["map_select"];
	$db = get_db();
	foreach ($db->query("SELECT city.cityid, cityname,latitude,longitude,citypopulation,Extension,Elevation FROM city ORDER BY random() LIMIT 15") as $row)
	{
		$city = new City($row["cityid"], $row["cityname"], $row["latitude"],$row["longitude"],$row["citypopulation"],$row["Extension"], $row["Elevation"]);
		array_push($citiesDeck, $city);
	}
	//}
?>

<script type="text/javascript">
//beginning setup
var stringCitiesDeck = '<?php echo json_encode($citiesDeck); ?>';
var citiesDeck = JSON.parse(stringCitiesDeck);
var table = $('#board-placeholder');
var center = citiesDeck.pop();
var hand = citiesDeck.pop();
var northCities = new Array(); 
var southCities =  new Array(); 
var westCities = new Array(); 
var eastCities =  new Array(); 
var citiesInPlay =  new Array();
citiesInPlay.push(northCities);
citiesInPlay.push(southCities);
citiesInPlay.push(eastCities);
citiesInPlay.push(westCities);
draw(citiesInPlay,center, table, hand);
Cookies.set("board", citiesInPlay);
Cookies.set("center", center);
Cookies.set("deck", citiesDeck);
Cookies.set("hand", hand);
</script>

<!-- north-modal -->
<div class="modal fade" id="east-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North or south?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('n', true);">North</button>
				<button class="btn btn-secondary" onclick="playCard('n', false);">South</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- east-modal -->
<div class="modal fade" id="east-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">East or West?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('e', true);">East</button>
				<button class="btn btn-secondary" onclick="playCard('e', false);">West</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- south-modal -->
<div class="modal fade" id="south-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North or south?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('s', false);">North</button>
				<button class="btn btn-secondary" onclick="playCard('s', true);">South</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- west-modal -->
<div class="modal fade" id="west-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">East or west?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
				<button class="btn btn-secondary" onclick="playCard('w', false);">East</button>
				<button class="btn btn-secondary" onclick="playCard('w', true);">West</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- center-modal -->
<div class="modal fade" id="center-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">North, south, East or West?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
		<form id="reg-form-gamer" class="needs-validation">
			<div class="form-group">
        <button class="btn btn-secondary" onclick="playCard('n', false);">North</button>
				<button class="btn btn-secondary" onclick="playCard('s', false);">South</button>
				<button class="btn btn-secondary" onclick="playCard('e', false);">East</button>
				<button class="btn btn-secondary" onclick="playCard('w', false);">West</button>
			</div>
		</form>
      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>