<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\HomeModel;
use \App\Models\UserModel;
use \App\Models\RegionModel;
use \App\Models\statesModel;
use \App\Models\CitiesModel;
use \App\Models\SansthaModel;


class Report extends Controller
{
	public function __construct()
	{ 
		$this->SansthaModel = new SansthaModel();
	}

	function rpt_sanstha()
	{		
		helper('text');
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
			"sector" => (new HomeModel())->getData(array('sector_isDelete'=>0),'cos_sector'),	
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"cities"=>(new CitiesModel())->where('st_id',22)->findAll(),
			"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
			"sanstha"=>$this->SansthaModel->where('cs_isDelete', 0)->orderBy('cs_createdOn','DESC')->paginate(),	
			"pager" => $this->SansthaModel->pager,
		];

		return view('report/report_sanstha', $data);
	}	

	function sanstha_report_search(){
		helper('text');
		// print_r($this->request->getVar());die();
		$data['state_data'] = $this->request->getVar('state');
		$data['district_data'] = $this->request->getVar('district');
		$data['taluka_data'] = $this->request->getVar('taluka');
		$data['sector_data'] = $this->request->getVar('sector');
		$data['sub_sector_data'] = $this->request->getVar('sub_sector');
		$data['sanstha_data'] = $this->request->getVar('sanstha');
		// print_r($data['state_data']);die();
		if($data['state_data']){
			$state = "AND cs_state = ".$data['state_data']."";
		}else{
			$state = "";
		}

		if($data['distict_data'] !=''){
			$distict = "AND cs_distict = ".$data['distict_data']."";
		}else{
			$distict = "";
		}

		if($data['taluka_data'] !=''){
			$taluka = "AND cs_taluka = ".$data['taluka_data']."";
		}else{
			$taluka = "";
		}

		if($data['sector_data'] !=''){
			$type = "AND type = ".$data['sector_data']."";
		}else{
			$type = "";
		}

		if($data['sub_sector_data'] !=''){
			$sub_type = "AND cs_sub_type = ".$data['sub_sector_data']."";
		}else{
			$sub_type = "";
		}

		if($data['sanstha_data'] !=''){
			$sanstha = "AND cs_id = ".$data['sanstha_data']."";
		}else{
			$sanstha = "";
		}

		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),
			"sector" => (new HomeModel())->getData(array('sector_isDelete'=>0),'cos_sector'),	
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"cities"=>(new CitiesModel())->where('st_id',22)->findAll(),
			"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),	
			// "pager" => $this->SansthaModel->pager,
		];
		$data['sanstha'] = db_connect()->query('SELECT * FROM cos_sanstha where cs_isDelete = 0 '.$state.' '.$distict.' '.$taluka.' '.$type.' '.$sub_type.' '.$sanstha)->getResultArray();
		// $data['pager'] = $this->SansthaModel->pager;
		
		// print_r(db_connect()->getLastQuery());die();

		return view('report/report_sanstha', $data);
	}
}
?>