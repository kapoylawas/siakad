<?php 
namespace App\Controllers;
use App\Models\Model_kelas;
use App\Models\Model_dosen;
use App\Models\Model_prodi;

class Kelas extends BaseController
{
    public function __construct ()
    {
		$this->Model_kelas = new Model_kelas();
		$this->Model_dosen = new Model_dosen();
		$this->Model_prodi = new Model_prodi();
		helper('form');
    }

	public function index()
	{
		$data= [
			'title' => 'Kelas',
			'kelas' => $this->Model_kelas->alldata(),
			'dosen' => $this->Model_dosen->alldata(),
			'prodi' => $this->Model_prodi->alldata(),
			'isi' => 'admin/kelas/v_kelas'
		];
		return view('layout/v_wrapper', $data);
    }
    
    public function add()
	{
		if ($this->validate([
			'nama_kelas' => [
				'label' => 'Nama Kelas',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'id_prodi' => [
				'label' => 'Progam Studi',
				'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'id_dosen' => [
				'label' => 'Nama Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'tahun_angkatan' => [
				'label' => 'Tahun Angkatan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
        ])) {
            //jika valid
            $data = [
                'nama_kelas' =>htmlspecialchars ($this->request->getPost('nama_kelas')),
                'id_prodi' =>htmlspecialchars ($this->request->getPost('id_prodi')),
                'id_dosen' =>htmlspecialchars ($this->request->getPost('id_dosen')),
                'tahun_angkatan' =>htmlspecialchars ($this->request->getPost('tahun_angkatan')),
            ];
            $this->Model_kelas->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambah');
            return redirect()->to(base_url('kelas'));
        }else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('kelas'));
        }
    }
    
    public function delete($id_kelas)
	{
		$data = [
			'id_kelas' => $id_kelas,
		];
		$this->Model_kelas->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('kelas'));
    }
    
    public function rincian_kelas($id_kelas)
	{
        
		$data= [
            'title' => 'Rombongan Kelas',
            'kelas' => $this->Model_kelas->detail($id_kelas),
            'mhs' => $this->Model_kelas->mahasiswa($id_kelas),
            'jml' => $this->Model_kelas->jml_mhs($id_kelas),
            'mhs_tpk' => $this->Model_kelas->mhs_tdkada_kls(),
			'isi' => 'admin/kelas/v_rincian_kelas'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add_anggotakls($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => $id_kelas
		];
		$this->Model_kelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil ditambah di kelas');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
	}

	public function remove_anggotakls($id_mhs, $id_kelas)
	{
		$data = [
			'id_mhs' => $id_mhs,
			'id_kelas' => null
		];
		$this->Model_kelas->update_mhs($data);
		session()->setFlashdata('pesan', 'Mahasiswa Berhasil dihapus dari kelas');
		return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
	}
	//--------------------------------------------------------------------

}
