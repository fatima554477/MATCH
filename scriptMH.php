	<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles2">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>



<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>







<div id="dataModal4" class="modal fade">
 <div class="modal-dialog" style="width:80% !important; max-width:100% !important;">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles4">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>















<!--NUEVO CODIGO BORRAR-->
<div id="dataModal3" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles3">
    ¿ESTÁS SEGURO DE BORRAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes" class="btn confirm">SI BORRAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>




<script type="text/javascript">
	var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        $.ajax({
	            type: 'POST',
	            url:"reportes/controladorMH.php",
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#1'+nombre).html('<p style="color:green;">CARGANDO archivo!</p>');
$('#mensajeADJUNTOCOL').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
if($.trim(response) == 2 ){
$('#1'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#1'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');	
}
	            }
	        });
	    }
	}

function comasainput(name){
	
const numberNoCommas = (x) => {
  return x.toString().replace(/,/g, "");
}

    var total = document.getElementsByName(name)[0].value;
	 var total2 = numberNoCommas(total)
const numberWithCommas = (x) => {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}	
    document.getElementsByName(name)[0].value = numberWithCommas(total2);	
}


function formato_telefono2(name){
	
const numberNoCommas = (x) => {
  return x.toString().replace(/,/g, "");
}

    var total = document.getElementsByName(name)[0].value;
	 var total2 = numberNoCommas(total)
const numberWithCommas = (x) => {
  return x.toString().replace(/\B(?=(\d{2})+(?!\d))/g, " ");
}	
    document.getElementsByName(name)[0].value = numberWithCommas(total2);	
}



        function formato_telefono(name){
        var TELEFONO = document.getElementsByName(name)[0].value;
        var formato_telefono_1 = "formato_telefono_1";
        $.ajax({
        url:'reportes/controladorMH.php',
        method:'POST',
        data:{TELEFONO:TELEFONO,formato_telefono_1:formato_telefono_1},
        beforeSend:function(){
        },
        success:function(data){
                          //$('#PAPELERIA_DIAS').val(data);                                            
                document.getElementsByName(name)[0].value = data;		  
        }
        });
        }









	$(document).ready(function(){


//////////////////////////////////MATCH CON ESTADO DE CUENTA AMERICAN EXPRESS//////////////////////////////

/*FORMULARIO PARA CARGAR EXCEL*/

$("#enviarEXCELMATCH").click(function(){
const formData = new FormData($('#importanteexcelformMATCH')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCH').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>");
		$.getScript(load1(1));
	//$("#reset_MATCH").load(location.href + " #reset_MATCH");
	$("#DOCUU_excelMATCH").val(null);
   }
});
});


/*GUARDA FORMULARIO PRINCIPAL reset_MATCH */
$("#GUARDAR_MATCH").click(function(){
const formData = new FormData($('#MATCHform')[0]);
$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeMATCH').html('cargando'); 
    },    
   success:function(data){
	   		$.getScript(load1(1));
		//$("#reset_MATCH").load(location.href + " #reset_MATCH");	
			$("#mensajeMATCH").html("<span id='ACTUALIZADO' >"+data+"</span>");
   }
})
});

/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_MATCH', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaAMERICANE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })

//view_dataBBVAborrar
$(document).on('click', '.view_dataMATCHborrar', function(){
  var borra_matchh = $(this).attr("id");
  var borra_MATCH = "borra_MATCH";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchh:borra_matchh,borra_MATCH:borra_MATCH},
   
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeMATCH").html("<span id='ACTUALIZADO' >"+data+"</span>");
		$.getScript(load1(1));
			//$("#reset_MATCH").load(location.href + " #reset_MATCH");
   }
  });
	});  
 });
 


/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCHAMERICANE', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaAMERICAN_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_MATCH', function(){
var EMAIL_MATCH = $('#EMAIL_MATCH').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_MATCH").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_MATCH:EMAIL_MATCH},
beforeSend:function(){
$('#mensajeMATCH').html('cargando');
},
success:function(data){
$('#mensajeMATCH').html("<span id='ACTUALIZADO' >"+data+"</span>");
}
});
});


/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_AMERICANE', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETAAMERICANE.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeMATCH2AMERICANE').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })




//////////////////////////////////MATCH CON ESTADO DE CUENTA BBVA//////////////////////////////
//////////////////////////////////MATCH CON ESTADO DE CUENTA BBVA//////////////////////////////



/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCH2', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaBBVA_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })

/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_TARJETABBVA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETABBVA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })
 
//view_dataBBVAborrar
$(document).on('click', '.view_dataBBVAborrar', function(){
  var borra_matchhBB = $(this).attr("id");
  var borra_BBVA = "borra_BBVA";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchhBB:borra_matchhBB,borra_BBVA:borra_BBVA},
   
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeBBVA").html("<span id='ACTUALIZADO' >"+data+"</span>");			
			//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
   }
  });
	});  
 });	


/*CARGA EXCEL*/
$("#enviarEXCELMATCHBBVA").click(function(){
const formData = new FormData($('#importanteexcelformMATCHBBVA')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCHBBVA').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCHBBVA').html("<span id='ACTUALIZADO' >"+data+"</span>");
	//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
	$("#DOCUU_excelMATCHBBVA").val(null);
   }
});
});


/*GUARDA FORMULARIO PRINCIPAL reset_BBVA */

$("#GUARDAR_BBVA").click(function(){
const formData = new FormData($('#BBVAform')[0]);

$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeBBVA').html('cargando'); 
    },    
   success:function(data){
		//$("#reset_BBVA").load(location.href + " #reset_BBVA");
		$.getScript(load2(1));
			$("#mensajeBBVA").html("<span id='ACTUALIZADO' >"+data+"</span>");
   }
   
})
});


/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_BBVA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaBBVA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeBBVA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_BBVA', function(){
var EMAIL_BBVA = $('#EMAIL_BBVA').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_BBVA").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_BBVA:EMAIL_BBVA},
beforeSend:function(){
$('#mensajeBBVA').html('cargando');
},
success:function(data){
$('#mensajeBBVA').html("<span id='ACTUALIZADO' >"+data+"</span>");
}
});
});


//////////////////////////////////MATCH CON ESTADO DE CUENTA INBURSA//////////////////////////////


/*CARGA EXCEL*/
$("#enviarEXCELMATCHINBURSA").click(function(){
const formData = new FormData($('#importanteexcelformMATCHINBURSA')[0]);

$.ajax({
   url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
    beforeSend:function(){
    $('#MENSAJEDEexcelMATCHINBURSA').html('cargando'); 
    },    
   success:function(data){
    $('#MENSAJEDEexcelMATCHINBURSA').html("<span id='ACTUALIZADO' >"+data+"</span>");
	//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));	
	$("#DOCUU_excelMATCHINBURSA").val(null);
   }
});
});

/*GUARDA FORMULARIO PRINCIPAL*/

$("#GUARDAR_INBURSA").click(function(){
const formData = new FormData($('#INBURSAform')[0]);

$.ajax({
    url:"reportes/controladorMH.php",
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeINBURSA').html('cargando'); 
    },    
   success:function(data){
		//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));
			$("#mensajeINBURSA").html("<span id='ACTUALIZADO' >"+data+"</span>");
   }
   
})
});



/*MODIFICAR VISTA PREVIA*/
$(document).on('click', '.view_INBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaINBURSA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles').html(data);
    $('#dataModal').modal('show');
   }
  });
 })
 
  
//view_dataBBVAborrar
$(document).on('click', '.view_dataINBURSAborrar', function(){
  var borra_matchhIN = $(this).attr("id");
  var borra_INBURSA = "borra_INBURSA";
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  $.ajax({
 url:"reportes/controladorMH.php",
   method:"POST",
   data:{borra_matchhIN:borra_matchhIN,borra_INBURSA:borra_INBURSA},
   
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
	   			$('#dataModal3').modal('hide');	   
			$("#mensajeINBURSA").html("<span id='ACTUALIZADO' >"+data+"</span>");			
			//$("#reset_INBURSA").load(location.href + " #reset_INBURSA");
		$.getScript(load3(1));			
   }
  });
	});  
 });

/*MANDA EMAIL*/
$(document).on('click', '#BUTTON_INBURSA', function(){
var EMAIL_INBURSA = $('#EMAIL_INBURSA').val();
        var myCheckboxes = new Array();
        $("input:checked").each(function() {
           myCheckboxes.push($(this).val());
        });
var dataString = $("#form_emil_INBURSA").serialize();
$.ajax({
 url:"reportes/controladorMH.php",
method:'POST',
dataType: 'html',
data: dataString+{EMAIL_INBURSA:EMAIL_INBURSA},
beforeSend:function(){
$('#mensajeINBURSA').html('cargando');
},
success:function(data){
$('#mensajeINBURSA').html("<span id='ACTUALIZADO' >"+data+"</span>");
}
});
});

/*si ABRE VISTA PREVIA PARA REALIZAR EL MATCH*/
$(document).on('click', '.view_MATCH2INBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPreviaINBURSA_MATCH.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })


/*vista previa ya con match PAGINA 2*/
$(document).on('click', '.view_MATCH2TARJETAINBURSA', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
  url:"reportes/VistaPrevia_TARJETAINBURSA.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeINBURSA').html('CARGANDO'); 
    },    
   success:function(data){
    $('#personal_detalles4').html(data);
    $('#dataModal4').modal('show');
   }
  });
 })

			$('#target1').hide("linear");
			$('#target2').hide("linear");
			$('#target3').hide("linear");
			$('#target4').hide("linear");
			$('#target5').hide("linear");
			$('#target6').hide("linear");
			$('#target7').hide("linear");
			$('#target8').hide("linear");
			$('#target9').hide("linear");
			$('#target10').hide("linear");
			$('#target11').hide("linear");
			$('#target12').hide("linear");
			$('#target13').hide("linear");
			$('#target14').hide("linear");
			$('#target15').hide("linear");
			$('#target16').hide("linear");
			$('#target17').hide("linear");
			$('#target18').hide("linear");
			$('#target19').hide("linear");
			$('#target20').hide("linear");
			$('#target21').hide("linear");
			$('#target22').hide("linear");
			$('#target23').hide("linear");
			$('#target24').hide("linear");
			$('#target25').hide("linear");
			$('#target26').hide("linear");
			$('#target27').hide("linear");
			$('#target28').hide("linear");
			$('#target29').hide("linear");
			$('#target30').hide("linear");
			$('#target31').hide("linear");
			$('#target32').hide("linear");
			$('#target33').hide("linear");
			$('#target34').hide("linear");
			$('#target35').hide("linear");
			$('#target35').hide("linear");
			$('#target37').hide("linear");
			$('#target38').hide("linear");
			$('#target39').hide("linear");
			$('#target40').hide("linear");
			$('#target41').hide("linear");
			$('#target42').hide("linear");
			$('#target43').hide("linear");
			$('#target44').hide("linear");
			$('#targetVIDEO').hide("linear");
			
			$("#mostrar1").click(function(){
				$('#target1').show("swing");
		 	});
			$("#ocultar1").click(function(){
				$('#target1').hide("linear");
			});
			$("#mostrar2").click(function(){
				$('#target2').show("swing");
		 	});
			$("#ocultar2").click(function(){
				$('#target2').hide("linear");
			});
			$("#mostrar3").click(function(){
				$('#target3').show("swing");
		 	});
			$("#ocultar3").click(function(){
				$('#target3').hide("linear");
			});
			$("#mostrar4").click(function(){
				$('#target4').show("swing");
		 	});
			$("#ocultar4").click(function(){
				$('#target4').hide("linear");
			});
			$("#mostrar5").click(function(){
				$('#target5').show("swing");
		 	});
			$("#ocultar5").click(function(){
				$('#target5').hide("linear");
			});
			$("#mostrar6").click(function(){
				$('#target6').show("swing");
		 	});
			$("#ocultar6").click(function(){
				$('#target6').hide("linear");
			});
			$("#mostrar7").click(function(){
				$('#target7').show("swing");
		 	});
			$("#ocultar7").click(function(){
				$('#target7').hide("linear");
			});
			$("#mostrar8").click(function(){
				$('#target8').show("swing");
		 	});
			$("#ocultar8").click(function(){
				$('#target8').hide("linear");
			});
			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});
			$("#mostrar10").click(function(){
				$('#target10').show("swing");
		 	});
			$("#ocultar10").click(function(){
				$('#target10').hide("linear");
			});
			$("#mostrar11").click(function(){
				$('#target11').show("swing");
		 	});
			$("#ocultar11").click(function(){
				$('#target11').hide("linear");
			});
			$("#mostrar12").click(function(){
				$('#target12').show("swing");
		 	});
			$("#ocultar12").click(function(){
				$('#target12').hide("linear");
			});
			$("#mostrar13").click(function(){
				$('#target13').show("swing");
		 	});
			$("#ocultar13").click(function(){
				$('#target13').hide("linear");
			});

			$("#mostrar14").click(function(){
				$('#target14').show("swing");
		 	});
			$("#ocultar14").click(function(){
				$('#target14').hide("linear");
			});
			
			$("#mostrar15").click(function(){
				$('#target15').show("swing");
		 	});
			$("#ocultar15").click(function(){
				$('#target15').hide("linear");
			});
				$("#mostrar16").click(function(){
				$('#target16').show("swing");
		 	});
			$("#ocultar16").click(function(){
				$('#target16').hide("linear");
			});
				$("#mostrar17").click(function(){
				$('#target17').show("swing");
		 	});
			$("#ocultar17").click(function(){
				$('#target17').hide("linear");
			});
				$("#mostrar18").click(function(){
				$('#target18').show("swing");
		 	});
			$("#ocultar18").click(function(){
				$('#target18').hide("linear");
			});
				$("#mostrar19").click(function(){
				$('#target19').show("swing");
		 	});
			$("#ocultar19").click(function(){
				$('#target19').hide("linear");
			});
				$("#mostrar20").click(function(){
				$('#target20').show("swing");
		 	});
			$("#ocultar20").click(function(){
				$('#target20').hide("linear");
				
			});
					$("#mostrar21").click(function(){
				$('#target21').show("swing");
		 	});
			$("#ocultar21").click(function(){
				$('#target21').hide("linear");
				
			});
					$("#mostrar22").click(function(){
				$('#target22').show("swing");
		 	});
			$("#ocultar22").click(function(){
				$('#target22').hide("linear");
				
			});
					$("#mostrar23").click(function(){
				$('#target23').show("swing");
		 	});
			$("#ocultar23").click(function(){
				$('#target23').hide("linear");
				
			});
					$("#mostrar24").click(function(){
				$('#target24').show("swing");
		 	});
			$("#ocultar24").click(function(){
				$('#target24').hide("linear");
				
			});
					$("#mostrar25").click(function(){
				$('#target25').show("swing");
		 	});
			$("#ocultar25").click(function(){
				$('#target25').hide("linear");
				
			});
					$("#mostrar26").click(function(){
				$('#target26').show("swing");
		 	});
			$("#ocultar26").click(function(){
				$('#target26').hide("linear");
				
			});
					$("#mostrar27").click(function(){
				$('#target27').show("swing");
		 	});
			$("#ocultar27").click(function(){
				$('#target27').hide("linear");
				
			});
					$("#mostrar28").click(function(){
				$('#target28').show("swing");
		 	});
			$("#ocultar28").click(function(){
				$('#target28').hide("linear");
				
			});
					$("#mostrar29").click(function(){
				$('#target29').show("swing");
		 	});
			$("#ocultar29").click(function(){
				$('#target29').hide("linear");
				
			});
					$("#mostrar30").click(function(){
				$('#target30').show("swing");
		 	});
			$("#ocultar30").click(function(){
				$('#target30').hide("linear");
				
			});
					$("#mostrar31").click(function(){
				$('#target31').show("swing");
		 	});
			$("#ocultar31").click(function(){
				$('#target31').hide("linear");
				
			});
					$("#mostrar32").click(function(){
				$('#target32').show("swing");
		 	});
			$("#ocultar32").click(function(){
				$('#target32').hide("linear");
				
			});
					$("#mostrar303").click(function(){
				$('#target33').show("swing");
		 	});
			$("#ocultar33").click(function(){
				$('#target33').hide("linear");
				
			});
					$("#mostrar34").click(function(){
				$('#target34').show("swing");
		 	});
			$("#ocultar34").click(function(){
				$('#target34').hide("linear");
				
			});
					$("#mostrar35").click(function(){
				$('#target35').show("swing");
		 	});
			$("#ocultar35").click(function(){
				$('#target35').hide("linear");
				
			});
					$("#mostrar36").click(function(){
				$('#target36').show("swing");
		 	});
			$("#ocultar36").click(function(){
				$('#target36').hide("linear");
				
			});
					$("#mostrar37").click(function(){
				$('#target37').show("swing");
		 	});
			$("#ocultar37").click(function(){
				$('#target37').hide("linear");
				
			});
					$("#mostrar38").click(function(){
				$('#target38').show("swing");
		 	});
			$("#ocultar38").click(function(){
				$('#target38').hide("linear");
				
			});
					$("#mostrar39").click(function(){
				$('#target39').show("swing");
		 	});
			$("#ocultar39").click(function(){
				$('#target39').hide("linear");
				
			});
					$("#mostrar40").click(function(){
				$('#target40').show("swing");
		 	});
			$("#ocultar40").click(function(){
				$('#target40').hide("linear");
				
			});
       

			$("#mostrarVIDEO").click(function(){
				$('#targetVIDEO').show("swing");
		 	});
			$("#ocultarVIDEO").click(function(){
				$('#targetVIDEO').hide("linear");
			});

			$("#mostrartodos").click(function(){
		
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target11').show("swing");
				$('#target12').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#target21').show("swing");
				$('#target22').show("swing");
				$('#target23').show("swing");
				$('#target24').show("swing");
				$('#target25').show("swing");
				$('#target26').show("swing");
				$('#target27').show("swing");
				$('#target28').show("swing");
				$('#target29').show("swing");
				$('#target30').show("swing");
				$('#target31').show("swing");
				$('#target32').show("swing");
				$('#target33').show("swing");
				$('#target34').show("swing");
				$('#target35').show("swing");
				$('#target36').show("swing");
				$('#target37').show("swing");
				$('#target38').show("swing");
				$('#target39').show("swing");
				$('#target40').show("swing");
				$('#target41').show("swing");
				$('#target42').show("swing");
				$('#target43').show("swing");
				$('#target44').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos").click(function(){
				
				$('#target1').hide("swing");
				$('#target2').hide("swing");
				$('#target3').hide("swing");
				$('#target4').hide("swing");
				$('#target5').hide("swing");
				$('#target6').hide("swing");
				$('#target7').hide("swing");
				$('#target8').hide("swing");
				$('#target9').hide("swing");
				$('#target10').hide("swing");
				$('#target11').hide("swing");
				$('#target12').hide("swing");
				$('#target13').hide("swing");
				$('#target14').hide("swing");
				$('#target15').hide("swing");
				$('#target16').hide("swing");
				$('#target17').hide("swing");
				$('#target18').hide("swing");
				$('#target19').hide("swing");
				$('#target20').hide("swing");
				$('#target21').hide("swing");
				$('#target22').hide("swing");
				$('#target23').hide("swing");
				$('#target24').hide("swing");
				$('#target25').hide("swing");
				$('#target26').hide("swing");
				$('#target27').hide("swing");
				$('#target28').hide("swing");
				$('#target29').hide("swing");
				$('#target30').hide("swing");
				$('#target31').hide("swing");
				$('#target32').hide("swing");
				$('#target33').hide("swing");
				$('#target34').hide("swing");
				$('#target35').hide("swing");
				$('#target36').hide("swing");
				$('#target37').hide("swing");
				$('#target38').hide("swing");
				$('#target39').hide("swing");
				$('#target40').hide("swing");
				$('#target41').hide("swing");
				$('#target42').hide("swing");
				$('#target43').hide("swing");
				$('#target44').hide("swing");
				$('#targetVIDEO').hide("linear");
			});

			$("#mostrartodos2").click(function(){
		
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target11').show("swing");
				$('#target12').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#target21').show("swing");
				$('#target22').show("swing");
				$('#target23').show("swing");
				$('#target24').show("swing");
				$('#target25').show("swing");
				$('#target26').show("swing");
				$('#target27').show("swing");
				$('#target28').show("swing");
				$('#target29').show("swing");
				$('#target30').show("swing");
				$('#target31').show("swing");
				$('#target32').show("swing");
				$('#target33').show("swing");
				$('#target34').show("swing");
				$('#target35').show("swing");
				$('#target36').show("swing");
				$('#target37').show("swing");
				$('#target38').show("swing");
				$('#target39').show("swing");
				$('#target40').show("swing");
				$('#target41').show("swing");
				$('#target42').show("swing");
				$('#target43').show("swing");
				$('#target44').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos2").click(function(){
				
					$('#target1').hide("swing");
				$('#target2').hide("swing");
				$('#target3').hide("swing");
				$('#target4').hide("swing");
				$('#target5').hide("swing");
				$('#target6').hide("swing");
				$('#target7').hide("swing");
				$('#target8').hide("swing");
				$('#target9').hide("swing");
				$('#target10').hide("swing");
				$('#target11').hide("swing");
				$('#target12').hide("swing");
				$('#target13').hide("swing");
				$('#target14').hide("swing");
				$('#target15').hide("swing");
				$('#target16').hide("swing");
				$('#target17').hide("swing");
				$('#target18').hide("swing");
				$('#target19').hide("swing");
				$('#target20').hide("swing");
				$('#target21').hide("swing");
				$('#target22').hide("swing");
				$('#target23').hide("swing");
				$('#target24').hide("swing");
				$('#target25').hide("swing");
				$('#target26').hide("swing");
				$('#target27').hide("swing");
				$('#target28').hide("swing");
				$('#target29').hide("swing");
				$('#target30').hide("swing");
				$('#target31').hide("swing");
				$('#target32').hide("swing");
				$('#target33').hide("swing");
				$('#target34').hide("swing");
				$('#target35').hide("swing");
				$('#target36').hide("swing");
				$('#target37').hide("swing");
				$('#target38').hide("swing");
				$('#target39').hide("swing");
				$('#target40').hide("swing");
				$('#target41').hide("swing");
				$('#target42').hide("swing");
				$('#target43').hide("swing");
				$('#target44').hide("swing");
				$('#targetVIDEO').hide("linear");
			});

		});
		
	</script>