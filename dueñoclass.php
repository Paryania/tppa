<?php
require_once 'includes/mysqliConn.php';

class DueñoClass{
    private $mysqli;
    private $nombre;
    private $contraseña;

    public function __construct ()
    {
        $oMysqli= new ManagerMysqli();
        $this->mysqli=$oMysqli->getConnection();
    }

    public function setnombre($nombre){
        $this->nombre = trim(htmlspecialchars($nombre));
    }
    public function setcontraseña($contraseña){
        $this->contraseña = trim(htmlspecialchars($contraseña));
    }
    public function getnombre () {return $this->nombre;}


    public function getAll(){
        $query="SELECT * FROM dueños";
        $result=$this->mysqli->query($query);
        $vdueños=array();
        if($result->num_rows>0){
        while ($row=$result->fetch_array()){
            $vdueño=array(
                'nombre'=>$row['nombre'],
                'contraseña'=>$row['contraseña']
            );
            $vdueños[]=$vdueño;
        }}
        return $vdueños;
    }

    public function addDueño(){
        $stmt=$this->mysqli->prepare("INSERT INTO dueños (nombre, contraseña) VALUES (?, ?)");
        if($stmt){
            $stmt->bind_param("ss", $this->nombre, $this->contraseña);
            $result=$stmt->execute();
            $stmt->close();
            return $result;
        } else {
            return false;
        }
    }

    public function __destruct(){
        $this->mysqli->close();
    }
}

?>