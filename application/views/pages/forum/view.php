<head>
    <link rel = "stylesheet" type = "text/css" href="<?= css_url('style_forum.css') ?>">
</head>
<a href="<?=site_url('forum/add/')?>">Ajouter un topic</a>
<ul id="forum_container">
  <li class="text-dark" id="forum_list_groups">
      <?= $list ?>
  </li>
</ul>
