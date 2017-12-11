<head><link rel = "stylesheet" type = "text/css" href="<?= css_url('style_forum.css') ?>"></head>
<ul class="forum_container">
  <li id="forum_header">
      <h2>En-tête</h2>
  </li>
  <li id="forum_list_groups">
      <!-- affiche directement (Aka echo) -->
      <?= $list ?>
  </li>
  <li id="forum_messages">
      <h2>Messages</h2>
  </li>
</ul>
