<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Dependencies

    }

    public function index()
    {
        $data['title'] = 'Layanan Pengaduan Masyarakat';
        $data['pengaduan'] = $this->db->get('pengaduan')->num_rows();
        $data['pengaduan_proses'] = $this->db->get_where('pengaduan', ['status' => 'proses'])->num_rows();
        $data['pengaduan_selesai'] = $this->db->get_where('pengaduan', ['status' => 'selesai'])->num_rows();
        $data['pengaduan_tolak'] = $this->db->get_where('pengaduan', ['status' => 'tolak'])->num_rows();

        $this->load->view('landing/index', $data);
    }
}
