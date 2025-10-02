<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/
function LIMPIAR2(){
 $("#NOMBRE_EVENTO").val("");
 $("#DEPARTAMENTO2WE").val("");
 $("#COLABORADOR_BBVA_1").val("");
 $("#TARJETA_BBVA_1").val("");
 $("#ESTABLECIMIENTO_BBVA_1").val("");
 $("#FECHADD_BBVA_1").val("");
 $("#MONTO_BBVA_1").val("");
 $("#OBSERVACIONES_BBVA_1").val("");
 $("#FECHA_BBVA_1").val("");


		$(function() {
			load2(1);
		});
}


		$(function() {
			load2(1);
		});
		function load2(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var COLABORADOR_BBVA=$("#COLABORADOR_BBVA_1").val();
var TARJETA_BBVA=$("#TARJETA_BBVA_1").val();
var ESTABLECIMIENTO_BBVA=$("#ESTABLECIMIENTO_BBVA_1").val();
var FECHADD_BBVA=$("#FECHADD_BBVA_1").val();
var MONTO_BBVA=$("#MONTO_BBVA_1").val();
var OBSERVACIONES_BBVA=$("#OBSERVACIONES_BBVA_1").val();
var FECHA_BBVA=$("#FECHA_BBVA_1").val();
var hBBVA=$("#hBBVA_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page2").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/
'COLABORADOR_BBVA':COLABORADOR_BBVA,
'TARJETA_BBVA':TARJETA_BBVA,
'ESTABLECIMIENTO_BBVA':ESTABLECIMIENTO_BBVA,
'FECHADD_BBVA':FECHADD_BBVA,
'MONTO_BBVA':MONTO_BBVA,
'OBSERVACIONES_BBVA':OBSERVACIONES_BBVA,
'FECHA_BBVA':FECHA_BBVA,
'hBBVA':hBBVA,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'reportes/clasesBBVA/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader2").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax2").html(data).fadeIn('slow');
					$("#loader2").html("");
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
