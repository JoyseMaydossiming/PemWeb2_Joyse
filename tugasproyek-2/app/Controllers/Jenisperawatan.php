<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\JenisperawatanModel;

class Jenisperawatan extends BaseController
{
	
    protected $jenisperawatanModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->jenisperawatanModel = new JenisperawatanModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{
		$header['title']='Jenis Perawatan';

		$data = [
			'controller'    	=> 'jenisperawatan',
			'title'     		=> 'Data Jenis Perawatan'				
		];

		return view('jenisperawatan', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->jenisperawatanModel->select()->findAll();
		
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
			
			$data = $this->jenisperawatanModel->where('id' ,$id)->first();
			
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


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[9]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->jenisperawatanModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("Insert Success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("Insert Error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
		$fields['nama'] = $this->request->getPost('nama');


        $this->validation->setRules([
			            'nama' => ['label' => 'Nama', 'rules' => 'required|min_length[0]|max_length[9]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->jenisperawatanModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("Update Success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("Update Error");
				
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
		
			if ($this->jenisperawatanModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("Delete Success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("Delete Error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
