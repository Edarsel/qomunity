

<!-- MESSAGES LIST -->
<div id="forum_messages_container">
    <div id="messages">
        <?php
           $id = (object)[];
           $id->project = $forum->id;
           foreach($forum->chat as $message){
                $id->message = $message->id;
                $isUser = $message->num_user === $this->session->userdata('user')->id;
                //$linkAuthor = ($isUser) ? site_url('user/profile/') : site_url('user/view_profile_user/'.$message->user->id);
                $linkDeletion = site_url('forum/removeMessageById/'.$forum->id.'/'.$message->id);

                //MESSAGE
                echo '<div id="individualMessage">';
                echo '<p>';
                echo '<a href="'.site_url('user/view_profile_user/'.$message->num_user).'">';
                echo '<img src="'.$message->user->profilepict.'" alt="" class="rounded float-left rounded-circle" style="width:30px;height:30px; margin-right:5px;" />';
                //echo '<img width="32" src="'.$message->user->profilepict.'" alt="" /> ';
                echo '<b>'.$message->user->username.'</b></a> '.$message->date.' ';
                if ($isUser) {
                  echo '<a href="'.$linkDeletion.'">';
                  echo 'Supprimer</a>';
                }
                echo '</p>';
                echo '<p>'.$message->message.'</p>';


                echo '</div>';
            }
        //print_r($project->messages);
         ?>
    </div>

    <div id="forum_message_sender">
        <?php
        // echo form_textarea('message', null, ['id' => 'forum_message_content', 'placeholder' => 'Votre message']);
        // echo form_button('sendMessage', 'Envoyer', ['id' => 'forum_message_send']);
        ?>
        <!-- ADD COMMENT -->
        <?php
        //echo form_open();
        echo form_open('forum/addMessageForum/'.$forum->id);
        echo form_textarea('message', '', ['placeholder' => 'Message', 'maxlength' => 500, 'rows' => 5, 'cols' => 5]);
        echo "<br>";
        echo form_submit('submit', 'Envoyer');
        echo validation_errors();
        echo form_close();

         ?>
    </div>

</div>
