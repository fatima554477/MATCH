<script type="text/javascript">
	
	/*filtro */
function LIMPIAR3(){
 $("#NOMBRE_EVENTO").val("");
 $("#DEPARTAMENTO2WE").val("");
 $("#COLABORADOR_INBURSA_1").val("");
 $("#TARJETA_INBURSA_1").val("");
 $("#FECHADD_INBURSA_1").val("");
 $("#ESTABLECIMIENTO_INBURSA_1").val("");
 $("#RFC_INBURSA_1").val("");
 $("#MONTO_INBURSA_1").val("");
 $("#OBSERVACIONES_INBURSA_1").val("");
 $("#FECHA_INBURSA_1").val("");

		$(function() {
			load3(1);
		});
}
/* iniciaB1*/

		$(function() {
			load3(1);
		});
		function load3(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();
			var COLABORADOR_INBURSA=$("#COLABORADOR_INBURSA_1").val();
var TARJETA_INBURSA=$("#TARJETA_INBURSA_1").val();
var FECHADD_INBURSA=$("#FECHADD_INBURSA_1").val();//FECHADD_INBURSA
var ESTABLECIMIENTO_INBURSA=$("#ESTABLECIMIENTO_INBURSA_1").val();
var RFC_INBURSA=$("#RFC_INBURSA_1").val();
var MONTO_INBURSA=$("#MONTO_INBURSA_1").val();
var OBSERVACIONES_INBURSA=$("#OBSERVACIONES_INBURSA_1").val();
var FECHA_INBURSA=$("#FECHA_INBURSA_1").val();
var hINBURSA=$("#hINBURSA_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page3").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/'COLABORADOR_INBURSA':COLABORADOR_INBURSA,
'TARJETA_INBURSA':TARJETA_INBURSA,
'FECHADD_INBURSA':FECHADD_INBURSA,
'ESTABLECIMIENTO_INBURSA':ESTABLECIMIENTO_INBURSA,
'RFC_INBURSA':RFC_INBURSA,
'MONTO_INBURSA':MONTO_INBURSA,
'OBSERVACIONES_INBURSA':OBSERVACIONES_INBURSA,
'FECHA_INBURSA':FECHA_INBURSA,
'hINBURSA':hINBURSA,
/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			};
			$("#loader3").fadeIn('slow');
			$.ajax({
				url:'reportes/clasesINBURSA2/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader3").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax3").html(data).fadeIn('slow');
					$("#loader3").html("");
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
