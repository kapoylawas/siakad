<?php 
namespace App\Models;

use CodeIgniter\Model;

class Model_kelas extends Model
{
    public function alldata()
    {
        return $this->db->table('tbl_kelas')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
        ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
        ->orderBy('tbl_kelas.id_prodi', 'ASC')
        ->get()->getResultArray();
    }

    public function detail($id_kelas)
    {
        return $this->db->table('tbl_kelas')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_kelas.id_prodi', 'left')
        ->join('tbl_dosen', 'tbl_dosen.id_dosen = tbl_kelas.id_dosen', 'left')
        ->where('id_kelas', $id_kelas)
        ->get()->getRowArray();
    }

    public function add($data)
    {
       $this->db->table('tbl_kelas')
        ->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);
    }

    public function mahasiswa($id_kelas)
    {
        return $this->db->table('tbl_mhs')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
        ->where('id_kelas', $id_kelas)
        ->orderBy('id_mhs', 'DESC')
        ->get()->getResultArray();  
    } 

    public function mhs_tdkada_kls()
    {
        return $this->db->table('tbl_mhs')
        ->join('tbl_prodi', 'tbl_prodi.id_prodi = tbl_mhs.id_prodi', 'left')
        ->where('id_kelas', null)
        // ->where('id_kelas=0')
        ->orderBy('id_mhs', 'DESC')
        ->get()->getResultArray();  
    }

    public function jml_mhs($id_kelas)
    {
          return $this->db->table('tbl_mhs')
                    ->where('id_kelas', $id_kelas)
                    ->countAllResults();
    }

    public function update_mhs($data)
    {
        $this->db->table('tbl_mhs')
        ->where('id_mhs', $data['id_mhs'])
        ->update($data);
    }

}