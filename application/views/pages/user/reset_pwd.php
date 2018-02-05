<h1>Qomunity - Changer mot de passe</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
 ?>

<?php
echo form_open('user/reset_password');
echo form_label("Mot de passe : ", 'password');
echo form_password('password','' ,['placeholder' => 'Mot de passe']);
echo form_password('cpassword', '',['placeholder'=> 'Vérification Mot de passe']);
echo form_submit('submit', 'Enregistrer');
echo validation_errors();
echo form_close();
?>

<?php
echo form_open('user/profile');
echo form_submit('submit', 'Annuler');
echo validation_errors();
echo form_close();
?>
