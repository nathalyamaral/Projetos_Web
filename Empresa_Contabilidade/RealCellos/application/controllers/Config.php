<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');
    }

    public function add()
    {

        /* Start Uploading File */
        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png',
            //'max_size'      => 100,
            //'max_width'     => 1024,
            //'max_height'    => 768
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('admin/header');
			
            $this->load->view('config/config_form', $error);
            $this->load->view('admin/footer');
        } else {
            $file = $this->upload->data();
            //print_r($file);
            $data = [
                'site_logo' => 'uploads/' . $file['file_name'],                
                'email_contato' => set_value('email_contato'),
                'link_twitter' => set_value('caption'),
                'link_instagram' => set_value('link_instagram'),
                'link_facebook' => set_value('link_facebook')
            ];
            $this->Config_model->create($data);
            $this->session->set_flashdata('message', 'New image has been added..');
            redirect('editor');
        }

    }

    public function edit($id)
    {

        $config = $this->Config_model->find($id)->row();

        if ($this->input->post() == FALSE) {
            $this->load->view('admin/header');
				$this->load->view('admin/navbar');
            $this->load->view('config/edit_config', ['config' => $config]);
            $this->load->view('admin/footer');

        } else {

            if (isset($_FILES["userfile"]["name"])) {
                /* Start Uploading File */
                $config = [
                    'upload_path' => './uploads/',
                    'allowed_types' => 'gif|jpg|png',
                    //'max_size'      => 100,
                    //'max_width'     => 1024,
                    //'max_height'    => 768
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload()) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin/header');
						$this->load->view('admin/navbar');
                    $this->load->view('config/edit_config', ['config' => $config, 'error' => $error]);
                    $this->load->view('admin/footer');

                } else {
                    $file = $this->upload->data();
                    $data['site_logo'] = 'uploads/' . $file['file_name'];
                    unlink($config->file);
                }
            }

           
            $data['email_contato'] = set_value('email_contato');
            $data['link_twitter'] = set_value('link_twitter');
            $data['link_instagram'] = set_value('link_instagram');
            $data['link_facebook'] = set_value('link_facebook');

            $this->Config_model->update($id, $data);
            $this->session->set_flashdata('message', 'New image has been updated..');
            redirect('editor');
        }
    }
}
