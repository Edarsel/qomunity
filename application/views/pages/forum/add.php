<h1>Add a group</h1>

<?php
echo form_open();
echo form_input('name', $forum->name, ['placeholder' => 'Name']);
echo form_textarea('description', $forum->description, ['placeholder' => 'Description']);
echo form_submit('submit', 'Add');
echo validation_errors();
echo form_close();
?>
