<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_prodi extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_prodi')
        ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas = tbl_prodi.id_fakultas', 'left')
        ->orderBy('tbl_fakultas.id_fakultas', 'ASC')
        ->get()->getResultArray();
    }

    public function detail_data($id_prodi)
    {
        return $this->db->table('tbl_prodi')
        ->join('tbl_fakultas', 'tbl_fakultas.id_fakultas = tbl_prodi.id_fakultas', 'left')
        ->where('id_prodi', $id_prodi)
        ->get()->getRowArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_prodi')
        ->insert($data);
    }

    public function edit($data)
    {
       $this->db->table('tbl_prodi')
        ->where('id_prodi', $data['id_prodi'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_prodi')
        ->where('id_prodi', $data['id_prodi'])
        ->delete($data);
    }
}