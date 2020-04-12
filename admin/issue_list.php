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
      }
.modal-backdrop {
    display:none
}
.modal-backdrop.in {
    opacity: 0;
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
   Loading Issues ...
  </a>

  
</div>
<div style="border-style: solid;border-width: 1px;border-color:#007BFF;">
       <div class="form-row  ">
        <div class="form-group col-auto" >
        <!--<label for="search">Search</label> -->
      <input id="search" class="form-control " type="search" placeholder="Search" aria-label="Search" onchange='userslist();' >
    </div>
      
      <button class="btn btn-outline-primary " onclick='userslist();'>Search</button>
    </div>
       </div>
        
        
    </div>
    <div class="col-sm-6" style="border-style: solid;border-width: 5px;border-color:#007BFF;" >
      <div class="container" id='container'>
        <div class="modal" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">'.$made_by.'</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <img src="../'.$img.'" width="auto" height="auto" style="max-width:100%;" />
        <p>'.$des.'</p>
      </div>
      <div class="modal-footer">
        <p>$date </p> <p>$time </p>
      </div>
    </div>
  </div>
</div>

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
          document.getElementById("issues").classList.add("active");
    
  
      


          


       

      
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
    
    var xhr= new XMLHttpRequest();
    q = document.getElementById('search').value;
    var cookie ;
    cookie = getCookie('cookie');
    
xhr.open('GET', '<?php echo $sitelink ; ?>admin/issue_table.php?cookie='+ cookie +'&q='+q, true);
xhr.onreadystatechange= function() {
    if (this.readyState!==4) return;
    if (this.status!==200) return; // or whatever error handling you want
    if(this.responseText!=old){
        
        document.getElementById('monitortable').innerHTML= this.responseText;
        old = this.responseText;
    }
    
};
xhr.send();
}

 

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
function getmodal2(id){

var xhr= new XMLHttpRequest();
    var cookie ;
    cookie = getCookie('cookie');
    
xhr.open('GET', '<?php echo $sitelink ; ?>admin/get_issue.php?cookie='+ cookie +'&id='+id, true);
xhr.onreadystatechange= function() {
    if (this.readyState!==4) return;
    if (this.status!==200) return; // or whatever error handling you want
    if(this.responseText!=old){


        
        document.getElementById('container').innerHTML= this.responseText;
$('#mymodal').on('show.bs.modal', function () {
    var mod = $('#mymodal'); //Create variable and load modal in it
    $('#container').html(mod); //Load modal to `insidemodal` Selector
});

        
    }
    
};
xhr.send();


};

</script>







<?php
include('./footer.php');
?>