<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
    }

    //index
    public function index(){
        if($this->session->status){
            redirect('');
        }
        $this->load->view('template/login');
    }
	public function actlogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hak = $this->input->post('akses');
		$where = array('username' => $username, 'password' => $password);
		if($hak == 'admin'){
			$cek = $this->m_admin->login_admin($where);
			if($cek->num_rows() > 0){
				$d = $cek->row_array();
				$data = array(
					'id' => $d['id_admin'],
					'nama' => $d['nama'],
					'username' => $d['username'],
					'status' => 'admin'
				);
				$this->session->set_userdata($data);
				redirect('');
			}
			else{
				$this->session->set_flashdata('gagal', 'Username / Password salah');
				redirect('login');
			}
		}
		if ($hak == 'guru') {
			# code...
			$cek = $this->m_admin->login_guru($where);
			if ($cek->num_rows() > 0) {
				# code...
				$d = $cek->row_array();
				$data = array(
					'id' => $d['id_guru'],
					'nama' => $d['nama'],
					'username' => $d['username'],
					'mapel' => $d['mapel'],
					'status' => 'guru'
				);
				$this->session->set_userdata($data);
				redirect('');
            }
            else{
				$this->session->set_flashdata('gagal', 'Username / Password salah');
                redirect('login');
            }
		}
	}
}