<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_dosen extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_dosen')
                    ->orderBy('id_dosen', 'DESC')
                    ->get()->getResultArray();
    }

    public function detail_data($id_dosen)
    {
        return $this->db->table('tbl_dosen')
                    ->where('id_dosen', $id_dosen)
                    ->get()->getRowArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_dosen')
        ->insert($data);
    }

    public function edit($data)
    {
       $this->db->table('tbl_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_dosen')
        ->where('id_dosen', $data['id_dosen'])
        ->delete($data);
    }
}