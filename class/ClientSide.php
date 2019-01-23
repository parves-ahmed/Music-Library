<?php
include_once "db/db_class.php";

class ClientSide
{
    private  $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getallTrap()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Trap Nation' ORDER BY songid DESC";
        $result = $this->db->select($query);
        return$result;
    }


    public function getTrap()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Trap Nation' AND songs.stype=2 ORDER BY songid DESC";
        $result = $this->db->select($query);
        return$result;
    }
    public function getallRock()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Rock' ORDER BY songid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getRock()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Rock' AND songs.stype=2 ORDER BY songid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getHip()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Hip Hop' AND songs.stype=2 ORDER BY songid DESC";
        $result = $this->db->select($query);
        return $result;
    }
    public function getallPop()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Pop' ORDER BY songid DESC";
        $result = $this->db->select($query);
        return$result;
    }
    public function getPop()
    {
        $query = "SELECT songs.songid,songs.title,songs.songf,songs.thumbf,category.catname 
                  FROM songs,category WHERE category.catid=songs.catid AND category.catname='Pop' AND songs.stype=2 ORDER BY songid DESC";
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