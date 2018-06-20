
<h1>Bienvenue sur le site qomunity</h1>

<?php
//print_r($arr['projects']);
?>
<div id="projectsList">
  <h2>Projets</h2>
  <?php
  foreach ($arr['projects'] as $value) {
      $articleDescr=(strlen($value->description)>45)?substr($value->description, 0, 45).'...':$value->description;
      echo '<article><h2><a href='.site_url('project/view/'.$value->id).'>'.$value->name.'</a> - '.$value->user->username.'</h2><div>'.$articleDescr.'</div></article>';
  }
  ?>
</div>
<div id="groupsList">
  <h2>Groupes</h2>
<?php
foreach ($arr['groups'] as $value) {
    $groupeDescr=(strlen($value->description)>45)?substr($value->description, 0, 45).'...':$value->description;
    echo '<article><h2><a href='.site_url('Forum/displayGroup/'.$value->id).'>'.$value->name.'</a></h2><div>'.$groupeDescr.'</div></article>'; //TODO corriger le liens pour afficher uniquement 1 groupe
}
 ?>
</div>
