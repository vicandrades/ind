<?php 
	class historialController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_historial;
		
		public function __construct(){
	
			parent::__construct();
			$this->_historialModel = $this->loadModel('historial');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'list',
				'title' => 'Listado',
				'link' => BASE_URL . 'historial/index'
						)
									);//fin sidebar
		}


		function index()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$this->_view->_listado =  $listado = $this->_historialModel->getHistorial();
			$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		



}?>