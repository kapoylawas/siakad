<?php 
namespace App\Controllers;
use App\Models\Model_prodi;
use App\Models\Model_fakultas;
use App\Models\Model_dosen;


class Prodi extends BaseController
{
    public function __construct ()
    {
		$this->Model_prodi = new Model_prodi();
		$this->Model_fakultas = new Model_fakultas();
		$this->Model_dosen = new Model_dosen();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Progam Studi',
            'prodi' => $this->Model_prodi->alldata(),
			'isi' => 'admin/prodi/v_index'
		];
		return view('layout/v_wrapper', $data);
    }

	public function add()
    {
        $data= [
            'title' => 'Add Progam Studi',
            'fakultas' => $this->Model_fakultas->alldata(),
            'dosen' => $this->Model_dosen->alldata(),
			'isi' => 'admin/prodi/v_add'
		];
		return view('layout/v_wrapper', $data);
	}
	
	public function insert()
    {
        if ($this->validate([
			'id_fakultas' => [
				'label' => 'Fakultas',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'kode_prodi' => [
				'label' => 'Kode Progam Studi',
				'rules' => 'required|is_unique[tbl_prodi.kode_prodi]',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'prodi' => [
				'label' => 'Progam Studi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'jenjang' => [
				'label' => 'Jenjang',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'ka_prodi' => [
				'label' => 'KA Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
        ])) {
            //jika valid
            $data = [
                'id_fakultas' =>htmlspecialchars ($this->request->getPost('id_fakultas')),
                'kode_prodi' =>htmlspecialchars ($this->request->getPost('kode_prodi')),
                'prodi' =>htmlspecialchars ($this->request->getPost('prodi')),
                'jenjang' =>htmlspecialchars ($this->request->getPost('jenjang')),
                'ka_prodi' =>htmlspecialchars ($this->request->getPost('ka_prodi')),
            ];
            $this->Model_prodi->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambah');
            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/add'));
         }
	}
	
	public function edit($id_prodi)
    {
        $data= [
            'title' => 'Edit Progam Studi',
            'fakultas' => $this->Model_fakultas->alldata(),
            'prodi' => $this->Model_prodi->detail_data($id_prodi),
            'dosen' => $this->Model_dosen->alldata($id_prodi),
			'isi' => 'admin/prodi/v_edit'
		];
		return view('layout/v_wrapper', $data);
	}

	public function update($id_prodi)
    {
        if ($this->validate([
			'id_fakultas' => [
				'label' => 'Fakultas',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
			'prodi' => [
				'label' => 'Progam Studi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'jenjang' => [
				'label' => 'Jenjang',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'ka_prodi' => [
				'label' => 'KA Prodi',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
        ])) {
            //jika valid
            $data = [
				'id_prodi' => $id_prodi,
                'id_fakultas' =>htmlspecialchars ($this->request->getPost('id_fakultas')),
                'prodi' =>htmlspecialchars ($this->request->getPost('prodi')),
                'jenjang' =>htmlspecialchars ($this->request->getPost('jenjang')),
                'ka_prodi' =>htmlspecialchars ($this->request->getPost('ka_prodi')),
            ];
            $this->Model_prodi->edit($data);
            session()->setFlashdata('pesan', 'data berhasil diUpdate');
            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('prodi/edit/' . $id_prodi));
         }
	}
	
	public function delete($id_prodi)
	{
		$data = [
			'id_prodi' => $id_prodi,
		];
		$this->Model_prodi->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('prodi'));
	}
	//--------------------------------------------------------------------

}
