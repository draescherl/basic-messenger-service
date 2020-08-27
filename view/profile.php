<?php
$title = $_SESSION['username'] . '\'s profile';
ob_start(); 
?>

<style>
.container {
    max-width: 960px;
}

/*
 * Custom translucent site header
 */

.site-header {
    background-color: rgba(0, 0, 0, .85);
    -webkit-backdrop-filter: saturate(180%) blur(20px);
    backdrop-filter: saturate(180%) blur(20px);
}
.site-header a {
    color: #999;
    transition: ease-in-out color .15s;
}
.site-header a:hover {
    color: #fff;
    text-decoration: none;
}

/*
 * Extra utilities
 */

.flex-equal > * {
    -ms-flex: 1;
    flex: 1;
}
@media (min-width: 768px) {
    .flex-md-equal > * {
        -ms-flex: 1;
        flex: 1;
    }
}

.overflow-hidden { overflow: hidden; }
</style>

<?php 
$style = ob_get_clean();
ob_start();
?>

<!-- https://getbootstrap.com/docs/4.5/examples/product/ -->
<nav class="site-header sticky-top py-1">
    <div class="container d-flex flex-column flex-md-row justify-content-between">
        <a class="py-2" href="#" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
        </a>
        <a class="py-2 d-none d-md-inline-block" href="#">Tour</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Product</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Features</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Enterprise</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Support</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Pricing</a>
        <a class="py-2 d-none d-md-inline-block" href="#">Cart</a>
    </div>
</nav>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">Change username</h2>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 325px; border-radius: 21px 21px 0 0;">
            <form class="pt-2">
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="current_username">Current username</label>
                            <input type="text" class="form-control" id="current_username" placeholder="Current username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="new_username">New username</label>
                            <input type="text" class="form-control" id="new_username" placeholder="New username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="confirm_new_username">Confirm new username</label>
                            <input type="text" class="form-control" id="confirm_new_username" placeholder="Confirm new username">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="username_submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">Change password</h2>
        </div>
        <div class="bg-white shadow-sm mx-auto" style="width: 80%; height: 325px; border-radius: 21px 21px 0 0;">
            <form class="pt-2">
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="current_password">Current password</label>
                            <input type="password" class="form-control" id="current_password" placeholder="Current password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="new_password">New password</label>
                            <input type="password" class="form-control" id="new_password" placeholder="New password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-10 offset-1">
                        <div class="form-group">
                            <label for="confirm_new_password">Confirm new password</label>
                            <input type="password" class="form-control" id="confirm_new_password" placeholder="Confirm new password">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="username_submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
ob_start();
?>

<script></script>


<?php
$script = ob_get_clean();
require('view/template.php');
?>