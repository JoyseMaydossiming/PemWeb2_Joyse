<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MobilsModel;
use App\Models\MerksModel;


class Mobils extends BaseController
{
	
    protected $mobilsModel;
    protected $merksModel;

    protected $validation;
	
	public function __construct()
	{
	    $this->mobilsModel = new MobilsModel();
	    $this->merksModel = new MerksModel();

       	$this->validation =  \Config\Services::validation();
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'mobils',
                'title'     		=> 'Data Mobil'				
			];
		
		return view('mobils', $data);
			
	}
	public function getMerks(){
		$result = $this->merksModel->select()->findAll();
		foreach ($result as $key => $value) {
			
			$data['results'][$key] = array(
				'id' => $value->id,
				'text' => $value->nama ." - ". $value->produk
			);
		} 

		return $this->response->setJSON($data);		
		
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->mobilsModel->select()->findAll();

		// $resultMerks = $this->merksModel->select()->findAll();

		foreach ($result as $key => $value) {
							
			$ops = '<div class="dropdown">';
			$ops .= '<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= 'Action';
			$ops .= '</button>';
			$ops .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
			$ops .= '<a class="dropdown-item text-info" cursor="cursor" onClick="save('. $value->id .')"><i class="fa-solid fa-pen"></i></i>   ' .  "Edit"  . '</a>';
			$ops .= '<a class="dropdown-item text-info" cursor="cursor" onClick="upload('. $value->id .')"><i class="fa-solid fa-upload"></i></i></i>   ' .  "Upload"  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';

			$ops .= '<a class="dropdown-item text-danger" cursor="cursor" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  "Delete"  . '</a>';
			$ops .= '</div>';
			$ops .= '</div>';

			$selectedMerks = $this->merksModel->where('id' ,$value->merk_id)->first();
			$ops_selectedMerks = $selectedMerks->nama." - ".$selectedMerks->produk;

			$ops_images = "<img src='".base_url('img/mobil')."/".$value->foto."' style='max-width:32px;max-height:100px;'/>";

			$data['data'][$key] = array(
				$value->nopol,
				$value->warna,
				$value->biaya_sewa,
				$value->deskripsi,
				$value->cc,
				$value->tahun,
				$ops_selectedMerks,
				// $value->foto,
				$ops_images,
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
			
			$data = $this->mobilsModel->where('id' ,$id)->first();

			$selectedMerks = $this->merksModel->where('id' ,$data->merk_id)->first();

            $data->merks_name = $selectedMerks->nama;
            $data->merks_produk = $selectedMerks->produk;

			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['nopol'] = $this->request->getPost('nopol');
		$fields['warna'] = $this->request->getPost('warna');
		$fields['biaya_sewa'] = $this->request->getPost('biaya_sewa');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['cc'] = $this->request->getPost('cc');
		$fields['tahun'] = $this->request->getPost('tahun');
		$fields['merk_id'] = $this->request->getPost('merk_id');
		$fields['foto'] = $this->request->getPost('foto');


        $this->validation->setRules([
			            'nopol' => ['label' => 'Nopol', 'rules' => 'required|min_length[0]|max_length[50]'],
            'warna' => ['label' => 'Warna', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'biaya_sewa' => ['label' => 'Biaya sewa', 'rules' => 'required|min_length[0]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'cc' => ['label' => 'Cc', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[50]'],
            'tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric|min_length[0]|max_length[50]'],
            'merk_id' => ['label' => 'Merk id', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'foto' => ['label' => 'Foto', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->mobilsModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = "Insert Success" ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = "Insert Error" ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}
	public function upload(){
		helper(['form', 'url']);

        $response = array();
		$fields['id'] = $this->request->getPost('id_upload');
		$imageFile = $this->request->getFile('foto_upload');
		$img = $this->request->getFile('foto_upload');
		$extension = $img->guessExtension();
		$newName = $fields['id'] .".".$extension;
		$img->move('img/mobil',$newName,true);
		// $img->move(WRITEPATH . 'uploads/mobil',$newName);
		$fields['foto'] = $newName;

		if ($this->mobilsModel->update($fields['id'], $fields)) {
				
			$response['success'] = true;
			$response['messages'] = "Update Success";	
			
		} else {
			
			$response['success'] = false;
			$response['messages'] = "Update Error";
			
		}

        return $this->response->setJSON($response);	

	}
	public function edit()
	{
		helper(['form', 'url']);

        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
		$fields['nopol'] = $this->request->getPost('nopol');
		$fields['warna'] = $this->request->getPost('warna');
		$fields['biaya_sewa'] = $this->request->getPost('biaya_sewa');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['cc'] = $this->request->getPost('cc');
		$fields['tahun'] = $this->request->getPost('tahun');
		$fields['merk_id'] = $this->request->getPost('merk_id');

		// $config['upload_path'] = './images/';
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_size'] = 2000;
        // $config['max_width'] = 1500;
        // $config['max_height'] = 1500;

       	// $img = $this->request->getFile('foto_upload');
		// $img->move(base_url('img/mobil/','new.jpg'));
		

        $this->validation->setRules([
			            'nopol' => ['label' => 'Nopol', 'rules' => 'required|min_length[0]|max_length[50]'],
            'warna' => ['label' => 'Warna', 'rules' => 'permit_empty|min_length[0]|max_length[50]'],
            'biaya_sewa' => ['label' => 'Biaya sewa', 'rules' => 'required|min_length[0]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'cc' => ['label' => 'Cc', 'rules' => 'permit_empty|numeric|min_length[0]|max_length[50]'],
            'tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric|min_length[0]|max_length[50]'],
            'merk_id' => ['label' => 'Merk id', 'rules' => 'permit_empty|min_length[0]|max_length[11]'],
            'foto' => ['label' => 'Foto', 'rules' => 'permit_empty|min_length[0]|max_length[500]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->mobilsModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->mobilsModel->where('id', $id)->delete()) {
								
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
