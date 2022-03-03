<?php
require_once 'dbcontroller.php';
class user
{
    public $db_handle;
    function __construct()
    {
        $this->db_handle = new datacontroller();
    }
    function adduser($name, $email, $phone, $password)
    {
        $sql = "insert into `user` (`Name`, `Email_Id`, `Phone_No`, `Password`) VALUES (?,?,?,?)";
        $param_type = "sssssi";
        $param_array = array(
            $name,
            $email,
            $phone,
            $password
        );
        $result = $this->db_handle->insert($sql, $param_type, $param_array);
        return $result;
    }

    function updateuser($name, $phone, $address, $username)
    {
        $sql = "Update `user` set name = ?, phone = ?, address = ? where email = ? ";
        $param_type = "ssss";
        $param_array = array(
            $name,
            $phone,
            $address,
            $username
        );
        $this->db_handle->update($sql, $param_type, $param_array);
    }
    function updateuserstatus($status, $username)
    {
        if ($status) {
            $sql = "Update `user` set status = true where email = ? ";
        } else {
            $sql = "Update `user` set status = false where email = ? ";
        }
        $param_type = "s";
        $param_array = array(
            $username
        );
        $this->db_handle->update($sql, $param_type, $param_array);
    }
    function getuserbyid($username)
    {
        $sql = "select * from `user` where User_Id = ? ";
        $param_type = 'i';
        $param_array = array(
            $username
        );
        $result = $this->db_handle->runquery($sql, $param_type, $param_array);
        return $result;
    }
    function getuserbyemail($username)
    {
        $sql = "select * from `user` where Email_Id = ? ";
        $param_type = "s";
        $param_array = array(
            $username
        );
        $result = $this->db_handle->runquery($sql, $param_type, $param_array);
        return $result;
    }
    function getalluser()
    {
        $sql = "select * from `user`";
        $result = $this->db_handle->RunBaseQuery($sql);
        return $result;
    }
}