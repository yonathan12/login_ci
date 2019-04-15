<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu','Menu','required');

        if ($this->form_validation->run()== FALSE) {
            # code...
            $data['title'] = 'Menu Management';
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('menu/index',$data);
            $this->load->view('templates/footer');
        } else {
            # code...
            $menu = $this->input->post('menu');
            $this->db->insert('user_menu',['menu' => $menu]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                    New Menu Added!
                  </div>');
                    redirect('menu');   
        }
        

        
    }
}