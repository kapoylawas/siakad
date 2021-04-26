<?php namespace App\Models;

use CodeIgniter\Model;

class Model_auth extends Model
{
    public function login_user($username, $password)
    {
        return $this->db->table('tbl_user')
        ->where([
            'username' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_mhs($username, $password)
    {
        return $this->db->table('tbl_mhs')
        ->where([
            'nim' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }

    public function login_dsn($username, $password)
    {
        return $this->db->table('tbl_dosen')
        ->where([
            'nidn' => $username,
            'password' => $password
        ])->get()->getRowArray();
    }
}