 <?php 

	class facturacionModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		public function insertPerson1($persona)
		{	
			$this->_query = "SELECT insert_persona1(:nombre , :apellido, :cedula, :fecha_nacimiento , :sexo ,:continente,:pais,:serial1,:telefono)";
			$this->CUD($persona); 
		}

		public function insertPlan($plan)
		{	
			$this->_query = "insert into plan values (null, :nombre , :descripcion,:monto ,:fecha_facturacion,:moneda, :frecuencia)";
			$this->CUD($plan); 
		}

		public function insertPersonal($persona)
		{	
			$this->_query = "SELECT insert_personal(:nombre, :apellido, :fecha_nacimiento , :sexo ,:cedula,:tipo,:cargo)";
			$this->CUD($persona); 
		}

		public function insertLibro($libro)
		{	
			$this->_query = "SELECT insert_libro(:titulo,:cota)";
			$this->CUD($libro); 
		}

		public function insertNobibliografico($articulo)
		{	
			$this->_query = "SELECT insert_articulo(:titulo,:cota)";
			$this->CUD($articulo); 
		}

		public function insertMaterial($articulo)
		{	
			$this->_query = "insert into materiales (nombre_material) values (:nombre)";
			$this->CUD($articulo); 
		}

		public function insertAutores($autor)
		{	
			$this->_query = "SELECT insert_autores(:id)";
			$this->CUD($autor); 
		}


		public function insertAlumno($persona)
		{	
			$this->_query = "SELECT insert_alumno(:nombre, :apellido, :fecha_nacimiento , :sexo ,:cedulae,:tipo,:grado_seccion)";
			$this->CUD($persona); 
		}

		public function insertProfesor($persona)
		{	
			$this->_query = "SELECT insert_Profesor(:nombre, :apellido, :fecha_nacimiento , :sexo ,:cedula,:tipo,:grado_seccion)";
			$this->CUD($persona); 
		}

		public function insertDeporte($deporte)
		{	
			$this->_query = "SELECT insert_deporte(:deporte)";
			$this->CUD($deporte); 
		}

		public function insertDeporte1($deporte1)
		{	
			$this->_query = "SELECT insert_deporte1(:deporte1)";
			$this->CUD($deporte1); 
		}

		public function insertGenero($genero)
		{	
			$this->_query = "SELECT insert_genero(:genero)";
			$this->CUD($genero); 
		}


		public function insertGenero1($genero1)
		{	
			$this->_query = "SELECT insert_genero1(:genero1)";
			$this->CUD($genero1); 
		}


		public function insertCancion($cancion)
		{	
			$this->_query = "SELECT insert_cancion(:cancion)";
			$this->CUD($cancion); 
		}

		public function insertCancion1($cancion1)
		{	
			$this->_query = "SELECT insert_cancion1(:cancion1)";
			$this->CUD($cancion1); 
		}

		public function insertCancion2($persona)
		{	
			$this->_query = "SELECT insert_cancion2(:cancion1,:genero)";
			$this->CUD($persona); 
		}

		public function insertMarca($marca)
		{	
			$this->_query = "SELECT insert_marca(:marca)";
			$this->CUD($marca); 
		}

		public function insertMarca1($marca1)
		{	
			$this->_query = "SELECT insert_marca1(:marca1)";
			$this->CUD($marca1); 
		}

		public function insertModelo($modelo)
		{	
			$this->_query = "SELECT insert_modelo(:modelo)";
			$this->CUD($modelo); 
		}

		public function insertModelo1($modelo1)
		{	
			$this->_query = "SELECT insert_modelo1(:modelo1)";
			$this->CUD($modelo1); 
		}

		public function insertModelo2($modelo2)
		{	
			$this->_query = "SELECT insert_modelo2(:modelo11,:marca0)";
			$this->CUD($modelo2); 
		}

		public function getTipo()
		{
			$this->_query ="SELECT * FROM tipo_persona";
			return $this->Read();
		}

		public function getConsulta($consultaBusqueda)
		{
			$this->_query ="SELECT * FROM autores
			WHERE nombre  LIKE '%$consultaBusqueda%' 
			OR apellido LIKE '%$consultaBusqueda%'
			OR CONCAT(nombre,' ',apellido) LIKE '%$consultaBusqueda%'
			";
			return $this->Read();
		}

		public function getHotel()
		{
			$this->_query ='SELECT  @rownum:=@rownum+1 AS rownum,h.nombre as hotel,IF(ISNULL(h.plan_id), "sin asignar", p.nombre) as plan, concat('.'\''.'<center><button onclick="listarplanes('.'\''.',h.id,'.'\''.')"> <span class="glyphicon glyphicon-ok"  style="color:#7DB4D0" data-toggle="tooltip" title="asignar plan"></span></button></center>'.'\''.') as opciones FROM (SELECT @rownum:=0) r, hotel h
			left join plan p on p.id=h.plan_id';
			return $this->Read();
		}

			public function getPlanesHotel($idhotel)
		{
			
			$this->_query ='select p.id,p.nombre,p.descripcion,p.precio,p.fecha_facturacion,m.valor,f.frecuencia, concat('.'\''.'<center><button onclick="asignarplan('.'\''.','.$idhotel.','.'\''.' '.'\''.','.'\''.','.'\''.',p.id,'.'\''.')"> <span class="glyphicon glyphicon-ok"  style="color:#7DB4D0" data-toggle="tooltip" title="asignar plan"></span></button></center>'.'\''.') as opciones from plan p
				inner join moneda m on m.id=p.moneda_id
				inner join frecuencia f on f.id=p.frecuencia_id';
			return $this->Read();
		}

		public function getPlanes()
		{
			
			$this->_query ='select p.id,p.nombre,p.descripcion,p.precio,p.fecha_facturacion,m.valor,m.id,f.id,f.frecuencia, concat('.'\''.'<center><button onclick="actualizarplan('.'\''.',p.id,'.'\''.')"> <span class="glyphicon glyphicon-ok"  style="color:#7DB4D0" data-toggle="tooltip" title="actualizar plan"></span></button></center>'.'\''.') as opciones from plan p
				inner join moneda m on m.id=p.moneda_id
				inner join frecuencia f on f.id=p.frecuencia_id';
			return $this->Read();
		}

		public function getPlan($id)
		{
			
			$this->_query ='select * from plan p
				where p.id= 2';
			return $this->Read();
		}
		public function getMoneda()
		{
			$this->_query ="select id,valor from moneda";
			return $this->Read();
		}

		public function getFrecuencia()
		{
			$this->_query ="select id,frecuencia from frecuencia";
			return $this->Read();
		}

		public function getGrado_seccion($grado,$seccion)
		{
			$this->_query ="select id_grado_seccion from grado_seccion where grado_id = $grado and seccion_id = $seccion";
			return $this->Read(); 
		}

		public function getSeccion()
		{
			$this->_query ="SELECT * FROM seccion";
			return $this->Read();
		}

		
		public function getCargo()
		{
			$this->_query ="SELECT * FROM cargo";
			return $this->Read();
		}

		public function getGrado()
		{
			$this->_query ="SELECT * FROM grado";
			return $this->Read();
		}

		public function getGenero()
		{
			$this->_query ="SELECT * FROM genero";
			return $this->Read();
		}

			public function getCancion($id)
		{
			$this->_query ="SELECT * FROM canciones where genero_idgenero = $id";
			return $this->Read();
		}


		public function getMarca()
		{
			$this->_query ="SELECT * FROM marca";
			return $this->Read();
		}


			public function getModelo($id)
		{
			$this->_query ="SELECT * FROM modelo where marca_idmarca = $id";
			return $this->Read();
		}


		public function getSexo()
		{
			$this->_query ="SELECT * FROM sexo";
			return $this->Read();
		}

		public function getPersons()
		{
			$this->_query ="SELECT idpersona, nombre,apellido,cedula FROM persona";
			return $this->Read();
		}

		public function getUnicaPersona($id)
		{
			$this->_query ="SELECT idpersona,nombre,apellido,cedula FROM persona where idpersona=$id";
			return $this->Read();
		}



		public function updatePerson($persona)
		{	
			//preparamos el query
			echo $this->_query = "UPDATE PERSONA SET 
						nombre 	= :nombre,
						apellido = :apellido,
						cedula = :cedula
						where idpersona = :id";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD($persona); 
		}

				public function asignarPLan($datos)
		{	
			//preparamos el query
			echo $this->_query = "UPDATE hotel SET 
						plan_id 	= :plan
						where id = :hotel";
			// lo ejecutamos mediante la funcion CUD ubicada en el MODEL princpal
			//APP-Model.php
			$this->CUD($datos); 
		}

		public function deletePerson($id)
		{
			$this->_query = "DELETE  FROM persona where idpersona = $id";
			return $this->CUD();
		}

}?>	