<?php 
namespace App\Controllers;
use App\Models\Model_ruangan;
use App\Models\Model_gedung;

class Ruangan extends BaseController
{
    public function __construct ()
    {
		$this->Model_ruangan = new Model_ruangan();
		$this->Model_gedung = new Model_gedung();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Ruangan',
            'ruangan' => $this->Model_ruangan->alldata(),
			'isi' => 'admin/ruangan/v_index'
		];
		return view('layout/v_wrapper', $data);
    }
    
    public function add()
    {
        $data= [
            'title' => 'Add Ruangan',
            'gedung' => $this->Model_gedung->alldata(),
			'isi' => 'admin/ruangan/v_add'
		];
		return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        if ($this->validate([
			'id_gedung' => [
				'label' => 'Gedung',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
        ])) {
            //jika valid
            $data = [
                'id_gedung' =>htmlspecialchars ($this->request->getPost('id_gedung')),
                'ruangan' =>htmlspecialchars ($this->request->getPost('ruangan')),
            ];
            $this->Model_ruangan->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambah');
            return redirect()->to(base_url('ruangan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('ruangan/add'));
         }
    }

    public function edit($id_ruangan)
        {
            $data= [
                'title' => 'Edit Ruangan',
                'gedung' => $this->Model_gedung->alldata(),
                'ruangan' => $this->Model_ruangan->detail_data($id_ruangan),
                'isi' => 'admin/ruangan/v_edit'
            ];
            return view('layout/v_wrapper', $data);
        }

    public function update($id_ruangan)
    {
        if ($this->validate([
			'id_gedung' => [
				'label' => 'Gedung',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !'
				   ]
                ],
        ])) {
            //jika valid
            $data = [
                'id_ruangan' => $id_ruangan,
                'id_gedung' =>htmlspecialchars ($this->request->getPost('id_gedung')),
                'ruangan' =>htmlspecialchars ($this->request->getPost('ruangan')),
            ];
            $this->Model_ruangan->edit($data);
            session()->setFlashdata('pesan', 'data berhasil diupdate');
            return redirect()->to(base_url('ruangan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('ruangan/v_edit' . $id_ruangan));
         }
    }

    public function delete($id_ruangan)
	{
		$data = [
			'id_ruangan' => $id_ruangan,
		];
		$this->Model_ruangan->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('ruangan'));
	}

        //--------------------------------------------------------------------
    }


