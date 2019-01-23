<?php
include_once "../db/db_class.php";


class Songs
{
    private  $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function addCategory($data,$files)
    {
        $title = mysqli_real_escape_string($this->db->link,$data['title']);
        $description = mysqli_real_escape_string($this->db->link,$data['description']);
        $catid = mysqli_real_escape_string($this->db->link,$data['catid']);
        $stype = mysqli_real_escape_string($this->db->link,$data['stype']);


//        image
        $file_name = $files['thumbf']['name'];
        $file_temp = $files['thumbf']['tmp_name'];
        $folder = "images/";
        move_uploaded_file($file_temp, $folder.$file_name);


// audio
        $file_name_a = $files['songf']['name'];
        $file_temp_a = $files['songf']['tmp_name'];
        $folders = "../audio/";
        move_uploaded_file($file_temp_a, $folders.$file_name_a);

//        validate the file extension

        $permit = array('png','jpg','gif');
        $permit_a = array('mp3','wav','ogg');
        $img = pathinfo($file_name, PATHINFO_EXTENSION);
        $aud = pathinfo($file_name_a, PATHINFO_EXTENSION);


        $query = "SELECT title FROM songs where title = '$title'";
            $getTitle = $this->db->select($query);

            if (empty($title)) {
                $msg = "Can't be empty";
                return $msg;
            }elseif ($getTitle) {
                $msg = "Already Existed";
                return $msg;
            }elseif (empty($title) || empty($catid) || empty($stype) || empty($file_name) || empty($file_name_a)){
                $msg = "Can;t be empty";
                return $msg;
            }elseif (!in_array($img,$permit)){
                $msg = "file format is not supported--(only support 'png','jpg','gif')";
                return $msg;
            }elseif (!in_array($aud,$permit_a)){
                $msg = "file format is not supported--(only support 'mp3','wav','ogg') ";
                return $msg;
            }else {
                $query =
                    "INSERT INTO songs(title,description,catid,stype,songf,thumbf)
                    VALUES('$title','$description','$catid','$stype','$file_name_a','$file_name')";
                $songInsert = $this->db->insert($query);
                if ($songInsert){
                    $msg = "<span class='success'>Song Inserted</span>";
                    return $msg;
                }else{
                    $msg = "<span class='failed'>Song not  Inserted</span>";
                    return $msg;
                }

            }



        }




    public function getSong()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid ORDER BY songid DESC";
        $result = $this->db->select($query);
        return$result;
    }

    public function delSong($id)
    {
        $query = "DELETE FROM songs WHERE songid='$id' ";
        $delsong = $this->db->delete($query);
        return $delsong;
    }
}