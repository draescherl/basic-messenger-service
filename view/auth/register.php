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

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

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
            <input type="submit" class="fadeIn fourth" value="Log In">
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
</script>
<?php 
$script = ob_get_clean();

// Call template :
require('view/template.php');