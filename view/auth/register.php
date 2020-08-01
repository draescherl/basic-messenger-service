<?php 
// Page title :
$title = 'Create an account';

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
        <!-- Icon -->
        <div class="fadeIn first">
            <img src="static/img/logos/favicon.ico" id="icon" alt="User Icon" />
        </div>

        <!-- Register Form -->
        <form>
            <input type="text" id="username" class="fadeIn second" name="username" placeholder="username" required>
            <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
            <input type="password" id="confirm-password" class="fadeIn fourth" name="confirm-password" placeholder="confirm password" required>
            <div class="form-check fadeIn fourth">
                <input class="form-check-input" type="checkbox" value="" id="show-password" onclick="toggle_password_visibility()">
                <label class="form-check-label" for="show-password">
                    Show password
                </label>
            </div>
            <input type="submit" id="submit" class="fadeIn fourth" value="Create account">
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();

// Custom page script :
ob_start(); ?>
<script>
    function toggle_password_visibility() {
        var x = document.getElementById("password");
        var y = document.getElementById("confirm-password");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    } 

    $(document).ready(function(){
 
        $("#submit").click(function(e){
            e.preventDefault();

            $.post(
                'model/user-register.php',
                {
                    username : $("#username").val(),
                    password : $("#password").val(),
                    confirm : $("#confirm-password").val()
                },

                function(data) {
                    if (data == 'success') {
                        window.location.href = '/messagerie/?action=home';
                    } else {
                        switch (data) {
                            case 'not-match': content = 'Passwords do not match.';
                            break;

                            case 'password-space': content = 'Password cannot contain spaces.';
                            break;

                            case 'password-long': content = 'Password must be less than (or equal to) 20 characters long.';
                            break;

                            case 'password-short': content = 'Password must be more than (or equal to) 3 characters long.';
                            break;

                            case 'username-space': content = 'Username cannot contain spaces.';
                            break;

                            case 'username-long': content = 'Username must be less than (or equal to) 20 characters long.';
                            break;

                            case 'username-short': content = 'Username must be more than (or equal to) 3 characters long.';
                            break;

                            case 'username-exists': content = 'Username already exists.';
                            break;
                        
                            default: content = 'Internal error !';
                            break;
                        }
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