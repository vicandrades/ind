<?php 
	
	class facturacionController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_facturacion;
		
		public function __construct(){
	
			parent::__construct();
			$this->_facturacionModel = $this->loadModel('facturacion');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'planes',
				'title' => 'Registrar Planes',
				'link' => BASE_URL . 'facturacion/planes'
						),array(
				'id' => 'list',
				'title' => 'Hoteles',
				'link' => BASE_URL . 'facturacion/hotel'
						)
						,array(
				'id' => 'listado',
				'title' => 'Lista de planes',
				'link' => BASE_URL . 'facturacion/listaPlanes'
						)
									);//fin sidebar
		}
		
		function index(){
			$this->_view->render('index', 'facturacion', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

				function hotel(){
			$this->_view->render('hotel', 'facturacion', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function planes(){
			$this->_view->render('plan', 'facturacion', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function listaplanes(){
			$this->_view->render('listaplanes', 'facturacion', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

	 	function moneda(){
			$moneda = $this->_facturacionModel->getMoneda();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($moneda);	
		}

		function frecuencia(){
			$frecuencia = $this->_facturacionModel->getFrecuencia();
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($frecuencia);	
		}



		function registrar()
		{		

					$plan = array(
						':nombre' => $_POST['nombre'],
						':descripcion' => $_POST['descripcion'],
						':moneda' => $_POST['moneda'],
						':monto' => $_POST['monto'],
						':frecuencia' => $_POST['frecuencia'],
						':fecha_facturacion' => $_POST['fecha_facturacion']
						);
					
					$this->_facturacionModel->insertPlan($plan);
				

				//$this->_view->redirect('persons/index');

		}

		function asignarplanes()
		{		

					$datos = array(
						':hotel' => $_POST['hotel'],
						':plan' => $_POST['plan']
						);
					//var_dump($plan);
					
							$this->_facturacionModel->asignarPLan($datos);
					
    		

				

				//$this->_view->redirect('persons/index');

		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$listado = $this->_facturacionModel->getHotel();
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
			$listado = $this->_facturacionModel->getPlanesHotel($hotel);
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		
		function listadoPlan()
		{

			$listado = $this->_facturacionModel->getPlanes();
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}

		function cargarplan()
		{

			$id=$_POST['plan'];
			$listado = $this->_facturacionModel->getPlan($id);
			//var_dump($listado);
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($listado);
			//$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}




}?>