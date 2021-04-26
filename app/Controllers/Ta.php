<?php 
namespace App\Controllers;
use App\Models\Model_ta;

class Ta extends BaseController
{
    public function __construct ()
    {
		$this->Model_ta = new Model_ta();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Tahun Akademik',
            'ta' => $this->Model_ta->alldata(),
			'isi' => 'admin/v_ta'
		];
		return view('layout/v_wrapper', $data);
    }
    
    public function add()
	{
		$data = [
			'ta' =>htmlspecialchars ($this->request->getPost('ta')),
			'semester' =>htmlspecialchars ($this->request->getPost('semester')),
		];
		$this->Model_ta->add($data);
		session()->setFlashdata('pesan', 'data berhasil ditambah');
		return redirect()->to(base_url('ta'));
    }
    
    public function edit($id_ta)
	{
		$data = [
            'id_ta' => $id_ta,
			'ta' =>htmlspecialchars ($this->request->getPost('ta')),
			'semester' =>htmlspecialchars ($this->request->getPost('semester')),
		];
		$this->Model_ta->edit($data);
		session()->setFlashdata('pesan', 'data berhasil diedit');
		return redirect()->to(base_url('ta'));
    }
    
    public function delete($id_ta)
	{
		$data = [
			'id_ta' => $id_ta,
		];
		$this->Model_ta->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil didelete');
		return redirect()->to(base_url('ta'));
	}

	// setting tahun akademik
    public function setting()
	{
		$data = [
			'title' => 'Setting Tahun Akademik',
            'ta' => $this->Model_ta->alldata(),
			'isi' => 'admin/v_set_ta'
		];
		return view('layout/v_wrapper', $data);
	}

    public function set_statusta($id_ta)
	{
		// reset status
		$this->Model_ta->reset_statusta();
		// set status
		$data = [
			'id_ta' => $id_ta,
			'status' => 1
		];
		$this->Model_ta->edit($data);
		session()->setFlashdata('pesan', 'Tahun Akademik berhasil di Aktifkan');
		return redirect()->to(base_url('ta/setting'));
	}

	

	//--------------------------------------------------------------------

}
