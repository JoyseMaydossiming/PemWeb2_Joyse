<?php
class Dosen_Model extends CI_Model
{
    private $table_name = 'dosen';

    public function getAllData()
    {
        return $this->db->get($this->table_name)->result();
    }

    public function findById($id)
    {
        $this->db->where('nidn', $id);
        return $this->db->get($this->table_name)->row();
    }

    public function save($data)
    {
        $sql = "INSERT INTO dosen (nidn,nama,gender,tmp_lahir,tgl_lahir,pendidikan_akhir,prodi_kode) VALUES (?,?,?,?,?,?,?)";
        $this->db->query($sql, $data);
    }
    public function update($data)
    {
        $sql = "UPDATE dosen SET nidn=?,nama=?,gender=?,tmp_lahir=?,tgl_lahir=?,pendidikan_akhir=?,prodi_kode=? WHERE nidn = ?";
        $this->db->query($sql, $data);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM dosen WHERE nidn=?";
        $this->db->query($sql, $id);
    }
}
