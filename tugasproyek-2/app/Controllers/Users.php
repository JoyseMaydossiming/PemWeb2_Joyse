<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UsersModel;

class Users extends BaseController
{
	
    protected $usersModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->usersModel = new UsersModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'users',
                'title'     		=> 'Data User'				
			];
		
		return view('users', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->usersModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="dropdown">';
			$ops .= '<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= 'Action';
			$ops .= '</button>';
			$ops .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
			$ops .= '<a class="dropdown-item text-info" cursor="pointer" onClick="save('. $value->id .')"><i class="fa-solid fa-pen"></i></i>   ' .  lang("Edit")  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';

			$ops .= '<a class="dropdown-item text-danger" cursor="pointer" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  lang("Delete")  . '</a>';
			$ops .= '</div>';
			$ops .= '</div>';

			$data['data'][$key] = array(
				$value->username,
				$value->password,
				$value->email,
				$value->last_login,
				$value->created_at,
				$value->status,
				$value->role,

				$ops				
			);
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->usersModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['username'] = $this->request->getPost('username');
		$fields['password'] = $this->request->getPost('password');
		$fields['email'] = $this->request->getPost('email');
		$fields['last_login'] = $this->request->getPost('last_login');
		$fields['created_at'] = $this->request->getPost('created_at');
		$fields['status'] = $this->request->getPost('status');
		$fields['role'] = $this->request->getPost('role');


        $this->validation->setRules([
			            'username' => ['label' => 'Username', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'password' => ['label' => 'Password', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[50]'],
            'last_login' => ['label' => 'Last login', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'role' => ['label' => 'Role', 'rules' => 'permit_empty|min_length[0]|max_length[5]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->usersModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = "Insert Success" ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = "Insert Error";
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
$fields['username'] = $this->request->getPost('username');
$fields['password'] = $this->request->getPost('password');
$fields['email'] = $this->request->getPost('email');
$fields['last_login'] = $this->request->getPost('last_login');
$fields['created_at'] = $this->request->getPost('created_at');
$fields['status'] = $this->request->getPost('status');
$fields['role'] = $this->request->getPost('role');


        $this->validation->setRules([
			            'username' => ['label' => 'Username', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'password' => ['label' => 'Password', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'email' => ['label' => 'Email', 'rules' => 'permit_empty|valid_email|min_length[0]|max_length[50]'],
            'last_login' => ['label' => 'Last login', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'status' => ['label' => 'Status', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[11]'],
            'role' => ['label' => 'Role', 'rules' => 'permit_empty|min_length[0]|max_length[5]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->usersModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = "Update Success";	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = "Update Error";
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->usersModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = "Delete Success";	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = "Delete Error";
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
