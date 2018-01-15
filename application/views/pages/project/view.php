<h2><?php echo xss_clean($project->name) ?></h2>
<article>
<label>Auteur:</label><a href="<?=site_url('user/view_profile_user/'.$project->num_user)?>"><?=xss_clean($project->user->username)?></a>
<br />
<label>Description:</label>	<?php echo xss_clean($project->description) ?>
<br />
<label>Lien de téléchargement: </label><a href="<?=xss_clean($project->link)?>"><?=parse_url(xss_clean($project->link),PHP_URL_HOST)?></a>
<br />
<a href="<?=site_url('project/list/')?>">Retourner vers la liste des projets</a>
</article>
