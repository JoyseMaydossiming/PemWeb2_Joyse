<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('auth/login');
        return;
    }
    public function auth()
    {
        $this->load->model('login_model', 'login');

        $_username = $this->input->post('username');
        $_password = $this->input->post('password');

        $res =  $this->login->login([$_username, $_password]);

        if (isset($res)) {
            $this->session->set_userdata('username', $res->username);
            $this->session->set_userdata('user', $res);
            redirect(base_url(), 'refresh');
        } else {
            redirect(base_url() . 'index.php/auth?status=failed', 'refresh');
        }
        return;
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user');

        redirect(base_url() . 'index.php/auth', 'refresh');
        return;
    }
}
