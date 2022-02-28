<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use \App\Models\HomeModel;
use \App\Models\UserModel;
use \App\Models\RegionModel;
use \App\Models\SectorModel;
use \App\Models\SubsectorModel;
use \App\Models\statesModel;
use \App\Models\CitiesModel;
use \App\Models\SansthaModel;
use \App\Models\PickupModel;
use \App\Models\SansthaBranchesModel;
use \App\Models\SansthaMembershipModel;
use \App\Models\SansthaDetailsModel;
use \App\Models\DistrictModel;
use \App\Models\TalukaModel;
$session = \Config\Services::session();

class Sanstha extends Controller
{
	public function __construct()
	{ 
		$this->SansthaModel = new SansthaModel();
	}
	function sanstha_details()
	{
		// echo service('uri')->getSegment(3); die();
		helper('text');

		if(service('uri')->getSegment(3) == ''){
			// $sansthaD=(new SansthaModel())->where('cs_isDelete',0)->findAll();
			$page=$this->SansthaModel->where('cs_isDelete', 0)->orderBy('cs_createdOn','DESC')->paginate(10);
		}else{
			// $sansthaD=(new SansthaModel())->where(array('cs_isDelete'=>0,'cs_state'=>service('uri')->getSegment(3)))->findAll();
			$page=$this->SansthaModel->where(array('cs_isDelete'=>0,'cs_state'=>service('uri')->getSegment(3)))->orderBy('cs_createdOn','DESC')->paginate(10);
		}
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"district"=>(new DistrictModel())->where('dist_state_id',21)->findAll(),
			"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),	
			"sanstha"=>$page,	
			"page"=>$page,		
			"pager" => $this->SansthaModel->pager,
			"state_data" => service('uri')->getSegment(3),
			"district_data" => '',
			"taluka_data" => '',
		];
		if($this->request->getMethod() == 'post'){			
			$district = "";
			if($this->request->getVar('cs_filter_district')){
				$district = "AND cs_district = ".$this->request->getVar('cs_filter_district')."";
			}
			$taluka = "";
			if($this->request->getVar('cs_filter_taluka')){
				$taluka = "AND cs_taluka = ".$this->request->getVar('cs_filter_taluka')."";
			}
			$data = [
				"success" => session()->getFlashdata('success'),
				"error" => session()->getFlashdata('error'),
				"info" => session()->getFlashdata('info'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
				"state"=>(new statesModel())->where('country_id',101)->findAll(),
				"district"=>(new DistrictModel())->where('dist_state_id',service('uri')->getSegment(3))->findAll(),
				"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
				"sanstha"=>$this->SansthaModel->where('cs_isDelete = 0 AND cs_state = '.service('uri')->getSegment(3).' '.$district.' '.$taluka.'')->orderBy('cs_createdOn','DESC')->paginate(),	
				"pager" => $this->SansthaModel->pager,
				"state_data" => service('uri')->getSegment(3),
				"district_data" => $this->request->getVar('cs_filter_district'),
				"taluka_data" => $this->request->getVar('cs_filter_taluka'),
			];
			// return view('sanstha/sanstha_details',$data);
			// print_r($data['district']);die();
			// return redirect()->route('sanstha/sanstha_details',$data);
		}
			// print_r($data['sanstha']);die();
		return view('sanstha/sanstha_details', $data);
	}
	
	function create_sanstha()
	{
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"district"=>(new DistrictModel())->where('dist_state_id',service('uri')->getSegment(3))->findAll(),
			// "region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
			"sector"=>(new SectorModel())->where('sector_isDelete',0)->findAll(),
			"region"=>db_connect()->query("SELECT * FROM cos_zone JOIN cos_state on  cos_zone.zone_id = cos_state.st_zone_id WHERE cos_state.st_id = ".service('uri')->getSegment(3)."")->getResultArray(),
			"prefix"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>1))->findAll(),
			"status"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>2))->findAll(),
			"op_area"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>3))->findAll(),
			"class_1"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>4))->findAll(),
			"class_2"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>5))->findAll(),
			"class_3"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>6))->findAll(),
			"class_4"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>7))->findAll(),
			"membership"=>(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>8))->findAll(),
		];
		if($this->request->getMethod() == 'post'){
			// echo $this->request->getVar('cs_state');die();
			$sanstha=[
				'cs_prefix'=>$this->request->getVar('cs_prefix'),
				'cs_name'=>$this->request->getVar('cs_name'),
				'cs_state'=>$this->request->getVar('cs_state'),
				'cs_district'=>$this->request->getVar('cs_city'),
				'cs_taluka'=>$this->request->getVar('cs_taluka'),
				'cs_zone'=>$this->request->getVar('cs_zone'),
				'cs_type'=>$this->request->getVar('cs_type'),
				'cs_sector'=>$this->request->getVar('cs_sector'),
				'cs_subsector'=>$this->request->getVar('cs_subsector'),
				'cs_head_off_addr'=>$this->request->getVar('cs_head_off_addr'),
				'cs_head_off_place'=>$this->request->getVar('cs_head_off_place'),
				'cs_head_off_pincode'=>$this->request->getVar('cs_head_off_pincode'),
				'cs_head_off_landline'=>$this->request->getVar('cs_head_off_landline'),
				'cs_head_off_mobile'=>$this->request->getVar('cs_head_off_mobile'),
				'cs_head_off_email'=>$this->request->getVar('cs_head_off_email'),
				'cs_website'=>$this->request->getVar('cs_website'),
				// 'cs_status'=>$this->request->getVar('cs_status'),
				// 'cs_foundation_year'=>$this->request->getVar('cs_foundation_year'),
				// 'cs_years'=>$this->request->getVar('cs_years'),
				// 'cs_operation_area'=>$this->request->getVar('cs_operation_area 	'),
				// 'cs_classification1'=>$this->request->getVar('cs_classification1'),
				// 'cs_classification2'=>$this->request->getVar('cs_classification2'),
				// 'cs_classification3'=>$this->request->getVar('cs_classification3'),
				// 'cs_classification4'=>$this->request->getVar('cs_classification4'),
				// 'cs_membership_status'=>$this->request->getVar('cs_membership_status'),
				// 'cs_membership_start_date'=>$this->request->getVar('cs_membership_start_date'),
				// 'cs_membership_end_date'=>$this->request->getVar('cs_membership_end_date'),
				//'cs_desc'=>$this->request->getVar('cs_desc'),
				'cs_createdBy'=>session()->get('id'),
				'cs_modifiedBy'=>session()->get('id'),
				'cs_createdOn'=>date('Y-m-d H:i:s'),
				'cs_modifiedOn'=>date('Y-m-d H:i:s'),
			];
			// print_r($sanstha);die();
			(new SansthaModel())->insert($sanstha);
			$sanstha_id = (new SansthaModel)->insertID();
			return redirect()->to('/cosanstha/sanstha_details/'.$this->request->getVar('cs_state'));
			session()->setFlashdata('success','Sanstha Registered Successfully  ..!!');
			// return redirect()->route('sanstha/sanstha_details');
			die();
		}
		return view('sanstha/create_sanstha', $data);

	}
	
	function sansthaData()
	{
	   	$sansthaData = [
	        'cs_id'  => (service('uri'))->getSegment(3)
		];
		$data["user"] = (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll();
		$data['sanstha_data'] = (new SansthaModel())->where('cs_id',(service('uri'))->getSegment(3))->findAll();
		$data["state"]=(new statesModel())->where('country_id',101)->findAll();
		$data["district"]=(new DistrictModel())->where('dist_state_id',$data['sanstha_data'][0]['cs_state'])->findAll();
		$data["state"]=(new statesModel())->where('country_id',101)->findAll();
		$data["district"]=(new DistrictModel())->where('dist_state_id',$data['sanstha_data'][0]['cs_state'])->findAll();
		$data["prefix"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>1))->findAll();
		$data["status"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>2))->findAll();
		$data["op_area"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>3))->findAll();
		$data["class_1"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>4))->findAll();
		$data["class_2"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>5))->findAll();
		$data["class_3"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>6))->findAll();
		$data["class_4"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>7))->findAll();
		$data["membership"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>8))->findAll();
		$data["sanstha_branches"]=(new SansthaBranchesModel())->where(array('sb_isDelete'=>0,'sb_sanstha_id'=>(service('uri'))->getSegment(3)))->findAll();
		$data["sanstha_details"]=(new SansthaDetailsModel())->where(array('csd_isDelete'=>0,'csd_sanstha_id'=>(service('uri'))->getSegment(3)))->findAll();
		$data["sanstha_mem"]=(new SansthaMembershipModel())->where(array('mem_isDelete'=>0,'mem_sanstha_id'=>(service('uri'))->getSegment(3)))->findAll();
		$data['sector']=(new SectorModel())->where('sector_isDelete',0)->findAll();
		$data['subsector']=(new SubsectorModel())->where('ss_isDelete = 0 AND ss_sector_id = '.$data['sanstha_data'][0]['cs_sector'].'')->findAll();
		// print_r($sansthaData); die();		
		return view('sanstha/sansthaData',$data);			
	}
	
	function updateSanstha()
	{
	   	$sansthaData = [
	        'cs_id'  => (service('uri'))->getSegment(3)
		];
		// print_r($sansthaData); die();
		session()->set($sansthaData);			
		return redirect()->route('cosanstha/sansthaUpdateRe');			
	}

	function update_sanstha_record()
	{	
		helper('form');
		$data["user"] = (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll();
		$sanstha_data=session()->get($sansthaData);	
		$data['sanstha_data'] = (new SansthaModel())->where('cs_id',$sanstha_data['cs_id'])->findAll();
		// print_r($data['sanstha_data']);die();
		// $data = [		
		// 	"sanstha_details" => (new SansthaDetailsModel())->where('csd_sanstha_id',$sanstha_data['cs_id'])->findAll(),
		// 	"sanstha_branches"=>(new SansthaBranchesModel())->where('sb_sanstha_id',$sanstha_data['cs_id'])->findAll(),
		// 	"sanstha_mem"=>(new SansthaMembershipModel())->where('mem_sanstha_id',$sanstha_data['cs_id'])->findAll(),
			$data["state"]=(new statesModel())->where('country_id',101)->findAll();
			$data["district"]=(new DistrictModel())->where('dist_state_id',$data['sanstha_data'][0]['cs_state'])->findAll();
		// 	"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
		// 	"taluka" => array(),
		// 	"s_type" => array(),
		$data['sector']=(new SectorModel())->where('sector_isDelete',0)->findAll();
		$data['subsector']=(new SubsectorModel())->where('ss_isDelete = 0 AND ss_sector_id = '.$data['sanstha_data'][0]['cs_sector'].'')->findAll();
		$data["prefix"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>1))->findAll();
		$data["status"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>2))->findAll();
		$data["op_area"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>3))->findAll();
		$data["class_1"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>4))->findAll();
		$data["class_2"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>5))->findAll();
		$data["class_3"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>6))->findAll();
		$data["class_4"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>7))->findAll();
		$data["membership"]=(new PickupModel())->where(array('master_isDelete'=>0,'master_for'=>8))->findAll();
		$data["sanstha_branches"]=(new SansthaBranchesModel())->where(array('sb_isDelete'=>0,'sb_sanstha_id'=>$sanstha_data['cs_id']))->findAll();
		$data["sanstha_details"]=(new SansthaDetailsModel())->where(array('csd_isDelete'=>0,'csd_sanstha_id'=>$sanstha_data['cs_id']))->findAll();
		$data["sanstha_mem"]=(new SansthaMembershipModel())->where(array('mem_isDelete'=>0,'mem_sanstha_id'=>$sanstha_data['cs_id']))->findAll();
		// print_r($data['sanstha_data']);die();
		return view('sanstha/sansthaDetailsUpdate', $data);
	}

	function update_sanstha_save_record(){
		// print_r($this->request->getVar());die();
		$sanstha=[
			'cs_prefix'=>$this->request->getVar('cs_prefix'),
			'cs_name'=>$this->request->getVar('cs_name'),
			'cs_state'=>$this->request->getVar('cs_state'),
			'cs_district'=>$this->request->getVar('cs_district'),
			'cs_taluka'=>$this->request->getVar('cs_taluka'),
			'cs_zone'=>$this->request->getVar('cs_zone'),
			'cs_type'=>$this->request->getVar('cs_type'),
			'cs_sector'=>$this->request->getVar('cs_sector'),
			'cs_subsector'=>$this->request->getVar('cs_subsector'),
			'cs_website'=>$this->request->getVar('cs_website'),
			'cs_head_off_addr'=>$this->request->getVar('cs_head_off_addr'),
			'cs_head_off_place'=>$this->request->getVar('cs_head_off_place'),
			'cs_head_off_pincode'=>$this->request->getVar('cs_head_off_pincode'),
			'cs_head_off_landline'=>$this->request->getVar('cs_head_off_landline'),
			'cs_head_off_mobile'=>$this->request->getVar('cs_head_off_mobile'),
			'cs_head_off_email'=>$this->request->getVar('cs_head_off_email'),
			'cs_status'=>$this->request->getVar('cs_status'),
			'cs_foundation_year'=>$this->request->getVar('cs_foundation_year'),
			// 'cs_years'=>$this->request->getVar('cs_years'),
			'cs_operation_area'=>$this->request->getVar('cs_operation_area'),
			'cs_classification1'=>$this->request->getVar('cs_classification1'),
			'cs_classification2'=>$this->request->getVar('cs_classification2'),
			'cs_classification3'=>$this->request->getVar('cs_classification3'),
			'cs_classification4'=>$this->request->getVar('cs_classification4'),
			'cs_modifiedBy'=>session()->get('id'),
			'cs_modifiedOn'=>date('Y-m-d H:i:s'),
		];
		// print_r($sanstha);die();
		(new SansthaModel())->update($this->request->getVar('cs_id'),$sanstha);

		if(!empty($this->request->getVar('csd_branch_nos'))){
			$sanstha_branches=[			
				'sb_sanstha_id'=>$this->request->getVar('cs_id'),
				'sb_branch_nos'=>$this->request->getVar('csd_branch_nos'),
				'sb_estension_counters'=>$this->request->getVar('csd_estension_counters'),
				'sb_members_count'=>$this->request->getVar('csd_members_count'),
				'sb_annual_turnover'=>$this->request->getVar('csd_annual_turnover'),
				'as_on_date'=>date('Y-m-d', strtotime($this->request->getVar('as_on_date'))),
				'sb_createdBy'=>session()->get('id'),
				'sb_createdOn'=>date('Y-m-d H:i:s'),
			];
			// print_r($sanstha_branches); die();
			(new SansthaBranchesModel())->insert($sanstha_branches);
		}
		if(!empty($this->request->getVar('cs_membership_status'))){
			$sanstha_mem=[			
				'mem_sanstha_id'=>$this->request->getVar('cs_id'),
				'mem_membership_status'=>$this->request->getVar('cs_membership_status'),
				'mem_start_date'=>$this->request->getVar('cs_membership_start_date'),
				'mem_end_date'=>$this->request->getVar('cs_membership_end_date'),
				'mem_remark'=>"",
				'mem_isDelete'=>0,
				'mem_createdOn'=>date('Y-m-d H:i:s'),
			];			
			//	print_r($sanstha_mem); die();
			(new SansthaMembershipModel())->insert($sanstha_mem);
		}
		if(!empty($this->request->getVar('csd_chairman_name'))){
			$sanstha_details=[			
				'csd_sanstha_id'=>$this->request->getVar('cs_id'),
				'csd_chairman_name'=>$this->request->getVar('csd_chairman_name'),
				'csd_chairman_mobile'=>$this->request->getVar('csd_chairman_mobile'),
				'csd_md_name'=>$this->request->getVar('csd_md_name'),
				'csd_md_mobile'=>$this->request->getVar('csd_md_mobile'),
				'csd_createdOn'=>date('Y-m-d H:i:s'),
				'csd_createdBy'=>session()->get('id'),
			];	
			//print_r($sanstha_details); die();
			(new SansthaDetailsModel())->insert($sanstha_details);
			session()->setFlashdata('success','Sanstha updated Successfully  ..!!');
		}
		
		
		return redirect()->to('sanstha_details/'.$this->request->getVar('cs_state'));
	}

	public function sansthaDelete()
	{
		$cs_id = $_POST['cs_id'];
		$model= $this->SansthaModel->CO_SansthaD($cs_id.'','cos_sanstha',array('cs_isDelete'=>1));
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"district"=>(new DistrictModel())->where('st_id',22)->findAll(),
			"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
			"sanstha"=>$this->SansthaModel->where('cs_isDelete', 0)->orderBy('cs_createdOn','DESC')->paginate(),	
			"pager" => $this->SansthaModel->pager,
			"state_data" => '',
			"district_data" => '',
			"taluka_data" => '',
		];
		if($this->request->getMethod() == 'post'){
			// print_r($this->request->getVar('cs_filter_state'));die();
			$state = "";
			if($this->request->getVar('cs_filter_state')){
				$state = "AND cs_state = ".$this->request->getVar('cs_filter_state')."";
			}
			$district = "";
			if($this->request->getVar('cs_filter_district')){
				$district = "AND cs_district = ".$this->request->getVar('cs_filter_district')."";
			}
			$taluka = "";
			if($this->request->getVar('cs_filter_taluka')){
				$taluka = "AND cs_taluka = ".$this->request->getVar('cs_filter_taluka')."";
			}
			// print_r($state);die();
			$data = [
				"success" => session()->getFlashdata('success'),
				"error" => session()->getFlashdata('error'),
				"info" => session()->getFlashdata('info'),
				"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
				"state"=>(new statesModel())->where('country_id',101)->findAll(),
				"district"=>(new DistrictModel())->where('dist_state_id',$this->request->getVar('cs_filter_state'))->findAll(),
				"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
				"sanstha"=>$this->SansthaModel->where('cs_isDelete = 0 '.$state.' '.$district.' '.$taluka.'')->orderBy('cs_createdOn','DESC')->paginate(),	
				"pager" => $this->SansthaModel->pager,
				"state_data" => $this->request->getVar('cs_filter_state'),
				"district_data" => $this->request->getVar('cs_filter_district'),
				"taluka_data" => $this->request->getVar('cs_filter_taluka'),
			];
			// return view('sanstha/sanstha_details',$data);
		}
			// print_r($this->request->getVar('cs_filter_district'));die();
		return view('sanstha/sanstha_details',$data);
	}
	
	public function sansthaDeleteRe()
	{
		$cs_id = $_POST['cs_id'];
		$sanstha_data= (new SansthaModel())->where(array('cs_id'=>$cs_id))->findAll();
		$model= $this->SansthaModel->CO_SansthaD($cs_id.'','cos_sanstha',array('cs_isDelete'=>1));
		$data = [
			"success" => session()->getFlashdata('success'),
			"error" => session()->getFlashdata('error'),
			"info" => session()->getFlashdata('info'),
			"user" => (new HomeModel())->where(array('user_id'=>session()->get('id'),'user_isDelete'=> 0))->findAll(),			
			"state"=>(new statesModel())->where('country_id',101)->findAll(),
			"district"=>(new DistrictModel())->where('st_id',22)->findAll(),
			"region"=>(new RegionModel())->where('reg_isDelete',0)->findAll(),
			"sanstha"=>$this->SansthaModel->where('cs_isDelete', 0)->orderBy('cs_createdOn','DESC')->paginate(),	
			"pager" => $this->SansthaModel->pager,
			"state_data" => '',
			"district_data" => '',
			"taluka_data" => '',
		];
		return redirect()->to('sanstha_details/'.$sanstha_data[0]['cs_state']);
	}

	function getCity()
	{
		$chkVal = $_POST['chkVal'];	
		$cityInfo = (new DistrictModel())->where(array('dist_state_id'=>$chkVal))->findAll();
		echo json_encode($cityInfo);
	}

	function getTaluka()
	{
		$chkVal = $_POST['chkVal'];	
		$state = $_POST['state'];	
		$talInfo = (new TalukaModel())->where(array('tal_dist_id'=>$chkVal,'tal_state_id'=>$state))->findAll();
		echo json_encode($talInfo);
	}

	function getRegion()
	{
		$chkVal = $_POST['chkVal'];	
		$regionInfo = db_connect()->query("SELECT * FROM cos_zone JOIN cos_state on  cos_zone.zone_id = cos_state.st_zone_id WHERE cos_state.st_id = ".$chkVal."")->getResultArray();
		echo json_encode($regionInfo);
	}	

	function getSubSector()
	{
		$sector = $_POST['sector'];	
		$regionInfo = (new HomeModel())->getData(array('ss_sector_id'=>$sector),'cos_subsector');
		echo json_encode($regionInfo);
	}	

	function stateWiseDisplay()
	{
		$states=$_POST['st_id'];
		$stateInfo = db_connect()->query("SELECT * FROM cos_sanstha JOIN cos_sanstha_details on cos_sanstha.cs_id = cos_sanstha_details.csd_sanstha_id WHERE cos_sanstha.cs_state = ".$states."")->getResultArray();
		echo json_encode($stateInfo);
	}
	
} ?>