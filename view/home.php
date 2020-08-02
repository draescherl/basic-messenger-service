<?php
$title = 'Accueil';
ob_start();
?>

<div class="container-fluid">
    <div class="row">
        <!-- Left part of the page -->
        <div class="card" style="width: 15%; min-height: 100vh;">
            <div class="card-header"> Chats </div>
            <div class="card-body">
                <?php foreach ($users as $user) { ?>

                <a href=<?= "'" . "/messagerie/?action=home&to=" . $user . "'" ?>>
                    <div>
                        <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
                        <span><b><?= $user ?></b></span>
                    </div>
                </a>
                <hr>

                <?php } ?>
            </div>
        </div>

        <!-- Right part of the page -->
        <div id="chat-wrapper" class="card" style="width: 85%;">
            <div id="chat">
                <div class="card-header" id="sender-username"><?= $_SESSION['username'] ?></div>
                <div class="card-body">
                    <?php if (isset($messages)) {
                        foreach ($messages as $message) { ?>

                            <?php if ($message['senderID'] === $_SESSION['id']): ?>
                            <div class="d-flex justify-content-end mb-2">
                                <div class="border rounded-pill p-2" style="background-color: #0084ff; color: #fff;"> <?= $message['contents'] ?> </div>
                            </div>

                            <?php else: ?>
                            <div class="d-flex justify-content-start mb-2">
                                <div class="border rounded-pill p-2" style="background-color: #f1f0f0; color: rgba(0, 0, 0, 1);"> <?= $message['contents'] ?> </div>
                            </div>

                            <?php endif;
                        }
                    } ?>
                </div>
                <div class="input-group mx-auto mb-2" style="width: 80%;">
                    <input type="text" id="message" class="form-control border" placeholder="Message" style="background-color: #f1f0f0; color: black;">
                    <button id="submit" type="button" class="btn btn-primary ml-1"> Send </button>
                </div>
            </div>
        </div>
        
    </div>
</div>

<?php
$content = ob_get_clean();
ob_start();
?>

<script>
    $(document).ready(function(){
 
        $("#submit").click(function(e){
            e.preventDefault();

            // Get receiver from URL :
            let searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has('to')) {
                var receiver = searchParams.get('to')
            }

            $.post(
                'model/insert-message.php',
                {
                    sender   : $("#sender-username").text(),
                    receiver : receiver,
                    contents : $("#message").val()
                },
                function(response) {
                    if (response == 'success') {
                        // reload page
                        let url = '/messagerie/?action=home&to=' + receiver;
                        $('#chat-wrapper').load(url + ' #chat');
                    } else {
                        alert('Internal error. Please try again later.');
                    }
                },
                'text'
            );
        });

    });
</script>


<?php
$script = ob_get_clean();
require('view/template.php');
?>