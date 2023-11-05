    <?php
    $current = "messages";
    require_once('./includes/header.php');
    require_once("./functions/connect.php");
    ?>
    <div class="modal fade" tabindex="-1" id="readMessage">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="modalBody">
            <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Messages</h1>
        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">All Messages</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>name</th>
                                                        <th>email</th>
                                                        <th>read</th>
                                                        <th>controls</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $id = 1;
                                                    $messageSql = "SELECT * FROM `messages` WHERE 1";
                                                    $messageQuery = $conn -> query($messageSql);
                                                    foreach($messageQuery as $message){
                                                    ?>
                                                    <tr>
                                                        <td><?= $id++; ?></td>
                                                        <td><?= $message["name"]; ?></td>
                                                        <td>
                                                            <a href="mailto:">
                                                                <?= $message["email"]; ?>
                                                            </a>
                                                        </td>
                                                        <td><?= $message["viewed"] == 0 ? "unread" : "read" ?></td>
                                                        <td style="display: flex;">
                                                            <button class="btn btn-primary d-inline read" data-toggle="modal" data-target="#readMessage"><i class="
fab fa-readme"></i></button>
                                                            <input type="hidden" name="content" value="<?= $message["content"] ?>">
                                                            <input type="hidden" name="id" value="<?= $message["id"] ?>">
                                                            <button class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></button>
                                                        </td>
                                                    </tr>
    <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    require_once('./includes/footer.php');
    ?>
    <script>
    $(".read").click(function(){
        let messageContent = $(this).next().val(),
            messageName = $(this).parent().prev().prev().prev().html(),
            mesNum = $("#mesNum").html(),
            messageId = $(this).next().next().val();

        $("#modalTitle").html(messageName);
        $("#modalBody").html(messageContent);

        if(mesNum > 0){
            $("#mesNum").html(--mesNum);
        }

        if($(this).parent().prev().html() == "unread"){
            $.post("functions/messages/update.php", {messageId}, function(){});
            $(this).parent().prev().html("read");
        }
    });

    $(".delete").click(function(){
        let messageId = $(this).prev().val(),
            mesNum = $("#mesNum").html();

        if(mesNum > 0 && $(this).parent().prev().html() == "unread"){
            $("#mesNum").html(--mesNum);
        }

        $.post("functions/messages/delete.php", {messageId}, function(){});
        $(this).parent().parent().html('');
    });
    </script>