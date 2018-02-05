
<!doctype html>
<html>
<head>
<title>Example page</title>
    <meta charset="utf-8">
    <link rel = "stylesheet" type = "text/css" href="<?= css_url('style.css') ?>">
    <link rel = "stylesheet" type = "text/css" href="../../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src=" script.js"></script>
</head>
<body>
    <header>
        <h1>Qomunity</h1>
        <?php if(is_connected()){ ?>
        <nav>
            <a href="<?= site_url('user/disconnect/'); ?>">Se déconnecter</a>
            <a href="<?= site_url('user/profile/'); ?>">Mon profil</a>
            <a href="<?=site_url('project/listProject/') ?>">Liste des projets</a>
            <a href="">Page3</a>
            <a href="">Page4</a>
            <a href="">Page5</a>
      </nav>
      <?php } ?>
    </header>
    <main>
