<h1>Qomunity - Profil</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
  //var_dump($this->session->userdata('user'));
 ?>

 <div>
   <img src="<?php echo xss_clean($this->session->userdata('user')->profilepict) ?>" alt="Image de profil" height="200" width="200" />
   <h3><?php echo xss_clean($this->session->userdata('user')->username); ?></h3>
 </div>

 <?php
 echo form_open('user/save_profile');
 echo form_label("Image de profil : ", 'profilpict');
 echo form_input('profilepict', xss_clean($this->session->userdata('user')->profilepict) ,['placeholder' => 'URL de l\'image de profil']);
 //echo form_input('email', xss_clean($this->session->userdata('user')->email) ,['placeholder' => 'Adresse mail']);
 echo form_label("Biographie : ", 'biography');
 echo form_textarea('biography', xss_clean($this->session->userdata('user')->biography) ,['placeholder' => 'Biographie']);
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
