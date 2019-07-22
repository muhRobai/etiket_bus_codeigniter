<?php
	/**
	* 
	*/
	class admin_data extends CI_Model
	{
		/**
		 * Insert Table
		 */
		
		public function add_tiket($data,$table){
			$this->db->insert($table,$data);
		}

		public function add_bus($data,$table){
			$this->db->insert($table,$data);
		}

		public function add_promo($data,$table){
			$this->db->insert($table,$data);
		}

		public function add_transaksi($table,$datra){
			$this->db->insert($table,$datra);
		}

		public function add_user($table,$data){
			$this->db->insert($table,$data);	
		}

		public function add_penumpang($table,$data){
			$this->db->insert($table,$data);	
		}

		/**
		 * Show Table
		 */

		public function show_bus($num, $offset){
			$query = $this->db->get('tabel_bus', $num, $offset);
			return $query->result();
		}

		public function show_transaksi($num, $offset){
			$query = $this->db->get('transaksi', $num, $offset);
			return $query->result();
		}

		public function show_promo($num, $offset){
			$query = $this->db->get('tabel_promo', $num, $offset);
			return $query->result();
		}

		public function show_tiket($num, $offset){
			$query = $this->db->get('tiket', $num, $offset);
			return $query->result();
		}

		public function user($kode){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('transaksi','transaksi.email = user.email');
			$this->db->where('transaksi.kode', $kode);
			return $this->db->get();
		}

		public function penumpang($kode){
			$this->db->select('*');
			$this->db->from('penumpang');
			$this->db->join('transaksi','transaksi.kode = penumpang.kode_transaksi');
			$this->db->where('kode_transaksi', $kode);
			return $this->db->get();
		}

		public function tbis($where,$where1){
			$this->db->select('*');
			$this->db->from('tabel_bus');
			$this->db->join('tiket','tiket.nomer_bus = tabel_bus.nomor_bus');
			$this->db->where('asal_bus', $where);
			$this->db->where('tujuan_bus', $where1);
			return $this->db->get();
		}

		public function all_tbis(){
			$this->db->select('*');
			$this->db->from('tabel_bus');
			$this->db->join('tiket','tiket.nomer_bus = tabel_bus.nomor_bus');
			return $this->db->get();
		}

		public function show_user($where){
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email',$where);
			return $this->db->get();
		}

		public function show_info($where){
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('user','transaksi.email = user.email');
			$this->db->join('tiket','tiket.kode_tiket = transaksi.kode_tiket');
			$this->db->join('tabel_bus','tiket.nomer_bus = tabel_bus.nomor_bus');
			$this->db->where('transaksi.kode', $where);
			return $this->db->get();
		}

		public function etiket_show(){
			$this->db->select('*');
			$this->db->from('transaksi');
			$this->db->join('user','transaksi.email = user.email');
			$this->db->join('tiket','tiket.kode_tiket = transaksi.kode_tiket');
			$this->db->join('tabel_bus','tiket.nomer_bus = tabel_bus.nomor_bus');
			$this->db->where('datediff(tanggal,current_date()) >= 1');
			return $this->db->get();	
		}

		/**
		 * Edit Table
		 */

		public function edit_bus($where,$table){
			$this->db->select('*');
			$this->db->where('nomor_bus',$where);
			return $this->db->get($table);
		}

		public function edit_tiket($where, $table){
			$this->db->select('*');
			$this->db->where('kode_tiket',$where);
			return $this->db->get($table);
		}

		public function edit_promo($where,$table){
			$this->db->select('*');
			$this->db->where('kode_promo', $where);
			return $this->db->get($table);
		}

		public function edit_transaksi($where,$table){
			$this->db->select('*');
			$this->db->where('kode', $where);
			return $this->db->get($table);
		}
		/**
		 * Delete Table
		 */

		public function delete_promo($where,$tabel){
			$this->db->where('kode_promo',$where);
			$this->db->delete($tabel);
		}

		public function delete_tiket($where,$tabel){
			$this->db->where('kode_tiket',$where);
			$this->db->delete($tabel);
		}

		public function delete_bus($where,$table){
			$this->db->where('nomor_bus',$where);
			$this->db->delete($table);

		}

		public function delete_transaksi($where,$table){
			$this->db->where('kode',$where);
			$this->db->delete($table);

		}
		/**
		 * Update Table
		 */

		public function update_bus($data,$table,$where){
			$this->db->where('nomor_bus',$where);
			$this->db->update($table,$data);
		}

		public function update_tiket($data,$tabel,$where){
			$this->db->where('kode_tiket',$where);
			$this->db->update($tabel,$data);
		}

		public function update_promo($where,$data,$table){
			$this->db->where('kode_promo',$where);
			$this->db->update($table,$data);
		}

		public function update_transaksi($data,$tabel,$kode){
			$this->db->where('kode',$kode);
			$this->db->update($tabel,$data);
		}

		/**
		 * Kode Max
		 */

		public function kdtiket_max($tabel){
			$this->db->select_max('kode_tiket');
			return $this->db->get($tabel);
		}

		public function kdbus_max($tabel){
			$this->db->select_max('nomor_bus');
			return $this->db->get($tabel);
		}

		public function kdpromo_max($tabel){
			$this->db->select_max('kode_promo');
			return $this->db->get($tabel);
		}

		public function ktransaksi_max($tabel){
			$this->db->select_max('kode');
			return $this->db->get($tabel);
		}

		public function kuser_max($table){
			$this->db->select_max('kode');
			return $this->db->get($table);
		}

		





		


	}
?>