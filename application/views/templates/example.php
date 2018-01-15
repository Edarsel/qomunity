<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Example page</title>
  <link rel = "stylesheet" type = "text/css" href="<?= css_url('style.css') ?>">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <script src="<?php echo js_url('script.js')?>"></script>
</head>
<body>
    <header>
        <h1>Qomunity</h1>
        <nav>
            <a href="<?php echo site_url('Project/Add');?>">Page0</a>
            <a href="">Page1</a>
            <a href="">Page2</a>
            <a href="">Page3</a>
            <a href="">Page4</a>
            <a href="">Page5</a>
      </nav>
    </header>
    <main>
        <article>
            <h2>Titre Article1</h2>
                <div id="ContentArticle1">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eu nibh felis. Aliquam erat volutpat. Aliquam odio massa, consequat in ante in, feugiat interdum elit. Donec augue sapien, tempus nec dolor at, fringilla fringilla orci. Phasellus lobortis risus magna, auctor maximus metus finibus sed. Integer nisl risus, laoreet porttitor convallis non, faucibus sed lectus. Curabitur dictum convallis dolor vel aliquam. Duis ullamcorper, lectus et ullamcorper sodales, dui velit efficitur lectus, at ultricies nisl neque id velit. Cras iaculis neque ac tortor auctor hendrerit et pharetra nisl. Donec egestas vel nibh a tincidunt. Fusce in dui sed magna consequat feugiat. Morbi faucibus sapien turpis, sit amet volutpat massa ultrices ut. Aenean facilisis, erat quis interdum rhoncus, nibh nunc condimentum risus, sed mollis eros dolor at est. Sed eget ex libero. Sed aliquet lorem sodales, aliquam odio vitae, euismod purus. </p>
                </div>
        </article>
        <div class="formulaire">
            <h2>Formulaire</h2>
            <form>
                 First name:<br>
                 <input type="text" name="firstname"><br>
                 Last name:<br>
                 <input type="text" name="lastname">
                 <br>
                 <button type="submit" form="form1" value="Submit">Submit</button>
            </form>
            <?php echo form_open();
                echo form_input('firstname', $example->firstname, ['placeholder' => 'Name']);
                echo form_textarea('password', $example->password, ['placeholder' => 'password']);
                echo form_submit('submit', 'Add');
                echo validation_errors();
                echo form_close();
                ?>

        </div>
    </main>
</body>
</html>
