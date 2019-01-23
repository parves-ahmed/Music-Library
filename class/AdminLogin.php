<?php
include "../db/Session.php";
Session::checkLogin();
include_once "../db/db_class.php";

class AdminLogin
{
    private  $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function adminLogin($user,$pass)
    {
        $adminUser = mysqli_real_escape_string($this->db->link,$user);
        $adminPass = mysqli_real_escape_string($this->db->link,$pass);

        if (empty($adminUser)||empty($adminPass)){
            $msg = "UserName or Pass may be empty";
            return $msg;
        }else{
            $query="SELECT * FROM admin_tbl 
                WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";
            $checkLogin = $this->db->select($query);
            if ($checkLogin != false){
                $val = $checkLogin->fetch_assoc();
                Session::set("login",true);
                Session::set("adminId",$val['adminId']);
                Session::set("adminPass",$val['adminPass']);
                Session::set("adminName",$val['adminName']);
                Session::set("adminUser",$val['adminUser']);
                header("Location: dashboard.php");

            }else{
                $msg = "username or pass may be wrong";
                return $msg;
            }
        }


    }
}