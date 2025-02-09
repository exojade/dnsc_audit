<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE/bower_components/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Messages</h1>
          </div>
        </div>
      </div>
    </section>
    <style>
.direct-chat-messages{
  height: 100%;
}
    </style>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-8">
          <div class="card direct-chat direct-chat-primary">
              <!-- /.card-header -->
              <div class="card-header bg-success">
                <h3 class="card-title ">Chat Box</h3>
              </div>
              <div class="card-body bg-light" id="chat-box" >
                <div class="direct-chat-messages" style="min-height: 65vh; max-height: 65vh; overflow-y: auto;">
             
                </div>
              </div>
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>

          </div>
          <div class="col-4">

          <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Participants</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <?php $users = query("select concat(u.firstname, ' ', u.middlename, ' ', u.surname) as fullname,
                                        u.img,
                                        r.role_name from users u
                                        left join roles r on r.id = u.role_id
                                        where role_id in (1,5)"); ?>
                <?php foreach($users as $row): ?>
                  <div class="user-block btn-block mb-2">
                    <img class="img-circle img-bordered-sm" src="<?php echo($row["img"]); ?>" alt="user image">
                    <span class="username">
                      <a href="#"><?php echo($row["fullname"]); ?></a>
                    </span>
                    <span class="description"><?php echo($row["role_name"]); ?></span>
                  </div>
                <?php endforeach; ?>

                
                </div>
              </form>
            </div>





         

          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="AdminLTE/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="AdminLTE_new/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="AdminLTE_new/plugins/jszip/jszip.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/pdfmake.min.js"></script>
<script src="AdminLTE_new/plugins/pdfmake/vfs_fonts.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="AdminLTE_new/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <?php require("layouts/footer.php") ?>
  <script>
  $('#awit-box').overlayScrollbars({
  })
  


  $(document).ready(function () {
    let lastMessageId = 0; // Track last message ID for new messages
    let offset = 0; // Offset for loading older messages
    const limit = 20; // Number of messages to load initially
    const chatBox = $('#chat-box .direct-chat-messages');
    let loadingOldMessages = false;

    // Function to load latest messages (polling every 2 seconds)
    function loadMessages() {
    $.ajax({
        url: 'messages',
        method: 'POST',
        data: { action: "get_messages", last_id: lastMessageId },
        dataType: 'json',
        success: function (messages) {
            if (messages.length > 0) {
                messages.forEach(msg => {
                    if (!$(`.direct-chat-msg[data-id="${msg.message_id}"]`).length) { 
                        chatBox.append(formatMessage(msg));
                        lastMessageId = msg.message_id; // Track latest message
                    }
                });
                chatBox.scrollTop(chatBox[0].scrollHeight);
            }
        }
    });
}

    // Load initial messages
    function loadInitialMessages() {
    $.ajax({
        url: 'messages',
        method: 'POST',
        data: { action: "get_messages", offset: 0, limit: limit },
        dataType: 'json',
        success: function (messages) {
            chatBox.html(''); // Clear chat box on first load
            messages.reverse().forEach(msg => {
                chatBox.append(formatMessage(msg));
                // alert(msg.message_id);
                if (msg.message_id > lastMessageId) {
                    lastMessageId = msg.message_id; // Set lastMessageId only for new messages
                }
            });
            chatBox.scrollTop(chatBox[0].scrollHeight);
        }
    });
}

    // Load older messages when scrolling up
    chatBox.on('scroll', function () {
      console.log("awit");
    if (chatBox.scrollTop() === 0 && !loadingOldMessages) {
        loadingOldMessages = true;
        $.ajax({
            url: 'messages',
            method: 'POST',
            data: { action: "get_messages", offset: offset, limit: 20 },
            dataType: 'json',
            success: function (messages) {
                if (messages.length > 0) {
                    let prevScrollHeight = chatBox[0].scrollHeight;

                    // Check if message is already in the chatbox
                    messages.forEach(msg => {
                        if ($(`.direct-chat-msg[data-id="${msg.message_id}"]`).length === 0) {
                            chatBox.prepend(formatMessage(msg));
                        }
                    });

                    chatBox.scrollTop(chatBox[0].scrollHeight - prevScrollHeight); // Keep scroll position after loading
                    offset += messages.length; // Increase offset correctly
                }
                loadingOldMessages = false;
            }
        });
    }
});

    // Send a message
    $('form').submit(function (e) {
        e.preventDefault();
        let message = $('input[name=message]').val().trim();
        if (message !== '') {
            $.post('messages', { action: "send_message", sender: "<?php echo($_SESSION["dnsc_audit"]["userid"]); ?>" ,  message: message }, function () {
                $('input[name=message]').val(''); // Clear input
                loadMessages(); // Fetch new messages after sending

            // Scroll to the bottom of the chat box
            chatBox.scrollTop(chatBox[0].scrollHeight);
            });
        }
    });

    // Format message for display
    function formatMessage(msg) {
    return `<div class="direct-chat-msg ${msg.is_me ? 'right' : ''}" data-id="${msg.id}">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-${msg.is_me ? 'right' : 'left'}">${msg.sender}</span>
                    <span class="direct-chat-timestamp float-${msg.is_me ? 'left' : 'right'}">${msg.timestamp}</span>
                </div>
                <img class="direct-chat-img" src="${msg.avatar}" alt="User Image">
                <div class="direct-chat-text">${msg.text}</div>
            </div>`;
}

    // Start polling
    setInterval(loadMessages, 2000);
    loadInitialMessages();
});

  </script>