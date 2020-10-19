<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
		$data['title'] = 'Home';
    	$this->load->model('MPengurus');
    	$data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
    	$data['tahun'] = $this->MPengurus->getAllTahun();
		$thn = $this->input->post('thn');
		$data['thn']=$thn;
		$data['pengurus'] = $this->MPengurus->getPengurusTahun($thn);
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar',$data);
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
