<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Generate_pdf extends CI_Controller {

	public function create_pdf($title, $id) {

        $data['user_ebook'] = $this->backend->get_one_record('tutorials', $id);

		// ini_set('display_errors', 0);
		// ini_set('display_startup_errors', 0);
		require_once 'vendor/autoload.php';
        $mpdf = new \Mpdf\Mpdf();
        
        $mpdf->setFooter('{PAGENO}');

        $html=$this->load->view('frontend/pages/pdf_view/book_view', $data,true);  


		$mpdf->WriteHTML($html);
		ini_set('date.timezone', 'Europe/London');
        $now = date('Y-m-d-His');
        
        $mpdf->Output();

    }
    
}