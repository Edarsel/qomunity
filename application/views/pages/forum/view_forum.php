<head>
    <link rel = "stylesheet" type = "text/css" href="<?= css_url('style_forum.css') ?>">
</head>
<a href="<?=site_url('forum/view/')?>">Liste des topics</a>
<ul id="forum_container">
  <li class="text-dark" id="forum_list_groups">
      <?= $forum->chat ?>
  </li>
</ul>
