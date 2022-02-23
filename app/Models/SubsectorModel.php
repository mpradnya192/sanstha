<?php namespace App\Models;

use CodeIgniter\Model;

class SubsectorModel extends Model 
{
    protected $table = 'cos_subsector';
    protected $primaryKey = 'ss_id';
    protected $allowedFields =['ss_name','ss_sector_id'];
}
