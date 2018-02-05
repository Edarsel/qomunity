<ul id="forum_messages_container">
    <li id="forum_messages">
        <ul id="forum_group_container">
            <?php foreach($messages as $message){?>
            <li>
                <?= xss_clean($message->num_user) ?>
            </li>
            <?php }?>
        </ul>
    </li>
    <li id="forum_message_sender">
        <?php
        echo form_textarea('message', null, ['id' => 'forum_message_content', 'placeholder' => 'Votre message']);
        echo form_button('send_message', 'Envoyer', ['id' => 'forum_message_send']);
        ?>
    </li>
</ul>
