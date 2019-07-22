<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_data');

		header('Cache-Cotrol: no-store, no-cache, must-revidate');
		header('Cache-Control: post-check=0,pre-check=0',false);
		header('Pragma: no=cache');
	}

	public function index()
	{
		$this->load->view('Homepage/Homepage');
	}

	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ( $username == 'admin' && $password == '12345') {
			$this->session->set_userdata('username', $username);

			redirect('Admin/input_bus');
			
		}else{
			$this->load->view('Welcome');
		}
	}

	public function pilihbus(){
		
		if ($this->session->userdata('loginuser')) {
			 $where1 = $this->input->post('Tawal');
			 $where2 = $this->input->post('takhir');
			 $this->session->set_userdata('asal', $where1);
			 $this->session->set_userdata('akhir', $where2);
//			echo $where3 = $this->input->post('tgl');
			 if ($where1 == null) {
			 	$data['bis'] = $this->admin_data->all_tbis()->result();
				$this->load->view('Homepage/pilihbis', $data);
			 }else{
			 	$daca= $this->admin_data->tbis($where1,$where2)->result();
			 	$data = $this->admin_data->ktransaksi_max('transaksi')->result();
				foreach ($data as $key) {
					$kdmax = $key ->kode;
				}
				foreach ($daca as $key ) {
					$kode = $key->kode_tiket;
				}

				$maxkode = substr($kdmax,2,4);

				$email = $this->session->userdata('loginuser');

				if (empty($maxkode)) {
					$fixcode = "R001";
				}else{
					$maxkode = $maxkode + 1;
					if ($maxkode < 10) {
						$fixcode = "R00".$maxkode;
					}elseif ($maxkode < 100) {
						$fixcode = "R0".$maxkode;
					}else{
						$fixcode = "R".$maxkode;
					}
				}
			 	$jml = $this->input->post('jumlahpesan');
			 	$tgl = $this->input->post('tgl');
				$datra = array(
					'kode' => $fixcode,
					'jumlah_beli' => $jml,
					'kode_tiket' => $kode,
					'email' => $email,
					'tanggal' => $tgl
				);

				$this->session->set_userdata('transaksi',$fixcode);

				$daca['bis'] = $this->admin_data->tbis($where1,$where2)->result();	
				$this->admin_data->add_transaksi('transaksi',$datra);
				$this->load->view('Homepage/pilihbis', $daca); 	
			 }
			
		}else{
			echo "anda Harus Login";
			echo $this->session->userdata('loginuser');
		}
		
	}

	public function data_penumpang(){
		
		$where1 = $this->session->userdata('transaksi');
		$data =	$this->admin_data->show_info($where1)->result();
		foreach ($data as $key ) {

			$jml = $key ->jumlah_beli;
			$kd = $key->kode_tiket;
			$stok = $key->stok;
		}

		$where = $kd;
		$sisa = $stok - $jml;
		$data = array(
			'stok' => $sisa
		);

		$this->admin_data->update_tiket($data,'tiket',$where);
		$data1['info'] =	$this->admin_data->show_info($where1)->result();
		$this->load->view('Homepage/data_penumpang',$data1);
	}

	public function vrify(){
		$this->load->view('Homepage/verifikasi');
	}

	public function etiket(){
			
		$kode = $this->session->userdata('transaksi');

		$config['upload_path']          = './image/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 10000;
		$config['max_width']            = 102004;
		$config['max_height']           = 76008;

		$this->upload->initialize($config);

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('transfer')){
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
		}else{
			$data = $this->upload->data();
			$image = $data['file_name'];
			$data1 = array(
				'transfer' => $image,
				'etiket_kode' => 'Belum Terverifikasi'
			);

			$this->admin_data->update_transaksi($data1,'transaksi',$kode);
		}
		
		$this->load->view('Homepage/e-tiket');
	
	}

	public function buktitf(){
		$jml = $this->input->post('tbayar');
		$kode = $this->session->userdata('transaksi');
		$validation1 = array(
				array('field'=> 'n_penumpang[]','rules' =>'required'),
				array('field'=> 'alamat[]','rules' =>'required'),
				array('field'=> 'ntlp[]','rules' =>'required')
		);


		$this->form_validation->set_rules($validation1);
		
		if ($this->form_validation->run() == true) {
			$n_penumpang = $this->input->post('n_penumpang[]');
			$alamat = $this->input->post('alamat[]');
			$no = $this->input->post('ntlp[]');

			$value = array();
			for ($i=0; $i <count($n_penumpang) ; $i++) { 
				$value[$i] = array(
					'nama' => $n_penumpang[$i],
					'alamat' => $alamat[$i],
					'tlpn' =>$no[$i],
					'kode_transaksi'=> $kode
				);
			}

			$data1 = array(
				'total_harga' => $jml 
			);
			$haha = $this->admin_data->update_transaksi($data1,'transaksi',$kode);
			$how['user'] = $this->admin_data->user($kode)->result();

			$this->db->insert_batch('penumpang',$value);
			$this->load->view('Homepage/transfer', $how);
			

		}
			
	}

	public function signin(){
		$this->load->view('Homepage/registern');
	}

	public function loginn(){
		$this->load->view('Homepage/login');
	}

	public function add_user(){

		$data = $this->admin_data->kuser_max('user')->result();
			foreach ($data as $key) {
				$kdmax = $key ->kode;
			}

			$maxkode = substr($kdmax,2,4);

			if (empty($maxkode)) {
				$fixcode = "U001";
			}else{
				$maxkode = $maxkode + 1;
				if ($maxkode < 10) {
					$fixcode = "U00".$maxkode;
				}elseif ($maxkode < 100) {
					$fixcode = "U0".$maxkode;
				}else{
					$fixcode = "U".$maxkode;
				}
			}

			$full = $this->input->post('name');
			$email = $this->input->post('email');
			$pswd = $this->input->post('pswd');
			$repswd = $this->input->post('repswd');

			if ( $pswd != $repswd) {
				redirect('welcome/signin');
				echo "password tidak sama";
			}else{
				
				$data = array(
					'kode' => $fixcode,
					'fullname' => $full,
					'password' => $pswd,
					'email' => $email
				);

				$this->admin_data->add_user('user',$data);
				$this->load->view('Homepage/Homepage');
			}
	}

	public function masuk(){
		$email = $this->input->post('email');
		$pswd = $this->input->post('pswd');
		$where = $email;
		$data = $this->admin_data->show_user($where)->result();
		if ($where == null) {
			$this->load->view('Homepage/userHomepage');
		}else{
			foreach ($data as $key) {
				$email1 = $key->email;
				$pass = $key->password;
			}
			 $this->session->set_userdata('loginuser', $email1);
			 $this->session->set_userdata('passiser', $pass);
			 $asd =  $this->session->userdata('loginuser');
			 $dfg = $this->session->userdata('passiser');

			if ($email == $asd && $pswd == $dfg) {
				$this->load->view('Homepage/userHomepage');
			}else{
				echo $this->session->userdata('loginuser');
				echo $this->session->userdata('passiser');
				echo $this->session->userdata('inputimel');

			}
		}
	}

	public function keluar(){
		$this->session->unset_userdata(array('loginuser' => ''));
		$this->session->unset_userdata(array('passiser' => ''));
		$this->session->unset_userdata(array('inputimel' => ''));
		$this->session->sess_destroy();

		redirect('Welcome/index');
	}

	public function userHomepage(){
		$this->load->view('Homepage/userHomepage');
	}

	public function lihat_tiket(){

		$data['etiket'] = $this->admin_data->etiket_show()->result();

		$this->load->view('Homepage/tiket',$data);
	}

	public function admin(){
		$this->load->view('admin/login_admin');
	}
}
