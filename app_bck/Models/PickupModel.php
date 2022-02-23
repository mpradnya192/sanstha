<?php namespace App\Models;

use CodeIgniter\Model;

class PickupModel extends Model 
{
    protected $table = 'cos_master';
    protected $primaryKey = 'master_id';
    protected $allowedFields =['master_for','master_name','master_isDelete'];


    public function productD($id)
	{
		return $this->db->table('cos_master')->delete(['master_id' => $id]);
	}
}
