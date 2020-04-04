<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $GLOBALS['data'] = $this->_getInitialData();
  }

  private function _getInitialData(){
    $session_data = $this->session->get_userdata();
    $data['nama_surat_lengkap'] = ["Ket. Belum Menikah", "Ket. Tidak Mampu", "Izin Usaha", "Izin Keramaian", "Ket. Domisili", "Ket. Penghasilan Ortu", "Pengantar SKCK"];
    $data['username'] = $session_data['username'];
    return $data;
  }

  public function index(){
    // user filtering
    $data = $this->session->get_userdata();
    ($data['login']=="1") ? $this->admin() : (($data['login']=="2") ? $this->operator() : redirect('auth'));
    // if($data['login']=="1"){
    //   $this->admin();
    // }else if ($data['login']=="2"){
    //   $this->operator();
    // }else{
    //   echo "Gagal Masuk!"; die;
    // }
    
    // var_dump($data); die;
  }

  public function admin(){
    global $data;
    // Unset password to be viewed for reduce vulnarablity
    $data['users'] = $this->M_Admin->getAllUser();
    // var_dump($data); die;
    // open dashboard admin and send data to it
    $this->load->view('v_dashboard_admin', $data);
  }

  public function operator(){
    global $data;
    $data['title'] = "Dashboard Operator";
    $this->load->view('templates/header_template', $data);
    $this->load->view('v_dashboard');
    $this->load->view('templates/footer_template');
  }

  public function tambahDataUser(){
    global $data;
    $this->form_validation->set_rules('username', "Username", 'required');
    $this->form_validation->set_rules('password', "Password", 'required');
    $this->form_validation->set_rules('repassword', "Ulang Password", 'required|matches[password]');
    if($this->form_validation->run()==FALSE){
      $this->load->view('form/tambah_data_user');
    }else{
      $this->M_Admin->tambahUser();
      // echo "stop";die;
      $this->session->set_flashdata('flash', 'Berhasil');
      redirect('dashboard/tampilUser');
    }
  }

  public function tampilUser(){
    global $data;
    $data['user'] = $this->M_Admin->getAllUser();
    $data['title'] = "Daftar User";
    $this->load->view('templates/header_template', $data);
    $this->load->view('v_tampil_user', $data);
    $this->load->view('templates/footer_template');
  }

  public function allLog(){
    global $data;
    $session_data = $this->session->get_userdata();
    $data['username'] = $session_data['username'];
    $data['allLog'] = $this->M_Admin->getAllLog();
    $data['title'] = "Log Surat Lengkap";
    // var_dump($data);die;
    $this->load->view('templates/header_template', $data);
    $this->load->view('v_tampil_all_log', $data);
    $this->load->view('templates/footer_template');
  }

  public function hapusUser(){
    $this->M_Admin->hapusUser();
    redirect('dashboard/tampilUser');
  }

}