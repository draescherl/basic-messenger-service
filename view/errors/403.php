<?php 
$title = '403'; 
ob_start(); 
?>


<!-- Access not authorized error message : -->
<div class="h3 mb-4 text-center col-md-12">
    <h1>I'm sorry, but you don't seem to have the necessary authorizations to access this page.</h1>
    <a class="btn btn-warning" href="/messagerie/?action=home">Back to home.</a>
</div>


<?php 
$content = ob_get_clean();  
require('view/template.php'); 
?>