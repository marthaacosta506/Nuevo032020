var dtdvctc = "eyJzdGF0dXMiOiJzdWNjZXNzIiwibWVzc2FnZSI6IkRhdG9zIGVuY29udHJhZG9zIiwiY29kZSI6IjAwMCIsImRhdGEiOnsiY2djdGMiOnsiYmFzZV91cmwiOiJodHRwczpcL1wvd2lkZ2V0MDEud29sa3ZveC5jb21cLyIsInNraWxsIjoiNjEyOCIsImlwIjoiMzQuMTM4LjE0My4xMzQiLCJzdXJ2ZXkiOiJ5ZXMiLCJtc2dzX2luX2xpbmsiOiJ0cnVlIiwibGlua19lbmN1ZXN0YSI6Imh0dHBzOlwvXC9jaGF0MDEud29sa3ZveC5jb21cL2xpZ2h0c3VydmV5XC8/eD1iM0E5ZDJJdGNHbHVkSFZqYnlacFl6MWpiR2xqYTNSdlkyRnNiRjlqYUdGMEptbGphRDEzWWkxd2FXNTBkV052TVRFek5ERXdKbTl5UFdOb1lYUXdNU1pqYkhNOWRISjFaUT09IiwidXNlciI6Ik5PIFNIT1dOIiwicGFzcyI6Ik5PIFNIT1dOIiwid2ViU29ja2V0U2VydmVyIjoid3NzOlwvXC93ZWJydGMtYXVkaW8ud29sa3ZveC5jb206ODA4OVwvd3MiLCJkb21haW5fd29sa3ZveCI6IndlYnJ0Yy1hdWRpby53b2xrdm94LmNvbSIsIm5hbWUiOiJpcGRpYWxib3gwMDE4Iiwib3V0Ym91bmRfcHJveHlfdXJsIjpudWxsLCJpY2Vfc2VydmVycyI6bnVsbCwic2l6ZUNoYXQiOiJsIiwiaWQiOiJ3Yi1waW50dWNvIiwiaWRfY2hhdCI6IjIyMCJ9fX0=";
var WolkvoxClictocallVars = JSON.parse(atob(dtdvctc));
var cgctc = WolkvoxClictocallVars.data.cgctc;


//SCRIPT
var base_url_wolkvox = cgctc.base_url;
var dataConfig = new Object();
var intervalInicioCarga = null;
var itemsEmpty = "";
var message = "";
var skill = cgctc.skill;
var ip = cgctc.ip;

//encuesta
var survey = cgctc.survey;
var msgs_in_link = cgctc.msgs_in_link;
var link_encuesta = cgctc.link_encuesta;





var user               = cgctc.user;
var pass               = cgctc.pass;
var webSocketServer    = cgctc.webSocketServer;
var domain_wolkvox     = cgctc.domain_wolkvox;
var name               = cgctc.name;
var outbound_proxy_url = cgctc.outbound_proxy_url;
var ice_servers        = cgctc.ice_servers;




var sizeChat = cgctc.sizeChat;
var id = cgctc.id;
var id_chat = cgctc.id_chat;

var trama = null;
var sipJS = null; //SIP.js
var videoHabilitado = false;
var insertLog = false;
var errorSession = null; //jcp
var tipoLlamada = null;
var contentLog = "";



//conexion sip.js
function conexion_sipjs( a,b,c,d,e,f, g ){

  
tipoLlamada = g;

// console.log("entrando en function conexion_sipjs");

a = a.replace(/ /g,"_");
b = b.replace(/ /g,"");
b = b.replace("(","");
b = b.replace(")","");
b = b.replace("-","");

c = c.replace(/ /g,"_");
d = d.replace(/ /g,"_");
e = e.replace(/ /g,"_");
f = f.replace(/ /g,"_");

console.log("Tipo de Llamada", tipoLlamada);
switch (tipoLlamada) {

case "call-audio":


if(b.length > 15 ){
b = b.substr(0,14);
}

if(a.length > 10 ){
a = a.substr(0,9);
}

trama = "SIP:"+skill+"-IVR*ani$"+b+"*name$"+a+"*id_customer$"+d+"*webrtc$audio";

if(trama.length > 80 ){
trama = trama.substr(0,79);
}

break;

case "call-audiovideo":

if(b.length > 15 ){
b = b.substr(0,14);
}

if(a.length > 10 ){
a = a.substr(0,9);
}

trama = "SIP:"+skill+"-IVR*ani$"+b+"*name$"+a+"*id_customer$"+d+"*webrtc$video";
// videoHabilitado = true;
videoHabilitado = '{width:{min:352,max:352},height:{min:288,max:288},frameRate:{min:10,max:10}}';
break;

default:

if(b.length > 15 ){
b = b.substr(0,14);
}

if(a.length > 10 ){
a = a.substr(0,9);
}

trama = "SIP:"+skill+"-IVR*ani$"+b+"*name$"+a+"*id_customer$"+d+"*webrtc$audio";

if(trama.length > 80 ){
trama = trama.substr(0,79);
}

break;
}

dataConfig.skill = skill;
dataConfig.domain_wolkvox = domain_wolkvox;
dataConfig.webSocketServer = webSocketServer;
dataConfig.xyz = id;
dataConfig.jjj = id_chat;
dataConfig.name = name;
dataConfig.survey = survey;
dataConfig.ip = ip;
dataConfig.user = user;


for (var item in dataConfig) {

if(dataConfig[item] == ""){

itemsEmpty = itemsEmpty + item + "\r\n";

}

}

itemsEmpty = itemsEmpty.slice(0, -1);


if(itemsEmpty !== ""){

message = "Error en la configuración: \r\n" + itemsEmpty + "\r\n";

// contentLog += message;
console.log(message);
return;

}else{

var alertify_css = document.createElement('link');
alertify_css.setAttribute('href', 'https://chat01.wolkvox.com/chat/css/alertify.min.css');
alertify_css.setAttribute('rel', 'stylesheet');


var alertify_js = document.createElement('SCRIPT');
alertify_js.setAttribute('src', 'https://chat01.wolkvox.com/chat/js/alertify.min.js');

document.head.appendChild(alertify_css);
document.head.appendChild(alertify_js);

//Carga la libreria sipJS
var script = document.querySelector('#sipJS');
if(script == null){
sipJS = document.createElement('SCRIPT');
sipJS.setAttribute('src', base_url_wolkvox + 'SIP.js/demo/dist/sipjs_wolkvox.js?v=1');

sipJS.setAttribute('id','sipJS');
document.head.appendChild(sipJS);
}
//Cuando este cargada la conexión

sipJS.onload = () => {

if( $("#status").html() == "unregistered" || $("#status").html() == "NULL"){

$("#connectAlice").click();

setTimeout(function(){
$("#registerAlice").click();
setTimeout(function(){
$("#beginAlice").click();
}, 1000);
}, 1000);

}

$("#container-options").css({"display":"none"});
$("#divLoad").css({"display":"none"});
$("#divCallCtrl").css({"width":"100%",
"margin-left": "auto",
"margin-right": "auto",
"display":"block",
"text-align": "center",
"padding-top": "0%",
});
//botones call options
$("#divCallOptions").css("opacity", "1");
$("#btnFullScreen").css("visibility", "visible");
$("#btnMute").css("visibility", "visible");
$("#btnKeyPad").css("visibility", "visible");

if(type_call == "call-audiovideo"){
$("#tdVideo").css({"height": "95%"});
$("#divVideo").css({"height": "95%"});
}else{
$("#tdVideo").css({"height": "95%"});
$("#divVideo").css({"height": "95%"});
$("#txtCallStatus").css("display","");
}

}
}

}

//call
$("#status").on('DOMSubtreeModified', function () {

  console.log("test", $(this).html());

var txtLoad = "";


switch ( $(this).html() ) {
case "unregistered":

break;
case "connected":

dataConfig.user = "NOT SHOWN";
user = "NOT SHOWN";
pass = "NOT SHOWN";
break;
case "registered":

if (window.navigator.language === "es-ES") {

txtLoad = "Por favor, espere un momento";

}else if( window.navigator.language === "en-US"){

txtLoad = "Please wait a moment";

}else{

txtLoad = "Please wait a moment";
}

$("#txtLoad1").html(txtLoad);
break;
case "call created":

document.getElementById("videoLocalAlice").style.opacity = 1;

if (window.navigator.language === "es-ES") {

txtLoad = "Conectando llamada";

}else if( window.navigator.language === "en-US"){

txtLoad = "Connecting call";

}else{

txtLoad = "Connecting call";
}
$("#txtLoad1").html(txtLoad);
break;
case "Call answered":

if (window.navigator.language === "es-ES") {

txtLoad = "En llamada";

}else if( window.navigator.language === "en-US"){

txtLoad = "In call";

}else{

txtLoad = "In call";
}

$("#txtLoad1").html(txtLoad);

if( tipoLlamada == "call-audiovideo"){


setTimeout(function(){

$("#txtLoad1").html("");


}, 5000);

}

break;
case "call hangup":

if (window.navigator.language === "es-ES") {

txtLoad = "Terminar llamada";

}else if( window.navigator.language === "en-US"){

txtLoad = "Ending call";

}else{

txtLoad = "Ending call";
}

$("#txtLoad1").html(txtLoad);
$("#disconnectAlice").click();

break;
case "failed to begin session":

if (window.navigator.language === "es-ES") {

txtLoad = "No se pudo iniciar la sesión";

}else if( window.navigator.language === "en-US"){

txtLoad = "Failed to begin session";

}else{

txtLoad = "Failed to begin session";
}

$("#txtLoad1").html(txtLoad);
break;

case "on agent":
$("#txtLoad1").val("");
break;
case "disableVideo":
setTimeout(function(){
$("#enableCamera").click();
document.getElementById('status').innerHTML = 'enableVideo';
}, 1500);

break;
case "disconnected":

$("#txtLoad1").html("");

colgar();


break;
}
});



function registrarLog(){

$.ajax({
url: 'querys/log_clicktocall.php',
type: 'POST',
dataType: 'json',
data: {
id_distri: id,
log: contentLog,
type: 'widget'
},
})
.done(function(success) {
})
.fail(function(error) {

})
.always(function() {

if( errorSession == null ){

colgar();

}else{
alertify.alert('Error', `Failed to begin session.\n` + errorSession, function(){

colgar();

});
}
});
}

function colgar() {

window.location.href = '#close';
document.getElementById("containerChatForm").style.display = "";
document.getElementById("divCallCtrl").style.display = "none";
document.getElementById("container-options").removeAttribute("data-init");
document.getElementById("enviar_form_chat").disabled = false;

//encuesta

switch(widget){
case "l":
heightFrameWidget = '71';
widthFrameWidget = '75';
break;
case "m":
heightFrameWidget = '55';
widthFrameWidget = '60';
break;
case "s":
heightFrameWidget = '45';
widthFrameWidget = '50';
break;
}

iframeResize(heightFrameWidget,widthFrameWidget);

location.reload();

}


function mostrarBotones(){
$("#endAlice").show();
$("#enableCamera").show();
$("#btnKeyPad").show();
}

function ocultarBotones(){
$("#endAlice").hide();
$("#enableCamera").hide();
$("#btnKeyPad").hide();
}

var videoRemoteAliceElement = !!document.getElementById("videoRemoteAlice");

if( videoRemoteAliceElement ){
  document.getElementById("videoRemoteAlice").addEventListener('durationchange', function(){


  setTimeout(function(){
  $("#enableCamera").click();
  document.getElementById('status').innerHTML = 'disableVideo';
  // console.log("[Jairo] disable camera");
  }, 1500);


  });
}