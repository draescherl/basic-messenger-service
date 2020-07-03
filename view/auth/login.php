<?php 
// Page title :
$title = 'Log in';

// Custom page style :
ob_start(); 
include 'view/auth/login-css.php';
$style = ob_get_clean();

// Page content :
ob_start(); 
?>

<div class="container">
    <div class="row">
        <div id="results" class="col-sm-12 col-md-6 offset-md-3 mt-2" role="alert"></div>
    </div>
</div>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="static/img/logos/favicon.ico" id="icon" alt="User Icon" />
        </div>

        <!-- Login Form -->
        <form>
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <div class="form-check fadeIn fourth">
                <input class="form-check-input" type="checkbox" value="" id="show-password" onclick="toggle_password_visibility()">
                <label class="form-check-label" for="show-password">
                    Show password
                </label>
            </div>
            <input type="submit" id="submit" class="fadeIn fourth" value="Log In">
        </form>

        <!-- Link to register -->
        <div id="formFooter">
            <a class="underlineHover" href="/messagerie/?action=register">Don't have an account ?</a>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();

// Custom page script :
ob_start(); ?>
<script>
    function toggle_password_visibility() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    } 

    $(document).ready(function(){
 
        $("#submit").click(function(e){
            e.preventDefault();

            $.post(
                'model/user-login.php',
                {
                    username : $("#username").val(),
                    password : $("#password").val()
                },

                function(data) {
                    if (data == 'success') {
                        //window.location.href = '/messagerie/?action=home';
                        alert(data);
                    } else {
                        content = 'Username or password is not valid.'
                        content += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                        content += '<span aria-hidden="true">&times;</span>';
                        content += '</button>';
                        $("#results").html(content);
                        $("#results").addClass('alert alert-danger alert-dismissible fade show');
                    }
                },
                'text'
            );
        });

    });
</script>
<?php 
$script = ob_get_clean();

// Call template :
require('view/template.php');