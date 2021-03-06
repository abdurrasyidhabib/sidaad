<?php
class M_Operator extends CI_Model{
  public function getAllData(){
    return $this->db->get('data_penduduk')->result_array();
  }

  public function getDataSearch($key){
    $keys = ['nik' => $key, 'nama' => $key, 'alamat' => $key, 'pekerjaan' => $key];
    return  $this->db->select('*')->from('data_penduduk')->or_like($keys)->get()->result_array();
  }

  public function getSingleData($nik){
    return $this->db->get_where('data_penduduk', ['nik' => $nik])->row_array();
  }

  public function tambahDataPenduduk(){
    $nik = $this->input->post('nik');
    $nama = $this->input->post('nama');
    $ttl = $this->input->post('ttl');
    $agama = $this->input->post('agama');
    $jkel = $this->input->post('jkel');
    $kewarganegaraan = $this->input->post('kewarganegaraan');
    $status = $this->input->post('status');
    $pekerjaan = $this->input->post('pekerjaan');
    $alamat = $this->input->post('alamat');

    $data = ['nik' => $nik, 'nama' => $nama, 'ttl' => $ttl, 'agama' => $agama, 'jkel' => $jkel, 'kewarganegaraan' => $kewarganegaraan, 'status' => $status, 'pekerjaan' => $pekerjaan, 'alamat' => $alamat];

    if($this->getSingleData($nik)){
      return false;
    }else{
      $this->db->insert('data_penduduk', $data);
    }
  }

  public function ubahDataPenduduk($nikLama){
    // var_dump($this->uri->segment(3));
    // var_dump($nikLama);
    $nik = $this->input->post('nik');
    $nama = $this->input->post('nama');
    $ttl = $this->input->post('ttl');
    $agama = $this->input->post('agama');
    $jkel = $this->input->post('jkel');
    $kewarganegaraan = $this->input->post('kewarganegaraan');
    $status = $this->input->post('status');
    $pekerjaan = $this->input->post('pekerjaan');
    $alamat = $this->input->post('alamat');

    // $data = ['nama' => $nama, 'ttl' => $ttl, 'agama' => $agama, 'jkel' => $jkel, 'kewarganegaraan' => $kewarganegaraan, 'status' => $status, 'pekerjaan' => $pekerjaan, 'alamat' => $alamat];
    $this->db->set('nik', $nik);
    $this->db->set('nama', $nama);
    $this->db->where('nik', $nikLama);
    $this->db->update('data_penduduk');
    return $this->db->affected_rows();
    // return $nikLama;
    // die;
    
    // mysqli_query(mysqli_connect('localhost', 'root', '', 'sidaad'), "update data_penduduk set nama='Hanyauu' where data_penduduk.nik=34308738273");
    // var_dump(mysqli_affected_rows(mysqli_connect('localhost', 'root', '', 'sidaad')));die;
  }

  public function hapusDataPenduduk(){
    if ($this->uri->segment(3)) {
      $nik = $this->uri->segment(3);
      $this->db->delete('data_penduduk', ['nik' => $nik]);
    }
  }

  // public function transaksi($jenis_surat){
  //   $
  // }
}