<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MobilsModel;
use App\Models\MerksModel;
use App\Models\UsersModel;
use App\Models\SewasModel;


class Home extends BaseController
{
    protected $mobilsModel;
    protected $merksModel;
    protected $usersModel;
    protected $sewasModel;

    protected $validation;


    public function __construct()
	{
	    $this->mobilsModel = new MobilsModel();
	    $this->merksModel = new MerksModel();
	    $this->usersModel = new UsersModel();
	    $this->sewasModel = new SewasModel();

        $this->validation =  \Config\Services::validation();


	}

    public function index()
    {
        $data = [
            'controller'    	=> 'home',
            'title'     		=> 'Home',
            // 'data'=> setJSON($data)			
        ];
        
        return view('index', $data);
        // return view('index');
    }
    public function register(){
        $data = [
            'controller'    	=> 'home',
            'title'     		=> 'Home',
            // 'data'=> setJSON($data)			
        ];
        
        return view('register', $data);
    }
    public function produk(){
        $data = [
            'controller'    	=> 'home',
            'title'     		=> 'Produk',
            // 'data'=> setJSON($data)			
        ];
        
        return view('produk', $data);
    }
    public function sewa(){
        $data = [
            'controller'    	=> 'home',
            'title'     		=> 'Sewa',
            // 'data'=> setJSON($data)			
        ];
        
        return view('sewa', $data);
    }
    public function sewaPost()
	{
        $session = session();

        $response = array();

		$fields['tanggal_mulai'] = $this->request->getPost('start_date');
		$fields['tanggal_akhir'] = $this->request->getPost('end_date');
		$fields['tujuan'] = $this->request->getPost('tujuan');
		$fields['noktp'] = $this->request->getPost('ktp');
		$fields['users_id'] = $this->request->getPost('iduser');
		$fields['mobil_id'] = $this->request->getPost('idmobil');

        if ($this->sewasModel->insert($fields)) {
            $session->setFlashdata('success', "Success Sewa");
            return redirect()->to('sewa?id='.$this->request->getPost('idmobil'));
            
        } else {
            $session->setFlashdata('err', "Error Register");

            
        }
		
        return $this->response->setJSON($response);
	}
    public function registerPost()
	{
        $session = session();

        $response = array();

		$fields['username'] = $this->request->getPost('username');
		$fields['password'] = $this->request->getPost('password');
		$fields['email'] = $this->request->getPost('email');
		$fields['created_at'] = $this->request->getPost('created_at');
		$fields['status'] = 1;
		$fields['role'] = "user";


        $this->validation->setRules([
			            'username' => ['label' => 'Username', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'password' => ['label' => 'Password', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[50]']

        ]);

        if ($this->validation->run($fields) == FALSE) {
            $session->setFlashdata('msg', $this->validation->getErrors());
			
        } else {

            $data = $this->usersModel->where('username', $fields['username'])->first();
            if($data){
                $session->setFlashdata('err', "Username Already Exist");
                return redirect()->to('register');
            }else{
                if ($this->usersModel->insert($fields)) {
                    $session->setFlashdata('success', "Success Register");
                    return redirect()->to('register');
                    
                } else {
                    $session->setFlashdata('err', "Error Register");
    
                    
                }
            }
            
        }
		
        return $this->response->setJSON($response);
	}
    public function login()
    {
        $data = [
            'controller'    	=> 'home',
            'title'     		=> 'Login',
            // 'data'=> setJSON($data)			
        ];
        
        return view('login', $data);
    }
    public function auth()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $this->usersModel->where('username', $username)->first();
        if($data){
            $pass = $data->password;
            // commented, finding encrypt-decrypt function
            // $verify_pass = password_verify($password, $pass);
            // if($verify_pass){
            if($password == $pass){

                $ses_data = [
                    'userid'       => $data->id,
                    'username'     => $data->username,
                    'useremail'    => $data->email,
                    'loggedin'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('index');
            }else{
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('login');
        }
    }
 
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function mobilList(){
		// $result = $this->mobilsModel->select()->limit(5);
		$result = $this->mobilsModel->select()->findAll(4,0);

        foreach ($result as $key => $value) {
					
			$selectedMerks = $this->merksModel->where('id' ,$value->merk_id)->first();
			$ops_selectedMerks = $selectedMerks->nama." - ".$selectedMerks->produk;

			$ops_images = "<img src=".$value->foto." style='max-width:100px;max-height:100px;'/>";
            $value->merks_name = $selectedMerks->nama;
            $value->merks_produk = $selectedMerks->produk;

		} 

		return $this->response->setJSON($result);		

    }
    public function allmobilList(){
		// $result = $this->mobilsModel->select()->limit(5);
		$result = $this->mobilsModel->select()->findAll();

        foreach ($result as $key => $value) {
					
			$selectedMerks = $this->merksModel->where('id' ,$value->merk_id)->first();
			$ops_selectedMerks = $selectedMerks->nama." - ".$selectedMerks->produk;

			$ops_images = "<img src=".$value->foto." style='max-width:100px;max-height:100px;'/>";
            $value->merks_name = $selectedMerks->nama;
            $value->merks_produk = $selectedMerks->produk;

		} 

		return $this->response->setJSON($result);		

    }
}
