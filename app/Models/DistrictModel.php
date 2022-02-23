<?php namespace App\Models;

use CodeIgniter\Model;

class DistrictModel extends Model 
{
    protected $table = 'cos_districts';
    protected $primaryKey = 'dist_id';
    protected $allowedFields =['dist_name','dist_state_id'];
}
