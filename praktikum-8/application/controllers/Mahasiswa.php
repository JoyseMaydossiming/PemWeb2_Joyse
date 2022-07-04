<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function index()
    {
        $this->load->model('mahasiswa_model', 'mhs');
        $list_mahasiswa = $this->mhs->getAllData();

        $data['list_mahasiswa'] = $list_mahasiswa;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function view()
    {
        $nim = $this->input->get('id');

        $this->load->model('mahasiswa_model', 'mhs');
        $queried_mhs = $this->mhs->findById($nim);

        $data['mhs'] = $queried_mhs;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('mahasiswa/view', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function create()
    {
        $data['judul'] = 'Form Input Mahasiswa';

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('mahasiswa/baseform', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function update()
    {
        $nim = $this->input->get('id');
        $data['judul'] = 'Form Edit Mahasiswa';

        $this->load->model('mahasiswa_model', 'mhs');
        $queried_mhs = $this->mhs->findById($nim);

        $data['mhs'] = $queried_mhs;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('mahasiswa/baseform', $data);
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        $nim = $this->input->get('id');

        $this->load->model('mahasiswa_model', 'mhs');
        $this->mhs->delete([$nim]);

        redirect(base_url() . 'index.php/mahasiswa/', 'refresh');
        return;
    }
    public function save()
    {
        $this->load->model('mahasiswa_model', 'mhs');

        $_nim = $this->input->post('nim');
        $_nama = $this->input->post('name');
        $_gender = $this->input->post('jk');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_prodi_kode = $this->input->post('prodi');
        $_ipk = $this->input->post('ipk');
        $_isEdit = $this->input->post('isEdit');

        if (isset($_isEdit) && $_isEdit) {
            $this->mhs->update([
                $_nim,
                $_nama,
                $_gender,
                $_tmp_lahir,
                $_tgl_lahir,
                $_prodi_kode,
                $_ipk,
                $_nim,
            ]);
        } else {
            $this->mhs->save([
                $_nim,
                $_nama,
                $_gender,
                $_tmp_lahir,
                $_tgl_lahir,
                $_prodi_kode,
                $_ipk
            ]);
        }


        redirect(base_url() . 'index.php/mahasiswa/view?id=' . $_nim, 'refresh');
        return;
    }
}
