
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
 ?>

 <div class="container-fluid">
     <div class="row">
         <div class="col-md-12">
             <div class="d-flex justify-content-center">
                 <div class="col-md-6">
                 <h1>Qomunity - Connexion</h1>
                     <div class="form-group">
                    <?php
                    echo form_open('user/login');
                    echo form_label("Adresse email : ", 'email');
                    echo form_input('email', (isset($userinfo->email)) ? $userinfo->email : $userinfo->username ,['placeholder' => 'Adresse mail', 'class' => 'form-control']);
                    if (isset($data)) {
                      if (isset($data->error)) echo $data->error;
                    }
                    echo "</div>";
                    echo '<div class="form-group">';
                    echo form_label("Mot de passe : ", 'password');
                    echo form_password('password', '',['placeholder' => 'Mot de passe', 'class' => 'form-control']);
                    echo "</div>";
                    echo '<div class="form-group">';
                    echo form_submit('submit', 'Se connecter');
                    echo validation_errors();
                    echo form_close();
                    ?>

                    </div>
                    <a href="<?= site_url('user/register/'); ?>">Se créer un compte</a>
                
                </div>
            <div>
        </div>
    </div>
</div>
