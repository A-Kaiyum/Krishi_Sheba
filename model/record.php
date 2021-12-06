 <?php
 class records extends DBconnection{

    public $id;
    public $farmer_id;
    public $crops;
    public $cattles;
    public $fishari;
    public $updated_at;
    private $table_name = "records";

    public function __construct(){
    parent::__construct();

}

    public function getrecords(){
        $sql = "SELECT * FROM ".$this->table_name;
        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];

}

public function gettotalland(){
        $sql = "SELECT sum(total_land) as 'td' FROM records";
        $query = $this->db->prepare($sql);
        $query->execute();
        $req = $query->fetchAll(PDO::FETCH_ASSOC);
        $td= $req[0]['td'];
        return $td;
        
}

    public function getData(){
        $sql = "SELECT  farmers.name,farmers.address,$this->table_name.* FROM farmers inner join .$this->table_name on farmers.id = .$this->table_name.farmer_id";

        $query = $this->db->query($sql);
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        return $data ? $data : [];

}
    

    public function save(){
        $sql = "INSERT INTO ".$this->table_name."(farmer_id,crops,cattles,fishari) VALUES(?,?,?,?)";
        $query = $this->db->prepare($sql);
        $query->execute([$this->farmer_id,$this->crops,$this->cattles,$this->fishari]);
        return $this->db->lastInsertId();

}

    public function update($id){

        $sql = "UPDATE ".$this->table_name." SET farmer_id=?,crops=?, cattles=?, fishari=? WHERE id=$id";
        $query = $this->db->prepare($sql);
        $status = $query->execute([$this->farmer_id,$this->crops,$this->cattles,$this->fishari]);
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