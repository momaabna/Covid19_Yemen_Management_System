<?php
include('../config.php');
include('./session.php');
include('./header.php');
//include('./includes/setting.php');

if($login_permission==1 or $login_permission==0){
}else{
  header("location:./index.php");
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars(mysqli_real_escape_string($db,$_POST['name']));
      $info = htmlspecialchars(mysqli_real_escape_string($db,$_POST['info'])); 
      $lon = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lon'])); 
	  $lat = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lat']));
    $adress = htmlspecialchars(mysqli_real_escape_string($db,$_POST['adress']));
	  $power=htmlspecialchars(mysqli_real_escape_string($db,$_POST['power']));
    $phone = htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone']));
	  $phone2 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone2']));
	  $state=0;

$owner_name =htmlspecialchars(mysqli_real_escape_string($db,$_POST['owner_name']));
$owner_contact =htmlspecialchars(mysqli_real_escape_string($db,$_POST['owner_contact']));
$project_manager=htmlspecialchars(mysqli_real_escape_string($db,$_POST['project_manager']));
$stakeholders=htmlspecialchars(mysqli_real_escape_string($db,$_POST['stakeholders']));
$i_teams=htmlspecialchars(mysqli_real_escape_string($db,$_POST['i_teams']));
$r_t_contacts=htmlspecialchars(mysqli_real_escape_string($db,$_POST['r_t_contacts']));
$medical_usage=htmlspecialchars(mysqli_real_escape_string($db,$_POST['medical_usage']));
$building_status=htmlspecialchars(mysqli_real_escape_string($db,$_POST['building_status']));
$owner_acceptance=htmlspecialchars(mysqli_real_escape_string($db,$_POST['owner_acceptance']));
$resistnce_acceptance=htmlspecialchars(mysqli_real_escape_string($db,$_POST['resistnce_acceptance']));
$readiness_status=htmlspecialchars(mysqli_real_escape_string($db,$_POST['readiness_status']));
$building_type=htmlspecialchars(mysqli_real_escape_string($db,$_POST['building_type']));
$init_budget=htmlspecialchars(mysqli_real_escape_string($db,$_POST['init_budget']));
$e_f_date=date("Y-m-d",strtotime(htmlspecialchars(mysqli_real_escape_string($db,$_POST['e_f_date']))));
$i_date=date("Y-m-d",strtotime(htmlspecialchars(mysqli_real_escape_string($db,$_POST['i_date']))));
$state_=htmlspecialchars(mysqli_real_escape_string($db,$_POST['state_']));
$locality=htmlspecialchars(mysqli_real_escape_string($db,$_POST['locality']));
	  
    

if(isset($name) and isset($lon) and isset($info) and isset($lat) and isset($power) and isset($phone) and isset($phone2) and  isset($state) and isset($adress)){
  
mysqli_query($db,"SET NAMES 'utf8'");
				mysqli_query($db,'SET CHARACTER SET utf8'); 
				//$sql = "INSERT INTO `tasks` (`location`, `f_userid`, `userid`, `title`, `info`, `datetime`, `state`) VALUES (GeomFromText('POINT($lon $lat)'), $f_user , $u_user, '$title', '$info', now(),  0)" ;
				$sql="INSERT INTO `hc` ( `name`, `info`, `power`, `phone`, `phone2`, `lon`, `lat`, `adress`, `state`, `owner_name`, `owner_contact`, `project_manager`, `stakeholders`, `i_teams`, `r_t_contacts`, `medical_usage`, `building_status`, `owner_acceptance`, `resistnce_acceptance`, `readiness_status`, `building_type`, `init_budget`, `e_f_date`, `i_date`, `state_`, `locality`) VALUES ( '$name', '$info', $power, '$phone', '$phone2', $lon, $lat, '$adress', 0, '$owner_name', '$owner_contact', '$project_manager', '$stakeholders', '$i_teams', '$r_t_contacts', $medical_usage, $building_status, $owner_acceptance, $resistnce_acceptance, $readiness_status, $building_type, $init_budget, '$e_f_date', '$i_date', '$state_', '$locality')";
        
   
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
    <label for="exampleFormControlInput1">Quarantine Name</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Quarantine Name">
  </div>
  
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Quarantine Adress</label>
    <input type="text" class="form-control" name="adress" id="exampleFormControlInput1" placeholder="Quarantine Adress">
  </div>
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Total capacity beds</label>
    <input type="number" class="form-control" name="power" id="exampleFormControlInput1" placeholder="Quarantine Power">
  </div>
  <div class="form-group col-md-12" >
    <label for="owner_name">Owner Name</label>
    <input type="text" class="form-control" name="owner_name" id="owner_name" placeholder="">
  </div>
  <div class="form-group col-md-12" >
    <label for="owner_contact">Owner Contact </label>
    <input type="text" class="form-control" name="owner_contact" id="owner_contact" placeholder="">
  </div>
  <div class="form-group col-md-12" >
    <label for="project_manager">Project Manager</label>
    <input type="text" class="form-control" name="project_manager" id="project_manager" placeholder="">
  </div>
 

<div class="form-group col-md-12">
  <div class=" row" >
    <div class="form-group col-md-6">
    <label for="exampleFormControlTextarea1">Quarantine Information</label>
    <textarea class="form-control" name="info" id="exampleFormControlTextarea1"  rows="3"></textarea>
  </div>
  <div class="form-group col-md-6">
    <label for="stakeholders">Stakeholders</label>
    <textarea class="form-control" name="stakeholders" id="stakeholders"  rows="3"></textarea>
  </div>
</div>
</div>

<!-- 14,23 -->

<div class="form-group col-md-12">
  <div class=" row" >
    <div class="form-group col-md-6">
    <label for="i_teams">Inspection teams</label>
    <textarea class="form-control" name="i_teams" id="i_teams"  rows="3"></textarea>
  </div>
  <div class="form-group col-md-6">
    <label for="r_t_contacts">Resistance team contacts</label>
    <textarea class="form-control" name="r_t_contacts" id="r_t_contacts"  rows="3"></textarea>
  </div>
</div>
</div>





  <div class="col-md-12" >
  <div class=" row" >
  <div class="form-group col-md-6">
    <label for="needs">Phone</label>
    <input class="form-control" name="phone" id="needs"  ></textarea>
  </div>
  <div class="form-group col-md-6">
    <label for="needs">Another Phone </label>
    <input class="form-control" name="phone2" id="needs"  ></textarea>
  </div>
</div>
</div>

<!-- Medical usage and building status -->

<div class="col-md-12" >
<div class=" row" >
    <div class="form-group col-md-6" >
    <label for="medical_usage">Medical Usage </label>
    <select class="form-control" name="medical_usage" id="medical_usage">
      <option value='0'  selected>Isolation</option>
    <option value='1'  >Self isolation </option>
    
  </select>
  </div>
  <div class="form-group col-md-6" >
    <label for="building_status">Building Status</label>
    <select class="form-control" name="building_status" id="building_status">
      <option value='0'  selected>Approved by the team</option>
      <option value='1'  >Under Maintenance</option>
      <option value='2'  >Not visited yet</option>
      <option value='3'  >etc.</option>
  
  </select>
  </div>
</div>
</div>
<!--21,22 -->
<div class="col-md-12" >
<div class=" row" >
    <div class="form-group col-md-6" >
    <label for="owner_acceptance">Owner acceptance</label>
    <select class="form-control" name="owner_acceptance" id="owner_acceptance">
      <option value='0'  selected>False</option>
    <option value='1'  >True </option>
    
  </select>
  </div>
  <div class="form-group col-md-6" >
    <label for="resistnce_acceptance">Resistance  acceptance</label>
    <select class="form-control" name="resistnce_acceptance" id="resistnce_acceptance">
      <option value='0'  selected>False</option>
      <option value='1'  >True</option>
      
  </select>
  </div>
</div>
</div>



<!--readiness 7,15 -->

<div class="col-md-12" >
<div class=" row" >
    <div class="form-group col-md-6" >
    <label for="readiness_status">Readiness status </label>
    <select class="form-control" name="readiness_status" id="readiness_status">
      <option value='0'  selected>Not ready</option>
    <option value='1'  >Ready needs approval </option>
    <option value='2'  >Ready </option>
    
  </select>
  </div>
  <div class="form-group col-md-6" >
    <label for="building_type">Building type</label>
    <select class="form-control" name="building_type" id="building_type">
      <option value='0'  selected>Hospital </option>
      <option value='1'  >Stadium</option>
      <option value='2'  >School Complex</option>
      <option value='3'  >Others</option>
  
  </select>
  </div>
</div>
</div>



<!-- 8,9,13 -->


<div class="col-md-12" >
   <div class=" row" >
  <div class="form-group col-md-4" >
    <label for="init_budget">Initial budget in SDG</label>
    <input type="number" class="form-control" name="init_budget" id="init_budget" placeholder="" value="">
  </div>
   <div class="form-group col-md-4" >
    <label for="e_f_date">Expected finishing date</label>
    <input type="date" class="form-control" name="e_f_date" id="e_f_date" placeholder="" value="">
  </div>
  <div class="form-group col-md-4" >
    <label for="i_date">Inspection date</label>
    <input type="date" class="form-control" name="i_date" id="i_date" placeholder="" value="">
  </div>
    </div>
    </div>










<!-- States Localitis -->

<div class="col-md-12" >
<div class=" row" >
    <div class="form-group col-md-6" >
    <label for="state_">State</label>
    <select class="form-control" name="state_" id="state_" onchange="getlocality()">
      <?php 
      $q = "SELECT DISTINCT admin1Pcode, admin1Name_en FROM `states` order by admin1Pcode ";
      $c=1;
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
  $hc_n=$row['admin1Name_en'];
  $hc_id=$row['admin1Pcode'];
  if ($c==1){
    echo "<option value='".$hc_id."'  selected>".$hc_n."</option>";
  }else{
    echo "<option value='".$hc_id."' >".$hc_n."</option>";

  }
  $c+=1;
}
      ?>


  
  </select>
  </div>
  <div class="form-group col-md-6" >
    <label for="locality">Locality </label>
    <select class="form-control" name="locality" id="locality">
      <?php 
      $q = "SELECT admin2Pcode, admin2Name_en FROM `states` WHERE admin1Pcode='SD01' ;";
      $c=1;
$result =mysqli_query($db,$q);
while($row = mysqli_fetch_assoc($result)) {
  $hc_n=$row['admin2Name_en'];
  $hc_id=$row['admin2Pcode'];
  if ($c==1){
    echo "<option value='".$hc_id."'  selected>".$hc_n."</option>";
  }else{
    echo "<option value='".$hc_id."' >".$hc_n."</option>";

  }
  $c+=1;
}
      ?>

  
  </select>
  </div>
</div>
</div>


<!--States Loclitis End -->
  
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
  <button type="submit" class="btn btn-primary col-md-12">Save Case</button>
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

function getlocality() {
    var loc = document.getElementById('locality');
    var st = document.getElementById('state_');
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    var html_data='';
    
    for (var i = 0 ; i < myObj['localitis'].length; i++) {
       var newobj=myObj['localitis'][i];
       var code =newobj['CODE'];
       var name = newobj['name'];
       
       html_data+='<option value="'+code+'">'+name+'</option>';
    };
  loc.innerHTML=html_data;

  }
};
xmlhttp.open("GET", "../get_locality.php?id="+st.options[st.selectedIndex].value, true);
xmlhttp.send(); 

}



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
  var stage =new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/hospital.png'
          });
    
  var style = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/marker.png'
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

 var vectorLayer = new ol.layer.Vector({
        source: new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/hc.php',
          format: new ol.format.GeoJSON()
        }),name:'hospitals',
        style: function(feature, resolution) {
          style.getText().setText(resolution < 50 ? feature.get('current')  : '');
            
                style.setImage(stage);
            
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
          url: '<?php echo $sitelink ; ?>gis/hc.php',
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
          content.innerHTML = '<center><p>Quarantine  Name : ' + feature.get('name')+'</p><br />'+
		'<p> Quarantine  information : '+feature.get('info')+'</p><br /><h5><p>Quarantine Power </p></h5><p> '+ feature.get('power')+'</p><h5> <br /><a href=del.php?table=hc&id='+feature.get('id')+' ><img src="../images/delete.png" /></a></center>';
  
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