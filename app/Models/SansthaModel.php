<?php namespace App\Models;

use CodeIgniter\Model;

class SansthaModel extends Model 
{
    protected $table = 'cos_sanstha';
    protected $primaryKey = 'cs_id';
    protected $allowedFields =['cs_prefix','cs_name','cs_state','cs_district','cs_taluka','cs_sector','cs_subsector','cs_zone','cs_website','cs_region','cs_head_off_addr','cs_status','cs_head_off_place','cs_head_off_pincode','cs_head_off_std_code','cs_head_off_landline','cs_head_off_mobile','cs_head_off_email','cs_foundation_year','cs_years','cs_operation_area','cs_classification1','cs_classification2','cs_classification3','cs_classification4','cs_membership_status','cs_membership_start_date','cs_membership_end_date','cs_desc','cs_createdBy','cs_approvedBy','cs_modifiedBy','cs_createdOn','cs_modifiedOn','cs_approvedOn','cs_isDelete'];

    public function CO_SansthaD($cs_id)
	{
		return $this->db->table('cos_sanstha')->delete(['cs_id' => $cs_id]);
	}
}
