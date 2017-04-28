<?php


class MY_Controller extends CI_Controller
{


    //this to generate public view at login page
    public function public_view($head = null, $navbar = null, $body = null, $foot = null)
    {

        $this->load->view('public/head', $head);
        $this->load->view('public/navbar', $navbar);
        $this->load->view('public/body', $body);
        $this->load->view('public/foot', $foot);
    }


    //this to generate the home view after login
    public function home_view($head=null, $navbar=null,$sidebar=null,$body=null,$foot=null)
    {
        $this->load->view('home/head',$head);
        $this->load->view('home/navbar',$navbar);
        $this->load->view('home/sidebar',$sidebar);
        $this->load->view('home/body',$body);
        $this->load->view('home/foot',$foot);
    }


    
}