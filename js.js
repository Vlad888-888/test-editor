document.addEventListener("DOMContentLoaded", function(event)
{
    //window.onresize = function() { console.log( window.location.search) }
    window.onload = function() {   loadwind(); }
});

function loadwind(){ 
    if(window.location.pathname.indexOf("index.php")>=0 || window.location.pathname == '/'){ setInterval("reload_img()", 14998);} //
}

var ShowCounter=1000;
var ImgNum=0;
var ShowVar=0;
var ShowTimer=0;

function reload_img(){  
if(ImgNum == 9){ImgNum=0;}else{ImgNum++;}    
if( document.getElementById("objinfo8").style.opacity >= 0.9 ){
     document.getElementById("objinfo8").style.opacity = 1; ShowTimer = setInterval("set_filter_img()", 10); ShowCounter=1000;
    }
else
if( document.getElementById("objinfo8").style.opacity <= 0.1 ){
    document.getElementById("objinfo8").style.opacity = 0; ShowTimer = setInterval("clier_filter_img()", 10); ShowCounter=10;
}
//console.log(window.location.pathname)
return false;
}

function set_filter_img(){  
ShowCounter=ShowCounter-10;
if(ShowCounter>=1000){
   clearInterval(ShowTimer);
   document.getElementById("objinfo8").style.backgroundImage =  "url( img-upload/00"+ImgNum+".jpg )"; 
   }
else{ 
    document.getElementById("objinfo8").style.stroke = "none";
    document.getElementById("objinfo8").style.opacity = (ShowCounter*0.001);
   if( document.getElementById("objinfo8").style.opacity <= 0.1 ){
        document.getElementById("objinfo8").style.opacity = 0; 
        document.getElementById("objinfo8").style.backgroundImage = "url( img-upload/00"+ImgNum+".jpg )"; 
	 clearInterval(ShowTimer);
	 } 
   }    
  
return false;
}

function clier_filter_img(){  
ShowCounter=ShowCounter+10;
if(ShowCounter<=0){
   clearInterval(ShowTimer);
   document.getElementById("objinfo8").style.backgroundImage = "url( img-upload/00"+ImgNum+".jpg )"; 
   //console.log("./img-upload/00"+ImgNum+".jpg");
   }
else{ 
   document.getElementById("objinfo8").style.stroke = "none";
   document.getElementById("objinfo8").style.opacity = (ShowCounter*0.001); 
   if( document.getElementById("objinfo8").style.opacity >= 0.9 ){ 
        document.getElementById("objinfo8").style.opacity = 1; ShowCounter=1000;
        document.getElementById("objinfo8").style.backgroundImage = "url( img-upload/00"+ImgNum+".jpg )"; 
        clearInterval(ShowTimer);
	   } 
    }  
return false;
}

function bigmag(sevent){
//console.log(sevent.target.id);
if(sevent.target.id === "objinfo20" || sevent.target.id === "objinfo21" || sevent.target.id === "objinfo22" || sevent.target.id === "objinfo23") {
if(sevent.target.style.backgroundImage.indexOf("-off.png")>0){ sevent.target.style.backgroundImage = sevent.target.style.backgroundImage.replace("-off.png", "-on.png"); }
else{sevent.target.style.backgroundImage = sevent.target.style.backgroundImage.replace("-on.png", "-off.png");}
}
}

document.querySelector("div").addEventListener('mouseover', (event) => {bigmag(event);}, false);
document.querySelector("div").addEventListener('mouseout', (event) => {bigmag(event);}, false);



function sots(sevent){
//console.log(sevent.target.id ); 
if(sevent.target.id === "objinfo21"){window.open("https://www.facebook.com/europlanetatv");}
else
if(sevent.target.id === "objinfo22"){window.open("https://twitter.com/europlanetatv");}
else
if(sevent.target.id === "objinfo23"){window.open("https://vk.com/id287204942");}
else
if(sevent.target.id === "objinfo1"){window.location = "index.php";}
}

document.querySelector("div").addEventListener('click', (event) => {sots(event);}, false);

/*
function callback(){
document.getElementById("objinfo100").style.visibility="visible";
//document.getElementById("objinfo100").style.display="block";visibility:hidden
return false;
}
function sendcallback(ind){
document.getElementById("objinfo100").style.visibility="hidden";
//document.getElementById("objinfo100").style.display="none";
return false;
}
*/