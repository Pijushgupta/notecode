<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: pijush
 * Date: 2/11/16
 * Time: 6:33 PM
 */
class Public_login extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        /*---------------------------------------------------------------------------------------------------------------------------
         *|why this constructor ? IF someone calling this page without logging(session is live) out(previously) from the home page, |
         *|It will automatically do a user verification based on saved session data and will redirected to the home page            |
         *|instead of loading login form(function index()).                                                                         |
         *---------------------------------------------------------------------------------------------------------------------------
         * */
        $this->load->model('Authors');
        if ($this->session->userdata('sess_author_password') == $this->Authors->is_author("id", $this->session->userdata('sess_author_id'), "author_password")) {
            redirect('Home');
        }
    }

    /*------------------------------------------------------------------------------------------------------------------------------------
     *|This controller loads(sign in form) and do all the jobs related to User sign in. form location  view /view/body.php($form==signin)|
     *------------------------------------------------------------------------------------------------------------------------------------
     * */
    public function index()
    {
        //if sign in button is clicked then this
        if ($this->input->post()) {
            $re_post = $this->input->post(NULL,TRUE);
            $this->load->library('my_security');
            if ($this->form_validation->run('user_login') == TRUE && $this->my_security->is_this_empty($re_post)!=TRUE) {

                if (md5(trim($re_post['userpassword2'])) == $this->Authors->is_author("email", trim($re_post['useremail2']), "author_password")) {
                    if ($this->Authors->is_author('email', trim($re_post['useremail2']), 'author_verified') == 1) {
                        $this->session->set_userdata(array(
                            'sess_author_id' => $this->Authors->is_author("email", trim($re_post['useremail2']), "author_id"),
                            'sess_author_password' => $this->Authors->is_author("email", trim($re_post['useremail2']), "author_password"),
                            'sess_author_name' => $this->Authors->is_author("email", trim($re_post['useremail2']), "author_name"),
                            'sess_author_email' => trim($re_post['useremail2']),
                            'sess_author_piclink' => $this->Authors->is_author("email", trim($re_post['useremail2']), "author_piclink"),
                        ));
                        redirect('Public_login');
                    } else {
                        $this->session->set_flashdata('error0', 'Account is not activated');
                    }
                } else {
                    $this->session->set_flashdata('error0', 'No such User exists');
                }
            } else {
                $this->session->set_flashdata('error0', 'Error(s) in form');
            }
        }
        //if sign in button is not clicked or for fallback(for that no 'else' case added) situation for wrong user input.
        $head = (array('sign' => 'signup', 'form' => 'signin'));
        $this->public_view($head, '', '', '');
    }
}
