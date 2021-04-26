<?php 
namespace App\Controllers;
use App\Models\Model_ta;
use App\Models\Model_prodi;
use App\Models\Model_jadwalkuliah;
use App\Models\Model_dosen;
use App\Models\Model_ruangan;

class Jadwalkuliah extends BaseController
{
    public function __construct ()
    {
		$this->Model_ta = new Model_ta();
		$this->Model_prodi = new Model_prodi();
		$this->Model_jadwalkuliah = new Model_jadwalkuliah();
		$this->Model_dosen = new Model_dosen();
		$this->Model_ruangan = new Model_ruangan();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->Model_ta->ta_aktif(),
            'prodi' => $this->Model_prodi->alldata(),
			'isi' => 'admin/jadwalkuliah/v_index'
		];
		return view('layout/v_wrapper', $data);
    }
    
	public function detail_jadwal($id_prodi)
	{
		$data= [
            'title' => 'Jadwal Kuliah',
            'ta_aktif' => $this->Model_ta->ta_aktif(),
            'prodi' => $this->Model_prodi->detail_data($id_prodi),
            'jadwal' => $this->Model_jadwalkuliah->alldata($id_prodi),
            'matkul' => $this->Model_jadwalkuliah->matkul($id_prodi),
            'dosen' => $this->Model_dosen->alldata(),
            'kelas' => $this->Model_jadwalkuliah->kelas($id_prodi),
            'ruangan' => $this->Model_ruangan->alldata(),
			'isi' => 'admin/jadwalkuliah/v_detail'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add($id_prodi)
	{
		if ($this->validate([
			'id_matkul' => [
				'label' => 'Mata Kuliah',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !'
				   ]
                ],
			'id_dosen' => [
				'label' => 'Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !'
				   ]
                ],
			'id_kelas' => [
				'label' => 'Kelas',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !',
				   ]
                ],
			'hari' => [
				'label' => 'Hari',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'waktu' => [
				'label' => 'Waktu',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'id_ruangan' => [
				'label' => 'Ruangan',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !',
				   ]
                ],
			'kuota' => [
				'label' => 'Kuota',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Dipilih !',
				   ]
                ],
		])) { //jika valid
		$ta = $this->Model_ta->ta_aktif();
		$data = [
			'id_prodi' => $id_prodi,
			'id_ta' => $ta['id_ta'],
			'id_kelas' =>htmlspecialchars ($this->request->getPost('id_kelas')),
			'id_matkul' =>htmlspecialchars ($this->request->getPost('id_matkul')),
			'id_dosen' =>htmlspecialchars ($this->request->getPost('id_dosen')),
			'hari' =>htmlspecialchars ($this->request->getPost('hari')),
			'waktu' =>htmlspecialchars ($this->request->getPost('waktu')),
			'id_ruangan' =>htmlspecialchars ($this->request->getPost('id_ruangan')),
			'kuota' =>htmlspecialchars ($this->request->getPost('kuota')),
		];
		$this->Model_jadwalkuliah->add($data);
		session()->setFlashdata('pesan', 'data berhasil ditambah');
		return redirect()->to(base_url('jadwalkuliah/detail_jadwal/' . $id_prodi));
		}else {
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('jadwalkuliah/detail_jadwal/' . $id_prodi));
		}
	}

	public function delete($id_jadwal, $id_prodi)
	{
		$data = [
			'id_jadwal' => $id_jadwal,
		];
		$this->Model_jadwalkuliah->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('jadwalkuliah/detail_jadwal/' . $id_prodi));
	}
	//--------------------------------------------------------------------

}
