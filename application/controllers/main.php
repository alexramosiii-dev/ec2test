<?php
    class Main extends CI_controller {
        function index() 
        {
            $this->load->view('/main/index');
        }

        function submit() 
        {
            $view_data = $this->input->get(NULL, TRUE);
            $this->load->view('/main/submit', $view_data);
        }
    }