<h1>Qomunity - Profil</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
  //var_dump($this->session->userdata('user'));
 ?>

<div>
  <img src="<?php echo xss_clean($this->session->userdata('user')->profilepict) ?>" alt="Image de profil" height="200" width="200" />
  <p>
    <h3><?php echo xss_clean($this->session->userdata('user')->username); ?></h3>
    <?php echo "  " . xss_clean($this->session->userdata('user')->usergroup_name); ?>
  </p>
  <p>
  	<?php

    echo "Statut : " . xss_clean($this->session->userdata('user')->status_name);
    echo "<br><br>Rang : " . xss_clean($this->session->userdata('user')->rank_name);
    echo "<br>Email : " . xss_clean($this->session->userdata('user')->email);
    echo "<br>Biographie : " . xss_clean($this->session->userdata('user')->biography);
    //Ajouter le rang et le groupe
    ?>
  </p>
</div>

<?php
echo form_open('user/edit_profile');
echo form_submit('submit', 'Modifier profil');
echo validation_errors();
echo form_close();
?>
