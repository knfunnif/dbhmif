<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        if(!($this->session->userdata('username'))&&!($this->session->userdata('user_level'))){
            redirect('auth');
        }
        $data['title'] = 'Home';
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['tahun'] = $this->MPengurus->getAllTahun();
        $thn = $this->input->post('thn');
        $data['thn']=$thn;
        $data['pengurus'] = $this->MPengurus->getPengurusTahun($thn);
        $count_data=$this->model_home->countData();
        $data['count_data']=$count_data;
        $this->load->view('templates\header',$data);
        $this->load->view('templates\sidebara',$data);
        $this->load->view('anggotaku\index',$data);
        $this->load->view('templates\footer');
    }

    public function edit_profile($nim){
        if(!($this->session->userdata('username'))&&!($this->session->userdata('user_level'))){
            redirect('auth');
        }
        $data['title'] = 'Edit Profile';
        $data['tahun'] = $this->MPengurus->getAllTahun();
        $thn = $this->input->post('thn');
        $data['thn']=$thn;
        $data['pengurus'] = $this->MPengurus->getPengurusTahun($thn);
        $where = array('nim' => $nim);
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['mhs'] = $this->model_admin->tampil_memberdetails3($nim)->row();
        $this->load->view('templates\header',$data);
        $this->load->view('templates\sidebara',$data);
        $this->load->view('edit_profilea',$data);
        $this->load->view('templates\footer');
    }

    public function update(){
        //rules
        $this->form_validation->set_rules('inputnama','Nama', 'required|trim');
        $this->form_validation->set_rules('inputalmt','Alamat', 'trim');
        $this->form_validation->set_rules('inputtlp','Telepon', 'trim|min_length[6]');
        $this->form_validation->set_rules('inputemail','Email', 'valid_email');
        $this->form_validation->set_rules('inputusr','Username', 'trim|min_length[5]|max_length[15]|is_unique[anggota.username]',
            [
            'is_unique' => "username is already registered"
            ]
        );
        $this->form_validation->set_rules('inputpswrd', 'Password', 'trim|required|min_length[6]', 
            [
            'required' => "Password is required",
            'matches' => "Password don't matches",
            'min_length' => "Password too short"
            ]
        );

        $nim = $this->input->post('inputnim');
        $nama = $this->input->post('inputnama');
        $tgl_lahir = $this->input->post('inputtgl');
        $alamat = $this->input->post('inputalmt');
        $telepon = $this->input->post('inputtlp');
        $email = $this->input->post('inputemail');
        $username = $this->input->post('inputusr');
        $password = md5($this->input->post('inputpswrd'));
        

        $data = array (
            'nim' => $nim,
            'nama' => $nama,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'telepon' => $telepon,
            'email' => $email,
            'username' => $username,
            'password' => $password,
        );


        $where = array('nim' => $nim);
        $this->model_admin->update_data($where, $data, 'anggota');
        redirect('anggotaku/edit_profile/'.$nim);
    }

    public function update2(){
        $nim = $this->input->post('Nimku');
        $foto = $_FILES['foto'];
        if($foto==''){
            //no action
        }else{
            $config['upload_path'] = './assets/img/profile';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 1024 * 8 ;

            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('foto')) { //gagal
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Upload Foto</div>'); redirect('anggotaku/edit_profile/'.$nim);
            die();
            }else{
                $foto=$this->upload->data('file_name');
            }
        }

        $data=array(
            'foto' => $foto
        );

        $where = array('nim' => $nim);
        $this->model_admin->update_data($where, $data, 'anggota');
        redirect('anggotaku/edit_profile/'.$nim);
    }

    public function edit_pengurus($nim){
        if(!($this->session->userdata('username'))&&!($this->session->userdata('user_level'))){
            redirect('auth');
        }
        $data['title'] = 'Edit Profile';
        $data['tahun'] = $this->MPengurus->getAllTahun();
        $thn = $this->input->post('thn');
        $data['thn']=$thn;
        $data['pengurus'] = $this->MPengurus->getPengurusTahun($thn);
        $where = array('nim' => $nim);
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['mahasiswa'] = $this->model_admin->tampil_memberdetails($nim)->result();
        $data['divisi'] =$this->model_admin->get_divisi();
        $data['jabatan'] =$this->model_admin->get_jabatan();
        $this->load->view('templates\header',$data);
        $this->load->view('templates\sidebara',$data);
        $this->load->view('edit_pengurusa',$data);
        $this->load->view('templates\footer');
    }

    public function updatep1(){

        $nim = $this->input->post('nimku');
        $thn = $this->input->post('tahun');
        $div = $this->input->post('divisi');
        $jab = $this->input->post('jabatan');
        

        $data = array (
            'nim' => $nim,
            'tahun' => $thn,
            'divisi' => $div,
            'jabatan' => $jab
        );


        $where = array('nim' => $nim);
        $this->model_admin->update_data($where, $data, 'pengurus');
        redirect('anggotaku');
    }

    public function tambah()
    {
        $nim = $this->input->post('nimku');
        $thn = $this->input->post('tahun');
        $div = $this->input->post('divisi');
        $jab = $this->input->post('jabatan');
       
        $data = array(
            'nim' => $nim,
            'tahun' => $thn,
            'divisi' => $div,
            'jabatan' => $jab
        );

        $this->model_proker->tambah_proker($data, 'pengurus');
        redirect('anggotaku');
    }
}
?>