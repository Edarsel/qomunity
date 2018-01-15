<h2>Groupes</h2>
<ul id="forum_group_container">
<?php foreach($groups as $group){?>
<li data-id="<?= xss_clean($group->id) ?>">
    <?= xss_clean($group->name) ?>
</li>
<?php }?>
</ul>
