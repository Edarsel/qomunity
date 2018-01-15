
<h2>Add a Project</h2>
<?php
echo form_open();
echo form_input('name', $project->name, ['placeholder' => 'Name']);echo "<br>";
echo form_textarea('description', $project->description, ['placeholder' => 'Description']);echo "<br>";
echo form_submit('submit', 'Add');
echo validation_errors();
echo form_close();
?>
<a href="<?=site_url('project/list/')?>">cancel</a>
