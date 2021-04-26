<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_gedung extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_gedung')
        ->orderBy('id_gedung', 'DESC')
        ->get()->getResultArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_gedung')
        ->insert($data);
    }

    public function edit($data)
    {
       $this->db->table('tbl_gedung')
        ->where('id_gedung', $data['id_gedung'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_gedung')
        ->where('id_gedung', $data['id_gedung'])
        ->delete($data);
    }
}