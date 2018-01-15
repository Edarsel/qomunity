<h1>Liste des projets</h1>
<?php
foreach ($projects as $value) {
    $articleDescr=(strlen($value->description)>45)?substr($value->description, 0, 45).'...':$value->description;
    echo '<article><h2><a href='.site_url('project/view/'.$value->id).'>'.$value->name.'</a> - '.$value->user->username.'</h2><div>'.$articleDescr.'</div></article>';
}
 ?>
<h3><a href="<?=site_url('project/add') ?>">Ajouter un nouveau projet</a></h3>
