<h2 class="text-light" style="background:#006794">Groupes</h2>
<ul id="forum_group_container">
  <?php
  foreach($groups as $group){
    ?>
    <li style="background:skyblue " data-id="
    <?= xss_clean($group->id) ?>">
    <a href="<?=site_url('forum/viewForum/'.$group->id)?>"><?= xss_clean($group->name) ?></a>
  </li>
  <?php
}
?>
</ul>
