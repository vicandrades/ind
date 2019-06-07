<?php
	class Model{
		protected $_db;
		protected $_query = false;
		public function __construct() {
			$this->_db = new DataBase();
		}




		public function CUD($array = null){
			try {
				$this->_db->beginTransaction();
				$this->_db->prepare($this->_query)->execute($array);
				$this->_db->commit();
				
			} catch (Exception $e) {
				$this->_db->rollBack();
				echo "Error :: ".$e->getMessage();
				exit();
			}
		}



	
	 function Read(){
			try {
				$this->_db->beginTransaction();
				$auxiliar = $this->_db->query($this->_query);
				$result= $auxiliar->fetchAll();
				$this->_db->commit();
			}
			catch (Exception $e){
				$this->_db->rollBack();
				echo "Error :: ".$e->getMessage();
				exit();
			}
			return $result;
	}//fin de read







}?>