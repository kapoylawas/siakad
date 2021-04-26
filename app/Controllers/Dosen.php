<?php 
namespace App\Controllers;
use App\Models\Model_dosen;

class Dosen extends BaseController
{
    public function __construct ()
    {
		$this->Model_dosen = new Model_dosen();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Dosen',
            'dosen' => $this->Model_dosen->alldata(),
			'isi' => 'admin/dosen/v_index'
		];
		return view('layout/v_wrapper', $data);
    }

	public function add()
    {
        $data= [
            'title' => 'Add Dosen',
            'dosen' => $this->Model_dosen->alldata(),
			'isi' => 'admin/dosen/v_add'
		];
		return view('layout/v_wrapper', $data);
	}

	public function insert()
	{
		if ($this->validate([
			'kode_dosen' => [
				'label' => 'Kode Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'nidn' => [
				'label' => 'NIDN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'nama_dosen' => [
				'label' => 'Nama Dosen',
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
			'foto_dosen' => [
				'label' => 'Foto Dosen',
				'rules' => 'uploaded[foto_dosen]|max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} Wajib di isi!!',
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto_dosen');
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'kode_dosen' =>htmlspecialchars ($this->request->getPost('kode_dosen')),
				'nidn' =>htmlspecialchars ($this->request->getPost('nidn')),
				'nama_dosen' =>htmlspecialchars ($this->request->getPost('nama_dosen')),
				'password' =>md5($this->request->getPost('password')),
				'foto_dosen' => $nama_file,
			);

			$foto->move('foto_dosen', $nama_file);
			$this->Model_dosen->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('dosen'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/add'));
        }
	} 

	public function edit($id_dosen)
    {
        $data= [
            'title' => 'Edit Dosen',
            'dosen' => $this->Model_dosen->detail_data($id_dosen),
			'isi' => 'admin/dosen/v_edit'
		];
		return view('layout/v_wrapper', $data);
	}

	public function update($id_dosen)
	{
		if ($this->validate([
			'kode_dosen' => [
				'label' => 'Kode Dosen',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'nidn' => [
				'label' => 'NIDN',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'nama_dosen' => [
				'label' => 'Nama Dosen',
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
			'foto_dosen' => [
				'label' => 'Foto Dosen',
				'rules' => 'max_size[foto_dosen,1024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto_dosen');
			if ($foto->getError() == 4) {
				$data = array(
					'id_dosen' => $id_dosen,
					'kode_dosen' =>htmlspecialchars ($this->request->getPost('kode_dosen')),
					'nidn' =>htmlspecialchars ($this->request->getPost('nidn')),
					'nama_dosen' =>htmlspecialchars ($this->request->getPost('nama_dosen')),
					'password' =>md5($this->request->getPost('password')),
				);
				// $foto->move('foto', $nama_file);
				$this->Model_dosen->edit($data);
			}else {
				//hapus foto lama
				$dosen = $this->Model_dosen->detail_data($id_dosen);
				if ($dosen['foto_dosen'] != "") {
					unlink('foto_dosen/' . $dosen['foto_dosen']);
				} 
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
					'id_dosen' => $id_dosen, 
					'kode_dosen' =>htmlspecialchars ($this->request->getPost('kode_dosen')),
					'nidn' =>htmlspecialchars ($this->request->getPost('nidn')),
					'nama_dosen' =>htmlspecialchars ($this->request->getPost('nama_dosen')),
					'password' =>md5($this->request->getPost('password')),
					'foto_dosen' => $nama_file,
			);
			$foto->move('foto_dosen', $nama_file);
			$this->Model_dosen->edit($data);
			}
			session()->setFlashdata('pesan', 'Data Berhasil di Update');
			return redirect()->to(base_url('dosen'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dosen/edit/' . $id_dosen));
        }
	}

	public function delete($id_dosen)
    {
		//hapus foto lama
		$dosen = $this->Model_dosen->detail_data($id_dosen);
		if ($dosen['foto_dosen'] != "") {
			unlink('foto_dosen/' . $dosen['foto_dosen']);
		}
		
		$data = array(
			'id_dosen' => $id_dosen,
	);
		$this->Model_dosen->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
		return redirect()->to(base_url('dosen'));
    }
  //--------------------------------------------------------------------

}


