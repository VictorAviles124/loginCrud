<?php 
	session_start();
	if(isset($_SESSION['usuario'])){
		require_once "dependencias.php";
		require_once "menu.php";
?>
		<!DOCTYPE html>
<html lang="en">
<html>


<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../style.css">
	<title></title>
	<?php require_once "scripts.php";  ?>
</head>

 
		<body>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div class="card text-left">
							<div class="card-header">
								
							GASTOS PERSONALES
							</div>
							<div class="card-body">
								<span class="btn btn-primary" data-toggle="modal" data-target="#agregarmodal">
									Agregar nuevo gasto <span class="fa fa-plus-circle"></span>
								</span>
								<hr>
								<div id="tablaDatatable"></div>
							</div>
							<div class="card-footer text-muted">
								By VICTOR AVILES
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="agregarmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Agrega  Gasto</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form id="frmnuevo">
								<label>Concepto de gasto</label>
								<input type="text" class="form-control input-sm" id="gasto" name="gasto">
								<label>Cantidad de gasto</label>
								<input type="text" class="form-control input-sm" id="cantidad" name="cantidad">
								<label>Fecha</label>
								<input type="date" class="form-control input-sm" id="fecha" name="fecha">
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" id="Agregarnuevo" class="btn btn-primary">Agregar nuevo</button>
						</div>
					</div>
				</div>
			</div>


			<!-- Modal -->
				<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Actualizar gasto</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form id="nuevoFr">

									<input type="text" hidden="" id="idgasto" name="idgasto">
									<label>Concepto de gasto</label>
									<input type="text" class="form-control input-sm" id="gastoU" name="gastoU">
									<label>Cantidad de gasto</label>
									<input type="text" class="form-control input-sm" id="cantidadU" name="cantidadU">
									<label>Fecha</label>
									<input type="text" class="form-control input-sm" id="fechaU" name="fechaU">

								</form>
							</div>
							<div class="modal-footer">


							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-warning" id="Actualizar">Actualizar</button>

						</div>
					</div>
				</div>
			</div>


		</body>

		</html>


		<script type="text/javascript">


	$(document).ready(function() {
				$('#Agregarnuevo').click(function() {

					datos = $('#frmnuevo').serialize();

					$.ajax({
						type: "POST",
						data: datos,
						url: "../procesos2/agregar.php",
						success: function(r) {
							if (r == 1) {
								$('#frmnuevo')[0].reset();
								$('#tablaDatatable').load('tabla.php');
								alertify.success(" Agregado");
							} else {
								alertify.error("Fallo ");
							}
						}
					});
				});

	$('#Actualizar').click(function() {
					datos = $('#nuevoFr').serialize();

					$.ajax({
						type: "POST",
						data: datos,
						url: "../procesos2/actualizar.php",
						success: function(r) {
							if (r == 1) {
								$('#tablaDatatable').load('tabla.php');
								alertify.success("Actualizado ");
							} else {
								alertify.error("Fallo al actuliza");
							}
						}
					});
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#tablaDatatable').load('tabla.php');
			});
		</script>


		<script type="text/javascript">
			function agregaFrmActualizar(idgasto) {
				$.ajax({
					type: "POST",
					data: "idgasto=" + idgasto,
					url: "../procesos2/obtenDatos.php",

					success: function(r) {
						datos = jQuery.parseJSON(r);
						$('#idgasto').val(datos['id_gasto']);
				$('#gastoU').val(datos['gasto']);
				$('#cantidadU').val(datos['cantidad']);
				$('#fechaU').val(datos['fecha']);
			}
		});
	}

	function eliminarDatos(idgasto) {
		alertify.confirm('Eliminar gasto ', 'Seguro que quieres eliminarlo?', function() {


			$.ajax({
				type: "POST",
				
				data: "idgasto=" + idgasto,
				url: "../../procesos2/eliminar.php",
				success: function(r) {
					if (r == 1) {
						$('#tablaDatatable').load('tabla.php');
						alertify.success("Eliminado ");
					} else {
						alertify.error("No se puede eliminar");
					}
				}
			});

		}, function() {

		});
	}
</script>

<?php  
	} else {
		header("location:../index.php");
	}
 ?>