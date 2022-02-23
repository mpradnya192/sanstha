<?php namespace App\Models;

use CodeIgniter\Model;

class SansthaDetailsModel extends Model 
{
    protected $table = 'cos_sanstha_details';
    protected $primaryKey = 'csd_id';
    protected $allowedFields =['csd_sanstha_id','csd_chairman_name','csd_chairman_mobile','csd_md_name','csd_md_mobile','csd_createdOn','csd_createdBy','csd_isDelete'];

}
