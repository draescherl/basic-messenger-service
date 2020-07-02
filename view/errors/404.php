<?php $title = '404'; ?>
<?php ob_start(); ?>


<!-- Page not found message -->
<div class="container">
    <div class="text-center">
        <h2>Requested page does not exist.</h2>
        <a href="/messagerie/?action=home" class="btn btn-primary">Back to home</a>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>