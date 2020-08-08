<?php 
$title = '401'; 
ob_start(); 
?>


<!-- User not logged in error message : -->
<div class="h3 mb-4 text-center col-md-12">
    <h1>Please log in to access this page.</h1>
    <a class="btn btn-primary" href="/messagerie/?action=login">Log in.</a>
</div>


<?php 
$content = ob_get_clean();  
require('view/template.php'); 
?>