<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload/upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png|bmp|tiff|webp|bpg|bat|svg';
                $config['max_size']             = 10000; //10Mo
                $config['max_width']            = 4096; // 4K
                $config['max_height']           = 4096;
                $config['file_name']            = time().$this->session->userdata('user')->id; // On met le nom en plus sinon ou nan?

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload/upload_form', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload/upload_success', $data);
                }
        }
}
?>
