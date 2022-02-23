<?php namespace App\Models;

use CodeIgniter\Model;

class SansthaDetailsModel extends Model 
{
    protected $table = 'cos_sanstha_details';
    protected $primaryKey = 'csd_id';
    protected $allowedFields =['csd_sanstha_id','csd_branch_nos','csd_estension_counters','csd_members_count','csd_annual_turnover','csd_chairman_name','csd_chairman_mobile','csd_md_name','csd_md_mobile','csd_createdOn','csd_createdBy','csd_isDelete'];

}
