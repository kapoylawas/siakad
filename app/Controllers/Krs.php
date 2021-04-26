<?php 
namespace App\Controllers;
use App\Models\Model_ta;
use App\Models\Model_krs;

class Krs extends BaseController
{
	public function __construct ()
    {
		$this->Model_ta = new Model_ta();
		$this->Model_krs = new Model_krs();
		helper('form');
	}
	
	public function index()
	{
		
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Kartu Rencana Studi',
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'mhs' => $this->Model_krs->datamhs(),
			'jadwal' => $this->Model_krs->list_matkul($ta['id_ta'], $mhs['id_prodi']),
			'data_matkul' => $this->Model_krs->datakrs($mhs['id_mhs'], $ta['id_ta']),
			'isi' => 'mhs/krs/v_krs'
		];
		return view('layout/v_wrapper', $data);
	}

	public function tambah_matkul($id_jadwal)
	{
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data = [
			'id_jadwal' => $id_jadwal,
			'id_ta' => $ta['id_ta'],
			'id_mhs' => $mhs['id_mhs']
		];
		$this->Model_krs->add_matkul($data);
		session()->setFlashdata('pesan', 'Mata Kuliah berhasil ditambah');
		return redirect()->to(base_url('krs'));
	}

	public function delete($id_krs)
	{
		$data = [
			'id_krs' => $id_krs,
		]; 
		$this->Model_krs->delete_data($data);
		session()->setFlashdata('pesan', 'Data Mata Kuliah berhasil dihapus');
		return redirect()->to(base_url('krs'));
	}

	public function print()
	{
		$mhs = $this->Model_krs->datamhs();
		$ta = $this->Model_ta->ta_aktif();
		$data = [
			'title' => 'Kartu Rencana Studi',
			'ta_aktif' => $this->Model_ta->ta_aktif(),
			'mhs' => $this->Model_krs->datamhs(),
			'data_matkul' => $this->Model_krs->datakrs($mhs['id_mhs'], $ta['id_ta']),
		]; 
		return view('mhs/krs/v_print_krs', $data);
		// $dompdf = new \Dompdf\Dompdf(); 
        // $dompdf->loadHtml(view('mhs/krs/v_print_krs', $data));
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $dompdf->stream();
	}

	//--------------------------------------------------------------------

}
