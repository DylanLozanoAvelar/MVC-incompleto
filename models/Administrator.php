<?php
/*
	CRUD creado por Oscar Amado
	Contacto: oscarfamado@gmail.com
*/
class Administrator extends db{
	
	private function view_users(){
		try {
			$SQL = "SELECT * FROM tbl_bomba";
			$result = $this->connect()->prepare($SQL);
			$result->execute();
			return $result->fetchAll(PDO::FETCH_OBJ);	
		} catch (Exception $e) {
			die('Error Administrator(view_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function get_view_users(){
		return $this->view_users();
	}

	private function register_users($data){
		try {
			$SQL = 'INSERT INTO tbl_bomba (tipoBomba, tipoCombustible, estado, capacidad, ubicacion, numEmpleados, fechaRegistro) VALUES (?,?,?,?,?,?,?)';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['tipoBomba'],
									$data['tipoCombutible'],
									$data['estado'],
									$data['capacidad'],
									$data['ubicacion'],
									$data['numEmpleados'],
									$data['fechaRegistro']
								)
							);			
		} catch (Exception $e) {
			die('Error Administrator(register_users) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_register_user($data){
		$this->register_users($data);
	}

	private function update_user($data){
		try {
			$SQL = 'UPDATE tbl_bomba SET tipoBomba = ?, tipoCombustible = ?, estado = ?, capacidad = ?, ubicacion = ?, numEmpleados = ? WHERE idBomba = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array(
									$data['tipoBomba'],
									$data['tipoCombustible'],
									$data['estado'],
									$data['capacidad'],
									$data['ubicacion'],
									$data['numEmpleados'],
									$data['fechaRegistro']
								)
							);			
		} catch (Exception $e) {
			die('Error Administrator(update_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_update_user($data){
		$this->update_user($data);
	}

	private function delete_user($idBomba){
		try {
			$SQL = 'DELETE FROM tbl_bomba WHERE idBomba = ?';
			$result = $this->connect()->prepare($SQL);
			$result->execute(array($idBomba));			
		} catch (Exception $e) {
			die('Error Administrator(delete_user) '.$e->getMessage());
		} finally{
			$result = null;
		}
	}

	function set_delete_user($idBomba){
		$this->delete_user($idBomba);
	}	
}
?>