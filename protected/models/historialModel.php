<?php 

	class historialModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	

		public function getHistorial()
		{
			$this->_query ="SELECT * FROM todo";
			return $this->Read();
		}
	


}?>	