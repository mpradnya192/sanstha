<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\HomeModel;
use \App\Models\UserModel;
use \App\Models\RegionModel;
use \App\Models\statesModel;
use \App\Models\CitiesModel;
use \App\Models\SansthaModel;
use \App\Models\PickupModel;
use \App\Models\SansthaDetailsModel;


class Master extends Controller
{
	public function __construct()
	{ 
		$this->PickupModel = new PickupModel();
	}
	function master_details()
	{
		helper('text');
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"pickup"=>(new PickupModel())->where('c_isDelete',0)->findAll(),
			
		];

		if($this->request->getMethod() == 'post'){
			$master = [
				'c_type' => $this->request->getVar('c_type'),
				'c_name' => $this->request->getVar('c_name'),
			];
			
			(new PickupModel())->insert($master);
			// $c_id = (new PickupModel())->insertID();			
			session()->setFlashdata('success','Master successfully created..!');
			return redirect()->route('master/master_details');
		}

		return view('master/master_details', $data);
	}
	public function deleteProducts()
		{
			$c_id = $_POST['c_id'];
			//print_r($c_id);
			$model= $this->PickupModel->productD($c_id.'','cos_pickup',array('c_isDelete'=>1));
			
			$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"pickup"=>(new PickupModel())->where('c_isDelete',0)->findAll(),
			
		];
		return view('master/master_details',$data);
		}
	}

?>