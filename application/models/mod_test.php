<?php
class Mod_test extends CI_Model{
    public function myfunction($value){
        echo "<br>User ddetails<br>";
        return $this->db->insert('users',$value);
    }
}
?>