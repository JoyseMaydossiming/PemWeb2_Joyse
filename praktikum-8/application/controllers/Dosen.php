<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function index()
    {
        $this->load->model('dosen_model', 'dsn');
        $all_dosen = $this->dsn->getAllData();

        $data['all_dosen'] = $all_dosen;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dosen/index', $data);
        $this->load->view('layouts/footer');
    }
    public function view()
    {
        $nidn = $this->input->get('id');

        $this->load->model('dosen_model', 'dsn');
        $queried_dsn = $this->dsn->findById($nidn);

        $data['dsn'] = $queried_dsn;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dosen/view', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function create()
    {
        $data['judul'] = 'Form Input dosen';

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dosen/baseform', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function update()
    {
        $nidn = $this->input->get('id');
        $data['judul'] = 'Form Edit dosen';

        $this->load->model('dosen_model', 'dsn');
        $queried_dsn = $this->dsn->findById($nidn);

        $data['dsn'] = $queried_dsn;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('dosen/baseform', $data);
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        $nidn = $this->input->get('id');

        $this->load->model('dosen_model', 'dsn');
        $this->dsn->delete([$nidn]);

        redirect(base_url() . 'index.php/dosen', 'refresh');
        return;
    }
    public function save()
    {
        $this->load->model('dosen_model', 'dsn');

        $nidn = $this->input->post('nidn');
        $_nama = $this->input->post('name');
        $_gender = $this->input->post('jk');
        $_tmp_lahir = $this->input->post('tmp_lahir');
        $_tgl_lahir = $this->input->post('tgl_lahir');
        $_prodi_kode = $this->input->post('prodi');
        $_pendidikan_akhir = $this->input->post('pendidikan_akhir');
        $_isEdit = $this->input->post('isEdit');

        if (isset($_isEdit) && $_isEdit) {
            $this->dsn->update([
                $nidn,
                $_nama,
                $_gender,
                $_tmp_lahir,
                $_tgl_lahir,
                $_pendidikan_akhir,
                $_prodi_kode,
                $nidn,
            ]);
        } else {
            $this->dsn->save([
                $nidn,
                $_nama,
                $_gender,
                $_tmp_lahir,
                $_tgl_lahir,
                $_pendidikan_akhir,
                $_prodi_kode,
            ]);
        }


        redirect(base_url() . 'index.php/dosen/view?id=' . $nidn, 'refresh');
        return;
    }
}
