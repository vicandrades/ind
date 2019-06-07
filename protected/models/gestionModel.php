 <?php 

	class gestionModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		public function insertGrupo($grupo)
		{	
			//preparamos el query
			//$this->_query = "INSERT INTO persona
			//(nombre  , apellido ,  ci ,  fecha_nacimiento , fecha_ingreso , sexo_idsexo,tipo_persona_idtipo_persona)  VALUES 
			//(:nombre , :apellido, :cedula, :fecha_nacimiento , :fecha_ingreso , :sexo , :tipo_persona) ";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->_query = "SELECT insert_grupo(:nombre , :limite)";
			$this->CUD($grupo); 
		}

		public function insertPrestamo($prestamo)
		{	
	
			$this->_query = "SELECT prestamo(:articulo,:cantidad,:fechadev,:id,:fecha_prestamo)";
			$this->CUD($prestamo); 
		}

		public function getValidar($cedula)
		{	
			$this->_query = "SELECT persona_id from datos_profesor where cedula = $cedula";
			return $this->Read($cedula); 
		}

		public function getValidarp($cedula)
		{	
			$this->_query = "SELECT persona_idpersona from personal where cedula = $cedula";
			return $this->Read($cedula); 
		}

		public function getValidare($cedula)
		{	
			$this->_query = "SELECT persona_id from alumno where cedula_escolar = $cedula";
			return $this->Read($cedula); 
		}


		public function getDatos($id)
		{	
	
			$this->_query = "SELECT nombre1 ,apellido1 from persona where id_persona = $id";
			return $this->Read($id); 
		}

		public function getConsulta($consultaBusqueda)
		{
			$this->_query ="SELECT * FROM persona
			WHERE ((tipo_persona = 3) and nombre1  LIKE '%$consultaBusqueda%') 
			or ((tipo_persona = 3) and apellido1 LIKE '$consultaBusqueda%')
			OR ((tipo_persona = 3) and CONCAT(nombre1,' ',apellido1) LIKE '$consultaBusqueda%')
			";
			return $this->Read();
		}

		
public function getGs()
		{	
	
			$this->_query = "select gs.id_grado_seccion,g.grado,s.seccion from grado_seccion gs
			inner join grado g on g.id_grado=gs.grado_id
			inner join seccion s on s.id_seccion=gs.seccion_id order by (grado,seccion)";
			return $this->Read(); 
		}

		public function getMaestros()
		{	
	
			$this->_query = "select id_persona,nombre1, apellido1 from persona where tipo_persona=3";
			return $this->Read(); 
		}

		public function getUnico_maestro($id)
		{	
	
			$this->_query = "select iddatos_profesor from datos_profesor where persona_id = $id";
			return $this->Read(); 
		}



		public function asignarGrupo($grupo)
		{	
			$this->_query = "SELECT insert_grupo_x_instrumentos(:idgrupo,:idinstrumento)";
			$this->CUD($grupo); 
		}
		
		public function registrarActividad($grupo)
		{	
			$this->_query = "insert into actividades(fecha_act,nombre_actividad,can_varones,can_hembras,datos_profesor,grado_seccion)
	 values (:fecha,:nombre,:cantidadh,:cantidadm,:maestros,:gs)";
			$this->CUD($grupo); 
		}	

		public function asignarActividad($grupo)
		{	
			$this->_query = "SELECT insert_grupo_x_actividad(:idgrupo,:idactividad)";
			$this->CUD($grupo); 
		}	

		public function getActividad()
		{
			$this->_query ="SELECT * FROM actividad_horario_ubicacion";
			return $this->Read();
		}	


		public function getMateriales()
		{
			$this->_query ="SELECT * FROM materiales";
			return $this->Read();
		}

		public function insertMateriales($materiales)
		{	
			$this->_query = "SELECT insert_materiales(:id)";
			$this->CUD($materiales); 
		}


		public function getGrupo()
		{
			$this->_query ="SELECT * FROM grupo_instrumento";
			return $this->Read();
		}

		public function getInstrumento()
		{
			$this->_query ="SELECT * FROM instrumento_tipo";
			return $this->Read();
		}
	
		public function getprestamos()
		{
			$this->_query ="select p.id_prestamos, p.fecha_entrega, p.fecha_devolucion,per.nombre1,per.apellido1,b.titulo from prestamos as p
inner join persona per on per.id_persona = p.persona 
inner join bibliograficos_y_nobibliograficos b on idbibliograficos_y_nobibliograficos = p.bibliografico_idbibliografico where status=1";
			return $this->Read();
		}

		
		public function getCantidadarticulo($id)
		{
			$this->_query ="SELECT cota from bibliograficos_y_nobibliograficos where idbibliograficos_y_nobibliograficos = $id";
			return $this->Read();
		}

		public function getArticulos()
		{
			$this->_query ="SELECT idbibliograficos_y_nobibliograficos, titulo from bibliograficos_y_nobibliograficos";
			return $this->Read();
		}

		public function updateGrupo($grupo)
		{	
			//preparamos el query
			echo $this->_query = "UPDATE grupo SET 
						nombre_grupo = :nombre,
						limite_personas = :limite
						where idgrupo = :id";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD($grupo); 
		}
			public function actualizarPrestamo($id)
		{	
			//preparamos el query
			$this->_query = "select devolucion($id)";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD(); 
		}


		public function deleteGrupo($id)
		{
			$this->_query = "DELETE  FROM grupo where idgrupo = $id";
			return $this->CUD();
		}

}?>	