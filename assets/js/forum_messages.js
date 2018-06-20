$(function(){
    $('#forum_group_container li').click(function(){
        const id = $(this).data('id')
        $('#forum_messages').load(`${BASE_URL}forum/displayGroup/${id}`,function(data){
            $('#forum_message_send').click(function(){
                const content = $('#forum_message_content').val()
                $.post(`${BASE_URL}forum/sendMessage`,{ message: content, group: id},function(data){
                    console.log(data)
                })
            })
        })
    })
})
