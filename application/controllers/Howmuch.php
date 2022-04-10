<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Howmuch extends CI_Controller {

    public function index() {
        $data['title'] = "Howmuch is enough/main";

        $data['content'] = 'howmuch/main';
        $this->load->view('include/layout_howmuch', $data);
    }
}

/* End of file Howmuch.php */
