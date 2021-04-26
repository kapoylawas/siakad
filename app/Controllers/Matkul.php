<?php 
namespace App\Controllers;
use App\Models\Model_matkul;
use App\Models\Model_prodi;

class Matkul extends BaseController
{
    public function __construct ()
    {
		$this->Model_matkul = new Model_matkul();
		$this->Model_prodi = new Model_prodi();
		helper('form');
    }

	public function index()
	{
		$data= [
            'title' => 'Mata Kuliah',
            'prodi' => $this->Model_prodi->alldata(),
			'isi' => 'admin/matkul/v_matkul'
		];
		return view('layout/v_wrapper', $data);
	}

	public function detail($id_prodi)
	{
		$data= [
            'title' => 'Mata Kuliah',
            'prodi' => $this->Model_prodi->detail_data($id_prodi),
            'matkul' => $this->Model_matkul->alldatamatkul($id_prodi),
			'isi' => 'admin/matkul/v_detail'
		];
		return view('layout/v_wrapper', $data);
	}

	public function add($id_prodi)
	{
		if ($this->validate([
			'kode_matkul' => [
				'label' => 'Kode Mata Kuliah',
				'rules' => 'required|is_unique[tbl_matkul.kode_matkul]',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
					'is_unique' => '{field} Sudah ada Input Kode Lain !'
				   ]
                ],
			'matkul' => [
				'label' => 'Mata Kuliah',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'sks' => [
				'label' => 'SKS',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'smt' => [
				'label' => 'Semester',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
			'kategori' => [
				'label' => 'Kategori',
				'rules' => 'required',
				'errors' => [
					'required' => '{field} Wajib Diisi !',
				   ]
                ],
        ])) {
			//jika valid
			$smt = $this->request->getPost('smt');
			if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
				$semster  = 'Ganjil';
			} else {
				$semster  = 'Genap';
			}
            $data = [
                'kode_matkul' =>htmlspecialchars ($this->request->getPost('kode_matkul')),
                'matkul' =>htmlspecialchars ($this->request->getPost('matkul')),
                'sks' =>htmlspecialchars ($this->request->getPost('sks')),
				'smt' =>htmlspecialchars ($this->request->getPost('smt')),
				'semester' => $semster,
				'kategori' =>htmlspecialchars ($this->request->getPost('kategori')),
				'id_prodi' => $id_prodi,
            ];
            $this->Model_matkul->add($data);
            session()->setFlashdata('pesan', 'data berhasil ditambah');
            return redirect()->to(base_url('matkul/detail/' . $id_prodi));
		}else {
			//jika tidak valid
			session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('matkul/detail/' . $id_prodi));
		}
	}

	public function delete($id_prodi, $id_matkul)
	{
		$data = [
			'id_matkul' => $id_matkul,
		];
		$this->Model_matkul->delete_data($data);
		session()->setFlashdata('pesan', 'data berhasil di hapus');
		return redirect()->to(base_url('matkul/detail/' . $id_prodi));
	}

	//--------------------------------------------------------------------

}
