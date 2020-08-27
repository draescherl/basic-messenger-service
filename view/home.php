<?php
$title = 'Accueil';

// Custom page style :
ob_start(); ?>
<style>
    .selected {
        color: blue;
    }
</style>
<?php $style = ob_get_clean();

ob_start();
$userID = $_SESSION['id'];
?>

<div class="container-fluid">
    <div class="row">

        <!-- Left -->
        <div class="col-sm-2 border-right">
            <div class="border-bottom mb-4 mt-2 pb-2 text-center">
                <h4>Conversations</h4>
            </div>
            <?php foreach ($users as $user) { ?>

            <a href=<?= "'" . "/messagerie/?action=home&to=" . $user . "'" ?> style="text-decoration: none; color: black;">
                <div id=<?= "'" . $user . "'" ?> class="mb-3">
                    <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
                    <span><b><?= $user ?></b></span>
                </div>
            </a>

            <?php } ?>
        </div>

        <!-- Right -->
        <div class="col-sm-10">
            <div class="row border-bottom mb-4 mt-2 pb-2">
                <div class="col-sm-10">
                    <h4 id="sender-username" class="pl-2"><?= $_SESSION['username'] ?></h4>
                </div>
                
                <div class="col-sm-2 text-center">
                    <a href="/messagerie/?action=profile" class="btn btn-secondary"> My profile </a>
                </div>
            </div>
            
            <div id="messages" style="height:82vh; overflow:auto;">
            </div>
            
            <form class="input-group mx-auto mb-2" style="width: 80%;">
                <input type="text" id="user-input" class="form-control border" placeholder="Message" style="background-color: #f1f0f0; color: black;">
                <button type="submit" id="submit" class="btn btn-primary ml-1"> Send </button>
            </form>
        </div>
        
    </div>
</div>

<?php
$content = ob_get_clean();
ob_start();
?>

<script>
    $(document).ready(function() {

        // Function to scroll down the page :
        function scrollDownAuto() {
            setTimeout(() => {
                let messages = document.getElementById('messages');
                messages.scrollTop = messages.scrollHeight;
            }, 400);
        }

        // Function to get parameters from URL :
        function GET(param) {
            let res = '';
            let searchParams = new URLSearchParams(window.location.search);
            if (searchParams.has(param)) {
                res = searchParams.get(param)
            } 
            return res;
        }

        // Function to change background color of active discussion :
        function updateBackgroundColor() {
            let ID = GET('to');
            el = document.getElementById(ID);
            let classes = ['p-2', 'rounded-lg', 'bg-secondary', 'text-white'];
            for (const c of classes) {
                el.classList.toggle(c);
            }
        }

        // Function to get messages :
        function getMessages() {
            // Get receiver from URL :
            var receiver = GET('to');

            $.post(
                'model/get-messages.php',
                {
                    sender   : $("#sender-username").text(),
                    receiver : receiver
                },
                function(response) {
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
                },
                'json'
            );
        }

        // Function to post messages :
        function postMessage() {
            // Prevent user from sending empty messages :
            if ($("#user-input").val() == '') {
                return;
            }

            // Get receiver from URL :
            var receiver = GET('to');

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

                        let userInput = document.getElementById('user-input');
                        userInput.value = '';
                        userInput.focus();  
                    } else {
                        alert('Internal error. Please try again later.');
                    }

                    scrollDownAuto();
                },
                'text'
            );
        }

        // Post message when enter key is pressed :
        $('form input').keydown(function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                postMessage();
            }
        });
 
        // Post message when submit button is clicked :
        $("#submit").click(function(e) {
            e.preventDefault();
            postMessage();
        });

        // Run on page load :
        getMessages();
        scrollDownAuto();
        updateBackgroundColor();

        // Run every 3 seconds :
        const interval = window.setInterval(getMessages, 3000);
        
    });
</script>


<?php
$script = ob_get_clean();
require('view/template.php');
?>