<?php namespace App\Models;

use CodeIgniter\Model;

class SectorModel extends Model 
{
    protected $table = 'cos_sector';
    protected $primaryKey = 'sector_id';
    protected $allowedFields =['sector_name'];
}
