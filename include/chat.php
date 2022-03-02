<?php
 ?>
<div class="chat_0">
<div id="chat" class="modal_chat">
  <div class="tab_box">
    <button class="chat_button" id="chat_button">
        <div class="button-content" id="Chat_button_content">
          Chat
        </div> 
    </button> 
    <div class="chat-content bg_white" id="chat_content">
        
    </div>
  </div>
</div>
</div>

<div class="tab_250">
<div id="chat_tab" class="modal_chat_tabb">
  <!-- Modal content -->
	 <div class="tab_box">
   	<button class="chat_button" id="chat_tab_button">
        <div class="button-content" id="Tab_button_content">
          
        </div>
    </button>
    <div class="chat-content" id="chat_tab_content">
      <div id="message_display"><div id="msg_view"></div></div>
      <form method="POST" id="tab_form">
        <input type="hidden" name="chat_tab_id" id="chat_tab_id" />
      	<textarea type="text" name="message" class="chat_tab_input" id="tab_message"></textarea>
        <button type="submit" class="mend_msg">send</button>
      </form>
    </div>
  </div>
</div>
</div>