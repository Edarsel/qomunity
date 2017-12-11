<h1>Qomunity - Profil</h1>


<div>
  <?php //echo img('images/picture.jpg'); ?>
  <h3><?php echo xss_clean($_SESSION['user']->username); ?></h3>
  <p>
  	<?php
    echo xss_clean($_SESSION['user']->email);
    echo xss_clean($_SESSION['user']->biography);
    //Ajouter le rang et le groupe
    ?>
  </p>
</div>
