<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function index() 
    {
        $this->load->library("form_validation");
        if($this->session->userdata("user"))
        {
            redirect("users/home");
        }
        else
        {
            $this->load->view("users/index");
        }
    }
    
    public function register() 
    {
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<p class="error">Error: ', '</p>');

        $this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha");
        $this->form_validation->set_rules("contact_register", "Contact Number", "trim|required|numeric|is_unique[users.contact]");
        $this->form_validation->set_rules("email", "E-mail", "trim|required|valid_email|is_unique[users.email]");
        $this->form_validation->set_rules("password_register", "Password", "trim|required|min_length[8]");
        $this->form_validation->set_rules("passconf", "Password Confirmation", "trim|matches[password_register]|required|min_length[8]");

        if($this->form_validation->run() === true)
        {
            $this->load->model("User");
            if($this->User->add_user($value = $this->input->post(NULL, TRUE)))
            {
                $this->session->set_flashdata("status", "User is registered try logging in now.");
            }
            else
            {
                $this->session->set_flashdata("status", "Error occured while trying to register user. Please try again.");
            }
        }
        $this->load->view("users/index");
    }

    public function login() 
    {
        $this->load->library("form_validation");
        $this->form_validation->set_error_delimiters('<p class="error">Error: ', '</p>');

        $this->form_validation->set_rules("contact", "Contact Number", "trim|required|numeric");
        $this->form_validation->set_rules("password_login", "Password", "trim|required|min_length[8]");

        if($this->form_validation->run() === true)
        {
            $this->load->model("User");

            $user = $this->User->login_by_contact(set_value("contact"), set_value("password_login"));
            if($user)
            {
                $this->session->set_userdata("user", $user);
                redirect("/users/home");
            }
            else
            {
                $this->session->set_flashdata("error", "Error: Invalid contact number or password.");
                $this->load->view("users/index");
            }
        }
        else
        {
            $this->load->view("users/index");
        }
    }

    public function home() 
    {
        $this->load->view("users/home", $this->session->userdata("user"));
    }

    public function logout() 
    {
        $this->session->sess_destroy();
        redirect( base_url() + "/users/index");
    }
}
