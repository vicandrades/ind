<?php 

	class actividadModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		public function insertActividad($actividad)
		{	
			//preparamos el query
			//$this->_query = "INSERT INTO persona
			//(nombre  , apellido ,  ci ,  fecha_nacimiento , fecha_ingreso , sexo_idsexo,tipo_persona_idtipo_persona)  VALUES 
			//(:nombre , :apellido, :cedula, :fecha_nacimiento , :fecha_ingreso , :sexo , :tipo_persona) ";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->_query = "SELECT insert_actividad(:actividad ,:fecha_inicio,:fecha_fin,:ubicacion)";
			$this->CUD($actividad); 
		}

		public function getActividad()
		{
			$this->_query ="SELECT * FROM actividad_horario_ubicacion";
			return $this->Read();
		}
	


		public function getUnicaActividad($id)
		{
			$this->_query ="select a.idactividad,a.actividad,h.fecha_inicio,h.fecha_fin,u.ubicacion from actividad a,horario h, ubicacion u where a.idactividad = $id and h.idhorario = $id and u.idubicacion=$id";
			return $this->Read();
		}

		public function updateActividad($actividad)
		{	
			//preparamos el query
			echo $this->_query = "select update_actividad(:actividad,:fecha_inicio,:fecha_fin,:ubicacion,:id)";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD($actividad); 
		}


		public function deleteActividad($id)
		{
			$this->_query = "DELETE  FROM actividad where idactividad = $id";
			return $this->CUD();
		}

}?>	