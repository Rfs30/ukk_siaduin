<?php
class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		if ($this->session->userdata('level') != 'admin') :
			redirect('Auth/BlockedController');
		endif;

		$this->load->model('Pengaduan_m');

		$this->load->library('form_validation');
	}

	public function getLaporanPengaduan($start = null, $end = null)
	{
		$dataPengaduan = $this->Pengaduan_m->laporan_pengaduan($start, $end);
		$data = [];

		foreach ($dataPengaduan as $value) {
			$data[] = [
				"nama" => $value->nama,
				"nik" => $value->nik,
				"isi_laporan" => $value->isi_laporan,
				"tgl_pengaduan" => $value->tgl_pengaduan,
				"status" => $value->status,
				"tgl_tanggapan" => $value->tgl_tanggapan,
				"tanggapan" => $value->tanggapan
			];
		}
		return ['laporan' => $data];
	}

	function index()
	{
		$data['title'] = 'Siaduin | Generate Laporan';
		$data['pengaduan'] = [];
		if ($this->input->get('tanggal_awal') !== null && $this->input->get('tanggal_akhir') !== null) {
			$result = $this->getLaporanPengaduan($this->input->get('tanggal_awal'), $this->input->get('tanggal_akhir'));
			$data['pengaduan'] = $result['laporan'];
			function compareByTimeStamp($time1, $time2)
			{
				if (strtotime($time1['tgl_pengaduan']) < strtotime($time2['tgl_pengaduan']))
					return -1;
				else if (strtotime($time1['tgl_pengaduan']) > strtotime($time2['tgl_pengaduan']))
					return 1;
				else
					return 0;
			}
			usort($data['pengaduan'], "compareByTimeStamp");
		}
		$this->load->view('_part/backend_head', $data);
		$this->load->view('_part/backend_sidebar_v');
		$this->load->view('_part/backend_topbar_v');
		$this->load->view('admin/laporan');
		$this->load->view('_part/backend_footer_v');
		$this->load->view('_part/backend_foot');
	}

	// public function export($start = null, $end = null)
	// {
	//     $data['pengaduan'] = [];
	//     $data['start'] =  $start;
	//     $data['end'] = $end;
	//     if ($start !== null && $end !== null) {
	//         $result = $this->getLaporanPengaduan($start, $end);
	//         $data['pengaduan'] = $result['laporan'];
	//         function compareByTimeStamp($time1, $time2)
	//         {
	//             if (strtotime($time1['tgl_pengaduan']) < strtotime($time2['tgl_pengaduan']))
	//                 return -1;
	//             else if (strtotime($time1['tgl_pengaduan']) > strtotime($time2['tgl_pengaduan']))
	//                 return 1;
	//             else
	//                 return 0;
	//         }
	//         usort($data['pengaduan'], "compareByTimeStamp");
	//     }
	//     $this->load->view('admin/export_excel', $data);
	// }

	public function pdf($start = null, $end = null)
	{
		$data['title'] = 'Siaduin | Generate Laporan PDF';
		$data['pengaduan'] = [];
		$data['start'] =  $start;
		$data['end'] = $end;
		if ($start !== null && $end !== null) {
			$result = $this->getLaporanPengaduan($start, $end);
			$data['pengaduan'] = $result['laporan'];
			function compareByTimeStamp($time1, $time2)
			{
				if (strtotime($time1['tgl_pengaduan']) < strtotime($time2['tgl_pengaduan']))
					return -1;
				else if (strtotime($time1['tgl_pengaduan']) > strtotime($time2['tgl_pengaduan']))
					return 1;
				else
					return 0;
			}
			usort($data['pengaduan'], "compareByTimeStamp");
		}
		$this->load->view('admin/export_pdf', $data);
	}
}
