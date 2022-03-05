<?php
require_once 'database/db.php';

class User {

    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    
    //Update Offline status
    public function updateoffline($ostatus,$nstatus){

        $this->db->query('UPDATE game_table SET Status=:nstatus WHERE Status=:ostatus'); 
        $this->db->bind(':nstatus',$nstatus);
        $this->db->bind(':ostatus',$ostatus);
        $this->db->execute();
    }

}