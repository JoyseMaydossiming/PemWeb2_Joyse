<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function index()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $this->load->model('prodi_model', 'prodi');
        $list_prodi = $this->prodi->getAllData();

        $data['list_prodi'] = $list_prodi;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('prodi/index', $data);
        $this->load->view('layouts/footer');
    }
    public function view()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $kode = $this->input->get('id');

        $this->load->model('prodi_model', 'prodi');
        $queried_prodi = $this->prodi->findById($kode);

        $data['prodi'] = $queried_prodi;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('prodi/view', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function create()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $data['judul'] = 'Form Input prodi';

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('prodi/baseform', $data);
        $this->load->view('layouts/footer');
        return;
    }
    public function update()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $kode = $this->input->get('id');
        $data['judul'] = 'Form Edit prodi';

        $this->load->model('prodi_model', 'prodi');
        $queried_prodi = $this->prodi->findById($kode);

        $data['prodi'] = $queried_prodi;

        $this->load->view('layouts/header');
        $this->load->view('layouts/sidebar');
        $this->load->view('prodi/baseform', $data);
        $this->load->view('layouts/footer');
    }
    public function delete()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $kode = $this->input->get('id');

        $this->load->model('prodi_model', 'prodi');
        $this->prodi->delete($kode);

        redirect(base_url() . 'index.php/prodi', 'refresh');
        return;
    }
    public function save()
    {
        if (!$this->session->has_userdata('username')) {
            redirect(base_url() . 'index.php/auth', 'refresh');
            return;
        }
        $this->load->model('prodi_model', 'prodi');

        $_kode = $this->input->post('kode');
        $_nama = $this->input->post('nama');
        $kaprodi = $this->input->post('kaprodi');
        $_isEdit = $this->input->post('isEdit');

        if (isset($_isEdit) && $_isEdit) {
            $this->prodi->update([
                $_kode,
                $_nama,
                $kaprodi,
                $_kode,
            ]);
        } else {
            $this->prodi->save([
                $_kode,
                $_nama,
                $kaprodi,
            ]);
        }


        redirect(base_url() . 'index.php/prodi/view?id=' . $_kode, 'refresh');
        return;
    }
}
