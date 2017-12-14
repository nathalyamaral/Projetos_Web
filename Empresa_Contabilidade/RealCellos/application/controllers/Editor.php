<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Editor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		
		if (!$this->session->userdata('admin_logged'))            
		redirect('admin');
		
		$this->load->model('Paginas_model');
		// juntar em um model só
        $this->load->model('Banners_model');
        $this->load->model('Images_model');
        $this->load->model('Noticias_model');
        $this->load->model('Servicos_model');
  	    $this->load->model('Config_model');		

    }

    public function index()
    {
        $data = [
		    'config' => $this->Config_model->all()->result(),
            'servicos_data' => $this->Servicos_model->get_all(),
			'noticias_data' => $this->Noticias_model->get_all(),
			'banners' => $this->Banners_model->all(),
            'images' => $this->Images_model->all()
        ];


        $this->load->view('admin/header');
		$this->load->view('admin/navbar');
		$this->load->view('paginas/config_view', $data);
        $this->load->view('paginas/banners_view', $data);
        $this->load->view('paginas/images_view', $data);
		$this->load->view('paginas/noticias_view', $data);
		$this->load->view('paginas/servicos_view', $data);		
        $this->load->view('admin/footer');

    }
	
		    public function banners()
    {
		        $data = [
		'banners' => $this->Paginas_model->all_banners(),		
		];
		
	   $this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('paginas/banners_list', $data);    
		$this->load->view('admin/footer');
	}

    public function add_banner()
    {
        $rules = [
            [
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/add_banner');
            $this->load->view('admin/footer');
        } else {

            /* Start Uploading File */
            $config = [
                'upload_path' => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                //'max_size' => 100,
                //'max_width' => 1024,
               // 'max_height' => 768
            ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin/header');
                $this->load->view('paginas/add_banner', $error);
                $this->load->view('admin/footer');
            } else {
                $file = $this->upload->data();
                //print_r($file);
                $data = [
                    'file' => 'uploads/' . $file['file_name'],
                    'caption' => set_value('caption'),
                    'description' => set_value('description')
                ];
                $this->Banners_model->create($data);
                $this->session->set_flashdata('message', 'New banner has been added..');
                redirect('editor');
            }
        }
    }

    public function edit_banner($id)
    {
        $rules = [
            [
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $banner = $this->Banners_model->find($id)->row();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/edit_banner', ['banner' => $banner]);
            $this->load->view('admin/footer');
        } else {
            if (isset($_FILES["userfile"]["name"])) {
                /* Start Uploading File */
                $config = [
                    'upload_path' => './uploads/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 100,
                    'max_width' => 1024,
                    'max_height' => 768
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/header');
							$this->load->view('admin/navbar');
                    $this->load->view('paginas/edit_banner', ['banner' => $banner, 'error' => $error]);
                    $this->load->view('admin/footer');
                } else {
                    $file = $this->upload->data();
                    $data['file'] = 'uploads/' . $file['file_name'];
                    unlink($banner->file);
                }
            }

            $data['caption'] = set_value('caption');
            $data['description'] = set_value('description');

            $this->Banners_model->update($id, $data);
            $this->session->set_flashdata('message', 'New banner has been updated..');
            redirect('editor');
        }
    }

    public function delete_banner($id)
    {
        $this->Banners_model->delete($id);
        $this->session->set_flashdata('message', 'banner has been deleted..');
        redirect('editor');
    }
	
	    public function images()
    {
		        $data = [		
		'images' => $this->Paginas_model->all_images(),		
		];
		
		$this->load->view('admin/header');
		$this->load->view('admin/navbar');      
        $this->load->view('paginas/images_list', $data);
		$this->load->view('admin/footer');
	}

    public function add_image()
    {
        $rules = [
            [
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/add_image');
            $this->load->view('admin/footer');
        } else {

            /* Start Uploading File */
            $config = [
                'upload_path' => './uploads/',
                'allowed_types' => 'gif|jpg|png',
                'max_size' => 100,
                'max_width' => 1024,
                'max_height' => 768
            ];

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()) {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('admin/header');
						$this->load->view('admin/navbar');
                $this->load->view('paginas/add_image', $error);
                $this->load->view('admin/footer');
            } else {
                $file = $this->upload->data();
                //print_r($file);
                $data = [
                    'file' => 'uploads/' . $file['file_name'],
                    'caption' => set_value('caption'),
                    'description' => set_value('description')
                ];
                $this->Images_model->create($data);
                $this->session->set_flashdata('message', 'New image has been added..');
                redirect('editor');
            }
        }
    }

    public function edit_image($id)
    {
        $rules = [
            [
                'field' => 'caption',
                'label' => 'Caption',
                'rules' => 'required'
            ],
            [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);
        $image = $this->Images_model->find($id)->row();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/edit_image', ['image' => $image]);
            $this->load->view('admin/footer');
        } else {
            if (isset($_FILES["userfile"]["name"])) {
                /* Start Uploading File */
                $config = [
                    'upload_path' => './uploads/',
                    'allowed_types' => 'gif|jpg|png',
                    'max_size' => 100,
                    'max_width' => 1024,
                    'max_height' => 768
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());

                    $this->load->view('admin/header');
                    $this->load->view('paginas/edit_image', ['image' => $image, 'error' => $error]);
                    $this->load->view('admin/footer');
                } else {
                    $file = $this->upload->data();
                    $data['file'] = 'uploads/' . $file['file_name'];
                    unlink($image->file);
                }
            }

            $data['caption'] = set_value('caption');
            $data['description'] = set_value('description');

            $this->Images_model->update($id, $data);
            $this->session->set_flashdata('message', 'New image has been updated..');
            redirect('editor');
        }
    }

    public function delete_image($id)
    {
        $this->Images_model->delete($id);
        $this->session->set_flashdata('message', 'Image has been deleted..');
        redirect('editor');
    }


    public function noticias()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'noticias/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'noticias/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'noticias/index.php';
            $config['first_url'] = base_url() . 'noticias/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Noticias_model->total_rows($q);
        $noticias = $this->Noticias_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'noticias_data' => $noticias,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('admin/header');
				$this->load->view('admin/navbar');
        $this->load->view('paginas/noticias_list', $data);
        $this->load->view('admin/footer');

    }

    public function read_noticia($id)
    {
        $row = $this->Noticias_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'titulo_noticia' => $row->titulo_noticia,               
                'descricao_noticia' => $row->descricao_noticia,
                'autor_noticia' => $row->autor_noticia,
                'data_noticia' => $row->data_noticia,

            );
			
            $this->load->view('admin/header');
			$this->load->view('admin/navbar');
            $this->load->view('paginas/noticias_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found'); redirect(site_url('editor'));
        }
    }

    public function create_noticia()
    {
        $data = array(

            'titulo_noticia' => set_value('titulo_noticia'),
            'descricao_noticia' => set_value('descricao_noticia'),
            'autor_noticia' => set_value('autor_noticia'),

        );
		
            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/add_noticia', $data);
            $this->load->view('admin/footer');
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create_noticia();
        } else {
            $data = array(
			
                'titulo_noticia' => $this->input->post('titulo_noticia', TRUE),              
                'descricao_noticia' => $this->input->post('descricao_noticia', TRUE),
                'autor_noticia' => $this->input->post('autor_noticia', TRUE),

            );

            $this->Noticias_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success'); redirect(site_url('editor'));
        }
    }

    public function update_noticia($id)
    {
        $row = $this->Noticias_model->get_by_id($id);

        if ($row) {
            $data = array(
                             
                'titulo_noticia' => set_value('titulo_noticia', $row->titulo_noticia),               
                'descricao_noticia' => set_value('descricao_noticia', $row->descricao_noticia),
                'autor_noticia' => set_value('autor_noticia', $row->autor_noticia),

            );
            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/edit_noticia', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found'); redirect(site_url('editor'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
			
                'titulo_noticia' => $this->input->post('titulo_noticia', TRUE),              
                'descricao_noticia' => $this->input->post('descricao_noticia', TRUE),
                'autor_noticia' => $this->input->post('autor_noticia', TRUE),

            );

            $this->Noticias_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success'); redirect(site_url('editor'));
        }
    }

    public function delete_noticia($id)
    {
        $row = $this->Noticias_model->get_by_id($id);

        if ($row) {
            $this->Noticias_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success'); redirect(site_url('editor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found'); redirect(site_url('editor'));
        }
    }

    public function servicos()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'servicos/index.php?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'servicos/index.php?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'servicos/index.php';
            $config['first_url'] = base_url() . 'servicos/index.php';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Servicos_model->total_rows($q);
        $servicos = $this->Servicos_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'servicos_data' => $servicos,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );

        $this->load->view('admin/header');
		$this->load->view('admin/navbar');
        $this->load->view('paginas/servicos_list', $data);
        $this->load->view('admin/footer');
    }

    public function read_servico($id)
    {
        $row = $this->Servicos_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'titulo_servico' => $row->titulo_servico,
                'descricao_servico' => $row->descricao_servico,
                'data_servico' => $row->data_servico,
            );

            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/servicos_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('editor'));
        }
    }

    public function create_servico()
    {
        $data = array(
          
            'titulo_servico' => set_value('titulo_servico'),
            'descricao_servico' => set_value('descricao_servico'),
            'data_servico' => set_value('data_servico'),
        );

        $this->load->view('admin/header');
				$this->load->view('admin/navbar');
        $this->load->view('paginas/add_servico', $data);
        $this->load->view('admin/footer');

    }

    public function create_action1()
    {
        $this->_rules1();

        if ($this->form_validation->run() == FALSE) {
            $this->create_servico();
        } else {
            $data = array(
                'titulo_servico' => $this->input->post('titulo_servico', TRUE),
                'descricao_servico' => $this->input->post('descricao_servico', TRUE),
                'data_servico' => $this->input->post('data_servico', TRUE),
            );

            $this->Servicos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('editor'));
        }
    }

    public function update_servico($id)
    {
        $row = $this->Servicos_model->get_by_id($id);

        if ($row) {
            $data = array(
              
                'id' => set_value('id', $row->id),
				'titulo_servico' => set_value('titulo_servico', $row->descricao_servico),
                'descricao_servico' => set_value('descricao_servico', $row->descricao_servico),
                'data_servico' => set_value('data_servico', $row->descricao_servico),

            );

            $this->load->view('admin/header');
					$this->load->view('admin/navbar');
            $this->load->view('paginas/edit_servico', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('editor'));
        }
    }

    public function update_action1()
    {
        $this->_rules1();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'titulo_servico' => $this->input->post('titulo_servico', TRUE),
                'descricao_servico' => $this->input->post('descricao_servico', TRUE),
                'data_servico' => $this->input->post('data_servico', TRUE),
            );

            $this->Servicos_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('editor'));
        }
    }

    public function delete_servico($id)
    {
        $row = $this->Servicos_model->get_by_id($id);

        if ($row) {
            $this->Servicos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('editor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('editor'));
        }
    }

    public function _rules1()
    {
        $this->form_validation->set_rules('titulo_servico', 'titulo_servico', 'trim|required');
        $this->form_validation->set_rules('descricao_servico', 'descricao_servico', 'trim|required');        

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
	
	 public function _rules()
    {
	 $this->form_validation->set_rules('titulo_noticia', 'titulo_noticia', 'trim|required');
        $this->form_validation->set_rules('descricao_noticia', 'descricao_noticia', 'trim|required');        
        $this->form_validation->set_rules('autor_noticia', 'autor_noticia', 'trim|required');


        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

	}
}