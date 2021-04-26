<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_ruangan extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_ruangan')
        ->join('tbl_gedung', 'tbl_gedung.id_gedung = tbl_ruangan.id_gedung', 'left')
        ->orderBy('tbl_gedung.id_gedung', 'ASC')
        ->get()->getResultArray();
    }

    public function detail_data($id_ruangan)
    {
        return $this->db->table('tbl_ruangan')
        ->join('tbl_gedung', 'tbl_gedung.id_gedung = tbl_ruangan.id_gedung', 'left')
        ->where('id_ruangan', $id_ruangan)
        ->get()->getRowArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_ruangan')
        ->insert($data);
    }

    public function edit($data)
    {
       $this->db->table('tbl_ruangan')
        ->where('id_ruangan', $data['id_ruangan'])
        ->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_ruangan')
        ->where('id_ruangan', $data['id_ruangan'])
        ->delete($data);
    }
}