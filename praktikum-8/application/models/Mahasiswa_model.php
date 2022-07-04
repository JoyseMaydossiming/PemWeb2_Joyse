<?php
class Mahasiswa_model extends CI_Model
{
    private $table_name = 'mahasiswa';

    public function getAllData()
    {
        return $this->db->get($this->table_name)->result();
    }

    public function findById($id)
    {
        $this->db->where('nim', $id);
        return $this->db->get($this->table_name)->row();
    }

    public function save($data)
    {
        $sql = "INSERT INTO mahasiswa (nim,nama,gender,tmp_lahir,tgl_lahir,prodi_kode,ipk) VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql, $data);
    }
    public function update($data)
    {
        $sql = "UPDATE mahasiswa SET nim=?,nama=?,gender=?,tmp_lahir=?,tgl_lahir=?,prodi_kode=?,ipk=? WHERE nim = ?";
        $this->db->query($sql, $data);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM mahasiswa WHERE nim=?";
        $this->db->query($sql, $id);
    }
}
