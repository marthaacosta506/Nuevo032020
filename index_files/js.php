// console.log("test in js",JSON.parse(atob(WolkvoxChat)));
var context           = atob(JSON.parse(atob(WolkvoxChat)).context);
var base_url          = base_url;
var url               = avatar;
var avatarBot         = avatarBot;
var transparent       = transparent;
var agente_asignado   = "";
var agente            = "";
var session           = idsessionNew;
var session2          = idsessionNew;
var audio             = new Audio('js/new.wav');
var recibir           = '';
var write             = '';
var from_chat         = '';
var idmsg             = 0;
var title             = document.title;
var newTitle          = '';
var count             = 0;
var INDEX             = 0; 
var heightFrameWidget = "";
var widthFrameWidget  = "";
var chatCircleImgWidthSend  = chatCircleImgWidthSend;
var chatCircleImgHeightSend = chatCircleImgHeightSend;
var heightFrameChat   = "";
var widthFrameChat    = "";
var type_call         = "";
var chat_id           = 0;
var atstrt            = 0;
var startedChat       = 0;

var iti;

switch(widget){
  case "l":
    heightFrameWidget = '71';
    widthFrameWidget  = '75';
    break;
  case "m":
    heightFrameWidget = '55';
    widthFrameWidget  = '60';
    break;
  case "s":
    heightFrameWidget = '45';
    widthFrameWidget  = '50';
    break;
}

switch(chat){
  case "l":
    heightFrameChat = '543';
    widthFrameChat  = '288';
    break;
  case "m":
    heightFrameChat = '455';
    widthFrameChat  = '288';
    break;
  case "s":
    heightFrameChat = '400';
    widthFrameChat  = '288';
    break;
  case "full":    
    heightFrameChat = '100%';
    widthFrameChat  = '100%';
    document.getElementById("chat-logs").style.height == "78% !importan"    
    break;
}
var device = getDeviceType();

if(device == "mobile")
{
  heightFrameChat = '100%';
  widthFrameChat  = '100%';
}

$id_config = id_config;
$skill_bd = skill;
$skill = $("#skill").val();
$text4 = '';
$prefA = '';
$routing='';

if(transparent == 1)
{
  heightFrameWidget = (parseInt(chatCircleImgHeightSend)+parseInt(20));
  widthFrameWidget  = (parseInt(chatCircleImgWidthSend)+parseInt(20));
}

function popUpAlert(text)
{
  document.getElementById("popUpChat_chat_micro_alert_txt").innerHTML = "<strong>"+text+"</strong>";
  document.getElementById("popUpChat_chat_micro_alert").classList.toggle("show");
}


function cargarDatosLocalStorage( event ){

  var s_value;

  try {
    
    if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text1'))){
       $("#text1").val(s_value);
       $("#textNombre").addClass("mdc-floating-label--float-above");
      //  $("#textNombre").css('background-color', '#fff');
      //  $("#textNombre").css('padding','0 4px;');
       
      }
      
      if( event == "closed"){
        
        if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text2'))){
          
          iti.setNumber(s_value);
          
        }
        
      }else{
        
        if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text2'))){
          
          $("#textPhone").addClass("mdc-floating-label--float-above");
          // $("#textPhone").css('background-color', '#fff');
          // $("#textPhone").css('padding','0 4px;');
        
        
      }
    }
  
    if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text3'))){
      $("#text3").val(s_value);
      $("#textEmail").addClass("mdc-floating-label--float-above");
      // $("#textEmail").css('background-color', '#fff');
      // $("#textEmail").css('padding','0 4px;');
      
    }
  
    if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text4'))){
      $("#text4").val(s_value);
      $("#textIdentification").addClass("mdc-floating-label--float-above");
      // $("#textIdentification").css('background-color', '#fff');
      // $("#textIdentification").css('padding','0 4px;');
      
    }
  
    if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text5'))){
      $("#text5").val(s_value);
      // $("#text5").addClass("mdc-floating-label--float-above");
      // $("#text5").css('background-color', '#fff');
      // $("#text5").css('padding','0 4px;');
      
    }
  
    if ((s_value = window.localStorage.getItem('chat.wolkvox.form.text6'))){
      $("#text6").val(s_value);
      // $("#text6").addClass("mdc-floating-label--float-above");
      // $("#text6").css('background-color', '#fff');
      // $("#text6").css('padding','0 4px;');
      
    }  
  } catch (error) {
    // console.log(error);
  }
}

  function sleep(milliseconds)
  {
   var start = new Date().getTime();
   for (var i = 0; i < 1e7; i++)
   {
    if ((new Date().getTime() - start) > milliseconds)
    {
     break;
    }
   }
  }

var count = 3;
do {
  if (typeof mdc !== "undefined")
  {
    mdc.autoInit();
    count = 0;
  }
  else
  {
    sleep(2000);
    count--;
  }
} while (count != 0);

$( document ).ready(function() {

  // console.log("ok!!");

  cargarDatosLocalStorage("init");



  const isNumericInput = (event) => {
    const key = event.keyCode;
    return ((key >= 48 && key <= 57) || 
      (key >= 96 && key <= 105) 
      );
  };

  const isModifierKey = (event) => {
    const key = event.keyCode;
    return (event.shiftKey === true || key === 35 || key === 36) || 
    (key === 8 || key === 9 || key === 13 || key === 46) || 
    (key > 36 && key < 41) || 
    (

      (event.ctrlKey === true || event.metaKey === true) &&
      (key === 65 || key === 67 || key === 86 || key === 88 || key === 90)
      )
  };

  const enforceFormat = (event) => {

    if(!isNumericInput(event) && !isModifierKey(event)){
      event.preventDefault();
    }
  };

  const formatToPhone = (event) => {
    if(isModifierKey(event)) {return;}


    const target = event.target;
    const input = event.target.value.replace(/\D/g,'').substring(0,10); 
    const zip = input.substring(0,3);
    const middle = input.substring(3,6);
    const last = input.substring(6,10);

    if(input.length > 8){target.value = "("+zip+") "+middle+" - "+last;}
    else if(input.length = 8){target.value = "("+input.substring(0,1)+") "+input.substring(1,4)+" - "+input.substring(4,8);}
    else if(input.length > 3){target.value = "("+input.substring(0,1)+") "+input.substring(1,4);}
    else if(input.length > 0){target.value = "("+input.substring(0,1)+") ";}
  };

  const inputElement = document.getElementById('text2');
  inputElement.addEventListener('keydown',enforceFormat);
  inputElement.addEventListener('keyup',formatToPhone);
});

$('input[type="file"]').change(
  function(e){
    var file = e.target.files;
    var completeSize = 0;
    for (var i = 0; i <= file.length-1; i++) {
      completeSize = completeSize + file[i].size;
    }

    if(completeSize > 5242880)
    {
      // console.log("pesado");
      popUpAlert("Max. 5Mb");
    }
    else
    {
      sendFileAttached(file);
    }
  }
  );

 function sendFileAttached(file){
    var formData = new FormData();
    for (var i = 0; i < file.length; i++) {
      formData.append(i, file[i]);
    }
    formData.append('ses', session);
    formData.append('operation', $("#idcliente").val());
    var uriAttach = "";
    $.ajax({
      url: "querys/sendAttach.php",
      data: formData,
      type: "POST",
      dataType: "json",
      processData: false,
      contentType: false,
      beforeSend: function() {
        document.getElementById("alerta").innerHTML = "<strong>Uploading...</strong>";
        document.getElementById("alerta").style.display = "";
      },
      success: (data) => {
        // console.log("Data attach", data);
        if (typeof data.error != "undefined")
        {
          /*popUpChat_chat_micro_alert_txt*/
          popUpAlert(data.error);
          document.getElementById("alerta").innerHTML = "<strong>"+data.error+"</strong>";
        }
        else
        {
          for (var i = 0; i <= data.name.length-1; i++) {
            generate_message(data.name[i], 'self', " ", " ", data.data[i]);
          }
          document.getElementById("alerta").innerHTML = "<strong>Uploaded</strong>";
        }
        
        setTimeout(function(){ 
          document.getElementById("alerta").style.display = "none";
          document.getElementById("alerta").innerHTML = "";
        }, 1200);
        document.getElementById("chat_input_attach").value = "";
        uriAttach = data.ext+"|"+data.data;

        if ($skill.charAt(0) == '6' ) {
          $msg = uriAttach;
          $idcliente = $idcliente.replace(" ","");
          $skill = $skill.replace(" ","");
          chatbotmsg($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill,$msg,"");
        }
      },
      error:function(error){
        console.log("Error attach",error);
        document.getElementById("alerta").innerHTML = "<strong>Error Uploading...</strong>";
        setTimeout(function(){ 
          document.getElementById("alerta").style.display = "none";
          document.getElementById("alerta").innerHTML = "";
        }, 1200);
        document.getElementById("chat_input_attach").value = "";
      }
    });
}

function iframeResize(height,width,bottom)
{
  parent.postMessage("resize::"+height+"||"+width+"||1%||"+bottom,"*");
}

function setInputFilter(textbox, inputFilter)
{
  ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    textbox.addEventListener(event, function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      }
    });
  });
}

setInputFilter(document.getElementById("text2"), function(value){return /^\d*$/.test(value);});

$("#enviar_form_chat").on("click", validate);
$("#start_chat_options").on("click", submit_form);
$("#btn-audio").on("click", clicktocall_audio);
$("#btn-video").on("click", clicktocall_video);
$("#btn-callback").on("click", callback);

function validateEmail(email)
{
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function clicktocall_audio()
{ 
  $operation = $("#idcliente").val();
  $pais_selected = document.getElementsByClassName("iti__selected-flag")[0].title.replace(/[^0-9]+/g, "");
  
  $text2 = $pais_selected;
  $text2 += $("#text2").val();
  
  document.getElementById("divLoad").style.display = "";
  type_call = "call-audio";
  $text1 = $("#text1").val();
  $text3 = $("#text3").val();
  $text4 = $text4 == '' && typeof $text4 !== 'undefined' ? $("#text4").val() : $text4;
  $text5 = $("#text5").val();
  $text6 = $("#text6").val();
  $text1 = typeof $text1 !== 'undefined' ? $text1.replace(/(<([^>]+)>)/ig,"") : '';
  $text2 = typeof $text2 !== 'undefined' ? $text2.replace(/(<([^>]+)>)/ig,"") : '';
  $text3 = typeof $text3 !== 'undefined' ? $text3.replace(/(<([^>]+)>)/ig,"") : '';
  $text4 = typeof $text4 !== 'undefined' ? $text4.replace(/(<([^>]+)>)/ig,"") : '';
  $text5 = typeof $text5 !== 'undefined' ? $text5.replace(/(<([^>]+)>)/ig,"") : '';
  $text6 = typeof $text6 !== 'undefined' ? $text6.replace(/(<([^>]+)>)/ig,"") : '';
  conexion_sipjs($text1,$text2,$text3,$text4,$text5,$text6, type_call);
}

function clicktocall_video()
{
  $operation = $("#idcliente").val();
  $pais_selected = document.getElementsByClassName("iti__selected-flag")[0].title.replace(/[^0-9]+/g, "");
  
    $text2 = $pais_selected;
    $text2 += $("#text2").val();
  
  document.getElementById("divLoad").style.display = "";  
  type_call = "call-audiovideo";
  $text1 = $("#text1").val();
  $text3 = $("#text3").val();
  $text4 = $text4 == '' && typeof $text4 !== 'undefined' ? $("#text4").val() : $text4;
  $text5 = $("#text5").val();
  $text6 = $("#text6").val();
  $text1 = typeof $text1 !== 'undefined' ? $text1.replace(/(<([^>]+)>)/ig,"") : '';
  $text2 = typeof $text2 !== 'undefined' ? $text2.replace(/(<([^>]+)>)/ig,"") : '';
  $text3 = typeof $text3 !== 'undefined' ? $text3.replace(/(<([^>]+)>)/ig,"") : '';
  $text4 = typeof $text4 !== 'undefined' ? $text4.replace(/(<([^>]+)>)/ig,"") : '';
  $text5 = typeof $text5 !== 'undefined' ? $text5.replace(/(<([^>]+)>)/ig,"") : '';
  $text6 = typeof $text6 !== 'undefined' ? $text6.replace(/(<([^>]+)>)/ig,"") : '';
  conexion_sipjs($text1,$text2,$text3,$text4,$text5,$text6, type_call);
}

function callback()
{ 
  // $pais_selected = document.getElementsByClassName("iti__selected-flag")[0].title.replace(/[^0-9]+/g, "");
  type_call = "callback";
  $text1 = $("#text1").val();
  $text2 = $("#text2").val();
  $text3 = $("#text3").val();
  $text4 = $text4 == '' && typeof $text4 !== 'undefined' ? $("#text4").val() : $text4;
  $text5 = $("#text5").val();
  $text6 = $("#text6").val();
  $text1 = typeof $text1 !== 'undefined' ? $text1.replace(/(<([^>]+)>)/ig,"") : '';
  $text2 = typeof $text2 !== 'undefined' ? $text2.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/ ]/gi,"") : '';
  $text3 = typeof $text3 !== 'undefined' ? $text3.replace(/(<([^>]+)>)/ig,"") : '';
  $text4 = typeof $text4 !== 'undefined' ? $text4.replace(/(<([^>]+)>)/ig,"") : '';
  $text5 = typeof $text5 !== 'undefined' ? $text5.replace(/(<([^>]+)>)/ig,"") : '';
  $text6 = typeof $text6 !== 'undefined' ? $text6.replace(/(<([^>]+)>)/ig,"") : '';
  callback_register($text1,$text2,$text3,$text4,$text5,$text6, type_call);
}

function validate()
{
  var email             = $("#text3").val();
  var tel               = $("#text2").val();
  var validatorTelefono = 0;
  var validatorEmail    = 0;
  var validator         = 0;
  var text1             = document.getElementById("text1");
  var text2             = document.getElementById("text2");
  var text3             = document.getElementById("text3");
  var text4             = document.getElementById("text4");
  var text5             = document.getElementById("text5");
  var text6             = document.getElementById("text6");
  var habeasData        = document.getElementById("habeasData");
  var habeasDataPass    = false;

  

  if (text1.value != "")
  {
    text1.style.border = "";
    validatorEmail = 1;
  } 
  else
  {
    text1.focus();
    text1.style.border = "rgba(255, 0, 0, 0.41) solid 1px";
    return false;
  }

  if (tel.length >= 7)
  {
    text2.style.border = "";
    validatorTelefono = 1;
  }
  else
  {
    text2.focus();
    text2.style.border = "rgba(255, 0, 0, 0.41) solid 1px";
    validatorTelefono = 0;
    return false;
  }

  if (validateEmail(email))
  {
    text3.style.border = "";
    validatorEmail = 1;

  } 
  else
  {
    text3.focus();
    text3.style.border = "rgba(255, 0, 0, 0.41) solid 1px";
    validatorEmail = 0;
    return false;
  }

  if ($("#habeasData").length > 0)
  {
    if ($("#habeasData").prop("checked"))
    {
      habeasData.style.setProperty('--coloree', '2px solid rgb(85 85 85)');
      habeasData.style.setProperty('--shake', '');
      habeasDataPass = true;
    }
    else
    {
      habeasData.style.setProperty('--shake', '');
      habeasData.style.setProperty('--coloree', '2px solid rgb(255 0 0)');
      habeasData.style.setProperty('--shake', 'shake 0.5s');
    }
  }
  else
  {
    habeasDataPass = true;
  }
  if (validatorEmail == 1 && validatorTelefono == 1 && (habeasDataPass)) {
    document.getElementById("enviar_form_chat").disabled = true;
    if($("#container-options")[0].children.length < 2  || $("#container-options").attr("data-init")) /*No hay botones audio o video*/
    { 

      try {
        if (window.localStorage) {
  
            /* guardar formulario en localStorage */
            if (text1 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text1', text1.value);
            }
  
            if (text2 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text2', text2.value);
            }
  
            if (text3 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text3', text3.value);
            }
  
            if (text4 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text4', text4.value);
            }
  
            if (text5 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text5', text5.value);
            }
  
            if (text6 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text6', text6.value);
            }
            /* end guardar formulario en localStorage */
  
        }
      } catch (error) {
        console.log(error);
      }

      submit_form(); /*inicia chat*/
    }
    else
    {
      if(!($("#container-options").attr("data-init"))){

        try {    
          if (window.localStorage) {
  
            /* guardar formulario en localStorage */
            if (text1 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text1', text1.value);
            }
  
            if (text2 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text2', text2.value);
            }
  
            if (text3 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text3', text3.value);
            }
  
            if (text4 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text4', text4.value);
            }
  
            if (text5 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text5', text5.value);
            }
  
            if (text6 !== null) {
              window.localStorage.setItem('chat.wolkvox.form.text6', text6.value);
            }
            /* end guardar formulario en localStorage */
            
          }
        } catch (error) {
          // console.log(error);
        }

        mostrarButtons(); /*muestra botones*/
      }

    }
  }
  return false;
}

function mostrarButtons()
{
  $("#container-options").attr("data-init",true);
  $("#container-options").show();
  $(".containerChatForm").hide();
}

function submit_form()
{
  $("#chat-input").prop('disabled', false);
  $text1 = $("#text1").val();
  $text2 = $("#text2").val();
  $text3 = $("#text3").val();
  $text4 = $text4 == '' && typeof $text4 !== 'undefined' ? $("#text4").val() : $text4;
  $text5 = $("#text5").val();
  $text6 = $("#text6").val();
  $text1 = typeof $text1 !== 'undefined' ? $text1.replace(/(<([^>]+)>)/ig,"") : '';
  $text2 = typeof $text2 !== 'undefined' ? $text2.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/ ]/gi,"") : '';
  $text3 = typeof $text3 !== 'undefined' ? $text3.replace(/(<([^>]+)>)/ig,"") : '';
  $text4 = typeof $text4 !== 'undefined' && $text4 != null ? $text4.replace(/(<([^>]+)>)/ig,"") : '';
  $text5 = typeof $text5 !== 'undefined' && $text5 != null ? $text5.replace(/(<([^>]+)>)/ig,"") : '';
  $text6 = typeof $text6 !== 'undefined' ? $text6.replace(/(<([^>]+)>)/ig,"") : '';
  $idsession = $("#idsession").val();
  $idcliente = $("#idcliente").val();
  $skill = $("#skill").val();

  if(($text1.length > 0) && ($text2.length > 0) && ($text3.length > 0) /*&& ($text4.length > 0) && ($text5.length > 0) && ($text6.length > 0) */){

    if($text2 === 'sin_value_requerido'){
      $text2 = '';
    }
    if($text3 === 'sin_value_requerido'){
      $text3 = '';
    }
    if($text4 === 'sin_value_requerido'){
      $text4 = '';
    }
    if($text5 === 'sin_value_requerido'){
      $text5 = '';
    }
    if($text6 === 'sin_value_requerido'){
      $text6 = '';
    }

    if ($skill.charAt(0) == '4' ) {

      // console.log("condición 1");

      document.getElementById("chat_input_attach").setAttribute("multiple","");
      enrutamiento($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill,$id_config,$prefA);

    }else if ($skill.charAt(0) == '6' ) {

      // console.log("condición 2");

      chatbot($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill);
    }
  }
}

function enrutamiento($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill,$id_config,$prefA)
{ 

  var datos = new Object();
  datos.text1 = $text1;
  datos.text2 = $text2;
  datos.text3 = $text3;
  datos.text4 = $text4;
  datos.text5 = $text5;
  datos.text6 = $text6;
  datos.idsession = $idsession;
  datos.idcliente = $idcliente;
  datos.skill     = $skill;
  datos.idConfig  = $id_config;
  datos.prefA     = $prefA;
  
  // console.log("entrando en funcion enrutamiento()");
  // console.log("params",datos);

  $text6 = $text6.replace(/\n/g, "\\n");

  var url_tmp = "";
  
  url_tmp = "querys/users.php";
  
  $.ajax({
    url: url_tmp,
    data: {text1: $text1, text2: $text2, text3: $text3, text4: $text4, text5: $text5, text6: $text6, idsession: $idsession, idcliente: $idcliente, skill: $skill,id_config: $id_config, pref: $prefA, CI: chat_id, operation: $("#idcliente").val()},
    type: "POST",
    dataType: 'json',
    error: function() 
    {
      // alert("Problemas de Internet, revise su conexion!");
      document.getElementById("enviar_form_chat").disabled = false;
    },
    success: function(data) 
    {
      if(data.agente != ""){
        agente_asignado = data.agente;
        agente = data.agente;
        var msgSaludo = '';
        recibir = setInterval(function(){ recibir_msgs() }, 5000);
        $("#chat-input").prop('disabled', false);
        chat_id = data.ic;
        msgSaludo = data.msgDone+" "+agente_asignado;
        $("#chat-input").prop('disabled', false);
      }
      else
      {
        var msgSinAgent = data.msgFail;
        generate_messagebot(msgSinAgent);
        $("#chat-input").prop('disabled', true);

      }
      div1 = document.getElementById('containerChatLogs');
      div2 = document.getElementById('containerChatForm');
      remove = document.getElementById('close');
      div1.style.display = '';
      div2.style.display = 'none';
      remove.style.display = '';
      if(full == 0)
      {
        if(device == "mobile")
        {
          document.getElementById("minimizeChat").classList.add("pl-2");
          document.getElementById("close").classList.add("pl-3");
        }
        else
        {
          document.getElementById("actionsHeader").classList.add("d-inline-flex");
          document.getElementById("minimizeChat").classList.add("pl-2");
          document.getElementById("close").classList.add("pl-2");
        }
        document.getElementsByClassName('chat-box-toggle')[0].removeAttribute("style");
      }
    }
  });
}

function chatbot($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill,$msg)
{ 

  var datos       = new Object();
  datos.text1     = $text1;
  datos.text2     = $text2;
  datos.text3     = $text3;
  datos.text4     = $text4;
  datos.text5     = $text5;
  datos.text6     = $text6;
  datos.idsession = $idsession;
  datos.idcliente = $idcliente;
  datos.skill     = $skill;
  datos.msg       = $msg;
  datos.urlOrigen = urlOrigen;
  datos.idConfig  = idConfig;
  datos.operation = $("#idcliente").val();
  
  // console.log("entrando en funcion chatbot()");
  // console.log("params",datos);

  $text6 = $text6.replace(/\n/g, "\\n");

  var url_tmp = "";
  url_tmp = "querys/users_routing.php";
  
  $.ajax({
    url: url_tmp,
    data: datos,
    type: "POST",
    dataType: 'JSON',
    error: function() 
    {
      alert("Problemas de Internet, revise su conexion!");
      document.getElementById("enviar_form_chat").disabled = false;
    },
    success: function(data){

      // console.log("success",data);

      div1   = document.getElementById('containerChatLogs');
      div2   = document.getElementById('containerChatForm');
      remove = document.getElementById('close');
      div1.style.display = '';
      div2.style.display = 'none';

      $("#container-options").hide();
      remove.style.display = '';

      if(chat != "full"){

        if(device == "mobile")
        {
          document.getElementById("minimizeChat").classList.add("ml-4");
          document.getElementById("close").classList.add("ml-3");
        }
        else
        {
          document.getElementById("actionsHeader").classList.add("d-inline-flex");
        }
        document.getElementsByClassName('chat-box-toggle')[0].removeAttribute("style");
      }

      chat_id = data.id;
      var mshSendBot = " ";
      chatbotmsg($text1,$text2,$text3,$text4,$text5,$text6,$idsession,$idcliente,$skill,mshSendBot,context);
    }
  });
}

function starDatos()
{
  if (txt1 != "")
  {
    $("#text1").val(atob(txt1));
    $("#text2").val(atob(txt2));
    $("#text3").val(atob(txt3));
    $("#text4").val(atob(txt4));
    $("#text5").val(atob(txt5));
    $("#text6").val(atob(txt6));
    $("#habeasData").prop("checked", true)
    atstrt = 1;

    if (desplegado == 1 || full == 1)
    {
      $('#enviar_form_chat').trigger("click");
    }
    else
    {
      if($("#container-options")[0].children.length < 2  || $("#container-options").attr("data-init")) /*No hay botones audio o video*/
      {
       document.getElementById('containerChatLogs').style.display = '';
       document.getElementById('containerChatForm').style.display = 'none';
       $("#container-options").hide();
       document.getElementById('close').style.display = '';
       if(chat != "full"){
        if(device == "mobile")
        {
          document.getElementById("minimizeChat").classList.add("ml-4");
          document.getElementById("close").classList.add("ml-3");
        }
        else
        {
          document.getElementById("actionsHeader").classList.add("d-inline-flex");
        }
        document.getElementsByClassName('chat-box-toggle')[0].removeAttribute("style");
      }
    }
    else
    {
      if(!($("#container-options").attr("data-init"))){
        mostrarButtons(); /*muestra botones*/
      }
    }
  }
}
}

$("#chat-submit").click(function(e)
{
  e.preventDefault();
  var msg = $("#chat-input").val(); 
  if(msg.trim() === '')
  {
    return false;
  }
  generate_message(msg, 'self');
  var buttons = [
  {
    name: 'Existing User',
    value: 'existing'
  },
  {
    name: 'New User',
    value: 'new'
  }];
  var msg_min = msg.toLowerCase();
  var ln = window.navigator.language || navigator.browserLanguage;
});

var mensajeBack = '';

function recibir_msgs()
{ 
  // console.log("entrando en funcion recibir_msgs()");
  // console.log(NOW());
  // console.log("$skill",$skill);
  // console.log("skill",$("#skill").val());
  $idcliente = $("#idcliente").val();

  $session = session;
  $.ajax({
    dataType: 'json',
    url: "querys/recibir.php",
    data: {
      idmsg : idmsg,
      ses: $session,
      idcliente: $idcliente,
      ic: chat_id,
      skill: $skill,
      operation: $("#idcliente").val()
    },
    type: "POST",
    success: function(data) 
    {
      // console.log("success",data);
      var mensaje = '';

      if(id=="aloglobal-cchuila" || id=="microdllo" ){
        if(typeof data.SKILL !== "undefined"){
          if (data.SKILL.charAt(0) == '6'){
            $skill = data.SKILL;
            $("#skill").val(data.SKILL);
            $('#enviar_form_chat').trigger("click");
          }
        }
      }
      
      if (typeof data.SKILL_queue !== "undefined")
      {
        if (data.SKILL_queue.charAt(0) == '4')
        {
          // clearInterval(recibir);
          $skill =  data.SKILL_queue;
          $("#skill").val(data.SKILL_queue);

          // console.log("$skill inside ingresa en Skillqueue",$skill);
          // console.log("skill inside",$("#skill").val());
          // $('#enviar_form_chat').trigger("click");
        }
        
      }

      if(data.CHAT != null){
        for(i=0;i<data.CHAT.length;i++)
        {    
          idmsg   = data.CHAT[i].id;
          mensaje = data.CHAT[i].msg;
          auto    = data.CHAT[i].auto;
          agente  = data.CHAT[i].desde != "Survey" ? data.CHAT[i].desde : languages.web_nameSurvey;
          if(mensaje != "|fin|")
          {
            generate_message(mensaje, 'user', auto, agente);
            count++;
            newTitle = '(' + count + ') ';
            parent.postMessage("title"+newTitle,"*");
          }
          else
          {
            clearInterval(recibir);
            $("#chat-input").prop('disabled', true);
          }

          if (data.ROUTING != "" && data.ROUTING != 0)
          {
            $("#skill").val(data.ROUTING);
            $('#enviar_form_chat').trigger("click");
          }
        }
      }
    }
  });
}

var mesok=new Array(12);
mesok[0]=languages.web_mesok0;
mesok[1]=languages.web_mesok1;
mesok[2]=languages.web_mesok2;
mesok[3]=languages.web_mesok3;
mesok[4]=languages.web_mesok4;
mesok[5]=languages.web_mesok5;
mesok[6]=languages.web_mesok6;
mesok[7]=languages.web_mesok7;
mesok[8]=languages.web_mesok8;
mesok[9]=languages.web_mesok9;
mesok[10]=languages.web_mesok10;
mesok[11]=languages.web_mesok11;

  function generate_message(msg, type, auto, agent, attach)
  {
    var d = new Date();
    var min = d.getMinutes();
    var mins = (min < 10) ? '0'+min:min;
    var seg = d.getSeconds();
    var segs = (seg < 10) ? '0'+seg:seg;
    INDEX++;
    var str="";
    str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg_chat_micro "+type+"\">";
    str += "          <span class=\"msg-avatar\">";
    if (type == 'user') {
      str += "            <img src=\""+url+"\">";
    }
    str += "          <\/span>";
    if (type == 'user') {
      try
      {
        audio.play();
      }
      catch(excep)
      {
        /*console.log("excep",excep);*/
      }
      str += "          <div class=\"cm-msg-text_chat_micro border-cm-msg-text_chat_micro-agent\" id=\"cm-msg-text_chat_micro\" style=\"color: black\">";
      if((msg.indexOf('http')!= -1 || msg.indexOf('www')!= -1 || msg.indexOf('.com')!= -1) && msg.indexOf('</a>') == -1){

       msg = linkify(msg);

       if(msg.indexOf(agent) === -1){
        if(auto == "a"){
          str += msg;
          clearInterval(recibir);
          $("#chat-input").prop('disabled', true);
        }else if(auto == "t"){
          str += msg;
        }
        else{
          str += agent+": "+msg;
        }
      }else{
        str += msg;
      }

      }else if (msg.indexOf('http')=== -1 || msg.indexOf('www')=== -1 || msg.indexOf('.com')=== -1 || msg.indexOf('</a>') !== -1){
        if(msg.indexOf(agent) === -1){
          if(auto == "a"){
            str += msg;
            clearInterval(recibir);
            $("#chat-input").prop('disabled', true);
          }else if(auto == "t"){
            str += msg;
          }
          else{
            str += agent+": "+msg;
          }
        }else{
          str += msg;
        }
      }
      str += "          <br/>";
      str += "        <span style='opacity: 0.4; font-size:10px; position: relative;'>"+d.getDate()+" "+mesok[d.getMonth()]+" "+d.getHours()+":"+mins+":"+segs+"<\/span>";
      str += "          <\/div>";
      str += "        <\/div>";
      $(".chat-logs").append(str);
      $("#cm-msg-"+INDEX).hide().fadeIn(300);
      $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
    }else if(type == 'self'){
      msg= msg.replace(/(<([^>]+)>)/ig,"");
      str += "          <div class=\"cm-msg-text_chat_micro border-cm-msg-text_chat_micro-customer\" id=\"cm-msg-text_chat_micro\">";
      if(attach != null)
      {
        str += "<embed src='"+attach+"' style='width: 100%'>";
        str += '<span style="font-size: 80%;">'+msg.toLowerCase()+"</span>";
      }
      else
      {
      str += msg;
      }
      str += "          <br/>";
      str += "        <span style='opacity: 0.4; font-size:10px; position: relative; bottom: -3%;'>"+d.getDate()+" "+mesok[d.getMonth()]+" "+d.getHours()+":"+mins+":"+segs+"<\/span>";
      str += "          <\/div>";
      str += "        <\/div>";
      $(".chat-logs").append(str);
      $("#cm-msg-"+INDEX).hide().fadeIn(300);
      $("#chat-input").val(''); 
      $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
    }
  }

  var msgrec = '';
  $("#chat-circle").ready(function(){
    var session = session2;
    operacion = $("#idcliente").val();
    $.ajax({
      dataType: 'json',
      url: "querys/session.php",
      data: {session : session, operation: operacion},
      type: "POST",
      success: function(data) 
      {        
        if(data.length>0)
        {

          if(data[1].SKILL.charAt(0) == '4')
          {
            document.getElementById('skill').value = data[1].SKILL;
          }
          $skill = $("#skill").val();
          $idsession = $("#idsession").val();
          $idcliente = $("#idcliente").val();
          $("#text1").val(data[1].TEXT1);
          $("#text2").val(data[1].TEXT2);
          $("#text3").val(data[1].TEXT3);
          $("#text4").val(data[1].TEXT4);
          $("#text5").val(data[1].TEXT5);
          $("#text6").val(data[1].TEXT6);
          $text1 = $("#text1").val();
          $text2 = $("#text2").val();
          $text3 = $("#text3").val();
          $text4 = $text4 == '' && typeof $text4 !== 'undefined' ? $("#text4").val() : $text4;
          $text5 = $("#text5").val();
          $text6 = $("#text6").val();
          $text1 = typeof $text1 !== 'undefined' ? $text1.replace(/(<([^>]+)>)/ig,"") : '';
          $text2 = typeof $text2 !== 'undefined' ? $text2.replace(/(<([^>]+)>)/ig,"") : '';
          $text3 = typeof $text3 !== 'undefined' ? $text3.replace(/(<([^>]+)>)/ig,"") : '';
          $text4 = typeof $text4 !== 'undefined' ? $text4.replace(/(<([^>]+)>)/ig,"") : '';
          $text5 = typeof $text5 !== 'undefined' && $text5 != null ? $text5.replace(/(<([^>]+)>)/ig,"") : '';
          $text6 = typeof $text6 !== 'undefined' && $text6 != null ? $text6.replace(/(<([^>]+)>)/ig,"") : '';
          chat_id = data[0].IC;
          agente_asignado = data[0].AGENT;
          agente = data[0].AGENT;
          var lasAgent = "";
          for(i=0;i<data.length;i++)
          {
            tipo_dato = data[i].TYPE;
            from_chat = data[i].FROM_CHAT;
            from      = data[i].FROM;

            if (tipo_dato=='CHAT')
            {
              idmsg = data[i].ID;
              mensaje = data[i].MSG;

              if (from_chat=='AGENT')
              {
                if (from == "chat_bot")
                {
                  generate_messagebot(mensaje,"","");
                }
                else
                {
                  generate_message(mensaje, "user", 0, agente);
                }
                lasAgent = from;
              }
              else
              {
                generate_message(mensaje, "self");
              }
            }
          }
          iframeResize(heightFrameChat,widthFrameChat,"0");
          $('#enviar_form_chat').trigger("click");
          if(lasAgent != "chat_bot")
          {
            recibir = setInterval(function(){ recibir_msgs() }, 5000);
          }
          $("#containerChatForm").css("display", "none");
          $("#containerChatLogs").css("display", "");
          if($( ".chat-box" ).is( ":visible" )){ 
          }else{
            $("#chat-circle").toggle('scale');
            $(".chat-box").toggle('scale');
          }
          if(device == "mobile")
          {
            document.getElementById("minimizeChat").classList.add("ml-4");
          }
          else
          {
            document.getElementById("actionsHeader").classList.add("d-inline-flex");
          }
          $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 2200);
          remove = document.getElementById('close');
          remove.style.display = '';
          if(full == 0){
            document.getElementsByClassName('chat-box-toggle')[0].removeAttribute("style");
          }
          if (txt1 != "")
          {
            atstrt = 1;
          }
        }
        else
        {
          starDatos(); 
        }
      }
    });
  })

  function cargarPais(init){

    /* consultar azure maps */
    var input       = document.querySelector("#text2");
    var inputsChat  = document.querySelector("#inputsFormChat");
    var flag_select = document.getElementsByClassName("iti__selected-flag");
    var country_code_localStorage;
    var user_ip_localStorage;
    var text2_localStorage;

    if( flag_select.length == 0){

      
      iti = window.intlTelInput(input, {
        dropdownContainer: inputsChat,   initialCountry: "auto",
        geoIpLookup: function(success, failure) {
          
        },
      });
      
      try {
        /* ingresa al input el telefono guardado en localstorage */
        if ((text2_localStorage = window.localStorage.getItem('chat.wolkvox.form.text2'))){
  
          iti.setNumber(text2_localStorage);
          
        }
  
        /* validar que hay datos del pais en localStorage */
        if( window.localStorage.getItem('chat.wolkvox.countryCode') !== undefined && window.localStorage.getItem('chat.wolkvox.countryCode') )
        {        
          country_code_localStorage = window.localStorage.getItem('chat.wolkvox.countryCode');
        }
        
        /* validar que hay datos de la ip en localStorage */
        if ( window.localStorage.getItem('chat.wolkvox.user_ip') !== undefined && window.localStorage.getItem('chat.wolkvox.user_ip') ) {        
          user_ip_localStorage = window.localStorage.getItem('chat.wolkvox.user_ip');
        }
        
        /* si la ip actual es igual al localStorage */
        if (user_ip == user_ip_localStorage)
        {
          iti.setCountry(country_code_localStorage);
        }
        else
        {
  
          // Se envia el init en true cuando se despliegue automaticamente el chat, y se envia false cuando se despliega por el boton
          $.ajax({
            url: '../chat/gp.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'attr': btoa(user_ip) + "|VElkSTVrTmJlTVFNb0J3TGgwNHNGQ3Ryd3c4d2k3cFVVWVdJaEMweFVQND0=",
                'operation': $("#idcliente").val(),
                'init': init
            }
          }).done(function (result) {
  
            console.log(result);
  
            if (result.error == true) {
              
            }else{
  
              var country_code_bd = result.countryRegion.isoCode;
    
              /* registra en localStorage */
              if (window.localStorage) {
    
                window.localStorage.setItem('chat.wolkvox.countryCode', country_code_bd);
                window.localStorage.setItem('chat.wolkvox.user_ip', user_ip);
              }
              
              iti.setCountry(country_code_bd);
            }
  
          });
  
        }
      } catch (error) {
        console.log(error);
      }

    }

    /* fin consultar azure maps */
  }

  if (desplegado == 1 || full == 1)
  {
    cargarPais(true);
  } 
  

  $("#chat-circle").click(function() {    

    iframeResize(heightFrameChat,widthFrameChat,"0");
    $("#chat-circle").hide();
    $(".chat-box").toggle('fast',function(){
    });

    if ((desplegado == 0 && atstrt == 1) && startedChat == 0)
    {
      startedChat = 1;
      submit_form();
    }

    cargarPais(false);

  })  

  $(".chat-box-toggle").click(function() {
    $("#chat-circle").toggle('scale');
    $(".chat-box").toggle('fast',function(){
      iframeResize(heightFrameWidget,widthFrameWidget,"1%");
    });
  })

  $(".chat-box-close").click(function() {
    var popup = document.getElementById("popUpChat_chat_micro_finalizar");
    popup.classList.toggle("show");
  })

  $("#noFinalizarChat").click(function() {
    var popup = document.getElementById("popUpChat_chat_micro_finalizar");
    popup.classList.toggle("show");
  })

  $("#finalizarChat").click(function() {

    $session = session;
    $.ajax({
      url: "querys/close.php",
      data: {
        CI: chat_id,
        operation: $("#idcliente").val()
      },
      type: "POST",
      dataType: "json",
      complete: function(data) 
      {
        cargarDatosLocalStorage("closed");
      }
    });
    if (atstrt == 1)
    {
      $("#text1").val('');
      $("#text2").val('');
      $("#text3").val('');
      $("#text4").val('');
      $("#text5").val('');
      $("#text6").val('');
      document.getElementById('skill').value = $skill_bd;
      document.getElementById('chat-logs').innerHTML = '';
      document.getElementById("enviar_form_chat").disabled = false;
      var div3 = document.getElementById('containerChatLogs');
      var div4 = document.getElementById('containerChatForm');
      div3.style.display = 'none';
      div4.style.display = '';
      remove = document.getElementById('close');
      remove.style.display = 'none';
      if(full == 0)
      {
        document.getElementsByClassName('chat-box-toggle')[0].setAttribute("style", "margin-right: 6px;");
      }
      var popup = document.getElementById("popUpChat_chat_micro_finalizar");
      popup.classList.toggle("show");
      var survey = document.getElementById('surveyipdial');
      var input = document.getElementById('inputchatview');
      input.style.display = '';
      if ($("#formulario_chat_ipdialbox").css("visibility") == "hidden")
      {
        $("#formulario_chat_ipdialbox").css("visibility","visible");
      }
      clearInterval(recibir);
      $("#container-options").removeAttr("data-init");
      if(count > 0){
        count=0;
        newTitle = "";
        parent.postMessage("title"+newTitle,"*");
      }     
    }
    else
    {
      document.getElementById('skill').value = $skill_bd;
      document.getElementById('chat-logs').innerHTML = '';
      document.getElementById("enviar_form_chat").disabled = false;
      document.getElementById("popUpChat_chat_micro_finalizar").classList.toggle("show");
      clearInterval(recibir);
      $("#text1").val(atob(txt1));
      $("#text2").val(atob(txt2));
      $("#text3").val(atob(txt3));
      $("#text4").val(atob(txt4));
      $("#text5").val(atob(txt5));
      $("#text6").val(atob(txt6));
      $("#habeasData").prop("checked", true)
      $('#enviar_form_chat').trigger("click");
    }
    if(full == 0)
    {
      $("#chat-circle").toggle('scale');
      $(".chat-box").toggle('fast',function(){
        iframeResize(heightFrameWidget,widthFrameWidget,"1%");
      });
    }
  });

  $("#okAlertPopup").click(function() {
    document.getElementById("popUpChat_chat_micro_alert").classList.toggle("show");
    document.getElementById("popUpChat_chat_micro_alert_txt").innerHTML = "";
    colgar();
  })

  $("#chat-input").click(function(){
    if(count > 0){
      count=0;
      newTitle = "";
      parent.postMessage("title"+newTitle,"*");
    }
  })
/*})*/

function chatbotmsg(text1,text2,text3,text4,text5,text6,idsession,idcliente,skill,msg,context){

  var datos       = new Object();
  datos.text1     = text1;
  datos.text2     = text2;
  datos.text3     = text3;
  datos.text4     = text4;
  datos.text5     = text5;
  datos.text6     = text6;
  datos.idsession = idsession;
  datos.idcliente = idcliente;
  datos.skill     = skill;
  datos.msg       = msg;
  datos.context   = context;
  datos.operation = $("#idcliente").val();
  
  // console.log("entrando en funcion chatbotmsg()");
  // console.log("params",datos);
  
  text6 = text6.replace(/\n/g, "\\n");

  var url_tmp = "querys/msgbot.php";
  
  $.ajax({
    url: url_tmp,
    data: datos,
    type: "POST",
    dataType: 'json',
    success: function(data){

      // console.log("success", data);

      if (data.paso_agente == "yes" && $skill.charAt(0) !== '4')
      { 
        // console.log("condicion 1");
        clearInterval(recibir);
        recibir = setInterval(function(){ recibir_msgs() }, 5000);
      }

      if(typeof data.IDCUST !== "undefined"){
        // console.log("condicion 2");
        if(data.IDCUST != ''){
          $text4 = data.IDCUST;
        }
      }
      
      if(typeof data.maxid !== "undefined"){
        // console.log("condicion 3");
        if(data.maxid != ''){
          idmsg = data.maxid;
        }
      }
      
      if(typeof data.PREF !== "undefined"){
        // console.log("condicion 5");
        if(data.PREF != ''){
          $prefA = data.PREF;
        }
      }
      
      if (typeof data.SKILL !== "undefined" ) {
        // console.log("condicion 5");
        $skill =  data.SKILL;
        $("#skill").val($skill);
        $('#enviar_form_chat').trigger("click");

      }else{

        // console.log("condicion 6");
        if(data.REPLY != ''){
          // console.log("condicion 7");
          var replyBot   = typeof data.REPLY   != "undefined" ? data.REPLY   : "";
          var attachBot  = typeof data.ATTACH  != "undefined" ? data.ATTACH  : "";
          var buttonsBot = typeof data.BUTTONS != "undefined" ? data.BUTTONS : "";
          generate_messagebot(replyBot,attachBot,buttonsBot);

        }
      }
    }
  });
}

var mesok=new Array(12);
mesok[0]=languages.web_mesok0;
mesok[1]=languages.web_mesok1;
mesok[2]=languages.web_mesok2;
mesok[3]=languages.web_mesok3;
mesok[4]=languages.web_mesok4;
mesok[5]=languages.web_mesok5;
mesok[6]=languages.web_mesok6;
mesok[7]=languages.web_mesok7;
mesok[8]=languages.web_mesok8;
mesok[9]=languages.web_mesok9;
mesok[10]=languages.web_mesok10;
mesok[11]=languages.web_mesok11;

function generate_messagebot( msg = null, attach = null, buttons = null) {
  agente = "";
  var d = new Date();
  var min = d.getMinutes();
  var mins = (min < 10) ? '0'+min:min;
  var seg = d.getSeconds();
  var segs = (seg < 10) ? '0'+seg:seg;
  INDEX++;
  var str="";
  str += "<div id='cm-msg-"+INDEX+"' class=\"chat-msg_chat_micro user\">";
  str += "          <span class=\"msg-avatar\">";
  str += "            <img src=\""+avatarBot+"\">";
  str += "          <\/span>";
  try
  {
    audio.play();
  }
  catch(excep)
  {
    /*console.log("excep",excep);*/
  }
  str += "          <div class=\"cm-msg-text_chat_micro border-cm-msg-text_chat_micro-agent\" id=\"cm-msg-text_chat_micro\" style=\"color: black\">";
  msg = msg.split('\r\n');
  // console.log("attach",attach);
  if(attach == "" || attach == null)
  { 
    //no embed
    str += "";
  }else{
    
    str += "<embed src='"+attach+"' style='width: 100%'>";
  }
  for (var i = 0; i < msg.length; i++) {
    if(msg[i].indexOf('http')!= -1 || msg[i].indexOf('www')!= -1){
      str += linkify(msg[i]);
    }else if (msg[i].indexOf('http') === -1 || msg[i].indexOf('www') === -1){
      if(msg[i].indexOf('\n') !== -1)
      {
        msgN = msg[i].split('\n');
        for (var x = 0; x < msgN.length; x++) {
          str += msgN[x]+"<br>";
        } 
      }
      else
      {
        str += msg[i]+"<br>";
      }
    }
  }
  if (buttons == "" || buttons == null)
  {
    //no buttons
  }else{
    
    // console.log("buttons", buttons);
    str += "<br>";
    buttons.split(",").forEach((btns) => {
      str += "<button class='interactive_button_wolkvox'>"+btns+"</button>";
      str += "<br>";
    })
  }
  str += "        <span style='opacity: 0.4; font-size:10px; position: relative;'>"+d.getDate()+" "+mesok[d.getMonth()]+" "+d.getHours()+":"+mins+":"+segs+"<\/span>";
  str += "          <\/div>";
  str += "        <\/div>";
  $(".chat-logs").append(str);
  $("#cm-msg-"+INDEX).hide().fadeIn(300);
  $(".chat-logs").stop().animate({ scrollTop: $(".chat-logs")[0].scrollHeight}, 1000);
  if (buttons != "")
  {
   $(".interactive_button_wolkvox").click(function(){
    // console.log("asd",this.innerHTML);
    $("#chat-input").val(this.innerHTML);
    sendMsg();
    $("#chat-input").val("");
  });
 }
}


function linkify(inputText) {
  var replacedText, replacePattern1, replacePattern2, replacePattern3, inputText = inputText;

  replacePattern1 = /(\b(https?|ftp):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/gim;
  replacedText = inputText.toString().replace(replacePattern1, '<a href="$1" target="_blank">$1</a>');

  replacePattern2 = /(^|[^\/])(www\.[\S]+(\b|$))/gim;
  replacedText = replacedText.replace(replacePattern2, '$1<a href="http://$2" target="_blank">$2</a>');

  replacePattern3 = /(([a-zA-Z0-9\-\_\.])+@[a-zA-Z\_]+?(\.[a-zA-Z]{2,6})+)/gim;
  replacedText = replacedText.replace(replacePattern3, '<a href="mailto:$1">$1</a>');

  return replacedText;
}

function NOW() {

  var date = new Date();
  var aaaa = date.getFullYear();
  var gg = date.getDate();
  var mm = (date.getMonth() + 1);

  if (gg < 10)
    gg = "0" + gg;

  if (mm < 10)
    mm = "0" + mm;

  var cur_day = aaaa + "-" + mm + "-" + gg;

  var hours = date.getHours()
  var minutes = date.getMinutes()
  var seconds = date.getSeconds();

  if (hours < 10)
    hours = "0" + hours;

  if (minutes < 10)
    minutes = "0" + minutes;

  if (seconds < 10)
    seconds = "0" + seconds;

  return cur_day + " " + hours + ":" + minutes + ":" + seconds;

}
/*console.clear();*/