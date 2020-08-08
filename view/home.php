<?php
$title = 'Accueil';
ob_start();
$userID = $_SESSION['id'];
?>

<div class="container-fluid">
    <div class="row">

        <!-- Left -->
        <div class="col-sm-2">
            <h4>Conversations</h4> <br>
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

        <!-- Right -->
        <div class="col-sm-10">
            <h4 id="sender-username"><?= $_SESSION['username'] ?></h4>
            <div id="messages" style="height:88vh; overflow:auto;">
                


            </div>
            <div class="input-group mx-auto mb-2" style="width: 80%;">
                <input type="text" id="user-input" class="form-control border" placeholder="Message" style="background-color: #f1f0f0; color: black;">
                <button type="button" id="submit" class="btn btn-primary ml-1"> Send </button>
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

        function getMessages() {
            // Get receiver from URL :
            let searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has('to')) {
                var receiver = searchParams.get('to')
            }

            $.ajax({
                url: 'model/get-messages.php',
                type: 'POST',
                data: {
                    sender   : $("#sender-username").text(),
                    receiver : receiver
                },
                dataType: 'json',
                success: function(response) {
                    let ID = '<?= $userID ?>';
                    let html = '';
                    for (let message of response) {
                        if (message.senderID == ID) {
                            html += '<div class="d-flex justify-content-end mb-2"> \n';
                            html += `<div class="border rounded-pill p-2" style="background-color: #0084ff; color: #fff;"> ${message.contents} </div> \n`;
                            html += '</div> \n';
                        } else {
                            html += '<div class="d-flex justify-content-start mb-2"> \n';
                            html += `<div class="border rounded-pill p-2" style="background-color: #f1f0f0; color: rgba(0, 0, 0, 1);"> ${message['contents']} </div> \n`;
                            html += '</div> \n';
                        }
                    }

                    let messages = document.getElementById('messages');
                    messages.innerHTML = html;
                    messages.scrollTop = messages.scrollHeight;

                    let userInput = document.getElementById('user-input');
                    userInput.value = '';
                    userInput.focus();
                }
            });
        }
 
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
                    contents : $("#user-input").val()
                },
                function(response) {
                    if (response == 'success') {
                        getMessages();
                    } else {
                        alert('Internal error. Please try again later.');
                    }
                },
                'text'
            );
        });

        getMessages();
    });
</script>


<?php
$script = ob_get_clean();
require('view/template.php');
?>