<h2><?php echo xss_clean($project->name) ?></h2>
<article>
<label>Description:</label>	<?php echo xss_clean($project->description) ?>
<br />
<label>Author:</label>	<?='AUTEUR' ?>
<br />
<label>Download link:</label><?='LIEN'?>
<br />
<a href="<?=site_url('project/list/')?>">back</a>
</article>
