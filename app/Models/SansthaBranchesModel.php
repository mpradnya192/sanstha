<?php namespace App\Models;

use CodeIgniter\Model;

class SansthaBranchesModel extends Model 
{
    protected $table = 'cos_sanstha_branches';
    protected $primaryKey = 'sb_id';
    protected $allowedFields =['sb_sanstha_id','sb_branch_nos','sb_estension_counters','sb_members_count','sb_annual_turnover','as_on_date','sb_isDelete','sb_createdOn','sb_createdBy'];

}
