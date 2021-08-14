<?php
error_reporting(0);
   include('session.php');
  
?>
<html>
<style>
#sheet{   position: absolute;
          top: 110px;
          left: 20px;
          width: 2350px;
          height: 2200px;
          border: 2px solid;
          z-index: 1;
          background-color: white;
          }
#sbox{ position: absolute;
       height: 20px;
       width: 88px;
       border: 2px solid blue;
       background-color: none;
       z-index: 1;
     }
#sbox.resizing {
  cursor: col-resize;
}
#sboxdot{ position: absolute;
       bottom: -4px;
       right: -4px;
       height: 8px;
       width: 8px;
       background-color: blue;
       z-index: 10;
       cursor: crosshair;
     }
#xbox{ position: absolute;
       height: 14px;
       width: 90px;
       border: 2px solid red;
       left: 0px;
       font-size: 15px;
       text-align: center;
       color: white;
       font-weight: bold;
       background-color: red;
       user-select: none;
     }
#ybox{position: absolute;
       height: 22px;
       width: 24px;
       border: 2px solid red;
       top: 0px;
       font-size: 15px;
       text-align: center;
       color: white;
       font-weight: bold;
       background-color: red;
       user-select: none;
     }

toolbar{ position: fixed;
         top: 0px;
         left: 0px;
         height: 100px;
         width: 100%;
         background: grey;
                z-index: 5;}
#colors{display: none;
        position: absolute;
        left: 430px;
        top: 60px;
        width: 360px;
        height: 32px;
        background-color: white;
        z-index: 6;
        padding: 10px 10px;
        border: 1px solid lightgrey;
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

#textbtns{
        position: absolute;
        left: 150px;
        top: 20px;
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
.tBor{ width: 45px; height: 40px; border: 2px solid grey; background-color: lightgrey; font-size: 22px; border-radius: 5px}
.tCo{ width: 45px; height: 40px; border: 2px solid grey; background-image: repeating-radial-gradient(red,yellow); font-size: 22px; border-radius: 5px}

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

       
.divi {
  font-size: 12px;
  background-color: none;
  width: 90px;
  height: 22px;
  border: 1px solid lightgrey;
  border-radius: 0px;
    text-align: left;
    z-index: 1;
    cursor: default;
  }

.dataXY{ position: absolute; left: 2px; bottom: 5px; font-size: 15px; width: 5%; height: 25px; border: 1px solid lightgrey;}
.dataXY:disabled { font-size: 20px; color: red; font-weight: bold; text-align: center; user-select: none;}

.crossbtn{position: absolute; left: 120px; bottom: 5px; width: 24px; height: 24px; background-color: white; font-size: 18px; text-align: center; border-radius: 12px; font-family: sans-serif; color: grey;}
.crossbtn:hover{background-color: orange; color: white; user-select: none; cursor: default;  }
.biginput{
  position: absolute;
  left: 150px;
  bottom: 5px;
  font-size: 15px;
  background-color: white;
  width: calc(100% - 150px);
  height: 25px;
  border-style: solid;
  border-width: 1px;
  border-color: lightgrey;
  letter-spacing: 0px;
  border-radius: 0px;
    text-align: left;
  }
  .biginput:active,:focus{ outline: none; box-shadow: 0 0 0 0 white;  }
#submit{ width: 60px; height: 40px; border: 2px solid grey;background-color: green; color: white; font-size: 15px; border-radius: 5px; margin: 20px 10px;}
.save{ position: absolute; right: 0px; margin: 10px 10px; }
#context-menu {
  position: absolute;
  z-index:2;
  width: 200px;
  background: white;
  border: 1px ridge grey;
  border-radius:5px;
  padding-top: 20px;
  padding-bottom: 20px;
  transform:scale(0);
  transform-origin:top left;
    cursor: default;
    user-select: none;
}
#context-menu.active {
  transform:scale(1);
  transition:transform 1ms ease-in-out;
}
#context-menu .item {
  padding:8px 10px;
  font-size:15px;
  color: black;
  
}
#context-menu .item:hover {
  background: rgb(220,220,220);
}
#context-menu .item i {
  display:inline-block;
  margin-right:5px;
}
#context-menu hr {
  border-color: gray;
}
::selection { color: white; background: black; }
</style>



<div id="sbox"><div id="sboxdot" intial="1"></div></div>
<div id="context-menu">
    <div class="item" onclick="deleteBtn()"><a>Delete</a></div>
    <div class="item" onclick="pasteBtn()"><a>Paste</a></div>
    <div class="item" onclick="copyBtn()"><a>Copy</a></div>
        <hr style="width:50%;border-color:gray">
    <div class="item" onclick="fsum()"><a>Sum</a></div>
    <div class="item" onclick="fsort()"><a>Sort</a></div>
        <div class="item" onclick="fmin()"><a>Minimum</a></div>
            <div class="item" onclick="fmax()"><a>Maximum</a></div>
    
</div>
<toolbar>


<div id="colors"><button class="co1" clr="red" onclick="colorCheck(this)"><button class="co2" clr="green" onclick="colorCheck(this)"><button class="co3" clr="yellow" onclick="colorCheck(this)"><button class="co4" clr="skyblue" onclick="colorCheck(this)"><button class="co5" clr="pink" onclick="colorCheck(this)"><button class="co6" clr="white" onclick="colorCheck(this)"><button class="co7" clr="purple" onclick="colorCheck(this)"><button class="co8" clr="black" onclick="colorCheck(this)"><button class="co9" clr="orange" onclick="colorCheck(this)"></div>

<div id="textbtns">
<button class="tbold" onclick="boldText(this)">B</button><button onclick="italicText(this)" class="titalic">i</button><button onclick="ulineText(this)" class="tuline">U</button><button onclick="linethText(this)" class="tlineth">ab</button>
<button onclick="AnText(this)" class="tAn"><sup>-</sup>A</button><button onclick="ApText(this)" class="tAp">A<sup>+</sup></button>
<button onclick="BorText(this)" class="tBor"><b>&#9744;</b></button>
<button onclick="ColorBox()" class="tCo">&#9744;</button>
</div>
<input id="dataXY" class="dataXY" onclick="" value="A1" disabled>
<div class="crossbtn" onclick="crossBtn()">X</div>
<input id="biginput" class="biginput" onclick="bigInput(this)" onkeyup="bigInput(this)">

<form method="POST" action="sheet-upload.php" onsubmit="addData()" autocomplete="off">
<button id="submit" >save</button>
<input id="fname" name="fname" class="save" value="filename">
<input id="dataSource" type="hidden" name="dataSource">
</toolbar>

<xbar><div id="xbox">A</div></xbar>
<ybar><div id="ybox">1</div></ybar>

<body id="sheet" onload="sheetinp()" onclick="showCoords(event)">
</body>

<script>
document.body.addEventListener("contextmenu",function(event){
  event.preventDefault();
  var contextElement = document.getElementById("context-menu");
  if(event.clientY > 110 && event.clientY > 20){
  contextElement.style.top = event.clientY - 110 + "px";
  contextElement.style.left = event.clientX - 20 + "px";
  contextElement.classList.add("active"); }
});

document.getElementById("sheet").addEventListener("click",function(){
  document.getElementById("context-menu").classList.remove("active");
});


function inputij(i,j) {
  var inpt = document.createElement("input");
  var temp;
  temp = i + ((j-1)*100);
  inpt.setAttribute("id", temp); inpt.setAttribute("name",temp); inpt.setAttribute("idl", i);   inpt.setAttribute("class", "divi");   inpt.setAttribute("value","");
  inpt.setAttribute("tabindex",temp); inpt.setAttribute("onkeydown","nextFocus();mathCalc(event);"); inpt.setAttribute("onclick","xyid(this);intialSize()"); inpt.setAttribute("onkeyup","xyid(this)");
  document.body.appendChild(inpt);
}
function sheetinp(){   
                       for(i=1;i<=100;i++){
                                             for(j=1;j<=26;j++){inputij(i,j);}
                                               var brk = document.createElement("br");
                                                 document.body.appendChild(brk);
                             }
}

function nextFocus(){     
var inputs = document.querySelectorAll("input,select");

for (var i = 0 ; i < inputs.length; i++) {
   inputs[i].addEventListener("keypress", function(e){
      if (e.which == 13) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex + 1) + '"]');
         nextInput[0].focus();
         var temp = 0;   
      }
      
   })
   inputs[i].addEventListener("keydown", function(e){
      if (e.which == 40) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex + 1) + '"]');
         
         nextInput[0].focus();
      }
      if (e.which == 38) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex - 1) + '"]');
         
         nextInput[0].focus();
      }
      if (e.which == 39) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex + 100) + '"]');
         
         nextInput[0].focus();
      }
      if (e.which == 37) {
         e.preventDefault();
         var nextInput = document.querySelectorAll('[tabIndex="' + (this.tabIndex - 100) + '"]');
         
         nextInput[0].focus();
      }
      
   }) 
   

}
}

function mathCalc(event){     
  var x = event.keyCode;
  var y = String.fromCharCode(x);
  var sboxv = document.getElementById("sbox");
  var temp1;
  temp1 = sboxv.getAttribute("intial");
  var inputbox = document.getElementById(temp1);

  if(x == 61){ inputbox.style.color = "blue"; inputbox.style.textTransform = "uppercase"; inputbox.setAttribute("cal","1");}
  if(x == 13){ if(inputbox.getAttribute("cal") == "1"){ inputbox.style.color = "black"; inputbox.style.textTransform = "lowercase"; inputbox.value = eval(inputbox.value.substr(1));} }
  
}
function xyid(elmt){
var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z']; 
                       var tind = elmt.getAttribute('tabindex');
                       var i = elmt.getAttribute('idl');;
                       j = (tind - i) / 100 + 1;

var bigi = document.getElementById('biginput');
bigi.value = elmt.value;


var sbox = document.getElementById('sbox');
sbox.style.left = (j-1)*90 + "px";
sbox.style.top = (i-1)*22 + "px";
sbox.style.borderColor = "blue"; sbox.style.background = "none";  sbox.style.opacity = "1";
sbox.setAttribute("intial", tind);

document.getElementById('xbox').innerHTML = alpha[j-1];
document.getElementById('ybox').innerHTML = i;
document.getElementById('dataXY').value = alpha[j-1] + i;


document.getElementById('xbox').style.left = (j-1)*90 + "px";
document.getElementById('ybox').style.top =  (i-1)*22 + "px";

}
function dataXY(elmnt){
var alpha = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
var str = elmnt.value.toLocaleUpperCase();
var arr = str.split("");
var sbox = document.getElementById('sbox');
var j = alpha.indexOf(arr[0]), i = parseInt(str.slice(1,2));
elmnt.addEventListener("keyup",function(event){ if(event.keyCode === 13) {
event.preventDefault(); 
sbox.style.left = (j)*90 + "px";
sbox.style.top = (i)*22 + "px";}
});
 }
function crossBtn(){ 
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
bigi.value = "";
inputbox.value = "";
 }
function bigInput(elmnt){ 
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
inputbox.value = elmnt.value;
 }
function intialSize(){ 
  sboxz = document.getElementById('sbox');
  sboxz.style.height = "20px";
  sboxz.style.width = "88px";
  }

let dragging = 0, pointin = [0,0];
  sboxz = document.getElementById('sbox'),
  target = document.getElementById('sboxdot');

function clearJSEvents() {
  dragging = 0;
  document.body.removeEventListener("mousemove", resize);
}

function resize(e) {
 sboxz.style.setProperty("width", 90*parseInt((e.clientX - pointin[0] )/ 88) + 88 + 'px');
 sboxz.style.setProperty("height", 22*parseInt((e.clientY - pointin[1] )/ 20) + 20 + 'px');
  sboxz.style.borderColor = "pink";  sboxz.style.background = "grey";  sboxz.style.opacity = "0.5";
}

target.onmousedown = function(e) {
  dragging = 1; pointin[0] = event.clientX; pointin[1] = event.clientY;
  document.body.addEventListener('mousemove', resize);
};

document.onmouseup = function() {
  dragging ? clearJSEvents() : '';
};


function colorCheck(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
inputbox.style.backgroundColor = cbtn.getAttribute("clr");
fcolor(cbtn);
 }

function ColorBox(){ var x = document.getElementById("colors");
if (x.style.display !== "block") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
         }
                         
 }
function boldText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontWeight !== "bold") {
    inputbox.style.fontWeight = "bold";
  } else {
    inputbox.style.fontWeight = "normal";
         }
 }
 
function italicText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontStyle !== "italic") {
    inputbox.style.fontStyle = "italic";
  } else {
    inputbox.style.fontStyle = "normal";
         }
 }

function ulineText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textDecoration !== "underline") {
    inputbox.style.textDecoration = "underline";
  } else {
    inputbox.style.textDecoration = "none";
         }
 }
function linethText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.textDecoration !== "line-through") {
    inputbox.style.textDecoration = "line-through";
  } else {
    inputbox.style.textDecoration = "none";
         }
 }
 
function ApText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontSize !== "15px") {
    inputbox.style.fontSize = "15px";
  } else {
    inputbox.style.fontSize = "12px";
         }
 }

function AnText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.fontSize !== "10px") {
    inputbox.style.fontSize = "10px";
  } else {
    inputbox.style.fontSize = "12px";
         }
 }
function BorText(cbtn){
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
if (inputbox.style.border !== "2px solid black") {
    inputbox.style.border = "2px solid black";
  } else {
    inputbox.style.border = "1px solid lightgrey";
         }
 }
function deleteBtn(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height; wdt = sboxv.style.width;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); m = parseInt(wdt.split("p")[0]/ 88);
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);


for(j=0;j<m;j++){ for(i=0;i<n;i++){ document.getElementById(parseInt(temp1) + i + 100*j).value = "";}}
 }

function copyBtn(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
bigi.setAttribute("copydata",bigi.value);
 }
 
function pasteBtn(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox");
var temp1;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);
bigi.value = bigi.getAttribute("copydata");
inputbox.value = bigi.getAttribute("copydata");
 }
function fcolor(cbtn){
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height; wdt = sboxv.style.width;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); m = parseInt(wdt.split("p")[0]/ 88);
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);

for(j=0;j<m;j++){ for(i=0;i<n;i++){ document.getElementById(parseInt(temp1) + i + 100*j).style.backgroundColor = cbtn.getAttribute("clr");}}

 }

function fsum(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); sum = 0;
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);

for(i=0;i<n;i++){ sum += parseInt(document.getElementById(parseInt(temp1) + i).value);}

bigi.value = sum;
document.getElementById(parseInt(temp1) + n).value = sum;
 }

function fsort(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); sum = 0; arr = [];
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);

for(i=0;i<n;i++){ arr[i] = parseInt(document.getElementById(parseInt(temp1) + i).value);}
arr.sort(function(a,b){ return a-b;});
for(i=0;i<n;i++){ document.getElementById(parseInt(temp1) + i).value = arr[i];}

 }
function fmin(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); sum = 0; arr = [];
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);

for(i=0;i<n;i++){ arr[i] = parseInt(document.getElementById(parseInt(temp1) + i).value);}
var k = arr.reduce((a,b,i) => a[0] > b ? [b,i] : a,[Number.MAX_VALUE,-1]);
document.getElementById(parseInt(temp1) + k[1]).style.backgroundColor = "rgb(255,153,102)";

 }
function fmax(){
var bigi = document.getElementById('biginput');
var sboxv = document.getElementById("sbox"); hgt = sboxv.style.height;
var temp1; n = parseInt(hgt.split("p")[0]/ 20); sum = 0; arr = [];
  temp1 = sboxv.getAttribute("intial");
var inputbox = document.getElementById(temp1);

for(i=0;i<n;i++){ arr[i] = parseInt(document.getElementById(parseInt(temp1) + i).value);}
var k = arr.reduce((a,b,i) => a[0] < b ? [b,i] : a,[Number.MIN_VALUE,-1]);
document.getElementById(parseInt(temp1) + k[1]).style.backgroundColor = "rgb(255,153,102)";

 }
 
function addData(){ 
document.getElementById("dataSource").value += "<style>table{border-collapse: collapse;width: 100%;}td{border: 1px solid white;text-align: left;padding: 0px 4px; font-size: 10px;}</style><table>";
                           for(i=1;i<=100;i++){
                    for(j=1;j<=26;j++){var inptboxs = document.getElementById((i + ((j-1)*100)));
                               if(j === 1){document.getElementById("dataSource").value += "<tr><td style='background:"+ inptboxs.style.backgroundColor +"'>"+ inptboxs.value + "</td>";}
                               if(j === 26){document.getElementById("dataSource").value += "<td style='background:"+ inptboxs.style.backgroundColor +"'>"+ inptboxs.value + "</td></tr>";}
                               else{ document.getElementById("dataSource").value += "<td style='background:"+ inptboxs.style.backgroundColor +"'>"+ inptboxs.value + "</td>"; }
                                                     }
                             }
                     document.getElementById("dataSource").value += "</table>";
}

</script>
</form>
</html>
