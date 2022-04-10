<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authen {
    protected $CI;
    public function check_login() {
        $CI = &get_instance();
        $controller = $CI->router->fetch_class();  //Controller name
        $method     = $CI->router->fetch_method();  //Method names
        // echo $controller . "/" . $method;
        $page = $controller . "/" . $method;
        $except_login = ['','duel/view','duel/blue','duel/yellow','confident/play','confident/view'];

        // echo array_search($page, $except_login);
        // echo (array_search($page, $except_login) != "");
        // return;
        if ($controller != "login") {

            if (isset($_SESSION['name']) || array_search($page, $except_login) > 0) { //logged in

            } else { // cannot login
                redirect('login');
            }
        } else {
            if (isset($_SESSION['name']) && $method == 'index') { //logged in
                redirect('');
            } else { // cannot login

            }
        }
    }
}


/* End of file filename.php */
