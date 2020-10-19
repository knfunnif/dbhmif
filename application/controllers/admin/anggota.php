<?php 

class Anggota extends CI_Controller{
	public function __construct(){
		parent::__construct();
        if (!isset($this->session->userdata['level'])){
            $this->session->set_flashdata('message','<div class="alert alert-danger alert dismissible fade show" role="alert">Anda Belum Login<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth');
        }
	}

    public function index(){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pengurus';
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota');
        $this->load->view('templates/footer_admin');
    }

    public function tampil_edit(){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Daftar Pengurus';
        $data['member']  = $this->model_admin->tampil_all();
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota_edit', $data);
        $this->load->view('templates/footer_admin');
    }

     public function hapus($id){
        $tahun = $this->uri->segment(5);
        $where = array('nim' => $id, 'tahun' => $tahun);
        $this->model_admin->hapus_data($where, 'pengurus');
        $this->session->set_flashdata('message','<div class="alert alert-success alert dismissible fade show" role="alert">Data Anggota Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/anggota/tampil_edit');
    }

    public function edit($id){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $tahun = $this->uri->segment(5);
        $data['title'] = 'Daftar Pengurus';
        $data['mhs'] = $this->model_admin->detail_anggota($id,$tahun)->row();
        $data['divisi'] =$this->model_admin->get_divisi();
        $data['jabatan'] =$this->model_admin->get_jabatan();
        $data['proker'] = $this->model_admin->get_proker($tahun);
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/edit_anggota', $data);
        $this->load->view('templates/footer_admin');
    }

    public function update(){
        $nim = $this->input->post('inputnim');
        $nama = $this->input->post('inputnama');
        $tgl_lahir = $this->input->post('inputtgl');
        $alamat = $this->input->post('inputalmt');
        $telepon = $this->input->post('inputtlp');
        $email = $this->input->post('inputemail');
        $divisi = $this->input->post('divisiall');
        $jabatan = $this->input->post('jabatanall');
        $tahun = $this->input->post('tahun');
        $level = $this->input->post('level');
        $pj1 = $this->input->post('pj1');
        $pj2 = $this->input->post('pj2');
        $pj3 = $this->input->post('pj3');
        if(($pj1 != "") && ($pj2 != "") && ($pj3 != "")){
           $pj = $pj1.'; '.$pj2.'; '.$pj3.';';
        }else if(($pj1 != "") && ($pj2 != "")){
            $pj = $pj1.'; '.$pj2;
        }else if(($pj1 != "") && ($pj3 != "")){
            $pj = $pj1.'; '.$pj3;
        }else if(($pj2 != "") && ($pj3 != "")){
            $pj = $pj2.'; '.$pj3;
        }else if($pj1 != ""){
            $pj=$pj1;
        }else if($pj2 != ""){
            $pj=$pj2;
        }else if($pj3 != ""){
            $pj=$pj3;
        }
        else{
           $pj = $this->input->post('pj');
        }

        $data = array (
           'nim' => $nim,
           'nama' => $nama,
           'tgl_lahir' => $tgl_lahir,
           'alamat' => $alamat,
           'telepon' => $telepon,
           'email' => $email,
           'user_level' => $level
        );

        $pengurus = array('divisi' => $divisi, 'jabatan' => $jabatan, 'tahun' =>$tahun, 'penanggung_jawab' => $pj);
        $where = array('nim' => $nim);
        $this->model_admin->update_data($where, $data, 'anggota');
        $this->model_admin->update_data($where, $pengurus, 'pengurus');
        $this->session->set_flashdata('message','<div class="alert alert-success alert dismissible fade show" role="alert">Data Anggota Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/anggota/edit/'.$nim.'/'.$tahun);
    }

    public function update2(){

        $nim = $this->input->post('nimku');
        $tahun = $this->input->post('tahunku');
        $level = $this->input->post('levelku');
        $username = $this->input->post('inputusr');
        $password = md5($this->input->post('pswrd'));

        $cek = $this->model_admin->is_ada_user($username);
        $before = $this->input->post('before');
            
        if($username != $before){
            if(count($cek)>0){
                $this->session->set_flashdata('message','<div class="alert alert-danger alert dismissible fade show" role="alert">Username sudah Ada<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('admin/anggota/edit/'.$nim.'/'.$tahun);
            } 
        }

        $data = array (
            'username' => $username,
            'password' => $password
        );

        $where = array('nim' => $nim);
        $this->model_admin->update_data($where, $data, 'anggota');
        if($level == 1){
            $anggota = $this->db->get_where('anggota', ['username' => $username])->row_array();
            $data = [
                'username' => $anggota['username'],
                'level' => $anggota['user_level']
                ];
            $this->session->set_userdata($data);
        }
        $this->session->set_flashdata('message','<div class="alert alert-success alert dismissible fade show" role="alert">Profil Anggota Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria=label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('admin/anggota/edit/'.$nim.'/'.$tahun);
    }

    public function ph($div){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $jabatan = $this->uri->segment(5);
        $data['title'] = 'Pengurus';
        $data['tahun'] = $this->model_admin->getAllTahun();
        $data['div'] = $this->db->get_where('divisi',['id_divisi' => $div])->row_array();
        $data['jabatan'] = $this->db->get_where('jabatan',['id_jabatan' => intval($jabatan)])->row_array();
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/detail_ph', $data);
        $this->load->view('templates/footer_admin');
    }

    public function sekben($div){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $jabatan = $this->uri->segment(5);
        $jabatan2 = $this->uri->segment(6);
        $data['title'] = 'Pengurus';
        $data['tahun'] = $this->model_admin->getAllTahun();
        $data['div'] = $this->db->get_where('divisi',['id_divisi' => $div])->row_array();
        $data['jabatan'] = $this->db->get_where('jabatan',['id_jabatan' => intval($jabatan)])->row_array();
        $data['jabatan2'] = $this->db->get_where('jabatan',['id_jabatan' => intval($jabatan2)])->row_array();
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/detail_sekben', $data);
        $this->load->view('templates/footer_admin');
    }

    public function divisi($div){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pengurus';
        $data['tahun'] = $this->model_admin->getAllTahun();
        $data['div'] = $this->db->get_where('divisi',['id_divisi' => $div])->row_array();
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/detail_divisi', $data);
        $this->load->view('templates/footer_admin');
    }

	public function detail_divisi($tahun){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $div = $this->uri->segment(5);
        $data['title'] = 'Pengurus';
        $thn = $this->input->post('thn');
        $member = $this->model_admin->tampil_divisi($div,$tahun);
        $data['member'] = $member;
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota_tampil', $data);
        $this->load->view('templates/footer_admin');
		
	}

    public function detail_ph($tahun){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $jab = $this->uri->segment(5);
        $data['title'] = 'Pengurus';
        $this->load->model('MPengurus');
        $member = $this->model_admin->tampil_ph($jab,$tahun);
        $data['member'] = $member;
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota_tampil',$data);
        $this->load->view('templates/footer_admin');
        
    }

    public function detail_sekben($tahun){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $jab = $this->uri->segment(5);
        $jab2 = $this->uri->segment(6);
        $data['title'] = 'Pengurus';
        
        $member = $this->model_admin->tampil_sekben($jab,$jab2,$tahun);
        $data['member'] = $member;
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota_tampil',$data);
        $this->load->view('templates/footer_admin');
        
    }

    public function detail($nim){
        $data['anggota'] = $this->db->get_where('anggota',['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pengurus';
        $tahun = $this->uri->segment(5);
        $member = $this->model_admin->detail_anggota($nim,$tahun)->row();
        $data['mbr'] = $member;
        $this->load->view('templates/header_admin',$data);
        $this->load->view('templates/sidebar_admin',$data);
        $this->load->view('menu/anggota_detail', $data);
        $this->load->view('templates/footer_admin');
        
    }

    

   

    

} 

?>