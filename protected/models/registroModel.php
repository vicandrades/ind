 <?php 

	class registroModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		public function insertPersona($persona)
		{	
			$this->_query = "SELECT insert_persona(:nombre , :apellido, :cedula, :fecha_nacimiento , :sexo ,:tipo,:disciplina)";
			$this->CUD($persona); 
		}

		public function insertEdificio($edf)
		{	
			$this->_query = "insert into edificio (edificio,estatus) values (:nombre,0)";
			$this->CUD($edf); 
		}

		public function insertPiso($datos)
		{	
			$this->_query = "insert into piso (nombre_piso,edificio_id,estatus) values (:nombre,:edificio,0)";
			$this->CUD($datos); 
		}

				public function insertHabitacion($datos)
		{	
			$this->_query = "insert into habitacion (habitacion,piso_id,estatus) values (:nombre,:piso,0)";
			$this->CUD($datos); 
		}

		public function insertCama($datos)
		{	
			$this->_query = "insert into cama (cama,habitacion_id,estatus) values (:nombre,:habitacion,0)";
			$this->CUD($datos); 
		}

		public function insertDisciplina($disciplina)
		{	
			$this->_query = "insert into disciplina (disciplina) values (:nombre)";
			$this->CUD($disciplina); 
		}

		public function getPersonas()
		{
			
			$this->_query ='select p.nombre,p.apellido,p.fecha_nacimiento,p.cedula,s.sexo,d.disciplina,tp.tipo_persona from persona p
				inner join sexo s on s.id=p.sexo_id
				left join disciplina d on d.id=p.disciplina_id
				inner join tipo_persona tp on tp.id=p.tipo_persona_id';
			return $this->Read();
		}

		public function insertPlan($plan)
		{	
			$this->_query = "insert into plan values (null, :nombre , :descripcion,:monto ,:fecha_facturacion,:moneda, :frecuencia)";
			$this->CUD($plan); 
		}

		public function insertDeporte($deporte)
		{	
			$this->_query = "SELECT insert_deporte(:deporte)";
			$this->CUD($deporte); 
		}



		public function getTipoPersona()
		{
			$this->_query ="SELECT id,tipo_persona FROM tipo_persona";
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

		public function getSexo()
		{
			$this->_query ="SELECT id,sexo FROM sexo";
			return $this->Read();
		}

		public function getEdificio()
		{
			$this->_query ="SELECT id,edificio,estatus FROM edificio";
			return $this->Read();
		}

	    public function getPiso($id)
		{
			$this->_query ="SELECT id,nombre_piso,estatus FROM piso where edificio_id=$id";
			return $this->Read();
		}

	    public function getHabitacion($id)
		{
			$this->_query ="SELECT id,habitacion,estatus FROM habitacion where piso_id=$id";
			return $this->Read();
		}

		public function getDisciplina()
		{
			$this->_query ="SELECT id,disciplina FROM disciplina";
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