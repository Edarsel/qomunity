<h1>Project list</h1>
<?php
foreach ($projects->result() as $value) {
    $articleDescr=(strlen($value->description)>45)?substr($value->description, 0, 45).'...':$value->description;
    echo '<article><h2><a href='.site_url('project/view/'.$value->id).'>'.$value->name.'</a></h2><div>'.$articleDescr.'</div></article>';
}
 ?>
<h3><a href="<?=site_url('project/add') ?>">Add a new project</a></h3>
