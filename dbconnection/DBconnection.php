<?php

class DBconnection {
	protected $db;
	public function __construct(){
		try{
			$this->db = new PDO("mysql:host=localhost;dbname=KrishiSeba","root","");
			

		}
		
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}





?>