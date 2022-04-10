<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Confident extends CI_Controller {

    public function index() {
        $data['title'] = "Confident/main";

        $data['content'] = 'confident/main';
        $this->load->view('include/layout_confident', $data);
    }
    public function play() {
        $data['title'] = "Confident/Play";

        $data['content'] = 'confident/play';
        $this->load->view('include/layout_confident', $data);
    }
    public function admin() {
        $data['title'] = "Confident/Admin";

        $data['content'] = 'confident/admin';
        $this->load->view('include/layout_confident', $data);
    }
    public function view() {
        $data['title'] = "Confident/view";

        $data['content'] = 'confident/view';
        $this->load->view('include/layout_confident', $data);
    }
    public function question() {
        $data['title'] = "Confident/question";

        $data['content'] = 'confident/question';
        $this->load->view('include/layout_confident', $data);
    }

    public function question_list() {
        if ($this->session->userdata('user_level') < 100) {
            $wh = "";
            $ar = [];

            if (isset($_POST['cfd_id'])) {
                $wh .= " and cfd_id = ?";
                $ar[] = $_POST['cfd_id'];
            }

            echo json_encode($this->db->query(
                "SELECT * from playground.confident_quiz where true $wh
            ",
                $ar
            )->result_array());
        }
    }

    public function addquestion() {
        $post = $this->input->post();
        if ($this->Prepare_model->insert_data_succ('playground.confident_quiz', $post)) {
            $res['status'] = 1;
            $res['txt'] = "เพิ่มคำถามเรียบร้อย";
        } else {
            $res['status'] = 0;
            $res['txt'] = "ไม่สามารถเพิ่มคำถาม";
        }
        echo json_encode($res);
    }
}

/* End of file Confident.php */
