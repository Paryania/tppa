<?php   
class ManagerMysqli
{
    public function getConnection()
    {
        $mysqli= new mysqli ("127.0.0.1", "2025_grupo5","gRup38#0419*","2025_grupo5");
        $mysqli->set_charset("utf8");
        return $mysqli;
    }
}
?>