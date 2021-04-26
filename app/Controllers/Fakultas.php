<?php 
namespace App\Controllers;
use App\Models\Model_fakultas;

class Fakultas extends BaseController
{
    public function __construct ()
    {
		$this->Model_fakultas= new Model_fakultas();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Fakultas',
            'fakultas' => $this->Model_fakultas->alldata(),
			'isi' => 'admin/v_fakultas'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add()
	{
		$data = [
			'fakultas' =>htmlspecialchars ($this->request->getPost('fakultas')),
		];
		$this->Model_fakultas->add($data);
		session()->setFlashdata('pesan', 'data berhasil ditambah');
		return redirect()->to(base_url('fakultas'));
	}

	public function edit($id_fakultas)
	{
		$data = [
			'id_fakultas' => $id_fakultas,
			'fakultas' =>htmlspecialchars ($this->request->getPost('fakultas')),
		];
		$this->Model_fakultas->edit($data);
		session()->setFlashdata('pesan', 'data berhasil diupdate');
		return redirect()->to(base_url('fakultas'));
	}

	public function delete($id_fakultas)
	{
		$data = [
			'id_fakultas' => $id_fakultas,
		];
		$this->Model_fakultas->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil didelete');
		return redirect()->to(base_url('fakultas'));
	}

	//--------------------------------------------------------------------

}
