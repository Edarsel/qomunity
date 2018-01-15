<h2>Liste des Groupes</h2>
<ul class="forum_group_container">
<?php foreach($groups as $group){?>
    <li class="forum_group">
        <h3><?php echo $group->name ;?></h3>
    </li>
<?php }?>
</ul>
