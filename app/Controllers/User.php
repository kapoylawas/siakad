<?php 
namespace App\Controllers;
use App\Models\Model_user;

class User extends BaseController
{
    public function __construct ()
    {
		$this->Model_user = new Model_user ();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'User',
            'user' => $this->Model_user->alldata(),
			'isi' => 'admin/v_user'
		];
		return view('layout/v_wrapper', $data);
    }

	public function add()
	{
        if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'username' => [
				'label' => 'Username',
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
			'foto' => [
				'label' => 'Foto',
				'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
					'uploaded' => '{field} Wajib di isi!!',
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto');
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
				'username' =>htmlspecialchars ($this->request->getPost('username')),
				'password' =>md5($this->request->getPost('password')),
				'foto' => $nama_file,
			);

			$foto->move('foto', $nama_file);
			$this->Model_user->add($data);
			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('user'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
        }
	}
	
	public function edit($id_user)
	{
        if ($this->validate([
			'nama_user' => [
				'label' => 'Nama User',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'username' => [
				'label' => 'Username',
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
			'foto' => [
				'label' => 'Foto',
				'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg,image/gif]',
				'errors' => [
                    'max_size' => 'Ukuran {field} Max 1mb!!',
                    'mime_in' => 'Format {field} Wajib PNG,JPG,JPEG,GIF',
				   ]
                ],
        ])) {
			$foto = $this->request->getFile('foto');
			if ($foto->getError() == 4) {
				$data = array(
					'id_user' => $id_user, 
					'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
					'username' =>htmlspecialchars ($this->request->getPost('username')),
					'password' =>md5($this->request->getPost('password')),
				);
				// $foto->move('foto', $nama_file);
				$this->Model_user->edit($data);
			}else {
				//hapus foto lama
				$user = $this->Model_user->detail_data($id_user);
				if ($user['foto'] != "") {
					unlink('foto/' . $user['foto']);
				} 
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
				'id_user' => $id_user, 
				'nama_user' =>htmlspecialchars ($this->request->getPost('nama_user')),
				'username' =>htmlspecialchars ($this->request->getPost('username')),
				'password' =>md5($this->request->getPost('password')),
				'foto' => $nama_file,
			);
			$foto->move('foto', $nama_file);
			$this->Model_user->edit($data);
			}

			session()->setFlashdata('pesan', 'Data Berhasil di Tambah');
			return redirect()->to(base_url('user'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('user'));
        }
	}
	
	public function delete($id_user)
    {
		//hapus foto lama
		$user = $this->Model_user->detail_data($id_user);
		if ($user['foto'] != "") {
			unlink('foto/' . $user['foto']);
		}
		
		$data = array(
			'id_user' => $id_user,
	);
		$this->Model_user->delete_data($data);
		session()->setFlashdata('pesan', 'Data Berhasil di Hapus');
		return redirect()->to(base_url('user'));
    }

  //--------------------------------------------------------------------

}


