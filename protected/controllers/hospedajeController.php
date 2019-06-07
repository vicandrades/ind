<?php 
	
	class hospedajeController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_hospedaje;
		
		public function __construct(){
	
			parent::__construct();
			$this->_hospedajeModel = $this->loadModel('hospedaje');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			/*$this->_sidebar_menu =array(
					array(
				'id' => 'hospedaje',
				'title' => 'Hospedaje',
				'link' => BASE_URL . 'hospedaje/index'
						)
									);//fin sidebar*/
		}
		
		function index(){
			$this->_view->render('index', 'hospedaje', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

	 	function sexo(){
			$sexo = $this->_registroModel->getSexo();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($sexo);	
		}

		function edificio(){
			$edificio = $this->_registroModel->getEdificio();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($edificio);	
		}

		function piso(){
			$id=$_POST['id'];
			$piso = $this->_registroModel->getPiso($id);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($piso);	
		}

		function habitacion(){
			$id=$_POST['id'];
			$habitacion = $this->_registroModel->getHabitacion($id);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($habitacion);	
		}

		function disciplina(){
			$disciplina= $this->_registroModel->getDisciplina();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($disciplina);	
		}

		function tipo_persona(){
			$tipo = $this->_registroModel->getTipoPersona();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($tipo);	
		}

		function listarPersonas()
		{

			$listado = $this->_registroModel->getPersonas();
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}



		function registrarPersona()
		{		

					$persona = array(
						':nombre' => $_POST['nombre'],
						':apellido' => $_POST['apellido'],
						':fecha_nacimiento' => $_POST['fecha_nacimiento'],
						':cedula' => $_POST['cedula'],
						':sexo' => $_POST['sexo'],
						':tipo' => $_POST['tipo'],
						':disciplina' => $_POST['disciplina']
						);
					
					$this->_registroModel->insertPersona($persona);
					

				//$this->_view->redirect('persons/index');

		}

			function registrarEdificio()
		{		
			$edf = array(
						':nombre' => $_POST['nombre']);
			echo $this->_registroModel->insertEdificio($edf);


		}

			function registrarPiso()
		{		
			$datos = array(
						':nombre' => $_POST['nombre'],
						':edificio' => $_POST['edificio']
					);
			echo $this->_registroModel->insertPiso($datos);


		}

		function registrarHabitacion()
		{		
			$datos = array(
						':nombre' => $_POST['nombre'],
						':piso' => $_POST['piso']
					);
			echo $this->_registroModel->insertHabitacion($datos);
		}


		function registrarCama()
		{		
			$datos = array(
						':nombre' => $_POST['nombre'],
						':habitacion' => $_POST['habitacion']
					);
			echo $this->_registroModel->insertCama($datos);


		}


			function registrarDisciplina()
		{		
			$disciplina = array(
						':nombre' => $_POST['nombre']);
			echo $this->_registroModel->insertDisciplina($disciplina);


		}

		function asignarplanes()
		{		

					$datos = array(
						':hotel' => $_POST['hotel'],
						':plan' => $_POST['plan']
						);
					//var_dump($plan);
					
							$this->_registroModel->asignarPLan($datos);
					
    		

				

				//$this->_view->redirect('persons/index');

		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$listado = $this->_registroModel->getHotel();
		    //var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}

		function listarplanes()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$hotel=$_POST['hotel'];
			//var_dump($hotel);
			//$hotel=1;
			$listado = $this->_registroModel->getPlanesHotel($hotel);
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		
		function listadoPlan()
		{

			$listado = $this->_registroModel->getPlanes();
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}

		function cargarplan()
		{

			$id=$_POST['plan'];
			$listado = $this->_registroModel->getPlan($id);
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}




}?>