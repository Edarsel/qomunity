<head>
    <link rel = "stylesheet" type = "text/css" href="<?= css_url('style_forum.css') ?>">
</head>

<ul id="forum_container">
  <li id="forum_header">
      <h2 class=" p-1 text-light" style="background:#006794">En-tête</h2>
  </li>
  <li class="text-dark" id="forum_list_groups">
      <?= $list ?>
  </li>
  <li id="forum_messages">
      <h2 class="text-light" style="background:#006794">Messages</h2>
  </li>
</ul>
