<h1>Qomunity - Créer un compte</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
 ?>

<?php
echo form_open();
echo form_label("Adresse email : ", 'email');
echo form_input('email',$userinfo->email ,['placeholder' => 'Adresse mail']);
echo form_label("Nom d'utilisateur : ", 'username');
echo form_input('username',$userinfo->username,['placeholder' => "Nom d'utilisateur"]);
echo form_label("Mot de passe : ", 'password');
echo form_password('password','' ,['placeholder' => 'Mot de passe']);
echo form_password('cpassword', '',['placeholder'=> 'Vérification Mot de passe']);
echo form_submit('submit', 'Register');
echo validation_errors();
echo form_close();
?>
