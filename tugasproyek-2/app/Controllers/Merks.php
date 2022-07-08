<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MerksModel;

class Merks extends BaseController
{
	
    protected $merksModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->merksModel = new MerksModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'merks',
                'title'     		=> 'Data Merk'				
			];
		
		return view('merks', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->merksModel->select()->findAll();
		
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
				$value->nama,
				$value->produk,

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
			
			$data = $this->merksModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['nama'] = $this->request->getPost('nama');
$fields['produk'] = $this->request->getPost('produk');


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[50]'],
            'produk' => ['label' => 'Produk', 'rules' => 'required|min_length[0]|max_length[50]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->merksModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');
		$fields['produk'] = $this->request->getPost('produk');


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[50]'],
            'produk' => ['label' => 'Produk', 'rules' => 'required|min_length[0]|max_length[50]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->merksModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
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
		
			if ($this->merksModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
