<?php
class Login_model extends CI_Model
{
    public function login($data)
    {
        $sql = "SELECT * FROM user WHERE username=? AND password=?";

        $resquery = $this->db->query($sql, $data);
        return $resquery->row();
    }
}
