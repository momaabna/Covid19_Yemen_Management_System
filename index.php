<?php
include('./config.php');

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
   
Click on Case to Get Information

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
		  document.title='Flood Web Map';
    var marker1 =new ol.style.Icon({
            anchor: [0.5, 1],
            src: 'images/on.png'
          });
		  var stage =new ol.style.Icon({
            anchor: [0.5, 1],
            src: 'images/hospital.png'
          });
    var marker2 = new ol.style.Icon({
            anchor: [0.5, 1],
            src: 'images/off.png'
          });
  var style = new ol.style.Style({
        image: new ol.style.Icon({
            anchor: [0.5, 1],
            src: 'images/hospital.png'
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
          url: '<?php echo $sitelink ; ?>gis/hc.php',
          format: new ol.format.GeoJSON()
        }),name:'hospitals',
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
          vector,vectorLayer,vectorLayer2
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

			if(layer.H.name=='hospitals'){
			//	content.innerHTML='<p>Current Program: '+feature.get('current')+'</p>';
				
					
				//}

        var table = '<a href="#" class="list-group-item list-group-item-action active"> Qurantine Information</a>';
        //var el=feature.get('schedul').split(',');
        //for(var i=0;i<el.length;i++){
          
          table+='<a href="#" class="list-group-item list-group-item-action"> Qurantine Name : '+feature.get('name')+'</a>';
          table+='<a href="#" class="list-group-item list-group-item-action"> Qurantine Information : '+feature.get('info')+'</a>';
          table+='<a href="#" class="list-group-item list-group-item-action"> Qurantine Power : '+feature.get('power')+' Cases</a>';
          document.getElementById('table').innerHTML=table;
        
      

        content.innerHTML = '<center><h6>'+
    ' Qurantine Name :</h6><p> '+feature.get('name')+'</p><h6>'+
    ' Qurantine Information :</h6><p> '+feature.get('info')+'</p><h6><p>Qurantine Power </p></h6><p> '+ feature.get('power')+'</p>'+ '</center>';
        overlay.setPosition(coordinate);
				
			}else{


        var table = '<a href="#" class="list-group-item list-group-item-action active"> Case Information</a>';
        //var el=feature.get('schedul').split(',');
        //for(var i=0;i<el.length;i++){
          
          table+='<a href="#" class="list-group-item list-group-item-action"> Type : '+feature.get('type')+'</a>';
          table+='<a href="#" class="list-group-item list-group-item-action"> Information : '+feature.get('info')+'</a>';
          document.getElementById('table').innerHTML=table;
				
			

        content.innerHTML = '<center><h6>'+
		' Case Information :</h6><p> '+feature.get('info')+'</p><h6><p>Case Type </p></h6><p> '+ feature.get('type')+'</p>'+ '</center>';
				overlay.setPosition(coordinate);
        }
        
     });

 });
	  var myVar = setInterval(myTimer, 5000);

function myTimer() {
    vectorLayer.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/cases.php',
          format: new ol.format.GeoJSON()
        }));
		vectorLayer2.setSource(new ol.source.Vector({
          url: '<?php echo $sitelink ; ?>gis/hc.php',
          format: new ol.format.GeoJSON()
        }));
  
    
} 
	   map.on('moveend', function(e) {
      vector.setRadius(5*map.getView().getZoom());
    vector.setBlur(5*map.getView().getZoom());
    });
	  </script>
  
  
  
  
  
  
  <?php
include('./footer.php');
?>