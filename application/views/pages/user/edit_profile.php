<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
  //var_dump($this->session->userdata('user'));
 ?>

 <?php

 ?>

 <div class="container-fluid">
     <div class="row">
             <div class="col-md-3 ">
                 <div class="d-flex justify-content-center">
                     <img src="<?php echo xss_clean($this->session->userdata('user')->profilepict) ?>" alt="Image de profil" class="rounded float-left rounded-circle mt-2" style="width:200px;height:200px" />
                 </div>
             </div>

             <div class="col-md-9" style="background:skyblue">
                 <p class="h1"> <?php echo xss_clean($this->session->userdata('user')->username); ?></p>
               	<?php
                    echo form_open('user/save_profile');
                    echo form_label("Image de profil : ", 'profilpict');
                    echo form_input('profilepict', xss_clean($this->session->userdata('user')->profilepict) ,['placeholder' => 'URL de l\'image de profil', 'class' => 'form-control']);
                    echo form_label("Biographie : ", 'biography');
                    echo form_textarea('biography', xss_clean($this->session->userdata('user')->biography) ,['placeholder' => 'Biographie', 'class' => 'form-control']);
                    echo '<div class="d-flex flex-row-reverse col-md-8">';
                    echo form_submit('submit', 'Annuler');
                    echo form_submit('submit', 'Enregistrer');
                    echo form_open('user/profile');
                    echo '</div>';
                    echo validation_errors();
                    echo form_close();
                 ?>
                </p>
            </div>
     </div>
 </div>
