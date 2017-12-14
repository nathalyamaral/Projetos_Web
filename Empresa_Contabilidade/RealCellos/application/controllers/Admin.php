<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Admin_model');
		$this->load->model('Config_model');		

    }

    // pagina de login do admin

    public function index()
    {
			  $data = [		
		'config' => $this->Config_model->all()
		];
		
        $this->load->view('header');
        $this->load->view('admin/admin_login');
        $this->load->view('footer', $data);
    }

// admin login

    function login()
    {
			  $data = [		
		'config' => $this->Config_model->all()
		];
		
        $this->load->view('admin/header');
        $this->load->view('admin/admin_login');
        $this->load->view('admin/footer', $data);
    }

    function check_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
			
				  $data = [		
		'config' => $this->Config_model->all()
		];
			
            $this->load->view('header');
            $this->load->view('admin/admin_login');
            $this->load->view('footer', $data);
        } else {
			
            redirect('editor', 'refresh');
        }
    }

    function check_database($password)
    {

        $username = $this->input->post('username');
        $result = $this->Admin_model->login($username, $password);

        if ($result) {
            //$sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'id' => $row->id,
                    'username' => $row->username
                );
                $this->session->set_userdata('admin_logged', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', 'Invalid username or password');
            return false;
        }
    }

    function logout()
    {
        $this->session->unset_userdata('admin_logged');
        session_destroy();
        redirect('admin', 'refresh');
    }

// controle de usuarios

    public function all_admins()
    {
		
  
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'admin/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/index.php';
            $config['first_url'] = base_url() . 'admin/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Admin_model->total_rows($q);
        $admin = $this->Admin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'admin_data' => $admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
		
        $this->load->view('admin/header');
		$this->load->view('admin/navbar');
	    $this->load->view('admin/admin_list', $data);
		$this->load->view('admin/footer');
		
    }

    public function read($id) 
    {
        $row = $this->Admin_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		
		
		'username' => $row->username,
		'name' => $row->name,
		'password' => $row->password,
		'email' => $row->email,
		'data' => $row->data,
	    );
		
		        $this->load->view('admin/header');
		$this->load->view('admin/navbar');
            $this->load->view('admin/admin_read', $data);
			$this->load->view('admin/footer');
			
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }

    public function create() 
    {
        $data = array(

	    
	    'username' => set_value('username'),
	    'name' => set_value('name'),
	    'password' => set_value('password'),
	    'email' => set_value('email'),
	  
	);
	    
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('admin/admin_form', $data);
		$this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		
	    'username' => $this->input->post('username',TRUE),
		'name' => $this->input->post('name',TRUE),
		'password' => md5($this->input->post('password',TRUE)),
		'email' => $this->input->post('email',TRUE),
		
	    );

            $this->Admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin'));
        }
    }

/*    
    public function update($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $data = array(
						
		'username' => set_value('username', $row->username),
		'name' => set_value('name', $row->name),
		'password' => set_value('password', $row->password),
		'email' => set_value('email', $row->email),
		
	    );
            $this->load->view('admin/admin_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'status' => $this->input->post('status',TRUE),
	
		'username' => $this->input->post('username',TRUE),
		'name' => $this->input->post('name',TRUE),
		'password' => $this->input->post('password',TRUE),
		'email' => $this->input->post('email',TRUE),
		
	    );

            $this->Admin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin'));
        }
    }
	
	*/
    
    public function delete($id) 
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $this->Admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin'));
        }
    }

    public function _rules() 
    {
	
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');



	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

   
}
