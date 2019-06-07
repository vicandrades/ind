<?php 
	class gestionController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_gestion;
		
		public function __construct(){
	
			parent::__construct();
			$this->_gestionModel = $this->loadModel('gestion');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'gestion'
						),
					array(
				'id' => 'prestamo',
				'title' => 'Prestamo',
				'link' => BASE_URL . 'gestion/prestamo'
						),array(
				'id' => 'actividad',
				'title' => 'Actividad',
				'link' => BASE_URL . 'gestion/actividad'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'grupo', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function maestro(){
			$consultaBusqueda = $_POST['valorBusqueda'];
			//Filtro anti-XSS
			$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
			$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
			$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
			$mensaje = "";
			//Comprueba si $consultaBusqueda está seteado
			if (isset($consultaBusqueda)) 
			{
				$autores = $this->_gestionModel->getConsulta($consultaBusqueda);
				$filas = mysqli_num_rows($autores);
				if ($filas === 0) {
				$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
				} else {
				for ($i=0; $i < count($autores); $i++):
					echo '<option value="'.$autores[$i]['id_persona'].'">'.$autores[$i]['nombre1'].' '.$autores[$i]['apellido1'].'</option>'."\n";
				endfor;

				}
			}
		}

		function articulos(){
			$articulos = $this->_gestionModel->getArticulos();
			for ($i=0; $i < count($articulos); $i++):
			echo '<option value="'.$articulos[$i]['idbibliograficos_y_nobibliograficos'].'">'.$articulos[$i]['titulo'].'</option>'."\n";
			endfor;	
		}

		function materiales(){
			$articulos = $this->_gestionModel->getMateriales();
			for ($i=0; $i < count($articulos); $i++):
			echo '<option value="'.$articulos[$i]['idmateriales'].'">'.$articulos[$i]['nombre_material'].'</option>'."\n";
			endfor;	
		}

		function maestros()
		{
			$autores = $this->_gestionModel->getMaestros();
			for ($i=0; $i < count($autores); $i++):
			echo '<option value="'.$autores[$i]['id_persona'].'">'.$autores[$i]['nombre1'].' '.$autores[$i]['apellido1'].'</option>'."\n";
			endfor;	
		} 

		function gs()
		{
			$autores = $this->_gestionModel->getGs();
			for ($i=0; $i < count($autores); $i++):
			echo '<option value="'.$autores[$i]['id_grado_seccion'].'">'.$autores[$i]['grado'].' '.$autores[$i]['seccion'].'</option>'."\n";
			endfor;	
		} 

		function validarpr(){
			$cedula = $_POST['cedula'];
			$id = $this->_gestionModel->getValidar($cedula);
			if($id==null)
				{
					echo '1';
					exit;
				}
			$datos= $this->_gestionModel->getDatos($id[0][0]);
			echo ' '.$datos[0]['nombre1'].' '.$datos[0]['apellido1'];
		}

		function validarp(){
			$cedula = $_POST['cedula'];
			$id = $this->_gestionModel->getValidarp($cedula);
			if($id==null)
				{
					echo '1';
					exit;
				}
			$datos= $this->_gestionModel->getDatos($id[0][0]);
			echo ' '.$datos[0]['nombre1'].' '.$datos[0]['apellido1'];
		}

		function validare(){
			$cedula = $_POST['cedula'];
			$id = $this->_gestionModel->getValidare($cedula);
			if($id==null)
				{
					echo '1';
					exit;
				}
			$datos= $this->_gestionModel->getDatos($id[0][0]);
			echo ' '.$datos[0]['nombre1'].' '.$datos[0]['apellido1'];
		}



		function asignar($idgrupo = false,$idinstrumento=false)
		{
			if($idinstrumento != false)
			{
				$grupo = array(
					':idgrupo' => $idgrupo,
					':idinstrumento' => $idinstrumento);
				$this->_grupoModel->asignarGrupo($grupo);
				$this->_view->redirect('grupo/listing');
				exit();

			}
			else{
				$this->_view->_idgrupo = $idgrupo;
				$this->_view->_listado = $listado = $this->_grupoModel->getInstrumento();
				$this->_view->render('instrumento', 'grupo', '',$this->_sidebar_menu);
	
			}
		}	

		function actividad()
		{
			if ($_SERVER['REQUEST_METHOD']=='POST') 
			{
				$materiales = $_POST['materiales'];
				$id = $this->_gestionModel->getUnico_maestro($_POST['maestros']);
				$actividad= array(
						':fecha' => $_POST['fecha'],
						':nombre' => $_POST['nombre'],
						':cantidadh' => $_POST['cantidadh'],
						':cantidadm' => $_POST['cantidadm'],
						':maestros' => $id[0][0],
						':gs' => $_POST['gs']
						);
				$this->_gestionModel->registrarActividad($actividad);

				for ($i=0; $i < count($materiales); $i++):
				$arr2 = array(
						':id' => $materiales[$i]
						);
			    $this->_gestionModel->insertMateriales($arr2);
			    endfor;

				$this->_view->redirect('gestion/index');
			}

			else{
				$this->_view->render('actividad', 'gestion', '',$this->_sidebar_menu);
	
			}
		}

				function agregarbiblio()
		{		
				$autores =  $_POST['autores']; 
				$libro = array(
						':titulo' => $_POST['titulo'],
						':cota' => $_POST['cota']
						);
				$this->_personModel->insertLibro($libro);
				
				for ($i=0; $i < count($autores); $i++):
				$arr2 = array(
						':id' => $autores[$i]
						);
			    $this->_personModel->insertAutores($arr2);
			    endfor;
			    $this->_view->render('articulos', '', '',$this->_sidebar_menu);

		}
		function asignar1($idgrupo = false,$idactividad=false)
		{
			if($idactividad != false)
			{
				$grupo = array(
					':idgrupo' => $idgrupo,
					':idactividad' => $idactividad);
				$this->_grupoModel->asignarActividad($grupo);
				$this->_view->redirect('grupo/listing');
				exit();

			}
			else{
				$this->_view->_idgrupo = $idgrupo;
				$this->_view->_listado = $listado = $this->_grupoModel->getActividad();
				$this->_view->render('actividad', 'grupo', '',$this->_sidebar_menu);
	
			}
	
		}

		
 
		function devolucion($id=false)
		{	
				
				$this->_gestionModel->actualizarPrestamo($id);
				//redireccionamos al listado
				$this->_view->redirect('gestion/prestamo');
			
			
		}
		function prestamo()
		{	
			//si hay una solicitud via post
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				
				$cedula = $_POST['cedula'];
				$cedulae = $_POST['cedulae'];
				$tipo = $_POST['tipo'];
				if($tipo==1)
					{
						$id = $this->_gestionModel->getValidare($cedulae);
					}
				elseif($tipo==2)
					{
						$id = $this->_gestionModel->getValidarp($cedula);
					}
				else
					{
						$id = $this->_gestionModel->getValidar($cedula);
					}			
			//Guardamos en un arreglo lo que recibimos de la vista via POST
				$listado = $this->_gestionModel->getCantidadarticulo($_POST['articulos']);
				if ($listado[0][0]>=$_POST['cantidad'])
				{
					$prestamo = array(
					':articulo' => $_POST['articulos'],
					':cantidad' => $_POST['cantidad'],
					':fechadev' => $_POST['fecha'],
					':id' => $id[0][0],
					':fecha_prestamo'=> date("d/m/Y")
					);
					$this->_gestionModel->insertPrestamo($prestamo);
					echo'si ha registrado el prestamo';
					exit;
				}
				else{
						echo 'no hay suficientes articulos para la cantidad solicitada,quedan disponibles:'.$listado[0][0];	
						exit;
				}

			}else{
				//se muestra la ventana si no es via post
				$this->_view->_listado =  $listado = $this->_gestionModel->getprestamos();
				$this->_view->render("insert",'','',$this->_sidebar_menu);
			}
			
		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$this->_view->_listado =  $listado = $this->_grupoModel->getGrupo();
			$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		

		function update($id = false){
			//Si le damos al boton modificar.
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				//guardamos en un arreglo los valores enviados desde la vista
				//para luego enviarlos a la funcion UpdatePerson
					$grupo = array(
					':id' => $_POST['id'], 	
					':nombre' => $_POST['nombre'],
					':limite' => $_POST['limite']
					);
					$this->_grupoModel->updateGrupo($grupo);	
					$this->_view->redirect('grupo/update/'.$grupo[':id']);
					//OJO redireccionamos a persona update MAS EL ID de la persona, 
					//para que vea los cambios

				}else{//si no mostramos igual.
		//llamamos a la funcion getUnicaPersona en el modelo y Guardamos el resultado 
		// en $this->_view->_persona para poder acceder a el desde la vista.
					$this->_view->_grupo = $this->_grupoModel->getUnicoGrupo($id);
					$this->_view->render('update', 'grupo', '',$this->_sidebar_menu);
				}
		}


		function delete($id){

			$this->_grupoModel->deleteGrupo($id);
			$this->_view->redirect('grupo/listing');

		}


}?>