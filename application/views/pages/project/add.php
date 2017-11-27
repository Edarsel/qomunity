<h1>Add Project</h1>

<?php 
echo form_open();
echo form_input('name', $project->name, ['placeholder' => 'Name']);
echo form_textarea('description', $project->description, ['placeholder' => 'Description']);
echo form_submit('submit', 'Add');
echo validation_errors();
echo form_close();
?>
