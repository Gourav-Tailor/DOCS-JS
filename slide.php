<html>
<?php
   include('session.php');
?>
<head>
<script type="text/javascript" src="slide/html2canvas-master/dist/html2canvas.js"></script>
</head>
<style>
#sheet{   position: absolute;
          top: 100px;
          left: 0px;
          width: calc(100% - 20px);
          height: calc(100% - 120px);
          border: 0px solid rgb(200,200,200);
          z-index: 2;
          background-color: rgb(250,250,250);
          overflow: none;
          }
.mainblock{   position: fixed;
          top: 108px;
          right: 10px;
          width: calc(100% - 300px);
          height: 800px;
          border: 1px solid rgb(200,200,200);
          z-index: 2;
          background-color: rgb(200,200,200);
          }
.fullscreen{ 
          width: calc(100% - 18px);
          height: calc(100% - 100px);
          z-index: 3;
          border-style: none;
          background-color: white;
           }
#sbox{ display: none;
       position: absolute;
       width: 270px;
       height: 170px;
       border: 0px solid blue;
       background-color: grey;
       z-index: 1;
     }
#sbox::after{ content: attr(slid); color: black; margin-left: 2px; font-weight: thin; z-index: 2;}
#activeId{ position: absolute; height: 0px; width: 0px;}
toolbar{ position: fixed;
         top: 0px;
         left: 0px;
         height: 100px;
         width: 100%;
         background: grey;
                z-index: 5;}
#bgdes{
        position: absolute;
        right: 0px;
        top: 0px;
        width: 800px;
        height: 100px;
        background-color: lightgrey;
        z-index: 6;
        float: right;
        }
#fontcolors{display: none;
        position: absolute;
        left: 380px;
        top: 100px;
        width: 360px;
        height: 30px;
        background-color: white;
        z-index: 6;
        padding: 10px 10px;
        }
#colors{display: none;
        position: absolute;
        left: 340px;
        top: 100px;
        width: 360px;
        height: 30px;
        background-color: white;
        z-index: 6;
        padding: 10px 10px;
        }
.co1{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: red;}
.co2{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: green;}
.co3{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: yellow;}
.co4{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: skyblue;}
.co5{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: pink;}
.co6{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: white;}
.co7{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: purple;}
.co8{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: black;}
.co9{ width: 40px; height: 30px; border: 2px solid lightgrey; background-color: orange;}
button:active{ border: 2px solid white;}
.tdiv {
  position: absolute;
  right: calc(50% - 400px);
  background-color: none;
  border: 1px dashed grey;
  font-size: 30px;
  padding: 2px;
  cursor: move;
  z-index: 1;
  height: 60px;
  width: 800px;
}

.textarea{ position: relative;
       width: 100%;
       height: 100%;
       font-family: sans-serif;
       font-size: 40px;
       z-index: 1;
       border: 0px;
       resize: none;
       overflow: none;
       background-color: transparent;
       border: 2px dashed transparent; 
}
.textarea:focus{   border: 2px dashed grey; }
.textarea:hover{   border: 2px solid grey; }
.btdiv {
  position: absolute;
  top: 70px;
  right: calc(50% - 400px);
  background-color: none;
  border: 1px dashed grey;
  padding: 2px;
  cursor: move;
  z-index: 1;
  height: calc(100% - 80px);
  width: 800px;
}
#textbtns{
        position: absolute;
        left: 150px;
        top: 10px;
        width: 800px;
        height: 40px;
        background-color: none;
}
.tbold{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-weight: bold; font-size: 22px; border-radius: 5px}
.titalic{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-style: italic; font-size: 22px; border-radius: 5px}
.tuline{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; text-decoration: underline; font-size: 22px; border-radius: 5px}
.tlineth{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; text-decoration: line-through; font-size: 22px; border-radius: 5px}
.tAp{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.tAn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.tAll{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.tAlm{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.tAlr{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}

xbar{ position: fixed;
         top: 100px;
         left: 28px;
         height: 18px;
         width: 2350px;
         background: rgb(200,200,200);
                z-index: 2;
                }
ybar{ position: fixed;
         top: 118px;
         left: 0px;
         height: 2200px;
         width: 28px;
         background: rgb(200,200,200);
                z-index: 2;}  
.divslide {
  position: relative;
  background-color: white;
  width: 240px;
  height: 150px;
  margin: 10px 20px;
  border: 1px solid black;
  float: left bottom;
  z-index: 2;
  overflow: hidden;
  }
  .divslide:active,.divslide:focus{
               outline: none;
               background-color: grey;
               border: 0px solid grey;
               }
.slidee{   position: absolute;
          top: 40px;
          right: 200px;
          width: calc(100% - 470px);
          height: calc(100% - 80px);
          border: 1px solid rgb(200,200,200);
          z-index: 2;
          background-color: white;
          overflow: hidden;
  }
.slidTog{ z-index: 5; }

.dataXY{ position: absolute; left: 2px; bottom: 5px; font-size: 15px; width: 5%; height: 25px; border: 1px solid lightgrey;}
.dataXY:disabled { font-size: 20px; color: red; font-weight: thin; text-align: center; user-select: none;}

#slibtns{
        position: absolute;
        left: 150px;
        top: 55px;
        width: 800px;
        height: 40px;
        background-color: none;
}
.crossbtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.slidebtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.textareabtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.bigtextareabtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.colorbtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px}
.focolorbtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px; color: blue;}
.setTimebtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px; color: black;}
.clearTimebtn{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 18px; border-radius: 5px; color: black;}
.save{ position: absolute; left: 0px; margin: 25px 0px; width: 150px;}

.des0{  width: 100px; height: 80px; border: 2px solid grey; background-image: none; font-size: 18px; border-radius: 5px; margin: 10px 10px; background-color: white;}
.des1{  width: 100px; height: 80px; border: 2px solid grey; background-image: linear-gradient(to bottom, white,skyblue); font-size: 18px; border-radius: 5px; margin: 10px 10px;}
.des2{width: 100px; height: 80px; border: 2px solid grey; background-image: linear-gradient(to bottom, white,lightpink); font-size: 18px; border-radius: 5px; margin: 10px 10px;}
.des3{  width: 100px; height: 80px; border: 2px solid grey; background-image: linear-gradient(to right, white,blue); font-size: 18px; border-radius: 5px; margin: 10px 10px; }
.des4{  width: 100px; height: 80px; border: 2px solid grey; background-image: linear-gradient(to right, white,violet); font-size: 18px; border-radius: 5px; margin: 10px 10px; }
.des5{  width: 100px; height: 80px; border: 2px solid grey; background-image: linear-gradient(to left,white,brown); font-size: 18px; border-radius: 5px; margin: 10px 10px; }

</style>



<div id="sbox"></div>
<div id="activeId"></div>
<toolbar>
<div id="colors"><button class="co1" clr="red" onclick="colorCheck(this)"><button class="co2" clr="green" onclick="colorCheck(this)"><button class="co3" clr="yellow" onclick="colorCheck(this)"><button class="co4" clr="skyblue" onclick="colorCheck(this)"><button class="co5" clr="pink" onclick="colorCheck(this)"><button class="co6" clr="white" onclick="colorCheck(this)"><button class="co7" clr="purple" onclick="colorCheck(this)"><button class="co8" clr="black" onclick="colorCheck(this)"><button class="co9" clr="orange" onclick="colorCheck(this)"></div>

<div id="fontcolors"><button class="co1" clr="red" onclick="focolorCheck(this)"><button class="co2" clr="green" onclick="focolorCheck(this)"><button class="co3" clr="yellow" onclick="focolorCheck(this)"><button class="co4" clr="skyblue" onclick="focolorCheck(this)"><button class="co5" clr="pink" onclick="focolorCheck(this)"><button class="co6" clr="white" onclick="focolorCheck(this)"><button class="co7" clr="purple" onclick="focolorCheck(this)"><button class="co8" clr="black" onclick="focolorCheck(this)"><button class="co9" clr="orange" onclick="focolorCheck(this)"></div>

<div id="textbtns">
<button class="tbold" onclick="boldText(this)">B</button><button onclick="italicText(this)" class="titalic">i</button><button onclick="ulineText(this)" class="tuline">U</button><button onclick="linethText(this)" class="tlineth">s</button>
<button onclick="AnText(this)" class="tAn">-A</button><button onclick="ApText(this)" class="tAp">A+</button>
<button onclick="AllText(this)" class="tAll">&#8612;</button><button onclick="AlmText(this)" class="tAlm">&harr;</button><button onclick="AlrText(this)" class="tAlr">&#8614;</button>
</div>
<input id="dataXY" class="dataXY" onclick="" value="Slides:0" disabled>

<div id="slibtns">
<button class="crossbtn" onclick="crossBtn()">&#9688;</button><button class="slidebtn" onclick="newslide();textArea();bigtextArea()">&#9703;</button><button class="textareabtn" onclick="textArea()">[H]</button><button class="bigtextareabtn" onclick="bigtextArea()">[t]</button>
<button class="colorbtn" onclick="ColorBox()">&#9744;</button><button class="focolorbtn" onclick="FoColorBox()"><b>T</b></button><button class="setTimebtn" onclick="slideSetTime()"><b>&#8858;</b></button><button class="clearTimebtn" onclick="slideClearTime()"><b>&#10679;</b></button>
</div>

<div id="bgdes"><button class="des0" onclick="bgdesg(this)" clr="none"><button class="des1" onclick="bgdesg(this)" clr="linear-gradient(to bottom, white,skyblue)"><button class="des2" onclick="bgdesg(this)" clr="linear-gradient(to bottom, white,lightpink)"><button class="des3" onclick="bgdesg(this)" clr="linear-gradient(to right, white,blue)"><button class="des4" onclick="bgdesg(this)" clr="linear-gradient(to right, white,violet)"><button class="des5" onclick="bgdesg(this)" clr="linear-gradient(to left, white,brown)">
</div>

<form action="slide-upload.php" method="POST" onsubmit="addData()" autocomplete="off">
<input type="hidden" name="source" id="source">
<button id="save" name="submit" style="background-color:green;color:white">Save</button>
<input id="fname" name="fname" class="save" value="filename">
</form>
</toolbar>

<body id="sheet" onload="newslide();textArea();bigtextArea()">
</body>
<div id="mainblock" class="mainblock"></div>






<script>
document.oncontextmenu = function() {
  return false;
};


var slno = 1; 
function newslide(){
  var inpt = document.createElement("div");
  inpt.setAttribute("id", ("i"+slno)); inpt.setAttribute("sid", slno);  inpt.setAttribute("class", "divslide"); inpt.setAttribute("onclick", "sboxFunc(this)");
  document.body.appendChild(inpt);
  
  var sbox = document.getElementById("sbox");
                    sbox.setAttribute("slid", slno);
                    sbox.style.display = "block";
                    sbox.style.left = 0 + "px";
                    sbox.style.top = (slno-1)*162 + "px";
  var slidee = document.createElement("div");
  slidee.setAttribute("id", slno);  slidee.setAttribute("class", "slidee"); slidee.setAttribute("onclick", "ImgSlide(this)");
  document.getElementById("mainblock").appendChild(slidee);
  
  document.getElementById(slno).style.zIndex = "5";
  if(slno !== 1){for(ii=1;ii<slno;ii++){ if(document.getElementById(ii).style.zIndex !== "2") {document.getElementById(ii).style.zIndex = "2"; } }}
  
  slno += 1;
  document.getElementById('dataXY').value = "Slides:" + (slno-1);
}
 function screenshot(elmnt,can){
    html2canvas(elmnt).then(function(canvas) {
    canvas.style.width = "240",canvas.style.height = "150";
    can.innerHTML = "";
    canvas.setAttribute("id","can" + elmnt.getAttribute("id"));
    can.appendChild(canvas);
   });
  }
function sboxFunc(elmnt){ sid = elmnt.getAttribute("sid");
                    var sbox = document.getElementById("sbox");
                    sbox.setAttribute("slid", sid);
                    sbox.style.display = "block";
                    sbox.style.left = 0 + "px";
                    sbox.style.top = (sid-1)*162 + "px";
                    var slidee = document.getElementById(sid);
                    for(ii=1;ii<slno;ii++){ document.getElementById(ii).style.zIndex = "2"; }
                    slidee.style.zIndex = "5";
}

function ImgSlide(elmnt){
        var temp1 = elmnt.getAttribute("id");
        var canvas = document.getElementById(("i"+temp1));
        screenshot(elmnt,canvas);                                                      //screen shot of slide to left canvases
}

function draggElem(delement){
dragElement(document.getElementById(delement));
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    document.onmouseup = null;
    document.onmousemove = null;
  }
}}

var idno = 10000;

function textArea(){
  var inpt = document.createElement("div");
  inpt.setAttribute("id",idno); inpt.setAttribute("class","tdiv");
    var tex = document.createElement("div");
    tex.setAttribute("id","a"+idno); tex.setAttribute("contenteditable","true"); tex.setAttribute("onclick","getId(this)"),tex.setAttribute("class","textarea");
    tex.textConent = "Click Here To Add";
    inpt.appendChild(tex);
  var sbox = document.getElementById("sbox");
  var id = 0;
  id = sbox.getAttribute("slid");
  document.getElementById(id).appendChild(inpt);
  draggElem(idno);
  idno += 1;
}
function bigtextArea(){
  var inpt = document.createElement("div");
  inpt.setAttribute("id",idno); inpt.setAttribute("class","btdiv");
    var tex = document.createElement("div");
    tex.setAttribute("id","a"+idno); tex.setAttribute("contenteditable","true"); tex.setAttribute("onclick","getId(this)"),tex.setAttribute("class","textarea");
    tex.textConent = "Click Here To Add";
    inpt.appendChild(tex);
  var sbox = document.getElementById("sbox");
  var id = 0;
  id = sbox.getAttribute("slid");
  document.getElementById(id).appendChild(inpt);
  draggElem(idno);
  idno += 1;
}

function nextFocus(){     
var inputs = document.querySelectorAll("input,select");

for (var i = 0 ; i < inputs.length; i++) {
   inputs[i].addEventListener("keypress", function(e){
      if (e.which == 13) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex + 1) + '"]');
         if (nextInput.length === 0) {
            nextInput = document.querySelectorAll('[tabIndex="1"]');
         }
         nextInput[0].focus();
      }
      
   })
}

}

function crossBtn(){ 
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
  temp2 = temp1.replace("a","");
document.getElementById(temp1).remove();
document.getElementById(temp2).remove();
 }

function getId(elmnt){ var sboxv = document.getElementById("activeId");
                       var actId = elmnt.getAttribute("id");
                       sboxv.setAttribute("actId",actId);
                       var res = actId.substr(1);
                       document.getElementById(res).style.borderWidth = "0px";

 }
function colorCheck(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("slid");
var inputbox = document.getElementById(temp1);
document.getElementById("i" + temp1).style.backgroundColor = cbtn.getAttribute("clr");
inputbox.style.backgroundColor = cbtn.getAttribute("clr");
 }
 
function focolorCheck(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
inputbox.style.color = cbtn.getAttribute("clr");
 }

function ColorBox(){ var x = document.getElementById("colors");
if (x.style.display !== "block") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
         }                     
 }
function FoColorBox(){ var x = document.getElementById("fontcolors");
if (x.style.display !== "block") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
         }                     
 }
function bgdesg(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("slid");
var inputbox = document.getElementById(temp1);
document.getElementById("i"+temp1).style.backgroundImage = cbtn.getAttribute("clr");
inputbox.style.backgroundImage = cbtn.getAttribute("clr");
}

function boldText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontWeight !== "bold") {
    inputbox.style.fontWeight = "bold";
  } else {
    inputbox.style.fontWeight = "normal";
         }
 }
 
function italicText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontStyle !== "italic") {
    inputbox.style.fontStyle = "italic";
  } else {
    inputbox.style.fontStyle = "normal";
         }
 }

function ulineText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textDecoration !== "underline") {
    inputbox.style.textDecoration = "underline";
  } else {
    inputbox.style.textDecoration = "none";
         }
 }
function linethText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textDecoration !== "line-through") {
    inputbox.style.textDecoration = "line-through";
  } else {
    inputbox.style.textDecoration = "none";
         }
 }
 
function ApText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontSize !== "45px") {
    inputbox.style.fontSize = "45px";
  } else {
    inputbox.style.fontSize = "40px";
         }
 }

function AnText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontSize !== "30px") {
    inputbox.style.fontSize = "30px";
  } else {
    inputbox.style.fontSize = "40px";
         }
 }
function AllText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textAlign !== "left") {
    inputbox.style.textAlign = "left";
  } else {
    inputbox.style.textAlign = "left";
         }
 }
function AlmText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textAlign !== "center") {
    inputbox.style.textAlign = "center";
  } else {
    inputbox.style.textAlign = "left";
         }
 }
function AlrText(cbtn){
var sboxv = document.getElementById("activeId");
var temp1;
  temp1 = sboxv.getAttribute("actId");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textAlign !== "right") {
    inputbox.style.textAlign = "right";
  } else {
    inputbox.style.textAlign = "left";
         }
 }
 
window.addEventListener("keydown", function(e){
var sbox = document.getElementById("sbox");
var temp1;
  temp1 = parseInt(sbox.getAttribute("slid"));
   if(temp1 < (slno - 1) && temp1 >= 1){
      if (e.which == 40) {
         e.preventDefault();
                    sbox.setAttribute("slid",temp1 + 1);
                    sbox.style.display = "block";
                    sbox.style.right = 5 + "px";
                    sbox.style.top = (temp1)*162 + "px";
                   var slidee = document.getElementById(temp1 + 1);
                    for(ii=1;ii<slno-1;ii++){ document.getElementById(ii).style.zIndex = "2"; }
                    slidee.style.zIndex = "5";
      }}
      
   })
function slidetSet(){ 
var sbox = document.getElementById("sbox");
var temp1;
  temp1 = parseInt(sbox.getAttribute("slid"));
   if(temp1 < (slno - 1) && temp1 >= 1){
                    sbox.setAttribute("slid",temp1 + 1);
                    sbox.style.display = "block";
                    sbox.style.right = 5 + "px";
                    sbox.style.top = (temp1)*160 + "px";
                   var slidee = document.getElementById(temp1 + 1);
                    for(ii=1;ii<slno-1;ii++){ document.getElementById(ii).style.zIndex = "2"; }
                    slidee.style.zIndex = "5";
                    }
}
var timeDomain = 0;
function slideSetTime(){ timeDomain = setInterval(slidetSet,2000); document.getElementById("mainblock").classList.add("fullscreen");}
function slideClearTime(){ clearInterval(timeDomain); document.getElementById("mainblock").classList.remove("fullscreen");}

function addData(){ var t = [];
                     for(i=1;i<slno;i++){
                      t.push(document.getElementById("can"+i).toDataURL('image/png'));
                      }
                      document.getElementById('source').value = t.join("@");
}

</script>
</body>
</html>
