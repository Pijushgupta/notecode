<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: pijush
 * Date: 2/11/16
 * Time: 6:33 PM
 */
class Forgot_password extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /*----------------------------------------------------------
     *|This controller to generate password recovery email link|
     *----------------------------------------------------------
     */
    public function index()
    {
        if ($this->input->post()) {
            $re_post=$this->input->post(NULL,TRUE);
            $this->load->library('my_security');
            if ($this->form_validation->run('email_verify') == TRUE && $this->my_security->is_this_empty($re_post)!=TRUE) {
                $this->load->model('Authors');
                if ($this->Authors->is_author('email', $re_post['email_id']) == TRUE) {
                    $this->Authors->change_author_password_status($re_post['email_id'], 0);
                    $this->load->library('my_mail');
                    if ($this->my_mail->send_password_recovery_mail($re_post['email_id'], $this->Authors->is_author('email', $re_post['email_id'], 'author_id'), site_url('Forgot_password/recover_author_password')) == TRUE) {
                        $this->session->set_flashdata('error1', 'An email has been sent to the registered email id to recover the password');
                        redirect('Forgot_password/index');
                    }
                } else {
                    $this->session->set_flashdata('error1', 'No such email id registered');
                }
            } else {
                $this->session->set_flashdata('error1', 'Input Error');
            }
        }
        $head = (array('sign' => 'signin', 'form' => 'forgot_password'));
        $this->public_view($head, '', '', '');
    }

    /*--------------------------------------------------------------------------------
     *|This controller to receive, decode , generate recovery form and reset password|
     *--------------------------------------------------------------------------------
     */
    public function recover_author_password($link = null)
    {
        $this->load->model('Authors');

        /* This block will execute after submitting the form */
        if ($this->input->post() && $this->session->has_userdata('temp_author_email') == TRUE) {
            $re_post=$this->input->post(NULL,TRUE);
            $this->load->library('my_security');
            if ($this->form_validation->run('password_match') == TRUE && $this->my_security->is_this_empty($re_post)!=TRUE) {
                if ($this->Authors->change_author_password($this->session->userdata('temp_author_email'), md5($re_post['first_password'])) == TRUE) {
                    $this->Authors->change_author_password_status($this->session->userdata('temp_author_email'), 1);
                    $this->session->unset_userdata('temp_author_email');
                    $this->session->set_flashdata('error0', 'Password has been changed successfully! Please Sign in using new your new password');
                    redirect('Public_login');
                }
            } else {
                $this->session->set_flashdata('error2', 'Passwords are not matching!');
            }
            $head = (array('sign' => 'signin', 'form' => 'reset_password'));
            $this->public_view($head, '', '', '');

            /* End of block */

            /* This block will execute before form loading */
        } elseif ($link != null) {

            $this->load->library('my_mail');
            $link = $this->security->xss_clean($link);
            $link = explode('/', $this->my_mail->decode_email_activation_link($link));
            $link = $this->security->xss_clean($link);

            if ($this->form_validation->valid_email($link[0]) == TRUE && isset($link[1]) == TRUE) {
                if ($this->Authors->is_author('email', $link[0]) == TRUE) {
                    if ($this->Authors->get_author_password_status($link[0]) == 0) {
                        if ($link[1] == $this->Authors->is_author('email', $link[0], 'author_id')) {

                            $this->session->set_userdata('temp_author_email', $link[0]);
                            $link = null;
                            $head = (array('sign' => 'signin', 'form' => 'reset_password'));
                            $this->public_view($head, '', '', '');

                        } else {
                            $this->session->set_flashdata('error0', 'Malicious  link!');
                            redirect('Public_login');
                        }
                    } else {
                        $this->session->set_flashdata('error0', 'Expired link!');
                        redirect('Public_login');
                    }
                } else {
                    $this->session->set_flashdata('error0', 'No such email id registered with us');
                    redirect('Public_login');
                }
            } else {
                $this->session->set_flashdata('error0', 'This is not a valid link!');
                redirect('Public_login');
            }
            /* End of block */

            /* Fall back block for malicious attempt */
        } else {
            redirect('Public_login');
        }
    }


}
