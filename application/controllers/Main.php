<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index() {
        $data['title'] = "Main Menu";

        $data['content'] = 'main/main';
        $this->load->view('include/layouts', $data);
    }
    public function user() {
        $data['title'] = "User Manage";
        $data['content'] = 'main/user';

        $this->load->view('include/layouts', $data);
    }
    public function user_list() {
        if ($this->session->userdata('user_level')< 100) {
            echo json_encode($this->Prepare_model->load_data('playground.user'));
        }
    }
}

/* End of file Main.php */
