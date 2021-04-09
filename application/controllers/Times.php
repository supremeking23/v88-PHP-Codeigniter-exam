<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Manila');
class Times extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    

	public function main()
	{	
        $current_date  = date_create();
        $format_date = date_format($current_date,"F dS, Y"); 
        $format_time = date_format($current_date,"h:i:s a"); 
        $data = array("current_date"=> $format_date, "current_time" => $format_time);
		$this->load->view('Time Display/time',$data);
	}

}
