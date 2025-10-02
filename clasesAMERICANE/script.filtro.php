<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

function LIMPIAR(){
 $("#NOMBRE_EVENTO").val("");
 $("#DEPARTAMENTO2WE").val("");
 $("#COLABORADOR_MATCH_1").val("");
 $("#TARJETA_MATCH_1").val("");
 $("#FECHADD_MATCH_1").val("");
 $("#ESTABLECIMIENTO_MATCH_1").val("");
 $("#MONTO_MATCH_1").val("");
 $("#OBSERVACIONES_MATCH_1").val("");
 $("#FECHA_MATCH_1").val("");

		$(function() {
			load1(1);
		});
}



		$(function() {
			load1(1);
		});
		function load1(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var COLABORADOR_MATCH=$("#COLABORADOR_MATCH_1").val();
var TARJETA_MATCH=$("#TARJETA_MATCH_1").val();
var FECHADD_MATCH=$("#FECHADD_MATCH_1").val();
var ESTABLECIMIENTO_MATCH=$("#ESTABLECIMIENTO_MATCH_1").val();
var MONTO_MATCH=$("#MONTO_MATCH_1").val();
var OBSERVACIONES_MATCH=$("#OBSERVACIONES_MATCH_1").val();
var FECHA_MATCH=$("#FECHA_MATCH_1").val();
var hMATCH=$("#hMATCH_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'COLABORADOR_MATCH':COLABORADOR_MATCH,
'TARJETA_MATCH':TARJETA_MATCH,
'FECHADD_MATCH':FECHADD_MATCH,
'ESTABLECIMIENTO_MATCH':ESTABLECIMIENTO_MATCH,
'MONTO_MATCH':MONTO_MATCH,
'OBSERVACIONES_MATCH':OBSERVACIONES_MATCH,
'FECHA_MATCH':FECHA_MATCH,
'hMATCH':hMATCH,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'reportes/clasesAMERICANE/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax").html(data).fadeIn('slow');
					
					$("#loader").html("");
					          $('.checkbox').each(function() {
    const id = $(this).data('id');
    if (localStorage.getItem('checkbox_' + id) === 'checked') {
        this.checked = true;
        this.closest('tr').style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
    }
});
				}
			})
		}
/* terminaB1*/		
		
	</script>
