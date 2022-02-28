<?php namespace App\Models;

use CodeIgniter\Model;

class TalukaModel extends Model 
{
    protected $table = 'cos_taluka';
    protected $primaryKey = 'tal_id';
    protected $allowedFields =['tal_name','tal_state_id','tal_dist_id'];
}
