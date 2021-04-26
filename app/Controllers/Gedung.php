<?php 
namespace App\Controllers;
use App\Models\Model_gedung;

class Gedung extends BaseController
{
    public function __construct ()
    {
		$this->Model_gedung = new Model_gedung();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Gedung',
            'gedung' => $this->Model_gedung->alldata(),
			'isi' => 'admin/v_gedung'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = [
			'gedung' =>htmlspecialchars ($this->request->getPost('gedung')),
		];
		$this->Model_gedung->add($data);
		session()->setFlashdata('pesan', 'data berhasil ditambah');
		return redirect()->to(base_url('gedung'));
	}

	public function edit($id_gedung)
	{
		$data = [
			'id_gedung' => $id_gedung,
			'gedung' =>htmlspecialchars ($this->request->getPost('gedung')),
		];
		$this->Model_gedung->edit($data);
		session()->setFlashdata('pesan', 'data berhasil diupdate');
		return redirect()->to(base_url('gedung'));
	}

	public function delete($id_gedung)
	{
		$data = [
			'id_gedung' => $id_gedung,
		];
		$this->Model_gedung->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil didelete');
		return redirect()->to(base_url('gedung'));
	}

	//--------------------------------------------------------------------

}
