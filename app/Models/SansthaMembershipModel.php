<?php namespace App\Models;

use CodeIgniter\Model;

class SansthaMembershipModel extends Model 
{
    protected $table = 'cos_sanstha_membership';
    protected $primaryKey = 'mem_id';
    protected $allowedFields =['mem_sanstha_id','mem_membership_status','mem_start_date','mem_end_date','mem_isDelete','mem_remark','mem_createdOn'];

}
