<?php 
	class actividadController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_actvidad;
		
		public function __construct(){
	
			parent::__construct();
			$this->_actividadModel = $this->loadModel('actividad');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'actividad'
						),
					array(
				'id' => 'insert',
				'title' => 'Registrar actividad',
				'link' => BASE_URL . 'actividad/insert'
						),array(
				'id' => 'list',
				'title' => 'Listado',
				'link' => BASE_URL . 'actividad/listing'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'actividad', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}


		function insert()
		{	
			//si hay una solicitud via post
			if ($_SERVER['REQUEST_METHOD']=='POST') {
			//Guardamos en un arreglo lo que recibimos de la vista via POST	
				$actividad = array(
					':actividad' => $_POST['actividad'],
					':fecha_inicio' => $_POST['fecha_inicio'],
					':fecha_fin' => $_POST['fecha_fin'],
					':ubicacion' => $_POST['ubicacion']
					);
				//enviamos ala funcion insertPersons del Modelo de personas 
				//el arreglo previamente recibido
				$this->_actividadModel->insertActividad($actividad);
				//redireccionamos al listado
				$this->_view->redirect('actividad/listing');
			}else{
				//se muestra la ventana si no es via post
				$this->_view->render("insert",'','',$this->_sidebar_menu);
			}
			
		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$this->_view->_listado =  $listado = $this->_actividadModel->getActividad();
			$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		

		function update($id = false){
			//Si le damos al boton modificar.
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				//guardamos en un arreglo los valores enviados desde la vista
				//para luego enviarlos a la funcion UpdatePerson
					$actividad = array(
					':id' => $_POST['id'], 	
					':actividad' => $_POST['actividad'],
					':fecha_inicio' => $_POST['fecha_inicio'],
					':fecha_fin' => $_POST['fecha_fin'],
					':ubicacion' => $_POST['ubicacion']
					);
					$this->_actividadModel->updateActividad($actividad);	
					$this->_view->redirect('actividad/update/'.$actividad[':id']);
					//OJO redireccionamos a persona update MAS EL ID de la persona, 
					//para que vea los cambios

				}else{//si no mostramos igual.
		//llamamos a la funcion getUnicaPersona en el modelo y Guardamos el resultado 
		// en $this->_view->_persona para poder acceder a el desde la vista.
					$this->_view->_actividad = $this->_actividadModel->getUnicaActividad($id);
					$this->_view->render('update', 'actividad', '',$this->_sidebar_menu);
				}
		}


		function delete($id){

			$this->_actividadModel->deleteActividad($id);
			$this->_view->redirect('actividad/listing');

		}


}?>