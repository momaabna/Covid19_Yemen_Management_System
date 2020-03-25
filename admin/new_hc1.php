<?php
include('../config.php');
include('./session.php');
include('./header.php');
//include('./includes/setting.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$house_damage = htmlspecialchars(mysqli_real_escape_string($db,$_POST['house_damage']));
      $info = htmlspecialchars(mysqli_real_escape_string($db,$_POST['info'])); 
      $lon = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lon'])); 
	  $lat = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lat']));
	  $sanitation_damage=htmlspecialchars(mysqli_real_escape_string($db,$_POST['sanitation_damage']));
      $mosquito = htmlspecialchars(mysqli_real_escape_string($db,$_POST['mosquito']));
	  $scorpions =htmlspecialchars(mysqli_real_escape_string($db,$_POST['scorpions']));
	  $flies=htmlspecialchars(mysqli_real_escape_string($db,$_POST['flies']));
	  $diarrhea=htmlspecialchars(mysqli_real_escape_string($db,$_POST['diarrhea']));
	  $health_center=htmlspecialchars(mysqli_real_escape_string($db,$_POST['health_center']));
	  $water_source = htmlspecialchars(mysqli_real_escape_string($db,$_POST['water_source']));
	  $needs =  htmlspecialchars(mysqli_real_escape_string($db,$_POST['needs']));
    $u_user=1;

if($house_damage and $lon and $info and $lat and $sanitation_damage and $mosquito and $scorpions and $flies and $diarrhea and $health_center){
mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				//$sql = "INSERT INTO `tasks` (`location`, `f_userid`, `userid`, `title`, `info`, `datetime`, `state`) VALUES (GeomFromText('POINT($lon $lat)'), $f_user , $u_user, '$title', '$info', now(),  0)" ;
				$sql="INSERT INTO `notifications`(`date`, `name`, `phone`, `damage_type`, `house_damage`, `sanitation_damage`, `mosquito`, `flies`, `diarrhea`, `scorpions`, `water_source`, `health_center`, `needs`, `state`, `lon`, `lat`) VALUES
				(now(),'$user_profile_f_name','$user_profile_f_phone','$info','$house_damage','$sanitation_damage','$mosquito','$flies','$diarrhea','$scorpions','$water_source','$health_center','$needs','0',$lon,$lat)";
   
   $res= mysqli_query($db,$sql); 
    if($res){
        $success=true;
    }else{
        $success=false;
    }

};




} 
        
            $long='';
            $latg='';
            $userg =0;
        
         
            
            if(isset($_GET['site'])){
                
        $site = mysqli_real_escape_string($db,$_GET['site']);
        $q = "SELECT X(location) as lon , Y(location) as lat From monitor WHERE id=$site ";
        $re=mysqli_query($db,$q);
        $row = mysqli_fetch_assoc($re);
        $long=$row['lon'];
        $latg=$row['lat'];
            
            };
            if(isset($_GET['user'])){
                $userg = mysqli_real_escape_string($db,$_GET['user']);
     
            }
	   



?>
  <style>
      .ol-popup {
        position: absolute;
        background-color: white;
        -webkit-filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        filter: drop-shadow(0 1px 4px rgba(0,0,0,0.2));
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #cccccc;
        bottom: 12px;
        left: -50px;
        min-width: 200px;
          font-size:10pt;
      }
      .ol-popup:after, .ol-popup:before {
        top: 100%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
          
      }
      .ol-popup:after {
        border-top-color: white;
        border-width: 10px;
        left: 48px;
        margin-left: -10px;
      }
      .ol-popup:before {
        border-top-color: #cccccc;
        border-width: 11px;
        left: 48px;
        margin-left: -11px;
      }
      .ol-popup-closer {
        text-decoration: none;
        position: absolute;
        top: 2px;
        right: 8px;
      }
      .ol-popup-closer:after {
        content: "✖";
      }
    </style>

  <div class="row">
    <div class="col-sm-6" style="border-style: solid;border-width: 2px;border-color:#007BFF;">
 
        <div  style="overflow-x:auto;height:450px;" id="form">
            <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Houses Damage</label>
    <input type="text" class="form-control" name="house_damage" id="exampleFormControlInput1" placeholder="Houses Damage">
  </div>
  
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Sanitation Damage</label>
    <input type="text" class="form-control" name="sanitation_damage" id="exampleFormControlInput1" placeholder="Sanitation Damage">
  </div>
  <div class="col-md-12" >
   <div class=" row" >
   <div class="form-group col-md-3" >
    <label for="mosquito">Mosquito</label>
    <select class="form-control" name="mosquito" id="mosquito">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
  <div class="form-group col-md-3" >
    <label for="flies">Flies</label>
    <select class="form-control" name="flies" id="flies">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
   <div class="form-group col-md-3" >
    <label for="scorpions">Scorpions</label>
    <select class="form-control" name="scorpions" id="scorpions">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
  <div class="form-group col-md-3" >
    <label for="diarrhea">Diarrhea</label>
    <select class="form-control" name="diarrhea" id="diarrhea">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
  <div class="form-group col-md-6" >
    <label for="water_source">Water Source</label>
    <select class="form-control" name="water_source" id="water_source">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
  <div class="form-group col-md-6" >
    <label for="health_center">Health Center</label>
    <select class="form-control" name="health_center" id="health_center">
	<option value='Yes'  selected>YES</option>
	<option value='No'  >No</option>
	</select>
  </div>
  </div>
  </div>

<div class="form-group col-md-12">
    <label for="exampleFormControlTextarea1">Damage Information</label>
    <textarea class="form-control" name="info" id="exampleFormControlTextarea1"  rows="3"></textarea>
  </div>
  <div class="form-group col-md-12">
    <label for="needs">Needs</label>
    <textarea class="form-control" name="needs" id="needs"  rows="3"></textarea>
  </div>
  
  
    <div class="col-md-12" >
   <div class=" row" >
  <div class="form-group col-md-6" >
    <label for="lon">Longitude</label>
    <input type="text" class="form-control" name="lon" id="lon" placeholder="Longitude" value="<?php echo $long; ?>">
  </div>
   <div class="form-group col-md-6" >
    <label for="lat">Latitude</label>
    <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" value="<?php echo $latg; ?>">
  </div>
                </div>
                </div>
   
    <?php 
                
                if(isset($success)){
                    if($success){
                       echo "<div class='alert alert-success' role='alert'>
                            Task Sent Successfully .
                                </div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                            Failed To Send Task .
                                </div>";
                    }
                }
                
                
                
                ?>
<div class="col-md-12" >
  <button type="submit" class="btn btn-primary col-md-12">Send Notification</button>
                </div>
</form>
            
           

  
</div>

       </div>
        
        
    

    <div class="col-sm-6" >
      <div id="map" class="map" width="100%" height="500px" style="border-style: solid;border-width: 2px;border-color:#007BFF;height:500px;"></div>
        <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
      
      
    
  </div>
    





<script>
          var q='';
          document.getElementById("new_hc").classList.add("active");
    var marker1 =new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/on.png'
          });
		  var stage =new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/stage.png'
          });
    var marker2 = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/off.png'
          });
    
   
  var style = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 1],
            src: 'images/antena20.png'
          }),
      text: new ol.style.Text({
          font: '12px Calibri,sans-serif',
          fill: new ol.style.Fill({
            color: '#000'
          }),
          stroke: new ol.style.Stroke({
            color: '#fff',
            width: 3
          })
        })
      });
var container = document.getElementById('popup');

      var content = document.getElementById('popup-content');
      var closer = document.getElementById('popup-closer');
  var overlay = new ol.Overlay(/** @type {olx.OverlayOptions} */ ({
        element: container,
        autoPan: true,
        autoPanAnimation: {
          duration: 250
        }
      }));

 var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/pos.php',
          format: new ol.format.GeoJSON()
        }),
        style: function(feature, resolution) {
          style.getText().setText(resolution < 1 ? feature.get('damage_type')  : '');
            if(feature.get('state')==1){
                style.setImage(marker1);
            }else{
                style.setImage(marker2);
            }
          return style;
        }
              
       
      });

      var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          }),
          vectorLayer
        ],
          overlays: [overlay],
        target: 'map',
        view: new ol.View({
          center: ol.proj.fromLonLat(<?php echo "[ 32.547948, 15.609359]"; ?>, 'EPSG:3857'),
          zoom: <?php echo 10; ?>
        }),
          controls: ol.control.defaults().extend([
    new ol.control.ZoomSlider(),new ol.control.FullScreen(),new ol.control.Attribution() ])
      });

//Reload Part
    <?php
        if(isset($_GET['site'])){
        echo "map.setView(new ol.View({ center: ol.proj.fromLonLat([32,15], 'EPSG:3857'), zoom: 15 }));";
        
        }
        
        
        
        ?>
    
    var myVar = setInterval(myTimer, 5000);

function myTimer() {
    vectorLayer.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/pos.php',
          format: new ol.format.GeoJSON()
        }));
   
    
} 


closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
      };
 map.on('singleclick', function(evt) {
        var coordinate = evt.coordinate;
     
         var is_not_on_feature=true;
     map.forEachFeatureAtPixel(evt.pixel, function (feature, layer) {
        //do something
    is_not_on_feature=false;
         var coord = feature.getGeometry().getCoordinates();
         
        var proj = ol.proj.transform(
            coord, 'EPSG:3857', 'EPSG:4326');
         document.getElementById('lon').value = proj[0];
          document.getElementById('lat').value = proj[1];
          content.innerHTML = '<center><p>House Damage : ' + feature.get('house_damage')+'</p>'+
		'<p> Sanitation Daamage : '+feature.get('sanitation_damage')+'</p><h5><p>Information </p></h5><p> '+ feature.get('type')+'</p><h5><p>Needs </p></h5><p> '+ feature.get('needs')+'</p><p>State :'+(feature.get('state') == 1 ? 'Responded<img src=../images/on.png /><br />'  : 'Waiting <img src=../images/off.png /><br />')+'</p> </center>';
  
        overlay.setPosition(coordinate);
         
      
        
     });
     if(is_not_on_feature){
        var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coordinate, 'EPSG:3857', 'EPSG:4326'));
        var proj = ol.proj.transform(
            coordinate, 'EPSG:3857', 'EPSG:4326');
         document.getElementById('lon').value = proj[0];
          document.getElementById('lat').value = proj[1];
           content.innerHTML = 'Coordinates <br />'+hdms;
        overlay.setPosition(coordinate);

        }

 });
</script>

<?php
include('./footer.php');
?>