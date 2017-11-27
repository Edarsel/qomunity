<h1>Add Project</h1>

<?php 
echo form_open();
echo form_input('name', null, ['placeholder' => 'Name']);
echo form_textarea('description', null, ['placeholder' => 'Description']);
echo form_submit('submit', 'Add');
echo form_close();
?>
