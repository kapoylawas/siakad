<?php 
namespace App\Controllers;
use App\Models\Model_ta;
use App\Models\Model_krs;
use App\Models\Model_prodi;
use App\Models\Model_mhs;

class Mhs extends BaseController
{
	public function __construct ()
    {
		$this->Model_ta = new Model_ta();
		$this->Model_krs = new Model_krs();
		$this->Model_prodi = new Model_prodi();
		$this->Model_mhs = new Model_mhs();
		helper('form');
	}
	
	public function index()
	{
		$data= [
			'title' => 'Dashboard',
			'mhs' => $this->Model_krs->datamhs(),
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'isi' => 'v_dashboard_mhs'
		];
		return view('layout/v_wrapper', $data);
	}

	public function absensi()
	{
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Absensi',
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'mhs' => $this->Model_krs->datamhs(),
			'data_matkul' => $this->Model_krs->datakrs($mhs['id_mhs'], $ta['id_ta']),
			'isi' => 'mhs/v_absensi'
		];
		return view('layout/v_wrapper', $data);
	}

	public function edit($id_mhs)
    {
        $data= [
            'title' => 'Edit Profile',
            'prodi' => $this->Model_prodi->alldata(),
            'mhs' => $this->Model_mhs->detail_data($id_mhs),
			'isi' => 'v_edit_mhs'
		];
		return view('layout/v_wrapper', $data);
	}

	public function update($id_mhs)
	{
		if ($this->validate([
			'nim' => [
				'label' => 'NIM',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'nama_mhs' => [
				'label' => 'Nama Mahasiswa',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'email' => [
				'label' => 'Email Mahasiswa',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'password' => [
				'label' => 'Password',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} : Ganti Password Anda Terlebih dahulu',
				   ]
                ],
			'foto_mhs' => [
				'label' => 'Foto Mahasiswa',
				'rules' => 'max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto_mhs');
			if ($foto->getError() == 4) {
				$data = array(
					'id_mhs' => $id_mhs,
					'nim' =>htmlspecialchars ($this->request->getPost('nim')),
					'nama_mhs' =>htmlspecialchars ($this->request->getPost('nama_mhs')),
					'email' =>htmlspecialchars ($this->request->getPost('email')),
					'password' =>md5($this->request->getPost('password')),
				);
				$this->Model_mhs->edit($data);
			}else {
				//hapus foto lama
				$mhs = $this->Model_mhs->detail_data($id_mhs);
				if ($mhs['foto_mhs'] != "") {
					unlink('foto_mhs/' . $mhs['foto_mhs']);
				} 
				//rename file foto
				$nama_file = $foto->getRandomName();
				//jika valid
				$data = array(
					'id_mhs' => $id_mhs,
					'nim' =>htmlspecialchars ($this->request->getPost('nim')),
					'nama_mhs' =>htmlspecialchars ($this->request->getPost('nama_mhs')),
					'email' =>htmlspecialchars ($this->request->getPost('email')),
					'password' =>md5($this->request->getPost('password')),
					'foto_mhs' => $nama_file,
				);
				$foto->move('foto_mhs', $nama_file);
				$this->Model_mhs->edit($data);
			}
			session()->setFlashdata('pesan', 'Data Berhasil di Update');
			return redirect()->to(base_url('mhs'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mhs/edit/' . $id_mhs));
        }
	}

	public function khs()
	{
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Kartu Hasil Studi',
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'mhs' => $this->Model_krs->datamhs(),
			'jadwal' => $this->Model_krs->list_matkul($ta['id_ta'], $mhs['id_prodi']),
			'data_matkul' => $this->Model_krs->datakrs($mhs['id_mhs'], $ta['id_ta']),
			'isi' => 'mhs/v_khs'
		];
		return view('layout/v_wrapper', $data);
	}

	public function print_khs()
	{
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Kartu Hasil Studi',
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'mhs' => $this->Model_krs->datamhs(),
			'jadwal' => $this->Model_krs->list_matkul($ta['id_ta'], $mhs['id_prodi']),
			'data_matkul' => $this->Model_krs->datakrs($mhs['id_mhs'], $ta['id_ta']),
		];
		return view('mhs/v_print_khs', $data);
	}
	//--------------------------------------------------------------------

}
