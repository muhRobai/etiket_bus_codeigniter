<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_data');
	}

	public function logout(){
		$this->session->unset_userdata(array('username' => ''));
		$this->session->sess_destroy();

		redirect('Welcome/index');
	}

	public function input_bus()
	{

		if ($this->session->userdata('username')) {

			$data = $this->admin_data->kdbus_max('tabel_bus')->result();
			foreach ($data as $key) {
				$kdmax = $key ->nomor_bus;
			}

			$maxkode = substr($kdmax,2,4);

			if (empty($maxkode)) {
				$fixcode = "B001";
			}else{
				$maxkode = $maxkode + 1;
				if ($maxkode < 10) {
					$fixcode = "B00".$maxkode;
				}elseif ($maxkode < 100) {
					$fixcode = "B0".$maxkode;
				}else{
					$fixcode = "B".$maxkode;
				}
			}

			$data['kode'] = $fixcode;

			$this->load->view('Admin/input_bus',$data);
		}else{
			echo "anda Harus Login";
		}
	}

	public function input_tiket()
	{
		if ($this->session->userdata('username')) {
			$data = $this->admin_data->kdtiket_max('tiket')->result();
			foreach ($data as $key) {
				$kdmax = $key ->kode_tiket;
			}

			$maxkode = substr($kdmax,2,4);

			if (empty($maxkode)) {
				$fixcode = "T001";
			}else{
				$maxkode = $maxkode + 1;
				if ($maxkode < 10) {
					$fixcode = "T00".$maxkode;
				}elseif ($maxkode < 100) {
					$fixcode = "T0".$maxkode;
				}else{
					$fixcode = "T".$maxkode;
				}
			}

			$doto = $this->admin_data->kdbus_max('tabel_bus')->result();
			foreach ($doto as $key) {
				$kdbus = $key ->nomor_bus;
			}

			$data['bus'] = $kdbus; 
			$data['kode'] = $fixcode;

			$this->load->view('Admin/input_tiket',$data);
		}else{
			echo "anda Harus Login";
		}
		
	}

	public function input_promo()
	{
		if ($this->session->userdata('username')) {
			
			$this->session->unset_userdata(array('idpromo' => ''));

			$data = $this->admin_data->kdpromo_max('tabel_promo')->result();
			foreach ($data as $key) {
				$kdmax = $key ->kode_promo;
			}

			$maxkode = substr($kdmax,2,4);

			if (empty($maxkode)) {
				$fixcode = "P001";
			}else{
				$maxkode = $maxkode + 1;
				if ($maxkode < 10) {
					$fixcode = "P00".$maxkode;
				}elseif ($maxkode < 100) {
					$fixcode = "P0".$maxkode;
				}else{
					$fixcode = "P".$maxkode;
				}
			}

			$idpromo = random_string('alnum',7);

			$data['kode'] = $fixcode;
			$data['idpromo'] = $idpromo;
			$this->session->set_userdata('idpromo',$idpromo);

			$this->load->view('Admin/input_promo',$data);
		}else{
			echo "anda Harus Login";
		}
		
	}

	public function home(){
		if ($this->session->userdata('username')) {
			$this->load->view('Admin/Dashbore');
		}else{
			echo "anda Harus Login";
		}
		
	}

	public function data_tiket($offset = 0){
		if ($this->session->userdata('username')) {
				$tbl = $this->db->get('tiket');
				$config['base_url'] = base_url().'Admin/data_tiket/';
				$config['total_rows'] = $tbl->num_rows();
				$config['per_page'] = 3; #jumlah data dipanggil perhalaman
				$config['uri_segment'] = 3; #data selanjutnya di parse di urisegmen 3

				/* Atur class bootstrap yang digunakan */
				$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25;'>";
				$config['full_tag_close'] = "</ul>";
				$config['num_tag_open'] = "<li>";
				$config['num_tag_close'] = "</li>";
				$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
				$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
				$config['next_tag_open'] = "<li>";
				$config['next_tag1_close'] = "</li>";
				$config['prev_tag_open'] = "<li>";
				$config['prev_tag1_close'] = "</li>";
				$config['first_tag_open'] = "<li>";
				$config['first_tag1_close'] = "</li>";
				$config['last_tag_open'] = "<li>";
				$config['last_tag1_close'] = "</li>";

				$this->pagination->initialize($config);

				$data['halaman'] = $this->pagination->create_links();
				/* Membuat variable halaman untuk dipanggil di view */
				$data['offset'] = $offset;

				$data['tiket'] = $this->admin_data->show_tiket($config['per_page'],$offset);

				$this->load->view('Admin/admin_tampildata_tiket',$data);

		}else{
			echo "anda Harus Login";
		}
	}


	public function data_transaksi($offset= 0){

		if ($this->session->userdata('username')) {
			$tbl = $this->db->get('transaksi');
			$config['base_url'] = base_url().'Admin/data_transaksi/';
			$config['total_rows'] = $tbl->num_rows();
			$config['per_page'] = 6; #jumlah data dipanggil perhalaman
			$config['uri_segment'] = 3; #data selanjutnya di parse di urisegmen 3

			/* Atur class bootstrap yang digunakan */
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25;'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag1_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag1_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag1_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag1_close'] = "</li>";

			$this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			/* Membuat variable halaman untuk dipanggil di view */
			$data['offset'] = $offset;

			$data['trans'] = $this->admin_data->show_transaksi($config['per_page'],$offset);

			$this->load->view('Admin/admin_tampildata_transaksi', $data);
		}else{
			echo "anda Harus Login";
		}

	}



	public function data_bus($offset= 0){

		if ($this->session->userdata('username')) {
			$tbl = $this->db->get('tabel_bus');
			$config['base_url'] = base_url().'Admin/data_bus/';
			$config['total_rows'] = $tbl->num_rows();
			$config['per_page'] = 3; #jumlah data dipanggil perhalaman
			$config['uri_segment'] = 3; #data selanjutnya di parse di urisegmen 3

			/* Atur class bootstrap yang digunakan */
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25;'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag1_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag1_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag1_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag1_close'] = "</li>";

			$this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			/* Membuat variable halaman untuk dipanggil di view */
			$data['offset'] = $offset;

			$data['bus'] = $this->admin_data->show_bus($config['per_page'],$offset);

			$this->load->view('Admin/admin_tampildata_bus', $data);
		}else{
			echo "anda Harus Login";
		}

	}

	public function data_promo($offset = 0){
		if ($this->session->userdata('username')) {
			$tbl = $this->db->get('tabel_promo');
			$config['base_url'] = base_url().'Admin/data_promo/';
			$config['total_rows'] = $tbl->num_rows();
			$config['per_page'] = 3; #jumlah data dipanggil perhalaman
			$config['uri_segment'] = 3; #data selanjutnya di parse di urisegmen 3

			/* Atur class bootstrap yang digunakan */
			$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25;'>";
			$config['full_tag_close'] = "</ul>";
			$config['num_tag_open'] = "<li>";
			$config['num_tag_close'] = "</li>";
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tag1_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tag1_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tag1_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tag1_close'] = "</li>";

			$this->pagination->initialize($config);

			$data['halaman'] = $this->pagination->create_links();
			/* Membuat variable halaman untuk dipanggil di view */
			$data['offset'] = $offset;

			$data['promo'] = $this->admin_data->show_promo($config['per_page'],$offset);
			$this->load->view('Admin/admin_tampildata_promo',$data);
		}else{
			echo "anda Harus Login";
		}

		
	}

	public function data_pelanggan(){
		if ($this->session->userdata('username')) {
			$this->load->view('Admin/admin_tampildata_pelanggan');
		}else{
			echo "anda Harus Login";
		}

	}

	public function add_tiket(){
		if ($this->session->userdata('username')) {
				$data = $this->admin_data->kdtiket_max('tiket')->result();
				foreach ($data as $key) {
					$kdmax = $key ->kode_tiket;
				}

				$maxkode = substr($kdmax,2,4);

				if (empty($maxkode)) {
					$fixcode = "T001";
				}else{
					$maxkode = $maxkode + 1;
					if ($maxkode < 10) {
						$fixcode = "T00".$maxkode;
					}elseif ($maxkode < 100) {
						$fixcode = "T0".$maxkode;
					}else{
						$fixcode = "T".$maxkode;
					}
				}
			$kodet = $fixcode;
			$stok = $this->input->post('stoktiket');
			$harga = $this->input->post('hargatiket');
			$jam = $this->input->post('jamberangkat');
			$bus = $this->input->post('nomerbus');

			$data = array(
				'kode_tiket' => $kodet,
				'stok' => $stok,
				'harga_tiket' => $harga,
				'jam_berangkat' => $jam,
				'nomer_bus' => $bus
			);

			$this->admin_data->add_tiket($data,'tiket');
			redirect('Admin/input_bus');

		}else{
			echo "anda Harus Login";
		}
		
	}

	public function add_bus(){
		if ($this->session->userdata('username')) {

				$data = $this->admin_data->kdbus_max('tabel_bus')->result();
				foreach ($data as $key) {
					$kdmax = $key ->nomor_bus;
				}

				$maxkode = substr($kdmax,2,4);

				if (empty($maxkode)) {
					$fixcode = "B001";
				}else{
					$maxkode = $maxkode + 1;
					if ($maxkode < 10) {
						$fixcode = "B00".$maxkode;
					}elseif ($maxkode < 100) {
						$fixcode = "B0".$maxkode;
					}else{
						$fixcode = "B".$maxkode;
					}
				}

				$no = $fixcode;
				$nama = $this->input->post('namabus');
				$kelas = $this->input->post('kelas');
				$asal = $this->input->post('asalbus');
				$tujuan = $this->input->post('tujuanbus');

				$data = array(
					'nomor_bus' => $no,
					'nama_bus' => $nama,
					'tipe_bus' => $kelas,
					'asal_bus' => $asal,
					'tujuan_bus' => $tujuan
				);

				$this->admin_data->add_bus($data,'tabel_bus');
				redirect('Admin/input_tiket');

			/*else{

				$this->session->unset_userdata(array('username' => ''));
				$this->session->sess_destroy();

				echo $this->session->userdata('username');

				redirect('welcome/index');
			}*/
		}else{
			echo "anda Harus Login";
		}		
	}

		public function add_promo(){
		if ($this->session->userdata('username')) {
				$data = $this->admin_data->kdpromo_max('tabel_promo')->result();
				foreach ($data as $key) {
					$kdmax = $key ->kode_promo;
				}

				$maxkode = substr($kdmax,2,4);

				if (empty($maxkode)) {
					$fixcode = "P001";
				}else{
					$maxkode = $maxkode + 1;
					if ($maxkode < 10) {
						$fixcode = "P00".$maxkode;
					}elseif ($maxkode < 100) {
						$fixcode = "P0".$maxkode;
					}else{
						$fixcode = "P".$maxkode;
					}
				}
			
			$kode = $fixcode;
			$nama = $this->input->post('namapromo');
			$id = $this->session->userdata('idpromo');
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$des = $this->input->post('deskripsi');

			$data = array(
				'kode_promo' => $kode,
				'nama_promo' =>$nama,
				'ID_promo' => $id,
				'awal_promo' => $awal,
				'akhir_promo' => $akhir,
				'deskripsi' => $des
			);

			$this->admin_data->add_promo($data,'tabel_promo');
			redirect('Admin/input_promo');
			//echo $promo = $this->session->userdata('idpromo');

		}else{
			echo "anda Harus Login";
		}
 	}


	public function update_tiket(){
		if ($this->session->userdata('username')) {
			if ($this->input->post('simpan')) {
				$where = $this->input->post('kodetiket');
				$stok = $this->input->post('stoktiket');
				$harga = $this->input->post('hargatiket');
				$jam = $this->input->post('jamberangkat');

				$data = array(
					'stok' => $stok,
					'harga_tiket' => $harga,
					'jam_berangkat' => $jam
				);

				$this->admin_data->update_tiket($data,'tiket',$where);
				redirect('Admin/data_tiket');
			}else{
				redirect('Admin/data_tiket');
			}
		}else{
			echo "anda Harus Login";
		}
			
	}

	public function update_bus(){
		if ($this->session->userdata('username')) {
			if ($this->input->post('simpan')) {
				# code...
				$no = $this->input->post('nobus');
				$nama = $this->input->post('namabus');
				$kelas = $this->input->post('kelas');
				$asal = $this->input->post('asalbus');
				$tujuan = $this->input->post('tujuanbus');

				$data = array(
					'nama_bus' => $nama,
					'tipe_bus' => $kelas,
					'asal_bus' => $asal,
					'tujuan_bus' => $tujuan
				);

				echo $this->session->userdata('nomor_bus'),"ulala";

				$this->admin_data->update_bus($data,'tabel_bus',$no);
				redirect('Admin/data_bus');
			}else{
				redirect('Admin/data_bus');
			}
		}else{
			echo "anda Harus Login";
		}
			

	}

	public function update_promo(){
		if ($this->session->userdata('username')) {
			if ($this->input->post('simpan')) {
				# code...
				$where = $this->input->post('kodepromo');
				$nama = $this->input->post('namapromo');
				$id = $this->input->post('idpromo');
				$awal = $this->input->post('awal');
				$akhir = $this->input->post('akhir');
				$des = $this->input->post('deskripsi');

				$data = array(
					'nama_promo' =>$nama,
					'ID_promo' => $id,
					'awal_promo' => $awal,
					'akhir_promo' => $akhir,
					'deskripsi' => $des
				);

	//			$this->admin_data->update_promo($data,'tabel_promo',$where);
				$this->admin_data->update_promo($where,$data,'tabel_promo');
				redirect('admin/data_promo');
			}else{
				redirect('Admin/data_promo');

			}

		}else{
			echo "anda Harus Login";
		}
			

	}

 	public function edit_bus($nobus){

 		if ($this->session->userdata('username')) {
			if (empty($nobus)) {
	 			echo 'tidak bisa edit';
	 		}else{
	 			$where = $nobus;
	 			$data['ebus'] = $this->admin_data->edit_bus($where,'tabel_bus')->result();
	 			$this->load->view('Admin/edit_bus',$data);
	 		}
		}else{
			echo "anda Harus Login";
		}

 		
 	}

 	public function edit_tiket($kdtiket){
 		if ($this->session->userdata('username')) {
			if (empty($kdtiket)) {
 				echo 'tidak bisa edit';
	 		}else{
	 			$this->session->set_userdata('kode_tiket',$kdtiket);

	 			$where = $kdtiket;
	 			$data['tiket'] = $this->admin_data->edit_tiket($where,'tiket')->result();
	 			$this->load->view('Admin/edit_tiket',$data);
	 		}
		}else{
			echo "anda Harus Login";
		}

 		
 	}

 	public function edit_promo($kdpromo){
 		if ($this->session->userdata('username')) {
			if (empty($kdpromo)) {
	 			echo "tidek bisa edit";
	 		}else{
	 			$this->session->set_userdata('kode_promo',$kdpromo);

	 			$where = $kdpromo;
	 			$data['promo'] = $this->admin_data->edit_promo($where,'tabel_promo')->result();
	 			$this->load->view('Admin/edit_promo',$data);
	 		}
		}else{
			echo "anda Harus Login";
		}
 	}

 	public function edit_transaksi($kodetransaksi){
 		if ($this->session->userdata('username')) {
			if (empty($kodetransaksi)) {
	 			echo "tidek bisa edit";
	 		}else{
	 			$this->session->set_userdata('kode_tras',$kodetransaksi);

	 			$where = $kodetransaksi;
	 			$data['trans'] = $this->admin_data->edit_transaksi($where,'transaksi')->result();
	 			//print_r($data);
	 			$this->load->view('Admin/edit_transaksi',$data);
	 		}
		}else{
			echo "anda Harus Login";
		}	
 	}

 	public function delete_promo($kdpromo){
 		if ($this->session->userdata('username')) {
 			if (empty($kdpromo)) {
 				echo "tidak bisa edit";
 			}else{
 				$where = $kdpromo;
 				$this->admin_data->delete_promo($where,'tabel_promo');
 				redirect('Admin/data_promo');
 			}
 		}else{
 			echo "anda harus login";
 		}
 	}

 	public function delete_bus($kdbus){
 		if ($this->session->userdata('username')) {
 			if (empty($kdbus)) {
 				echo "tidak bisa edit";
 			}else{
 				$where = $kdbus;
 				$this->admin_data->delete_bus($where,'tabel_bus');
 				redirect('Admin/data_bus');
 			}
 		}else{
 			echo "anda harus login";
 		}
 	}

 	public function delete_tiket($kdtiket){
 		if ($this->session->userdata('username')) {
 			if (empty($kdtiket)) {
 				echo "tidak bisa edit";
 			}else{
 				$where = $kdtiket;
 				$this->admin_data->delete_tiket($where,'tiket');
 				redirect('Admin/data_tiket');
 			}
 		}else{
 			echo "anda harus login";
 		}
 	}

 	public function benerbenerakhir($kode){
 		if ($this->session->userdata('username')) {
 			if ($this->input->post('verifikasi')) {
 				$etiket = random_string('alnum',10);

	 			$data = array(
	 				'etiket_kode' => $etiket
	 			);

	 			$this->admin_data->update_transaksi($data,'transaksi',$kode);
	 			redirect('Admin/data_transaksi');	
 			}else{
 				$where = $kode;
 				$this->admin_data->delete_transaksi($where,'transaksi');
 				redirect('Admin/data_transaksi');
 			}
 		}else{
 			echo "anda harus login";
 		}	
 	}
}
