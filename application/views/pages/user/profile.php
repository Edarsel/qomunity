<h1>Qomunity - Profil</h1>


<div>
  <?php echo img('images/picture.jpg'); ?>
  <h2><?php echo xss_clean($user->username); ?></h2>
  <p>
  	<?php
    echo xss_clean($user->username);
    echo xss_clean($user->email);
    echo xss_clean($user->biography);
    //Ajouter le rang et le groupe 
    ?>
  </p>
</div>
