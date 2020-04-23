<?php
include('./config.php');
//include('./session.php');
include('./header.php');
//include('./includes/setting.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = htmlspecialchars(mysqli_real_escape_string($db,$_POST['name']));
      $info = 'No thing';//htmlspecialchars(mysqli_real_escape_string($db,$_POST['info'])); 
      $lon = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lon'])); 
	  $lat = htmlspecialchars(mysqli_real_escape_string($db,$_POST['lat']));
    $adress = htmlspecialchars(mysqli_real_escape_string($db,$_POST['adress']));
	  $hc_name=htmlspecialchars(mysqli_real_escape_string($db,$_POST['hc_name']));
    $phone = htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone']));
	  $phone2 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['phone2']));
$p1 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p1']));

$p2 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p2']));

$p3 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p3']));

$p4 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p4']));

$p5 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p5']));

$p6 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p6']));

$p7 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p7']));

$p8 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p8']));

$p9 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p9']));

$p10 =htmlspecialchars(mysqli_real_escape_string($db,$_POST['p10']));
$child =htmlspecialchars(mysqli_real_escape_string($db,$_POST['child']));
	  $type=0;//htmlspecialchars(mysqli_real_escape_string($db,$_POST['type']));
	  $state=-1;//htmlspecialchars(mysqli_real_escape_string($db,$_POST['state']));
    $nat_id=htmlspecialchars(mysqli_real_escape_string($db,$_POST['nat_id']));
    $state_=htmlspecialchars(mysqli_real_escape_string($db,$_POST['state_']));
    $locality=htmlspecialchars(mysqli_real_escape_string($db,$_POST['locality']));
	  
    

if(isset($name) and isset($lon) and isset($info) and isset($lat) and isset($hc_name) and isset($phone) and isset($phone2) and isset($type) and isset($state) and isset($adress) and isset($nat_id)){
  
mysqli_query($db,"SET NAMES 'utf8'");
				
				//$sql = "INSERT INTO `tasks` (`location`, `f_userid`, `userid`, `title`, `info`, `datetime`, `state`) VALUES (GeomFromText('POINT($lon $lat)'), $f_user , $u_user, '$title', '$info', now(),  0)" ;
				$sql="INSERT INTO `notifications` ( `name`, `datetime`, `info`, `adress`, `hc_name`, `hc_id`, `state`, `lon`, `lat`, `type`, `phone`, `phone2`,`nat_id`,`p1`,`p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`,`child`,`state_`,`locality`) VALUES ( '$name', now(), '$info', '$adress', '$hc_name', 1, $state, $lon, $lat, $type, '$phone', '$phone2','$nat_id',$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$child,'$state_','locality')";
  
   $res= mysqli_query($db,$sql); 
    if($res){
        $success=true;
    }else{
        $success=false;
    }

};




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


  <div class="row" style="background-color:#535152;color:#fbb92f"> 
    <div class="col-sm-6" style="border-style: solid;;border-width: 2px;border-color:#fbb92f;">
 <?php 
                
                if(isset($success)){
                    if($success){
                       echo "<div class='alert alert-success' role='alert'>
                            Report Sent Successfully .
                                </div>";
                    }else{
                        echo "<div class='alert alert-danger' role='alert'>
                            Failed To Send Report .
                                </div>";
                    }
                }
                
                
                
                ?>
        <div  style="overflow-x:auto;height:450px;" id="form">
            <form method="post" enctype="multipart/form-data" accept-charset="utf-8">
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Case Name   إسم الحالة</label>
    <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Case Name">
  </div>
  
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Case Adress    عنوان الحالة</label>
    <input type="text" class="form-control" name="adress" id="exampleFormControlInput1" placeholder="Case Adress">
  </div>
  <div class="form-group col-md-12" >
    <label for="exampleFormControlInput1">Nearest Health Center أقرب مركز صحي </label>
    <input type="text" class="form-control" name="hc_name" id="exampleFormControlInput1" placeholder="Health Center">
  </div>
  <div class="form-group col-md-12" >
    <label for="nat">National ID     الرقم الوطني</label>
    <input type="text" class="form-control" name="nat_id" id="nat" placeholder="National ID">
  </div>


  <div class="col-md-12" >
<div class=" row" >
    <div class="form-group col-md-6" >
    <label for="state_">State</label>
    <select class="form-control" name="state_" id="state_" onchange="getlocality()">
      <?php 
      $q = "SELECT DISTINCT admin1Pcode, admin1Name_en FROM `states` order by admin1Pcode ";
      $c=1;
      mysqli_query($db,"SET NAMES 'utf8'");
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
      mysqli_query($db,"SET NAMES 'utf8'");
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









 <div class="form-group col-md-12" ><h4>Complete this Data Carfully إملأ هذه البيانات بحذر</h4> <br /> </div>


    <div class="form-group col-md-12" >
    <label for="p1">له تاريخ في السفر للخارج أو لمنطقة عالية الخطورة المحددة أو اتصال بدني قريب في ال 14 يومًا الماضية قبل ظهور الأعراض مع حالة مؤكدة من كورونا  أو العمل في مرفق رعاية صحية أو حضوره حيث تم قبول مرضى مصابين بكورونا

<br />
 Had a History of Travel Abroad or to the Identified High-Risk Area or A Close Physical Contact in the Past 14 Days Prior to Symptoms Onset with a Confirmed Case of COVID-19 or Working in or Attended a Health Care Facility Where Patients with Confirmed COVID-19 Were Admitted.</label>
    <select class="form-control" name="p1" id="p1">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>


    <div class="form-group col-md-12" >
    <label for="p2">مخالطة حاله مشخصه بفايرو س كورونا خلال اسبوعين ماضيين 
      <br />
Exposure to confirmed COVID-19 cases in the last two week</label>
    <select class="form-control" name="p2" id="p2">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>


  



  <div class="form-group col-md-12" >
    <label for="p3">مخالطة الابل او منتجاتها (مباشرة او غير مباشرة ) خلال الاسبوعين الماضيين 
      <br />
 Exposure to camel or products (direct or indirect*) in the last two weeks
</label>
    <select class="form-control" name="p3" id="p3">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>

  <div class="form-group col-md-12" >
    <label for="p4">زيارة مؤسسة صحيه بها حالات كورونا خلال الاسبوعين الماضيين 
<br />
 visit to a healthcare that had COVID-19 cases in the last two weeks</label>
    <select class="form-control" name="p4" id="p4">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>





<div class="form-group col-md-12" ><h4>Syndroms</h4> <br /> </div>
    
 <div class="col-md-12" >
   <div class=" row" >
<div class="form-group col-md-6" >
    <label for="p5">
الحمى 
<br />
 fever
</label>
    <select class="form-control" name="p5" id="p5">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>

  <div class="form-group col-md-6" >
    <label for="p6">
(السعال (جديد أو متفاقم 
<br />
 Cough (New or Worsening)
</label>
    <select class="form-control" name="p6" id="p6">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>
</div>
</div>

  <div class="col-md-12" >
   <div class=" row" >
<div class="form-group col-md-6" >
    <label for="p7">
(ضيق في التنفس (جديد أو متفاقم 
<br />
 Shortness of Breath (New or Worsening)
</label>
    <select class="form-control" name="p7" id="p7">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>

  <div class="form-group col-md-6" >
    <label for="p8">

إلتهاب الحنجرة و / أو سيلان الأنف 
<br />
 Sore Throat and/or Runny Nose

</label>
    <select class="form-control" name="p8" id="p8">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>
</div>
</div>


<div class="col-md-12" >
   <div class=" row" >
<div class="form-group col-md-6" >
    <label for="p9">

الغثيان والقيء و / أو الإسهال 
<br />
 Nausea, Vomiting and/or Diarrhea

</label>
    <select class="form-control" name="p9" id="p9">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>

  <div class="form-group col-md-6" >
    <label for="p10">

الفشل الكلوي المزمن ومرض الشريان التاجي وفشل القلب 
<br />
 Chronic Renal Failure, Coronary Artery Disease/Heart Failure
</label>
    <select class="form-control" name="p10" id="p10">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
  </div>
</div>
</div>



<br />

<div class="col-md-12" >
   <div class=" row" >
<div class="form-group col-md-6" >
    <label for="child"> هل الحالة طفل 
<br />
 Child
</label>
    <select class="form-control" name="child" id="child">
  <option value='0'  selected>No</option>
  <option value='1'  >Yes</option>
  </select>
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
    <label for="needs">Assistant Phone </label>
    <input class="form-control" name="phone2" id="needs"  ></textarea>
  </div>
</div>
</div>

  
    <div class="col-md-12" >
   <div class=" row" >
  <div class="form-group col-md-4" >
    <label for="lon">Longitude</label>
    <input type="text" class="form-control" name="lon" id="lon" placeholder="Longitude" value="">
  </div>
   <div class="form-group col-md-4" >
    <label for="lat">Latitude</label>
    <input type="text" class="form-control" name="lat" id="lat" placeholder="Latitude" value="">
  </div>
  <div class="form-group col-md-4" >
    <label for="ch">Use My Current Location</label>
    <input type="checkbox" onclick="getmylocation()" class="form-control" id="ch" placeholder="Latitude" value="">
  </div>
                </div>
                </div>
   
    
<div class="col-md-12" >
  <button type="submit" class="btn col-md-12" style='background-color:#535152;color:#fbb92f;border-color:#fbb92f '>Save Case</button>
                </div>
</form>
            
           

  
</div>

       </div>
        
        
    

    <div class="col-sm-6" style="padding: 20;" >
      <div id="map" class="map" width="100%" height="500px" style="border-style: solid;border-width: 2px;border-color:#fbb92f;height:450px;padding: 10;"></div>
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
xmlhttp.open("GET", "./get_locality.php?id="+st.options[st.selectedIndex].value, true);
xmlhttp.send(); 

}




          var q='';
          document.getElementById("new_not").classList.add("active");
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
          url: '<?php echo $sitelink ; ?>gis/cases.php',
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
          center: ol.proj.fromLonLat(<?php echo "[ 44.38571655468752, 15.450580710995894]"; ?>, 'EPSG:3857'),
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
          url: '<?php echo $sitelink ; ?>gis/cases.php',
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
          content.innerHTML = '<center><p>Case Name : ' + feature.get('name')+'</p>'+
		'<p> Case information : '+feature.get('info')+'</p><h5><p>Case Type </p></h5><p> '+ feature.get('type')+'</p><h5></center>';
  
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
 function getmylocation(){
//======================geolocation
var vs=new ol.source.Vector();
var trackFeature = new ol.Feature();
var view =map.getView();




var geolocation = new ol.Geolocation({
        tracking: true
      });
geolocation.on('change:position', function() {
        var coordinate = geolocation.getPosition();
        view.setCenter(ol.proj.fromLonLat(coordinate));
        console.log(coordinate);
        var iconFeature = new ol.Feature({
         geometry: new ol.geom.Point(ol.proj.fromLonLat(coordinate))  
   });

   //add icon to vector source
   vs.addFeature(iconFeature);  
   
         document.getElementById('lon').value = coordinate[0];
          document.getElementById('lat').value = coordinate[1];

        
      });

var trackLayer = new ol.layer.Vector({
    source: vs,
    name:'track'
});
map.addLayer(trackLayer);

 };









</script>

<?php
include('./footer.php');
?>