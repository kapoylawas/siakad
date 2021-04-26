<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_ta extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_ta')
        ->orderBy('id_ta', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_ta')
        ->insert($data);
    }

    public function edit($data)
    {
       $this->db->table('tbl_ta')
        ->where('id_ta', $data['id_ta'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_ta')
        ->where('id_ta', $data['id_ta'])
        ->delete($data);
    }

    public function reset_statusta()
    {
        $this->db->table('tbl_ta')
            ->update(['status' => 0]);
    }

    public function ta_aktif()
	{
		return $this->db->table('tbl_ta')
        ->where('status', 1)
        ->get()        
        ->getRowArray();        
	}
}