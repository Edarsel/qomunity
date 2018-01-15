<h1>Qomunity - Profil</h1>
<?php
  //Lien de la page dans une variable de session. Sert pour retourner à la page précédente.
  $this->session->set_userdata('previous_page', current_url());
  //var_dump($this->session->userdata('user'));
 ?>

<div>
  <img src="<?php echo xss_clean($userinfo->profilepict) ?>" alt="Image de profil" height="200" width="200" />
  <p>
    <h3><?php echo xss_clean($userinfo->username); ?></h3>
    <?php echo "Groupe : " . xss_clean($userinfo->usergroup_name); ?>
  </p>
  <p>
  	<?php

    echo "Statut : " . xss_clean($userinfo->status_name);
    echo "<br><br>Rang : " . xss_clean($userinfo->rank_name);
    echo "<br>Email : " . xss_clean($userinfo->email);
    echo "<br>Biographie : " . xss_clean($userinfo->biography);
    //Ajouter le rang et le groupe
    ?>
  </p>
</div>
