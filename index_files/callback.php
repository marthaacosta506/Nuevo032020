
var dtdvc = "eyJzdGF0dXMiOiJzdWNjZXNzIiwibWVzc2FnZSI6IkRhdG9zIGVuY29udHJhZG9zIiwiY29kZSI6IjAwMCIsImRhdGEiOnsiY2djIjp7ImlkIjoid2ItcGludHVjbyIsImlkX2NoYXQiOiIyMjAiLCJ0b2tlbiI6Ik5ISkdUV2w2VlZwcFMxUjNPV1Z1YjBaVVdIVmhaejA5IiwiaWRfY2FtcGFpbmciOiJOSEpHVFdsNlZWcHBTMVIzT1dWdWIwWlVXSFZoWnowOSIsImhvc3RuYW1lIjoiYVZwU1ZrWkJhbnBGSzJWMFRYVnNNbnBzYjBKcVVUMDkifX19";
var WolkvoxCallbackVars = JSON.parse(atob(dtdvc));
var cgc = WolkvoxCallbackVars.data.cgc;


//SCRIPT
//var id          = cgc.id;
//var id_chat     = cgc.id_chat;
var token       = cgc.token;
var id_campaing = cgc.id_campaing;
var hostname    = cgc.hostname;

  
//api clicktocall
function callback_register(a,b,c,d,e,f, typeCall){

    a = a.replace(/ /g,"_");
    b = b.replace(/ /g,"_");
    c = c.replace(/ /g,"_");
    d = d.replace(/ /g,"_");
    e = e.replace(/ /g,"_");
    f = f.replace(/ /g,"_");    
    
    for (var item in dataConfig) {
      
      if(dataConfig[item] == ""){
        
        itemsEmpty = itemsEmpty + item + ",";
        
      }
      
    }
  
    itemsEmpty = itemsEmpty.slice(0, -1);
    
    
    if(itemsEmpty !== ""){
      
      message = "Faltan datos en la configuración: " + itemsEmpty;
      console.log(message);
      return;
      
    }else{

      var data_ajax = new Object();
      data_ajax.a           = a;
      data_ajax.b           = b;
      data_ajax.c           = c;
      data_ajax.d           = d;
      data_ajax.e           = e;
      data_ajax.f           = f;

      console.log("datos_ajax", data_ajax);
      
        
      $.ajax({
        url: './js/callback_register.php',
        type: 'POST',
        dataType: 'json',
        data: {
          token: token,
          id_campaing: id_campaing,
          nombre: a,
          telefono: b,
          email: c,
          cedula: d,
          extra_field: e,
          comment: f,
          hostname:hostname
        },
      })
      .done(function(success) {
        

        if (success.error == false && success.code == 1) {

          window.location.href = '#close';
          $("#container-options").removeAttr("data-init");
          $("#container-options").css("display","none");
          $("#formulario_chat_ipdialbox").css("display","");
          document.getElementById("enviar_form_chat").disabled = false;          

        
          popUpAlert("<span style='text-align: justify !important;'> En un momento uno de nuestros asesores se pondrá en contacto. </span>");

          <!-- top.location.reload(); -->

        }

      })
      .fail(function(error) {
        console.log(error);
      });
        
    }
}


