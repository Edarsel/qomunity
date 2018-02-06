
<!doctype html>
<html>
<head>
<title>Example page</title>
    <meta charset="utf-8">
    <!-- <link rel = "stylesheet" type = "text/css" href=" //css_url('style.css') "> -->
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script>
        const BASE_URL = '<?= base_url() ?>'
    </script>
    <script src="<?= js_url('forum.js') ?>" defer></script>
    <script src="<?= js_url('forum_messages.js') ?>" defer></script>
    <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous" defer></script>

</head>
<body>
    <header>

        <nav class="navbar navbar-light mb-5" style="background:#006794">
            <span class="navbar-brand text-light mb-0 h1">Qomunity</span>
            <div class="container justify-content-end">
                <?php if(is_connected()){ ?>
                <nav class="nav nav-pills">
                    <a class="nav-link text-light" href="<?= site_url('user/disconnect/'); ?>">Se déconnecter</a>
                    <a class="nav-link text-light" href="<?= site_url('user/profile/'); ?>">Mon profil</a>
                    <a class="nav-link text-light" href="<?=site_url('project/listProject/') ?>">Liste des projets</a>
                    <a class="nav-link text-light" href="" >Page4</a>
                    <a class="nav-link text-light" href="<?=site_url('project/index/') ?>" >Accueil</a>
                </nav>
                <?php } ?>
            </div>

        </nav>
</header>
<main class="m-5 p-5">
