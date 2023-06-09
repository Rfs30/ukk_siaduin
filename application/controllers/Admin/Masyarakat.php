<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        is_logged_in();
        if (!$this->session->userdata('level')) :
            redirect('Auth/BlockedController');
        endif;
    }

    // List all your items
    public function index()
    {
        $data['title'] = 'Siaduin | Data Masyarakat';

        $data['masyarakat'] = $this->db->get('masyarakat')->result_array();

        $this->load->view('_part/backend_head', $data);
        $this->load->view('_part/backend_sidebar_v');
        $this->load->view('_part/backend_topbar_v');
        $this->load->view('admin/data_masyarakat');
        $this->load->view('_part/backend_footer_v');
        $this->load->view('_part/backend_foot');
    }
}

/* End of file DashboardController.php */
/* Location: ./application/controllers/Admin/DashboardController.php */
