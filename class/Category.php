<?php

include_once "../db/db_class.php";

class Category
{
    private  $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCategory($catName)
    {
        $catName = mysqli_real_escape_string($this->db->link,$catName);
//        select * from AXDelNotesNoTracking where count(salesid) > 1
        $query = "SELECT catname FROM category where catname = '$catName'";
        $getCat = $this->db->select($query);
        if (empty($catName)){
            $msg = "Category name can't be empty";
            return $msg;
        }elseif ($getCat){
            $msg = "Category already exists";
            return $msg;
        }else{
            $query = "INSERT INTO category(catname) VALUES ('$catName')";
            $catInsert = $this->db->insert($query);
            if ($catInsert){
                $msg = "<span class='success'>Category Inserted</span>";
                return $msg;
            }else{
                $msg = "<span class='failed'>Category not Inserted</span>";
                return $msg;
            }
        }

    }

    public function getCategory()
    {
        $query = "SELECT * FROM category";
        $getCat = $this->db->select($query);
        return $getCat;
    }

    public function deleteCategory($id)
    {
        $query = "DELETE FROM category WHERE catid='$id' ";
        $delcat = $this->db->delete($query);
        return $delcat;
    }
}