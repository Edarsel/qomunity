<h2><?php echo xss_clean($project->name) ?></h2>
<article>
<label>Auteur:</label><a href="<?=$project->Userlink?>"><?=xss_clean($project->user->username)?></a>
<br />
<label>Description:</label>	<?php echo xss_clean($project->description) ?>
<br />
<label>Lien de téléchargement: </label><a href="<?=xss_clean($project->link)?>"><?=parse_url(xss_clean($project->link),PHP_URL_HOST)?></a>
<br />
<a href="<?=site_url('project/list/')?>">Retourner vers la liste des projets</a>
<!-- ADD COMENT -->
<?php
echo form_open();
echo form_textarea('message', '', ['placeholder' => 'Message']);echo "<br>";
echo form_submit('submit', 'Envoyer');
echo validation_errors();
echo form_close();

 ?>
<!-- MESSAGES LIST -->
    <div id="messages">
        <?php
           foreach($project->messages as $message){
                echo '<div id="individualMessage">';
                echo '<p><b>'.$message->user->username.'</b> '.$message->date.'</p>';
                echo '<p>'.$message->message.'</p>';
                echo '</div>';
            }
        //print_r($project->messages);
         ?>
    </div>
</article>
