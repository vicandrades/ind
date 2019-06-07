<?php 
	class estadisticaController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_estadistica;
		
		public function __construct(){
	
			parent::__construct();
			$this->_estadisticaModel = $this->loadModel('estadistica');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'estadistica'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'estadistica', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}


		function calcular()
		{	
			//si hay una solicitud via post
			if ($_SERVER['REQUEST_METHOD']=='POST') {
			//Guardamos en un arreglo lo que recibimos de la vista via POST	
				//enviamos ala funcion insertPersons del Modelo de personas 
				//el arreglo previamente recibido
				 $listado = $this->_estadisticaModel->getActividades($_POST['fechai'],$_POST['fechaf']);
				 $listado2 = $this->_estadisticaModel->getMateriales_x_actividades($_POST['fechai'],$_POST['fechaf']);
				 $listado1 = $this->_estadisticaModel->getCantidad($_POST['fechai'],$_POST['fechaf']);
				 $this->_view->_fechai =  $_POST['fechai'];
				 $this->_view->_fechaf =  $_POST['fechaf'];
				 $this->_view->_listado2 =  $listado2;
				 $this->_view->_listado =  $listado;
				 $this->_view->_listado1 =  $listado1;
				 $this->_view->render("estadistica",'','',$this->_sidebar_menu);
				 
				//redireccionamos al listado
			}else{
				//se muestra la ventana si no es via post
				$this->_view->render("insert",'','',$this->_sidebar_menu);
			}
			
		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$this->_view->_listado =  $listado = $this->_instrumentoModel->getInstrumento();
			$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		

		function update($id = false){
			//Si le damos al boton modificar.
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				//guardamos en un arreglo los valores enviados desde la vista
				//para luego enviarlos a la funcion UpdatePerson
					$instrumento = array(
					':id' => $_POST['id'], 	
					':instrumento' => $_POST['instrumento'],
					':tipo' => $_POST['tipo']
					);
					$this->_instrumentoModel->updateInstrumento($instrumento);	
					$this->_view->redirect('estadistica/update/'.$instrumento[':id']);
					//OJO redireccionamos a persona update MAS EL ID de la persona, 
					//para que vea los cambios

				}else{//si no mostramos igual.
		//llamamos a la funcion getUnicaPersona en el modelo y Guardamos el resultado 
		// en $this->_view->_persona para poder acceder a el desde la vista.
					$this->_view->_instrumento = $this->_instrumentoModel->getUnicoInstrumento($id);
					$this->_view->render('update', 'estadistica', '',$this->_sidebar_menu);
				}
		}


		function delete($id){

			$this->_instrumentoModel->deleteInstrumento($id);
			$this->_view->redirect('estadistica/listing');

		}


}?>