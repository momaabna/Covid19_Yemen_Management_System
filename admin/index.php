<?php
include('../config.php');
include('./session.php');
include('./header.php');

?>

<style>
    #users{
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
    <div class="col-sm-4">
 
        <div class="list-group" id="table" style="overflow-x:auto;height:500px;border-style: solid;border-width: 2px;border-color:#007BFF;">
           <a href="#" class="list-group-item list-group-item-action active">
   Click on Notification to See it's Information 
  </a>
  
</div>
        
        
    </div>
    <div class="col-sm-8" >
      <div id="map" class="map" width="100%" height="450px" style="border-style: solid;border-width: 2px;border-color:#007BFF;height:500px"></div>
        <div id="popup" class="ol-popup">
      <a href="#" id="popup-closer" class="ol-popup-closer"></a>
      <div id="popup-content"></div>
    </div>
      
      
    
  </div>
  
  <script>
          document.getElementById("main").classList.add("active");
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
          url: '<?php echo $sitelink ; ?>gis/cases.php',
          format: new ol.format.GeoJSON()
        }),
        style: function(feature, resolution) {
          style.getText().setText(resolution < 1 ? feature.get('name')  : '');
            if(feature.get('state')==1){
                style.setImage(marker1);
            }else{
                style.setImage(marker2);
            }
          return style;
        }
      });
     var v = new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/cases.php',
          format: new ol.format.GeoJSON()
        });
     


     var vector = new ol.layer.Heatmap({
        source: v,
        blur: parseInt(50, 10),
        radius: parseInt(50, 10)
      });

    var vectorLayer2 = new ol.layer.Vector({
        source: new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/stages.php',
          format: new ol.format.GeoJSON()
        }),name:'stages',
        style: function(feature, resolution) {
          style.getText().setText(resolution < 50 ? feature.get('current')  : '');
            
                style.setImage(stage);
            
          return style;
        }
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

      var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          }),
          vector,vectorLayer
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
      //if(layer.H.name=='stages'){
      //  content.innerHTML='<p>Current Program: '+feature.get('current')+'</p>';
        var table = '<a href="#" class="list-group-item list-group-item-action active"> Case Information</a>';
        //var el=feature.get('schedul').split(',');
        //for(var i=0;i<el.length;i++){
          table+='<a href="#" class="list-group-item list-group-item-action"> Case Name : '+feature.get('name')+'</a>';
          table+='<a href="#" class="list-group-item list-group-item-action"> Type : '+feature.get('type')+'</a>';
          table+='<a href="#" class="list-group-item list-group-item-action"> Information : '+feature.get('info')+'</a>';
          
        //}
        document.getElementById('table').innerHTML=table;
      //}else{
        
      

        content.innerHTML = '<center><p>Case Name : ' + feature.get('name')+'</p>'+
    '<p> Case Information : '+feature.get('info')+'</p><h5><p>Case Type </p></h5><p> '+ feature.get('type')+'</p>'+ '</center>';
        //}
        overlay.setPosition(coordinate);
     });

 });
	  var myVar = setInterval(myTimer, 5000);

function myTimer() {
    vectorLayer.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/cases.php',
          format: new ol.format.GeoJSON()
        }));
		
  
    
} 
	  
	  </script>

  
  
  
  <?php
include('./footer.php');
?>