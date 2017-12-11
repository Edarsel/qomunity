<h1>Qomunity - Créer un compte</h1>
<?php
echo form_open();
echo form_input('email',$userinfo->email ,['placeholder' => 'Adresse mail']);
echo form_input('username',$userinfo->username,['placeholder' => "Nom d'utilisateur"]);
echo form_password('password','' ,['placeholder' => 'Mot de passe']);
echo form_password('cpassword', '',['placeholder'=> 'Vérification Mot de passe']);
echo form_submit('submit', 'Register');
echo validation_errors();
echo form_close();
?>
