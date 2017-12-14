<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Paginas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Paginas_model');
		 $this->load->model('Config_model');		
    }

//home

    public function index()
    {
        $data = [
		'banners' => $this->Paginas_model->all_banners(),
		'images' => $this->Paginas_model->all_images(),
		'config' => $this->Config_model->all()
		
		];

        $this->load->view('header');
        $this->load->view('navbar');
        $this->load->view('paginas/landing_page', $data);
        $this->load->view('footer', $data);
    }

    public function noticias()
    {
        $data = [
		'noticias' => $this->Paginas_model->all_noticias(),
		'config' => $this->Config_model->all()
		];
        $this->load->view('paginas/header');
        $this->load->view('paginas/navbar');
        $this->load->view('paginas/noticias', $data);
        $this->load->view('paginas/footer', $data);
    }

    public function servicos()
    {
        $data = [
		'servicos' => $this->Paginas_model->all_servicos(),
		'config' => $this->Config_model->all()
		];
        $this->load->view('paginas/header');
        $this->load->view('paginas/navbar');
        $this->load->view('paginas/servicos', $data);
$this->load->view('paginas/footer', $data);
    }

    public function sobre()
    {
				  $data = [		
		'config' => $this->Config_model->all()
		];
		
        $this->load->view('paginas/header');
        $this->load->view('paginas/navbar');
        $this->load->view('paginas/sobre');
$this->load->view('paginas/footer', $data);
    }

    public function contato()
    {
			
		
		
        if ($this->input->post()) {
			
			//var_dump($_POST);
			
            $config = $this->Config_model->all();
			
			foreach($config->result() as $config_item){
			
			$para = $config_item->email_contato;
			
			}
			            
           // $para = 'contato@thiagononato.com.br';
			
            $de = $this->input->post('email', TRUE);
		  //$nome = $this->input->post('nome', TRUE);
            $priority = $this->input->post('priority', TRUE);
			//$config['priority'] = $priority;
            $subject = $this->input->post('category', TRUE);
            $msg = $this->input->post('message', TRUE);

            $this->email->from($de);
            $this->email->to($para);
            $this->email->subject($subject);
            $this->email->message($msg);
            $this->email->send();
 echo $this->email->print_debugger();
            //	redirect('paginas/contato', 'refresh');
        }
		
		  $data = [		
		'config' => $this->Config_model->all()
		];
		
        $this->load->view('paginas/header');
        $this->load->view('paginas/navbar');
        $this->load->view('paginas/contato', $data);
        $this->load->view('paginas/footer', $data);
    }
	
		 public function _rules()
    {
	    $this->form_validation->set_rules('nome', 'nome', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('category', 'category', 'trim|required');        
      //$this->form_validation->set_rules('message', 'message', 'trim|required');        


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

	}
	
}