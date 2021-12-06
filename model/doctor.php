 <?php
 class doctors extends DBconnection{

 	public $id;
 	public $name;
 	public $address;
 	public $email;
 	public $phone;
 	public $designation;
 	public $status;
 	public $updated_at;
 	private $table_name = "doctors";

	public function __construct(){
	parent::__construct();

}

	public function getdoctors(){
		$sql = "SELECT * FROM ".$this->table_name;
		$query = $this->db->query($sql);
		$data = $query->fetchAll(PDO::FETCH_ASSOC);
		return $data ? $data : [];

}
	public function getdoctorById($id){
		$sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];

}
	public function getdoctorByEmail($email){

		$sql = "SELECT * FROM ".$this->table_name." WHERE email=?";
		$query = $this->db->prepare($sql);
		$query->execute([$email]);
		$data = $query->fetch(PDO::FETCH_ASSOC);
		return $data ? $data : [];

}

	public function save(){
		$sql = "INSERT INTO ".$this->table_name."(name,address,email,phone,designation,status) VALUES(?,?,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->execute([$this->name,$this->address,$this->email,$this->phone,$this->designation,$this->status]);
		return $this->db->lastInsertId();

}

	public function update($id){

		$sql = "UPDATE ".$this->table_name." SET name=?,address=?, email=?, phone=?, designation=?, status=? WHERE id=$id";
		$query = $this->db->prepare($sql);
		$status = $query->execute([$this->name,$this->address,$this->email,$this->phone,$this->designation,$this->status]);
			return $status ? true : false;
}



	public function delete($id){
		$sql = "DELETE FROM ".$this->table_name." WHERE id =?";
		$query = $this->db->prepare($sql);
		$status = $query->execute([$id]);
		return $status ? true : false;


}

 }




 ?>