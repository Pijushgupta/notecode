<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Authors');
        if($this->session->has_userdata('sess_author_id')==FALSE || $this->session->userdata('sess_author_password')!=$this->Authors->is_author('id',$this->session->userdata('sess_author_id'),"author_password")){


                redirect('Public_login');

        }
    }

    /*---------------
     *|logout author |
     *---------------
     * */
    public function logout(){

        $this->session->sess_destroy();
        redirect('Home');
    }

    /*-------------------
     *| Default function |
     *-------------------
     * */
    public function index(){
        $this->load->model('Books');
        $books['book_list'] = $this->Books->return_all_books($this->session->userdata('sess_author_id'));
        $this->home_view('',$books);
    }

}