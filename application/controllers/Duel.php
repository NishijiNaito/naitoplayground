<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Duel extends CI_Controller {

    public function index() {
        $data['title'] = "Duel/main";

        $data['content'] = 'duel/main';
        $this->load->view('include/layout_duel', $data);
    }
    public function view() {
        $data['title'] = "Duel/viewer";

        $data['content'] = 'duel/view';
        $this->load->view('include/layout_duel', $data);
    }
    public function question() {
        if ($this->session->userdata('user_level') >= 100) {
            redirect('duel');
        }

        $data['title'] = "Duel/ Question";

        $data['content'] = 'duel/question';
        $this->load->view('include/layout_duel', $data);
    }
    public function admin() {

        if ($this->session->userdata('user_level') >= 100) {
            redirect('duel');
        }

        $data['title'] = "Duel/ Admin";

        $data['content'] = 'duel/admin';
        $this->load->view('include/layout_duel', $data);
    }

    public function addquestion() {
        $post = $this->input->post();
        // if ($this->Prepare_model->insert_data_succ('playground.duel_quiz', $post)) {
        //     $res['status'] = 1;
        //     $res['txt'] = "เพิ่มคำถามเรียบร้อย";
        // } else {
        //     $res['status'] = 0;
        //     $res['txt'] = "ไม่สามารถเพิ่มคำถาม";
        // }

        if ($post['quiz_id'] == "") { // add
            unset($post['quiz_id']);
            if ($this->Prepare_model->insert_data_succ('playground.duel_quiz', $post)) {
                $res['status'] = 1;
                $res['txt'] = "เพิ่มคำถามเรียบร้อย";
            } else {
                $res['status'] = 0;
                $res['txt'] = "ไม่สามารถเพิ่มคำถาม";
            }
        } else { // edit
            $quiz_id = $post['quiz_id'];
            unset($post['quiz_id']);
            if ($this->Prepare_model->update_data('playground.duel_quiz', 'quiz_id', $quiz_id, $post)) {
                $res['status'] = 1;
                $res['txt'] = "แก้ไขคำถามเรียบร้อย";
            } else {
                $res['status'] = 0;
                $res['txt'] = "ไม่สามารถแก้ไขคำถาม";
            }
        }






        echo json_encode($res);
    }
    public function question_list() {
        if ($this->session->userdata('user_level') < 100) {
            $wh = "";
            $ar = [];

            if (isset($_POST['quiz_id'])) {
                $wh .= " and quiz_id = ?";
                $ar[] = $_POST['quiz_id'];
            }

            echo json_encode($this->db->query(
                "SELECT * from playground.duel_quiz where true $wh
            ",
                $ar
            )->result_array());
        }
    }

    public function blue() {
        $data['title'] = "Duel/Blue Player";

        $data['content'] = 'duel/blue';
        $this->load->view('include/layout_duel', $data);
    }

    public function yellow() {
        $data['title'] = "Duel/Yellow Player";

        $data['content'] = 'duel/yellow';
        $this->load->view('include/layout_duel', $data);
    }
}

/* End of file Duel.php */
