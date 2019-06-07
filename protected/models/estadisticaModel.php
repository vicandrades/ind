 <?php 

	class estadisticaModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		public function insertInstrumento($instrumento)
		{	
			//preparamos el query
			//$this->_query = "INSERT INTO persona
			//(nombre  , apellido ,  ci ,  fecha_nacimiento , fecha_ingreso , sexo_idsexo,tipo_persona_idtipo_persona)  VALUES 
			//(:nombre , :apellido, :cedula, :fecha_nacimiento , :fecha_ingreso , :sexo , :tipo_persona) ";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->_query = "SELECT insert_instrumento(:instrumento , :tipo)";
			$this->CUD($instrumento); 
		}

		public function getActividades($fechai,$fechaf)
		{
			$this->_query ="select a.idactividades, a.fecha_act,a.nombre_actividad,a.can_varones,a.can_hembras,pe.nombre1,g.grado,s.seccion from actividades a
				inner join datos_profesor p on p.iddatos_profesor = a.datos_profesor
				inner join persona pe on p.persona_id = pe.id_persona
				inner join grado_seccion gs on gs.id_grado_seccion=a.grado_seccion
				inner join grado g on gs.grado_id = g.id_grado
				inner join seccion s on gs.seccion_id = s.id_seccion
				where fecha_act between '$fechai' and '$fechaf'";
			return $this->Read();
		}


		public function getMateriales_x_actividades($fechai,$fechaf)
		{
			$this->_query ="select a.idactividades,m.nombre_material from actividades a
				inner join materiales_x_actividades ma on ma.actividades=a.idactividades
				inner join materiales m on m.idmateriales = ma.materiales
				where fecha_act between '$fechai' and '$fechaf'";
			return $this->Read();
		}

		

		public function getCantidad($fechai,$fechaf)
		{
			$this->_query ="select sum(can_varones)as cantidad_hombres,sum(can_hembras)as cantidad_mujeres from actividades where fecha_act between '$fechai' and '$fechaf'";
			return $this->Read();
		}
	


		public function getUnicoInstrumento($id)
		{
			$this->_query ="SELECT * FROM instrumentos where idinstrumentos = $id";
			return $this->Read();
		}

		public function updateInstrumento($instrumento)
		{	
			//preparamos el query
			echo $this->_query = "UPDATE instrumentos SET 
						instrumento = :instrumento,
						tipo_instrumento_idtipo_instrumento = :tipo
						where idinstrumentos = :id";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD($instrumento); 
		}


		public function deleteInstrumento($id)
		{
			$this->_query = "DELETE  FROM instrumentos where idinstrumentos = $id";
			return $this->CUD();
		}

}?>	