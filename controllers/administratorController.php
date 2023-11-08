<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class administratorController extends Administrator{

	function index(){
		require_once('views/all/header.php');
		require_once('views/all/nav.php');
		require_once('views/index/index.php');
		require_once('views/index/modals.php');
		require_once('views/all/footer.php');
	}

	function table_users(){
		?>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>idBomba</th>
					<th>tipoBomba</th>
					<th>tipoCombustible</th>
					<th>estado</th>
					<th>capacidad</th>
					<th>ubicacion</th>
					<th>numEmpleados</th>
					<th>fechaRegistro</th>
				</tr>
			</thead>
			<tbody >		
		<?php
		foreach (parent::get_view_users()	as $data) {
		?>
		<tr>
			<td><?php echo $data->idBomba; ?> </td>
			<td><?php echo $data->tipoBomba; ?> </td>
			<td><?php echo $data->tipoCombustible; ?> </td>
			<td><?php echo $data->estado; ?> </td>
			<td><?php echo $data->capacidad; ?> </td>
			<td><?php echo $data->ubicacion; ?> </td>
			<td><?php echo $data->numEmpleados; ?> </td>
			<td><?php echo $data->fechaRegistro; ?> </td>
			<td>
			  <div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
			    Seleccionar <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			      <li><a href="#" onclick="ModalUpdate('<?php echo $data->idBomba; ?>','<?php echo $data->tipoBomba; ?>','<?php echo $data->tipoCombustible; ?>','<?php echo $data->estado; ?> ','<?php echo $data->capacidad; ?> ','<?php echo $data->ubicacion; ?> ','<?php echo $data->numEmpleados; ?> ','<?php echo $data->fechaRegistro; ?> ');">Actualizar</a></li>
			      <li><a href="#" onclick="deleteUser('<?php echo $data->idBomba; ?>');">Borrar</a></li>
			    </ul>
			  </div>
			</td>
		</tr>
		<?php
		}
		?>
			</tbody>
		</table>	
	<?php	
    }
    
	function deleteuser(){		
			parent::set_delete_user($_REQUEST['idBomba']);		
    }

	function registeruser(){
		$data = array(
					'tipoBomba' => $_REQUEST['tipoBomba'],
					'tipoCombustible' 		=> $_REQUEST['tipoCombustible'],
					'estado' => $_REQUEST['estado'],
					'capacidad' => $_REQUEST['capacidad'],
					'ubicacion' => $_REQUEST['ubicacion'],
					'numEmpleados' => $_REQUEST['numEmpleados'],
					'fechaRegistro' => $_REQUEST['fechaRegistro']
					);		
					parent::set_register_user($data);		
    }    
    
	function updateuser(){
		$data = array(
					'idBomba'		=> $_REQUEST['idBomba'],
					'tipoBomba' 		=> $_REQUEST['tipoBomba'],
					'tipoCombustible' => $_REQUEST['tipoCombustible'],
					'estado' 		=> $_REQUEST['estado'],
					'capacidad' => $_REQUEST['capacidad'],
					'ubicacion' 		=> $_REQUEST['ubicacion'],
					'numEmpleados' => $_REQUEST['numEmpleados'],
					'fechaRegistro'		=> $_REQUEST['fechaRegistro']
					);		
			parent::set_update_user($data);		
	}    
    
}

