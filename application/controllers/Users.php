<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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

    //for problem 1
	// public function index($row = 5){	
        
    //     $row_detail = array(
    //         "row" => $row,
    //     );
    //     $data['users'] = $this->user->get_all_users_with_limit($row_detail);
    //     $this->load->view('users/index',$data);
    //     $this->session->set_userdata("retrieve_row",$row);
	// }


	// public function retrieve_more_users_process(){
    //     if($this->session->has_userdata("retrieve_row")){
    //         $row = $this->session->userdata("retrieve_row");
    //     }else{
    //         $this->session->set_userdata("retrieve_row",5);
    //         $row = $this->session->userdata("retrieve_row");
    //     }

    //     $row = $row + 5;
    //     $this->session->set_userdata("retrieve_row", $row);
    //     redirect(base_url().$row);
       
	// }

    //end problem 1

    // for problem 2
    public function index(){	

        $gender = ($this->session->has_userdata("gender") ? $this->session->userdata("gender") : NULL);
        $country = ($this->session->has_userdata("country") ? $this->session->userdata("country") : NULL);

        $search_detail = array(
			"gender" => $gender, 
			"country" =>  $country,
		);
        
        $data['users'] = $this->user->get_all_users_with_filter($search_detail);
        $data['countries'] = $this->user->get_all_countries();
        $data['count'] = $this->user->get_all_users_count($search_detail);
        $this->load->view('users/problem2',$data);
        $this->session->sess_destroy();
        // $this->session->set_userdata("retrieve_row",$row);
	}

    public function search_filter_process(){
        // echo $this->input->post("gender",TRUE);
        // var_dump($this->input->post("gender"));
        $gender = $this->input->post("gender");
        $country = $this->input->post("country");

        $search_detail = array(
			"gender" => $gender, 
			"country" =>  $country,
		);

		$this->session->set_userdata($search_detail);
        // var_dump($this->input->post("country"));
        // echo "helo";

        redirect(base_url());
    }





}
