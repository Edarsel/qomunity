<?php
echo form_open();
echo form_input('email','' ,['placeholder' => 'Adresse mail']);
echo form_input('username','',['placeholder' => "Nom d'utilisateur"]);
echo form_input('password','' ,['placeholder' => 'Mot de passe']);
echo form_submit('submit', 'Register');
echo validation_errors();
echo form_close();
?>
