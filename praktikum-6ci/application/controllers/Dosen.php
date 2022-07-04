<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
    public function index()
    {
        $this->load->model('dosen_model', 'dsn1');
        $this->dsn1->id = 1;
        $this->dsn1->nama = 'Joyse Maydossiming';
        $this->dsn1->nidn = '001';
        $this->dsn1->gender = 'Perempuan';
        $this->dsn1->tmp_lahir = 'Jakarta Pusat';
        $this->dsn1->tgl_lahir = '16-05-1993';
        $this->dsn1->pendidikan = 'S1 Sistem Informasi';

        $this->load->model('dosen_model', 'dsn2');
        $this->dsn2->id = 2;
        $this->dsn2->nama = 'Reihan Byzaki';
        $this->dsn2->nidn = '002';
        $this->dsn2->gender = 'Laki-laki';
        $this->dsn2->tmp_lahir = 'Purwokerto';
        $this->dsn2->tgl_lahir = '24-02-1985';
        $this->dsn2->pendidikan = 'S2 Teknik Informatika';

        $this->load->model('dosen_model', 'dsn3');
        $this->dsn3->id = 2;
        $this->dsn3->nama = 'Abdul Aziz';
        $this->dsn3->nidn = '002';
        $this->dsn3->gender = 'Laki-laki';
        $this->dsn3->tmp_lahir = 'Denpasar';
        $this->dsn3->tgl_lahir = '14-12-1987';
        $this->dsn3->pendidikan = 'S1 Teknik Informatika';

        $all_dosen = [$this->dsn1, $this->dsn2, $this->dsn3];
        $data['all_dosen'] = $all_dosen;
        $this->load->view('dosen/index', $data);
    }
}
