<?php
include('../config.php');
include('./session.php');
include('./header.php');
if($login_permission==1 or $login_permission==0){
}else{
  header("location:./index.php");
}

?>
  <style>
    #monitortable{
        font-size:10pt;
        background-color:white;
    }
    table{
        font-size:10pt;
    }
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
    <div class="col-sm-8" style="border-style: solid;border-width: 5px;border-color:#007BFF;">
 
        <div  style="overflow-x:auto;height:450px;" id="monitortable">
            
           <a href="#" class="list-group-item list-group-item-action active">
   Loading Sites ...
  </a>

  
</div>
<div style="border-style: solid;border-width: 1px;border-color:#007BFF;">
       <div class="form-row  ">
        <div class="form-group col-auto" >
        <!--<label for="search">Search</label> -->
      <input id="search" class="form-control " type="search" placeholder="Search" aria-label="Search" onchange='userslist();' >
    </div>
      <div class="form-group col-auto" >
    <!--<label for="state_">State</label>-->
    <select class="form-control" name="state_" id="state_" onchange="getlocality()">
      <?php 
      $q = "SELECT DISTINCT admin1Pcode, admin1Name_en FROM `states` order by admin1Pcode ";
      $c=1;
$result =mysqli_query($db,$q);
echo "<option value=''  selected>All</option>";
while($row = mysqli_fetch_assoc($result)) {
  $hc_n=$row['admin1Name_en'];
  $hc_id=$row['admin1Pcode'];
  
    echo "<option value='".$hc_id."' >".$hc_n."</option>";

  
  $c+=1;
}
      ?>


  
  </select>
  </div>
  <div class="form-group col-auto" >
    <!--<label for="locality">Locality</label>-->
    <select class="form-control" name="locality" id="locality">
      <?php 
      $q = "SELECT admin2Pcode, admin2Name_en FROM `states` WHERE admin1Pcode='SD01' ;";
      $c=1;
$result =mysqli_query($db,$q);
echo "<option value=''  selected>All</option>";
while($row = mysqli_fetch_assoc($result)) {
  $hc_n=$row['admin2Name_en'];
  $hc_id=$row['admin2Pcode'];

    
 
    echo "<option value='".$hc_id."' >".$hc_n."</option>";

  $c+=1;
}
      ?>

  
  </select>
  </div>
      <button class="btn btn-outline-primary " onclick='userslist();'>Search</button>
    </div>
       </div>
        
        
    </div>
    <div class="col-sm-4" >
      <div id="map" class="map" width="100%" height="500px" style="border-style: solid;border-width: 5px;border-color:#007BFF;height:500px;"></div>
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
          document.getElementById("hc_list").classList.add("active");
    var ok =new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/ok20.png'
          });
    var wait = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/wait20.png'
          });
    var dead = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/dead20.png'
          });
    var cases = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/cases20.png'
          });
    var ambulans = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/ambulans20.png'
          });
    var hospital = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/hospital.png'
          });
    var hospital_off = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/hospital_off20.png'
          });
  var style = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/off.png'
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
          url: '<?php echo $sitelink ; ?>gis/hc.php',
          format: new ol.format.GeoJSON()
        }),
        style: function(feature, resolution) {
          if(feature.get('cases')>=feature.get('power')){
            style.setImage(hospital_off);

          }else{
            style.setImage(hospital);
          }
          
            

          


          style.getText().setText(resolution < 500 ? feature.get('name') : '');
            

        
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
    
 var old='';   
    var myVar = setInterval(myTimer, 1000);

function myTimer() {
    
   userslist();
    
} 
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
function userslist(){
    var q=document.getElementById("search").value;
    var st=document.getElementById("state_");
    var loc=document.getElementById("locality");
    if(loc.options[loc.selectedIndex] ==undefined){
      var loc1='';
    }else{
      var loc1=loc.options[loc.selectedIndex].value;
      
    }
    
    var st1 = st.options[st.selectedIndex].value;
  
    var xhr= new XMLHttpRequest();
    var cookie ;
    cookie = getCookie('cookie');
    
xhr.open('GET', '<?php echo $sitelink ; ?>admin/hc_table.php?cookie='+ cookie +'&q='+q+'&state='+st1+'&loc='+loc1, true);
xhr.onreadystatechange= function() {
    if (this.readyState!==4) return;
    if (this.status!==200) return; // or whatever error handling you want
    if(this.responseText!=old){
        vectorLayer.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/hc.php?cookie='+getCookie('cookie'),
          format: new ol.format.GeoJSON()
        }));
        document.getElementById('monitortable').innerHTML= this.responseText;
        old = this.responseText;
    }
    
};
xhr.send();
}
closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
      };
 map.on('singleclick', function(evt) {
        var coordinate = evt.coordinate;
     map.forEachFeatureAtPixel(evt.pixel, function (feature, layer) {
        //do something
    
        var hdms = ol.coordinate.toStringHDMS(ol.proj.transform(
            coordinate, 'EPSG:3857', 'EPSG:4326'));

        content.innerHTML = '<center><h6>'+
    ' Qurantine Name :</h6><p> '+feature.get('name')+'</p><h6>'+
    ' Qurantine Information :</h6><p> '+feature.get('info')+'</p><h6><p>Qurantine Power </p></h6><p> '+ feature.get('power')+'</p><h6><p>Qurantine Current Cases </p></h6><p> '+ feature.get('cases')+'</p>'+ '</center>';
        overlay.setPosition(coordinate);
     });

 });

function getmodal(id){

var xhr= new XMLHttpRequest();
    var cookie ;
    cookie = getCookie('cookie');
    
xhr.open('GET', '<?php echo $sitelink ; ?>admin/get_q_info.php?cookie='+ cookie +'&id='+id, true);
xhr.onreadystatechange= function() {
    if (this.readyState!==4) return;
    if (this.status!==200) return; // or whatever error handling you want
    if(this.responseText!=old){
        
        document.getElementById('modal_body').innerHTML= this.responseText;

$('#exampleModal').modal('show');
        
    }
    
};
xhr.send();












};

</script>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information about Qurantine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id = "modal_body" class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>






<?php
include('./footer.php');
?>