<?php
include('../config.php');
include('./session.php');
include('./header.php');
if($login_permission==2 or $login_permission==0){
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
    <div class="col-sm-6" style="border-style: solid;border-width: 5px;border-color:#007BFF;">
 
        <div  style="overflow-x:auto;height:450px;" id="monitortable">
            
           <a href="#" class="list-group-item list-group-item-action active">
   Loading Sites ...
  </a>

  
</div>
<div style="border-style: solid;border-width: 1px;border-color:#007BFF;">
       <div class="form-inline my-2 my-lg-0">
      <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onchange='userslist();'>
      <button class="btn btn-outline-success my-2 my-sm-0" onclick='userslist();'>Search</button>
    </div>
       </div>
        
        
    </div>
    <div class="col-sm-6" >
      <div id="map" class="map" width="100%" height="500px" style="border-style: solid;border-width: 5px;border-color:#007BFF;height:500px;"></div>
        <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
      
      
    
  </div>
    


<script>
          var q='';
          document.getElementById("not_list").classList.add("active");
    var antena =new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/off.png'
          });
    var antena20 = new ol.style.Icon({
            anchor: [0.5, 1],
            src: '../images/on.png'
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
          url: '<?php echo $sitelink ; ?>gis/nots.php',
          format: new ol.format.GeoJSON()
        }),
        style: function(feature, resolution) {
          if(feature.get('score')>=3){
          style.setImage(antena);

        }else{
          style.setImage(antena20);
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
    var myVar = setInterval(myTimer, 5000);

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
    q=document.getElementById("search").value;
  
    var xhr= new XMLHttpRequest();
    var cookie ;
    cookie = getCookie('cookie');
    
xhr.open('GET', '<?php echo $sitelink ; ?>admin/monitortable.php?cookie='+ cookie +'&q='+q, true);
xhr.onreadystatechange= function() {
    if (this.readyState!==4) return;
    if (this.status!==200) return; // or whatever error handling you want
    if(this.responseText!=old){
        vectorLayer.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/nots.php',
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
    ' Case Name :</h6><p> '+feature.get('name')+'</p><h6>'+
    ' Case Information :</h6><p> '+feature.get('info')+'</p><h6><p>Case Score </p></h6><p> '+ feature.get('score')+'</p>'+ '</center>';
        overlay.setPosition(coordinate);
     });

 });
</script>

<?php
include('./footer.php');
?>