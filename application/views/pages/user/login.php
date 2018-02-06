<h1>Qomunity - Connexion</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
 ?>

<?php
echo form_open('user/login');
echo form_label("Adresse email : ", 'email');
echo form_input('email', (isset($userinfo->email)) ? $userinfo->email : $userinfo->username ,['placeholder' => 'Adresse mail']);
if (isset($data)) {
  if (isset($data->error)) echo $data->error;
}
echo form_label("Mot de passe : ", 'password');
echo form_password('password', '',['placeholder' => 'Mot de passe']);
echo form_submit('submit', 'Se connecter');
echo validation_errors();
echo form_close();
?>

<a href="<?php echo site_url('user/register/'); ?>">Se créer un compte</a>
