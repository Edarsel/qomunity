<h1>Qomunity - Connexion</h1>
<?php
echo form_open();
echo form_input('email', $userinfo->email ,['placeholder' => 'Adresse mail']);
echo form_password('password', '',['placeholder' => 'Mot de passe']);
echo form_submit('submit', 'Login');
echo validation_errors();
echo form_close();
?>
