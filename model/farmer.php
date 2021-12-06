 <?php
 class farmers extends DBconnection{

    public $id;
    public $name;
    public $address;
    public $phone;
    public $total_land;
    public $updated_at;
    private $table_name = "farmers";

    public function __construct(){
    parent::__construct();

}

    public function getfarmers(){
        $sql = "SELECT * FROM ".$this->table_name;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];

}

public function gettotalland(){
        $sql = "SELECT sum(total_land) as 'td' FROM farmers";
        $query = $this->db->prepare($sql);
        $query->execute();
        $req = $query->fetchAll(PDO::FETCH_ASSOC);
        $td= $req[0]['td'];
        return $td;
        
}

    public function getfarmerById($id){
        $sql = "SELECT * FROM ".$this->table_name." WHERE id=?";
        $query = $this->db->prepare($sql);
        $query->execute([$id]);
        $data = $query->fetch(PDO::FETCH_ASSOC);
        return $data ? $data : [];

}
    

    public function save(){
        $sql = "INSERT INTO ".$this->table_name."(name,address,phone,total_land) VALUES(?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$this->name,$this->address,$this->phone,$this->total_land]);
        return $this->db->lastInsertId();

}

    public function update($id){

        $sql = "UPDATE ".$this->table_name." SET name=?,address=?, phone=?, total_land=? WHERE id=$id";
        $query = $this->db->prepare($sql);
        $status = $query->execute([$this->name,$this->address,$this->phone,$this->total_land]);
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