<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PerawatansModel;
use App\Models\JenisperawatanModel;
use App\Models\MobilsModel;
use App\Models\MerksModel;



class Perawatans extends BaseController
{
	
    protected $perawatansModel;
    protected $jenisperawatanModel;
    protected $mobilsModel;
    protected $merksModel;


    protected $validation;
	
	public function __construct()
	{
	    $this->perawatansModel = new PerawatansModel();
	    $this->jenisperawatanModel = new JenisperawatanModel();
	    $this->mobilsModel = new MobilsModel();
	    $this->merksModel = new MerksModel();

       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> 'perawatans',
                'title'     		=> 'Data Perawatan'				
			];
		
		return view('perawatans', $data);
			
	}

	public function getJenisPerawatans(){
		$result = $this->jenisperawatanModel->select()->findAll();
		foreach ($result as $key => $value) {
			
			$data['results'][$key] = array(
				'id' => $value->id,
				'text' => $value->nama 
			);
		} 

		return $this->response->setJSON($data);		
		
	}

	public function getMobilMerks(){
		
		$resultMobil = $this->mobilsModel->select()->findAll();

		foreach ($resultMobil as $key => $value) {
			$resultMerk = $this->merksModel->where('id' ,$value->merk_id)->first();

			$data['results'][$key] = array(
				'id' => $value->id,
				'text' => $resultMerk->nama ." - ". $resultMerk->produk. " | ".$value->warna. " (".$value->nopol.")"
			);
		} 

		return $this->response->setJSON($data);		
		
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->perawatansModel->select()->findAll();
		
		foreach ($result as $key => $value) {
							
			$ops = '<div class="dropdown">';
			$ops .= '<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
			$ops .= 'Action';
			$ops .= '</button>';
			$ops .= '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">';
			$ops .= '<a class="dropdown-item text-info" cursor="pointer" onClick="save('. $value->id .')"><i class="fa-solid fa-pen"></i></i>   ' .  "Edit"  . '</a>';
			$ops .= '<div class="dropdown-divider"></div>';

			$ops .= '<a class="dropdown-item text-danger" cursor="pointer" onClick="remove('. $value->id .')"><i class="fa-solid fa-trash"></i>   ' .  "Delete"  . '</a>';
			$ops .= '</div>';
			$ops .= '</div>';

			$selectedPerawatan = $this->jenisperawatanModel->where('id' ,$value->jenis_perawatan_id)->first();
			$ops_selectedJenisPerawatan = $selectedPerawatan->nama;

			$selectedMobil = $this->mobilsModel->where('id' ,$value->mobil_id)->first();
			$selectedMerk = $this->merksModel->where('id' ,$selectedMobil->merk_id)->first();


			$data['data'][$key] = array(
				$value->tanggal,
				$value->biaya,
				$value->km_mobil,
				$value->deskripsi,
				// $value->mobil_id,
				$selectedMerk->nama ." - ". $selectedMerk->produk. " | ".$selectedMobil->warna. " (".$selectedMobil->nopol.")",
				$ops_selectedJenisPerawatan,

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
			
			$data = $this->perawatansModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
		$fields['tanggal'] = $this->request->getPost('tanggal');
		$fields['biaya'] = $this->request->getPost('biaya');
		$fields['km_mobil'] = $this->request->getPost('km_mobil');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['mobil_id'] = $this->request->getPost('mobil_id');
		$fields['jenis_perawatan_id'] = $this->request->getPost('jenis_perawatan_id');


        $this->validation->setRules([
			            'tanggal' => ['label' => 'Tanggal', 'rules' => 'required|valid_date|min_length[0]'],
            'biaya' => ['label' => 'Biaya', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'km_mobil' => ['label' => 'Km mobil', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'mobil_id' => ['label' => 'Mobil id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'jenis_perawatan_id' => ['label' => 'Jenis perawatan id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->perawatansModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = "Insert Success" ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = "Insert Error" ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
		$fields['tanggal'] = $this->request->getPost('tanggal');
		$fields['biaya'] = $this->request->getPost('biaya');
		$fields['km_mobil'] = $this->request->getPost('km_mobil');
		$fields['deskripsi'] = $this->request->getPost('deskripsi');
		$fields['mobil_id'] = $this->request->getPost('mobil_id');
		$fields['jenis_perawatan_id'] = $this->request->getPost('jenis_perawatan_id');


        $this->validation->setRules([
			            'tanggal' => ['label' => 'Tanggal', 'rules' => 'required|valid_date|min_length[0]'],
            'biaya' => ['label' => 'Biaya', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'km_mobil' => ['label' => 'Km mobil', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'deskripsi' => ['label' => 'Deskripsi', 'rules' => 'permit_empty|min_length[0]|max_length[255]'],
            'mobil_id' => ['label' => 'Mobil id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],
            'jenis_perawatan_id' => ['label' => 'Jenis perawatan id', 'rules' => 'required|numeric|min_length[0]|max_length[11]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->perawatansModel->update($fields['id'], $fields)) {
				
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
		
			if ($this->perawatansModel->where('id', $id)->delete()) {
								
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
