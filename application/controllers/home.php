<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
    function index()
    {
        // $data['Name'] = 'Mohan Singh Rajawat';
        // $data['City'] = 'Bidasar';
        // $data['height'] = 5.8;

        // $this->load->view('about', $data);
        // $this->load->helper('url');
        $data['base_url'] = 'this is base_url';
        $this->load->view('home');
        
    }
    public function myfunction($arg)
    {
        echo $arg;
    }
    public function modelfun()
    {
        $data['name'] = 'Bannaji';
        $data['city'] = 'udaipur';
        $data['age'] = 24;


        $user_ret = $this->Mod_test->myfunction($data);

        if ($user_ret) {
            echo "successfullt inserted";
        } else {
            echo "something went wrong";
        }
    }

    public function myform()
    {

        $this->load->helper('form');
        echo form_open();
        echo form_input();
        echo form_submit('submit', 'submit');
    }
}
