<?php $title = 'Home'; ?>
<?php ob_start(); ?>
   
<h1>Hello world</h1>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>