<?php
/**
 * Created by PhpStorm.
 * User: pijush
 * Date: 19/11/16
 * Time: 4:38 PM
 */
class Ajax_controller extends MY_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('Authors');
        if($this->session->has_userdata('sess_author_id')==FALSE || $this->session->userdata('sess_author_password')!=$this->Authors->is_author('id',$this->session->userdata('sess_author_id'),"author_password")){

            echo "redirect";
            exit();

        }
    }

/*This function to create books for logged in Author(user)*/
    public function create_new_book(){
        if($this->input->post()){
            $re_post = $this->input->post(NULL,TRUE); // this will return the whole post array after the XSS filterintg.
            $this->load->library('my_security');
            if($this->form_validation->required($re_post['new_book_name'])==TRUE && $this->my_security->is_this_empty($re_post['new_book_name'])!=TRUE){
                $books_limit=$this->Authors->is_author('id',$this->session->userdata('sess_author_id'),'author_books_limit');
                $this->load->model('Books');
                $total_number_of_books = $this->Books->return_total_number_of_books($this->session->userdata('sess_author_id'));
                if($total_number_of_books<$books_limit){ //it will check the book limit of a auhtor.
                    if($this->Books->add_book($this->session->userdata('sess_author_id'),strip_tags($re_post['new_book_name']),strip_tags($re_post['new_book_desc']))==TRUE){
                        echo "positive";
                    }else{
                        echo "DB error";
                    }
                }else{
                    echo "above_limit" ;
                }
            }else{
                echo "negative";
            }
        }
}


/*Function to refresh books list*/
    public function refresh_the_book_list(){
        $this->load->model('Books');
        $booklist=$this->Books->return_all_books_array($this->session->userdata('sess_author_id'));
        if($booklist!=null){
                return json_encode($booklist);
        }else{
            return 0;
        }    

    }



}