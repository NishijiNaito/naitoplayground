<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        // $data['content'] = "login";
        $this->load->view('login');
    }

    public function llogin() {

        if ($this->input->post() == null) {
            $res['status'] = 0;
            $res['txt'] = "โปรดป้อนข้อมูล";
            echo json_encode($res);
            return;
        }
        $post = $this->input->post();

        // echo json_encode($post);

        $user = $this->Prepare_model->load_data('playground.user', 'username', $post['typeUser']);

        if (count($user) == 0) {
            $res['status'] = 0;
            $res['txt'] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
            echo json_encode($res);
            return;
        }
        $user = $user[0];

        if (password_verify($post['typePwd'], $user['password'])) {

            $ar_session['name']         = $user['name'];
            $ar_session['username']     = $user['username'];
            $ar_session['user_level']    = $user['user_level'];


            $this->session->set_userdata($ar_session);

            // $this->session->userdata()
            $res['status'] = 1;
            $res['txt'] = "ยินดีต้อนรับนะ " . $user['name'];
            echo json_encode($res);
            return;
        }


        // $pwd = password_hash('pg-0828301105', PASSWORD_DEFAULT);
        // echo $pwd . "<br>";
        // echo password_verify('pg-0828301105', $pwd) . "<br>";
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect();
    }
}

/* End of file Login.php */
