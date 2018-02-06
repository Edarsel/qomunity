<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
  // var_dump($this->session->userdata('user'));
 ?>
 <div class="container-fluid">
     <div class="row">
             <div class="col-md-3 ">
                 <div class="d-flex justify-content-center">
                     <img src="<?php echo xss_clean($this->session->userdata('user')->profilepict) ?>" alt="Image de profil" class="rounded float-left rounded-circle mt-2" style="width:200px;height:200px" />
                 </div>
             </div>

             <div class="col-md-9" style="background:skyblue">
                 <p class="h1"><?php echo xss_clean($this->session->userdata('user')->username); ?></p>
                 <p class="h4"><?php echo "Rang : " . xss_clean($this->session->userdata('user')->rank_name); ?></p>
                 <p class="h4"><?php  ?></p>
                 <p class="h5" style="line-height:1.5">
               	<?php
                 echo "Statut : " . xss_clean($this->session->userdata('user')->status_name);
                 echo "<br>Groupe : " . xss_clean($this->session->userdata('user')->usergroup_name);
                 echo "<br>Email : " . xss_clean($this->session->userdata('user')->email);
                 echo "<br>Biographie : <div>" . xss_clean($this->session->userdata('user')->biography);
                 echo "</div><br>";
                 ?>
                 <a href="<?php echo site_url('user/reset_password/'); ?>">Changer mot de passe</a>
                 <div class="d-flex flex-row-reverse">
                     <?php
                     echo form_open('user/edit_profile');
                     echo form_submit('submit', 'Modifier profil');
                     echo validation_errors();
                     echo form_close();
                     ?>
                 </div>
                </p>
            </div>
     </div>
 </div>
