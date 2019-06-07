<?php 
	
	class personsController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_person;
		
		public function __construct(){
	
			parent::__construct();
			$this->_personModel = $this->loadModel('persons');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'persons'
						),
					array(
				'id' => 'insert',
				'title' => 'Persona',
				'link' => BASE_URL . 'persons/insert'
						),array(
				'id' => 'list',
				'title' => 'Articulos',
				'link' => BASE_URL . 'persons/articulos'
						)
									);//fin sidebar
		}
		
		function index(){
		
		
//$str = 'aG9sYQ==';
//echo base64_decode($str);
			$this->_view->render('index', 'persons', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

			function tipopersona(){
			$tipo = $this->_personModel->getTipo();
			echo '<option value="0">SELECCIONE</option>';
			for ($i=0; $i < count($tipo); $i++):
			echo '<option value="'.$tipo[$i]['id_tipopersona'].'">'.$tipo[$i]['tipo_persona'].'</option>'."\n";
			endfor;	
		}

		function autores(){
			$autores = $this->_personModel->getAutores();
			for ($i=0; $i < count($autores); $i++):
			echo '<option value="'.$autores[$i]['idautor'].'">'.$autores[$i]['nombre'].' '.$autores[$i]['apellido'].'</option>'."\n";
			endfor;	
		} 

		function autor(){
			$consultaBusqueda = $_POST['valorBusqueda'];
			//Filtro anti-XSS
			$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
			$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
			$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
			$mensaje = "";
			//Comprueba si $consultaBusqueda está seteado
			if (isset($consultaBusqueda)) 
			{
				$autores = $this->_personModel->getConsulta($consultaBusqueda);
				$filas = mysqli_num_rows($autores);
				if ($filas === 0) {
				$mensaje = "<p>No hay ningún usuario con ese nombre y/o apellido</p>";
				} else {
					for ($i=0; $i < count($autores); $i++):
					echo '<option value="'.$autores[$i]['idautor'].'">'.$autores[$i]['nombre'].' '.$autores[$i]['apellido'].'</option>'."\n";
				endfor;

				}
			}
		}

			function seccion(){
			$seccion = $this->_personModel->getSeccion();
			for ($i=0; $i < count($seccion); $i++):
			echo '<option value="'.$seccion[$i]['id_seccion'].'">'.$seccion[$i]['seccion'].'</option>'."\n";
			endfor;	
		}


			function grado(){
			$grado= $this->_personModel->getGrado();
			echo '<option value="0">SELECCIONE</option>';
			for ($i=0; $i < count($grado); $i++):
			echo '<option value="'.$grado[$i]['id_grado'].'">'.$grado[$i]['grado'].'</option>'."\n";
			endfor;	
		}

			function cargo(){
			$cargo= $this->_personModel->getCargo();
			echo '<option value="0">SELECCIONE</option>';
			for ($i=0; $i < count($cargo); $i++):
			echo '<option value="'.$cargo[$i]['id_cargo'].'">'.$cargo[$i]['cargo'].'</option>'."\n";
			endfor;	
		}

		
///min max html5 para date
		

		function insert()
		{		
			
			//si hay una solicitud via post
			if ($_SERVER['REQUEST_METHOD']=='POST') {
			//Guardamos en un arreglo lo que recibimos de la vista via POST	
				if( $_POST['tipo']==1)
				{
					
					$gradosec1 = $this->_personModel->getGrado_seccion( $_POST['grado'], $_POST['seccion']);

					$alumno = array(
						':nombre' => $_POST['nombre'],
						':apellido' => $_POST['apellido'],
						':fecha_nacimiento' => $_POST['fecha_nacimiento'],
						':sexo' => $_POST['sexo'],
						':tipo' => $_POST['tipo'],
						':cedulae' => $_POST['cedulae'],
						':grado_seccion' => $gradosec1[0][0]
						);
					$this->_personModel->insertAlumno($alumno);
				}

				if( $_POST['tipo']==2)
				{
					$personal = array(
						':nombre' => $_POST['nombre'],
						':apellido' => $_POST['apellido'],
						':fecha_nacimiento' => $_POST['fecha_nacimiento'],
						':sexo' => $_POST['sexo'],
						':tipo' => $_POST['tipo'],
						':cedula' => $_POST['cedula'],
						':cargo' => $_POST['cargo']
						);
					$this->_personModel->insertPersonal($personal);
				}

				if( $_POST['tipo']==3)
				{
					$gradosec = $this->_personModel->getGrado_seccion( $_POST['grado'], $_POST['seccion']);
					$profesor = array(
						':nombre' => $_POST['nombre'],
						':apellido' => $_POST['apellido'],
						':fecha_nacimiento' => $_POST['fecha_nacimiento'],
						':sexo' => $_POST['sexo'],
						':tipo' => $_POST['tipo'],
						':cedula' => $_POST['cedula'],
						':grado_seccion' => $gradosec[0][0]
						);
					$this->_personModel->insertProfesor($profesor);
				}

				$this->_view->redirect('persons/index');
			

			}else{
				//se muestra la ventana si no es via post
				$this->_view->_listado = $this->_personModel->getSexo();
				$this->_view->render("insert",'','',$this->_sidebar_menu);
			}

		}


		function listing()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			$this->_view->_listado =  $listado = $this->_personModel->getPersons();
			$this->_view->render('listing', '', '',$this->_sidebar_menu);
		}
		

		function articulos()
		{
		//llamamos a la funcion getPersons en el modelo y Guardamos el resultado 
		// en $this->_view->_listado para poder acceder a el desde la vista.
			//$this->_view->_listado =  $listado = $this->_personModel->getPersons();
			$this->_view->render('articulos', '', '',$this->_sidebar_menu);
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
			function agregarmaterial()
			{		
				$articulo = array(
						':nombre' => $_POST['nombre'],
						);
				$this->_personModel->insertMaterial($articulo);
				
			    $this->_view->render('articulos', '', '',$this->_sidebar_menu);

			}


			function agregarnobiblio()
		
			{		
				$articulo = array(
						':titulo' => $_POST['nombre'],
						':cota' => $_POST['cantidad']
						);
				$this->_personModel->insertNobibliografico($articulo);
				
			    $this->_view->render('articulos', '', '',$this->_sidebar_menu);

			}


		function update($id = false){
			//Si le damos al boton modificar.
				if ($_SERVER['REQUEST_METHOD']=='POST') {
				//guardamos en un arreglo los valores enviados desde la vista
				//para luego enviarlos a la funcion UpdatePerson
					$persona = array(
					':id' => $_POST['id'], 	
					':nombre' => $_POST['nombre'],
					':apellido' => $_POST['apellido'],
					':cedula' => $_POST['cedula']
					//':fecha_ingreso' => $_POST['fecha_ingreso'] ,
					);
					$this->_personModel->updatePerson($persona);	
					//$this->_view->redirect('persons/update/'.$persona[':id']);
					//OJO redireccionamos a persona update MAS EL ID de la persona, 
					//para que vea los cambios
					return print(json_encode("se ha actualizado"));
				}else{//si no mostramos igual.
		//llamamos a la funcion getUnicaPersona en el modelo y Guardamos el resultado 
		// en $this->_view->_persona para poder acceder a el desde la vista.
					$this->_view->_persona = $this->_personModel->getUnicaPersona($id);
					$this->_view->render('update', 'persons', '',$this->_sidebar_menu);
				}
		}


		function delete($id){

			$listado = $this->_personModel->deletePerson($id);
			if(false == $listado)
				{
					 echo 'Error No puedes eliminar a esta persona porque tiene relacion con otro tabla';	
				}
			$this->_view->redirect('persons/listing');

		}


}?>