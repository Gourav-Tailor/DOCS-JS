<?php
error_reporting(0);
   include('session.php');
  
?>
<html>
<style>
body{ background: rgb(240,240,240); }
#toolbar{ position: fixed;
         top: 0px;
         left: 0px;
         height: 150px;
         width: 100%;
         background: white;
                z-index: 5;}
.butarea{ position: absolute;
         padding: 2px;
        bottom: 10px;
        width: 1200px;
        left: calc(50% - 600px);
        height: 44px;
        background: white;
        border: 1px solid lightgrey;
}
.btn{position: relative; width: 40px; height: 40px; background: white; border: 1px solid grey; margin-left: 5px; float: left; background: grey;}
.btn:active,:focus{ border: 1px solid white; }

#sheet{   position: absolute;
          top: 210px;
          left: calc(50% - 508px);
          padding: 20px;
          width: 1000px;
          height: auto;
          border: 1px solid rgb(200,200,200);
          z-index: 2;
          background-color: white;
          box-shadow:0 0 3px 1px rgb(210,210,210);
          }
.textbox{   position: relative;
          padding-top: 10px;
          margin-top: 5px;
          width: 100%;
          min-height: 40px;
          border: 1px solid white;
          background-color: white;
          font-family: normal;
          outline: none;
          word-wrap: break-word;
}
.textbox:active,:focus{ background-color: rgb(240,240,240); border: 1px solid grey;}
.inbox{   position: relative;
          padding-top: 10px;
          margin-top: 5px;
          width: 100%;
          min-height: 30px;
          border-width: 1px 1px 1px 4px;
          border-style: solid;
          border-color: white;
          background-color: white;
          text-decoration: none;
          overflow: auto;
}
.inbox:hover,:active,:focus{ border-color: green;}

.ref{ position: relative;
      float: left;
      left: 10px;
       top: 25%;
      width: 140px;
      height: 50%;
      border: none;
      color: blue;
      text-align: center;
      font-size: 15px;
      
}
.inpt{ position: relative;
       margin-bottom: 10px;
       top: 5%;
       padding: 2px;
       right: 20px;
       float: right;
      width: 800px;
      border: none;
      font-weight: thin;
      color: green;
      font-size: 15px;
      background: rgb(240,240,240);
      font-family: monospace,courier;
      word-wrap: break-word;
      outline: none;
      box-shadow:0 0 2px 1px rgb(180,180,180);
}
.oubox{   position: relative;
          padding-top: 10px;
          margin-top: 5px;
          width: 100%;
          height: 100px;
          background-color: white;

}
.expand{ position: absolute;
       padding: 2px;
       left: 20px;
       top: 10px;
      width: calc(100% - 850px);
      height: calc(100% - 20px);
      outline: none;
 }
.expand:hover {background: rgb(220,220,220); border: 1px solid rgb(200,200,200);}
.result{ position: absolute;
       padding: 2px;
       right: 20px;
       top: 10px;
      width: 800px;
      height: calc(100% - 20px);
      border: 1px solid rgb(200,200,200);
      overflow: hidden;
      outline: none;
}
.save{ position: absolute; left: 0px; margin: 25px 0px; width: 150px;}
p{line-height: 5px;}
</style>

<body>


<div id="toolbar">
<form action="notebook-upload.php" method="POST" onsubmit="addData()" autocomplete="off">
<input type="hidden" name="source" id="source">
<button id="save" name="submit" style="background-color:green;color:white">Save</button>
<input id="fname" name="fname" class="save" value="filename">
</form>
               <div class="butarea">
                                   <div class="btn" onclick="cell();" title="append cell to last cell">cel</div>
                                   <div class="btn" onclick="textbox();" title="append textbox to last cell">tex</div>
                                   <div id="dellcell" class="btn" onclick="delcell(this);" id_name="" title="no cell avail">Del</div>
                  </div>
 </div>

<div id="sheet">

</div>

</body>
<script>
var i = 1;
function delcell(elmnt){ document.getElementById(elmnt.getAttribute("id_name")).remove();
                         document.getElementById("outbox" + elmnt.getAttribute("id_name")).remove();
                    }
                    
function textbox(){  var box = document.createElement("div");
                      box.setAttribute("class", "textbox"),box.setAttribute("contenteditable", "true"),box.setAttribute("spellcheck", "false"),box.setAttribute("onclick", "deltextbox(this)"),box.setAttribute("title", "press delete to remove whole box");
                      box.innerHTML = "<p style='font-size:20px;'><b>###Heading</b></p> <p style='font-size:15px;'>##Descriptions and content details!</p>";
 document.getElementById("sheet").appendChild(box);
}

function deltextbox(emnt){ 
      emnt.addEventListener("keydown", function(e){                
      if (e.which == 46) {
         e.preventDefault();
         emnt.remove();
        }
   });
    }
    
function cell(){
 var inbox = document.createElement("div"),
     ref = document.createElement("div"),
     inpt = document.createElement("div"),
     expand = document.createElement("div"),
     oubox = document.createElement("div"),
     frame = document.createElement("iframe");
     
     inbox.setAttribute("class","inbox"), inbox.setAttribute("id", i);
     ref.setAttribute("class","ref");
     ref.innerHTML = "cell [ "+ i +" ]";
     inpt.setAttribute("class","inpt"), inpt.setAttribute("id","in" + i), inpt.setAttribute("cellno",i), inpt.setAttribute("contenteditable","true"), inpt.setAttribute("spellcheck","false"),
     inpt.setAttribute("onclick","runcell(this)"),inpt.setAttribute("title","Click Tab to run");
     oubox.setAttribute("class","oubox"), oubox.setAttribute("id","outbox" + i);
     expand.setAttribute("class","expand"), expand.setAttribute("oid",i), expand.setAttribute("ondblclick","expandoutput(this)"),expand.setAttribute("title","click | doubleclick expand");
     frame.setAttribute("class","result"), frame.setAttribute("id","out" + i);
     
     inbox.appendChild(ref), inbox.appendChild(inpt);
     oubox.appendChild(expand), oubox.appendChild(frame);
     document.getElementById("sheet").appendChild(inbox), document.getElementById("sheet").appendChild(oubox);
 i++;
};

function runcell(elmt){
      var lot = [ "def ",";", "{", "}",",","(",")","[","]"],
          obj = { "def ": "function ",";" : ";<br>", "{": "{<br>", "}":"}<br>", ",":",<br>"} ;
      
      var js=elmt, i_new = elmt.getAttribute('cellno'),
        output=document.getElementById("out" + i_new),
        fill=function(){
            var document=output.contentDocument;
            document.body.innerHTML = "<div id='display'></div>";
            var script=document.createElement("script");
            script.setAttribute("async","");
            
                        libinsert(document,"notebook/lib/functions.js");
      script.innerHTML = ("try{"+ js.textContent +"}catch(err){document.getElementById('display').innerHTML = '<p><b>Cell Tracepass:</b></p>' + err.message;}").replace(/def /g,function (x){ return obj[x]; });
            

             
            document.body.appendChild(script);
            
        };
           
document.getElementById("dellcell").setAttribute("id_name",i_new);
document.getElementById("dellcell").setAttribute("title","delete cell: " + i_new);
      
        
js.addEventListener("keydown", function(e){                     //Tab for run Cell
      if (e.which == 9) {
         e.preventDefault();
         fill();
        }
   });

}

function libinsert(a,l){
    
    var lib = a.createElement("script");
    lib.setAttribute("src",l), lib.setAttribute("async","");
    a.head.appendChild(lib);
    
}

function expandoutput(e){
var i = e.getAttribute("oid");
var fram = document.getElementById("out" + i);
var inputbox = document.getElementById("outbox" + i);
var temp = resizefram(fram) + "px";

if (inputbox.style.height !== temp) {
    inputbox.style.height = temp;
  } else {
    inputbox.style.height = "100px";
         }
 }

function resizefram(obj){ var temp =  obj.contentWindow.document.documentElement.scrollHeight;
                             return temp;
 }
 

function addData(){
                     document.getElementById('source').value = document.getElementById('sheet').innerHTML.replace(/contenteditable|ondblclick|onclick/g,"contu");
}

</script>
</html>
