<?php 
namespace App\Controllers;
use App\Models\Model_prodi;
use App\Models\Model_mhs;

class mahasiswa extends BaseController
{
    public function __construct ()
    {
		$this->Model_prodi = new Model_prodi();
		$this->Model_mhs = new Model_mhs();
		helper('form');
    }

	public function index()
	{
		$data= [
			'title' => 'Mahasiswa',
			'mhs' => $this->Model_mhs->alldata(),
			'isi' => 'admin/mahasiswa/v_index'
		];
		return view('layout/v_wrapper', $data);
    }

	public function add()
    {
        $data= [
			'title' => 'Add Mahasiswa',
			'prodi' => $this->Model_prodi->alldata(),
			'isi' => 'admin/mahasiswa/v_add'
		];
		return view('layout/v_wrapper', $data);
	}

	public function insert()
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
			'id_prodi' => [
				'label' => 'Progam Studi',
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
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'foto_mhs' => [
				'label' => 'Foto Mahasiswa',
				'rules' => 'uploaded[foto_mhs]|max_size[foto_mhs,1024]|mime_in[foto_mhs,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} Wajib di isi!!',
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto_mhs');
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'nim' =>htmlspecialchars ($this->request->getPost('nim')),
				'nama_mhs' =>htmlspecialchars ($this->request->getPost('nama_mhs')),
				'id_prodi' =>htmlspecialchars ($this->request->getPost('id_prodi')),
				'password' =>md5($this->request->getPost('password')),
				'foto_mhs' => $nama_file,
			);

			$foto->move('foto_mhs', $nama_file);
			$this->Model_mhs->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('mahasiswa'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/add'));
        }
	} 

	public function edit($id_mhs)
    {
        $data= [
            'title' => 'Edit Dosen',
            'prodi' => $this->Model_prodi->alldata(),
            'mhs' => $this->Model_mhs->detail_data($id_mhs),
			'isi' => 'admin/mahasiswa/v_edit'
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
			'id_prodi' => [
				'label' => 'Progam Studi',
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
					'required' => '{field} Wajib Diisi !',
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
					'id_prodi' =>htmlspecialchars ($this->request->getPost('id_prodi')),
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
					'id_prodi' =>htmlspecialchars ($this->request->getPost('id_prodi')),
					'password' =>md5($this->request->getPost('password')),
					'foto_mhs' => $nama_file,
				);
				$foto->move('foto_mhs', $nama_file);
				$this->Model_mhs->edit($data);
			}
			session()->setFlashdata('pesan', 'Data Berhasil di Update');
			return redirect()->to(base_url('mahasiswa'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('mahasiswa/edit/' . $id_mhs));
        }
	}

	public function delete($id_mhs)
    {
		//hapus foto lama
		$mhs = $this->Model_mhs->detail_data($id_mhs);
		if ($mhs['foto_mhs'] != "") {
			unlink('foto_mhs/' . $mhs['foto_mhs']);
		}
		$data = array(
			'id_mhs' => $id_mhs,
	);
		$this->Model_mhs->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
		return redirect()->to(base_url('mahasiswa'));
    }
  //--------------------------------------------------------------------

}


