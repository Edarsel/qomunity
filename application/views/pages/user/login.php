<h1>Qomunity - Connexion</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
 ?>

<?php
echo form_open('user/login');
echo form_input('email', $userinfo->email ,['placeholder' => 'Adresse mail']);
echo form_password('password', '',['placeholder' => 'Mot de passe']);
echo form_submit('submit', 'Login');
echo validation_errors();
echo form_close();
?>

<?php
echo form_open('user/register');
echo form_submit('submit', 'Se créer un compte');
echo validation_errors();
echo form_close();
?>
