<?php
$title = 'Accueil';
?>
<?php ob_start(); ?>

<div class="container-fluid">
    <div class="row">
        <!-- left element -->
        <div class="card" style="width: 18rem;">
            <!-- title of the left element -->
            <div class="card-header">
                Home
            </div>
            <!-- content of the left element -->
            <div class="card-body">
                <p>Home</p>
                <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
            </div>
        </div>

        <!-- right element -->
        <div class="card" style="width: 18rem;">
            <!-- title of the left element -->
            <div class="card-header">
                Username
            </div>
            <!-- content of the left element -->
            <div class="card-body">
                <p>One little message.</p>
                <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>