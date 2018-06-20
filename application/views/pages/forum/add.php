<h4 class="p-1 mb-2 text-light" style="background:#006794">Ajouter un groupe</h4>

<div class="form-group" style="margin: 5px; margin-bottom:15px">
    <?php
    echo form_open();
    $nom = array(
        'type'          =>'text',
        'class'         =>'form-control',
        'name'          =>'name',
        $forum          -> name,
        'placeholder'   => 'Nom de votre projet'
    );


    echo form_input($nom);
    // echo validation_errors();

    ?>

</div>

<div class="form-group" style="margin: 5px; margin-bottom:15px">
    <?php

    $description = array(
        'type'          =>'text',
        'class'         =>'form-control',
        'name'          =>'description',
        $forum          -> description,
        'placeholder'   => 'Nom de votre projet',
        'rows'          => '5'
    );


    echo form_textarea($description);
    // echo validation_errors();

    ?>

</div>

<div class="form-group" style="margin: 5px; margin-bottom:15px">
    <?php

    $bouton = array(
        'type'          =>'submit',
        'class'         =>'btn btn-light',
        'name'          =>'bouton',
        'value'         =>'Ajouter'
    );

    echo form_open();
    echo form_submit($bouton);
    echo validation_errors();
    echo form_close();
    ?>

</div>
