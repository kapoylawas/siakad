<?php 
namespace App\Controllers;
use App\Models\Model_dsn;
use App\Models\Model_ta;

class Dsn extends BaseController
{
	public function __construct ()
    {
		
		$this->Model_dsn = new Model_dsn();
		$this->Model_ta = new Model_ta();
		helper('form');
	}
	
	public function index()
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Dosen',
			'ta' => $ta,
			'jadwal' => $this->Model_dsn->jadwal_dosen($ta['id_ta']),
			'dosen' => $this->Model_dsn->data_dosen(),
			'isi' => 'v_dashboard_dsn'
		];
		return view('layout/v_wrapper', $data);
	}

	public function jadwal()
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Jadwal Mengajar',
			'ta' => $ta,
			'jadwal' => $this->Model_dsn->jadwal_dosen($ta['id_ta']),
			'isi' => 'dosen/v_jadwal'
		];
		return view('layout/v_wrapper', $data);
	}

	public function absen_kelas()
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Absen Kelas',
			'ta' => $ta,
			'absen' => $this->Model_dsn->jadwal_dosen($ta['id_ta']),
			'isi' => 'dosen/absen/v_absenkelas'
		];
		return view('layout/v_wrapper', $data);
	}

	public function absensi($id_jadwal)
	{
		$data= [
			'title' => 'Absensi',
			'jadwal' => $this->Model_dsn->detail_jadwal($id_jadwal),
			'mhs' => $this->Model_dsn->mhs($id_jadwal),
			'isi' => 'dosen/absen/v_absensi'
		];
		return view('layout/v_wrapper', $data);
	}

	public function simpan_absen($id_jadwal)
	{
		$mhs = $this->Model_dsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$data= [
				'id_krs' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'id_krs')),
				'p1' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p1')),
				'p2' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p2')),
				'p3' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p3')),
				'p4' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p4')),
				'p5' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p5')),
				'p6' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p6')),
				'p7' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p7')),
				'p8' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p8')),
				'p9' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p9')),
				'p10' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p10')),
				'p11' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p11')),
				'p12' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p12')),
				'p13' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p13')),
				'p14' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p14')),
				'p15' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p15')),
				'p16' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p16')),
				'p17' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p17')),
				'p18' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'p18')),
				// 'nilai_absen' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'nilai_absen')),
			];
			$this->Model_dsn->simpan_absen($data);
		}
		session()->setFlashdata('pesan', 'Absensi Berhasil di Update');
		return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
	}

	public function print_absensi($id_jadwal)
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Print Absen',
			'ta' => $ta,
			'jadwal' => $this->Model_dsn->detail_jadwal($id_jadwal),
			'mhs' => $this->Model_dsn->mhs($id_jadwal),
			
		];
		return view('dosen/absen/v_print_absen', $data);
	}

	public function nilai_mhs()
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Nilai Mahasiswa',
			'ta' => $ta,
			'absen' => $this->Model_dsn->jadwal_dosen($ta['id_ta']),
			'isi' => 'dosen/nilai/v_nilaimhs'
		];
		return view('layout/v_wrapper', $data);
	}

	public function data_nilai($id_jadwal)
	{
		$data= [
			'title' => 'Nilai',
			'jadwal' => $this->Model_dsn->detail_jadwal($id_jadwal),
			'mhs' => $this->Model_dsn->mhs($id_jadwal),
			'isi' => 'dosen/nilai/v_data_nilai'
		];
		return view('layout/v_wrapper', $data);
	}

	
	public function simpan_nilai($id_jadwal)
	{
		$mhs = $this->Model_dsn->mhs($id_jadwal);
		foreach ($mhs as $key => $value) {
			$absen = $this->request->getPost($value['id_krs'] . 'absen');
			$tugas = $this->request->getPost($value['id_krs'] . 'nilai_tugas');
			$uts = $this->request->getPost($value['id_krs'] . 'nilai_uts');
			$uas = $this->request->getPost($value['id_krs'] . 'nilai_uas');
			$na = ($absen * 15/100) + ($tugas * 15/100) + ($uts * 30/100) + ($uas * 40/100);
			if ($na >= 85) {
				$nh = 'A';
				$bobot = 4;
			}elseif ($na < 85 && $na >= 75) {
				$nh = 'B';
				$bobot = 3;
			}elseif ($na < 75 && $na >= 65) {
				$nh = 'C';
				$bobot = 2;
			}elseif ($na < 65 && $na >= 55) {
				$nh = 'D';
				$bobot = 1;
			}else {
				$nh = 'E';
				$bobot = 0;
			}
			$data= [
				'id_krs' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'id_krs')),
				'nilai_tugas' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'nilai_tugas')),
				'nilai_uts' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'nilai_uts')),
				'nilai_uas' => htmlspecialchars ($this->request->getPost($value['id_krs'] . 'nilai_uas')),
				'nilai_akhir' => number_format ($na,0),	
				'nilai_huruf' => $nh,
				'bobot' => $bobot,
			];
			$this->Model_dsn->simpan_nilai($data);
		}
		session()->setFlashdata('pesan', 'Nilai Mahasiswa Berhasil di Update');
		return redirect()->to(base_url('dsn/data_nilai/' . $id_jadwal));
	}

	public function print_nilai($id_jadwal)
	{
		$ta = $this->Model_ta->ta_aktif();
		$data= [
			'title' => 'Print Nilai',
			'ta' => $ta,
			'jadwal' => $this->Model_dsn->detail_jadwal($id_jadwal),
			'mhs' => $this->Model_dsn->mhs($id_jadwal),
		];
		return view('dosen/nilai/v_print_nilai', $data);
	}

	public function edit($id_dosen)
    {
        $data= [
            'title' => 'Edit Profile',
            'dosen' => $this->Model_dsn->detail_data($id_dosen),
			'isi' => 'v_edit_dsn'
		];
		return view('layout/v_wrapper', $data);
	}

	public function update($id_dosen)
	{
		if ($this->validate([
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
					'required' => '{field} Ganti Password Terlebih Dahulu !',
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
					'nama_dosen' =>htmlspecialchars ($this->request->getPost('nama_dosen')),
					'tanggal_lahir' =>htmlspecialchars ($this->request->getPost('tanggal_lahir')),
					'pendidikan_terakhir' =>htmlspecialchars ($this->request->getPost('pendidikan_terakhir')),
					'alamat' =>htmlspecialchars ($this->request->getPost('alamat')),
					'password' =>md5($this->request->getPost('password')),
				);
				// $foto->move('foto', $nama_file);
				$this->Model_dsn->edit($data);
			}else {
				//hapus foto lama
				$dosen = $this->Model_dsn->detail_data($id_dosen);
				if ($dosen['foto_dosen'] != "") {
					unlink('foto_dosen/' . $dosen['foto_dosen']);
				} 
			//rename file foto
			$nama_file = $foto->getRandomName();
			//jika valid
			$data = array(
					'id_dosen' => $id_dosen, 
					'nama_dosen' =>htmlspecialchars ($this->request->getPost('nama_dosen')),
					'tanggal_lahir' =>htmlspecialchars ($this->request->getPost('tanggal_lahir')),
					'pendidikan_terakhir' =>htmlspecialchars ($this->request->getPost('pendidikan_terakhir')),
					'alamat' =>htmlspecialchars ($this->request->getPost('alamat')),
					'password' =>md5($this->request->getPost('password')),
					'foto_dosen' => $nama_file,
			);
			$foto->move('foto_dosen', $nama_file);
			$this->Model_dsn->edit($data);
			}

			session()->setFlashdata('pesan', 'Data Berhasil di Update');
			return redirect()->to(base_url('dsn'));
        }else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
			return redirect()->to(base_url('dsn/edit/' . $id_dosen));
        }
	}
	//--------------------------------------------------------------------

}
