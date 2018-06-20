<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Déclaration de la classe 'Forum'
class Forum extends CI_Controller
{
  // instantiation du constructeur de base
  public function __construct(){
    parent::__construct();
    $this->load->model("forum_group_model");
    $this->load->model("forum_message_model");
    $this->load->model('user_model');
		not_connected_redirect();
  }
  // Charge la view qui permet d'ajouter les groupes dans la base de donnée
  public function add(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $forum = (object)[];
    $forum->name = trim($this->input->post('name'));
    $forum->description = trim($this->input->post('description'));

    $this->form_validation->set_rules('name', 'Name', 'trim|required|min_length[4]|max_length[50]|is_unique[forum_group.name]');
    $this->form_validation->set_rules('description', 'Description', 'trim|max_length[255]');
    if ($this->form_validation->run()) {
      $id = $this->forum_group_model->add($forum);
      redirect(['forum', 'view', $id]);
    }

    $this->load->view('templates/header');
    $this->load->view('pages/forum/add', compact('forum'));
    $this->load->view('templates/footer');
  }
  //
public function view(/*$id*/){
  $groups = $this->forum_group_model->get_all();
  $list = $this->load->view('pages/forum/_list', compact('groups'), true);
  //$group = $this->forum_group_model->get($id);
  //$messages = $this->load->view('pages/forum/_messages', compact('group'), true);

  $this->load->view('templates/header');
  $this->load->view('pages/forum/view', compact(/*'messages', */'list'));
    $this->load->view('templates/footer');
  }

  public function removeMessageById($forum, $message){
		$this->forum_message_model->remove_Forum_Messages($message);
		redirect(['forum', 'viewForum', $forum]);
	}

  public function addMessageForum($id){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $message = (object)[];
    $message->message = xss_clean(trim($this->input->post('message')));

    // $pattern = '@{1}[\S]*';
    $pattern = '/\@[\w]+/';
    $result;
    preg_match($pattern,$message->message,$result);
    foreach ($result as $key => $value) {
      $idUser = $this->user_model->get_user_id_from_username(str_replace("@","",$value));

      $replace = '<a href="'.site_url('user/view_profile_user/'.$idUser).'">'.$value.'</a>';
      $message->message = str_replace($value,$replace,$message->message);
    }

    $message->date = date("Y-m-d H:i:s");
    $message->num_user = $this->session->userdata('user')->id;
    $message->num_forum_group = $id;

    $this->form_validation->set_rules('message', 'Message', 'trim|required');

    if($this->form_validation->run())
    {
      $this->forum_message_model->add($message);
      //$this->viewForum($id);
      
    }

    redirect(['forum', 'viewForum', $id]);
  }

public function viewForum($id){
  //$this->addMessageForum($id);
  $forum = (object)[];
  $forum->id = $id;
  $forum->chat = $this->forum_message_model->get_all($id);
  $chat = $this->load->view('pages/forum/_messages', compact('forum'), true);
  //$group = $this->forum_group_model->get($id);
  //$messages = $this->load->view('pages/forum/_messages', compact('group'), true);

  $forum->chat = $chat;

  $this->load->view('templates/header');
  $this->load->view('pages/forum/view_forum', compact('forum'));
    $this->load->view('templates/footer');
  }

  //
  public function sendMessage(){
    if (!$this->input->is_ajax_request()) {
      show_404();
    }

    $forum = (object)[];
    $forum->message = trim($this->input->post('message'));
    $forum->num_forum_group = trim($this->input->post('group'));

    if ($forum->message != '' && $forum->num_forum_group > 0) {
      $id = $this->forum_message_model->add($forum);
      echo json_encode($forum);
    }
  }
  //?????????
  public function displayGroup($id)
  {
    if (!$this->input->is_ajax_request()) {
      show_404();
    }
    $this->load->helper('form');
    $messages = $this->forum_message_model->get_all($id);

    $this->load->view('pages/forum/_messages', compact('messages'));
  }
}
