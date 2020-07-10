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
                <div class="p-2 rounded-lg bg-secondary text-white"> <!-- selected user using this class -->
                    <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
                    <span><b>Username</b></span>
                </div>
                <hr>
                <div>
                    <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
                    <span><b>Username 2</b></span>
                </div>
            </div>
        </div>

        <!-- right element -->
        <div class="card" style="width: 50%;">
            <!-- title of the left element -->
            <div class="card-header">
                Username
            </div>
            <!-- content of the left element -->
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <div class="border rounded-pill p-2">Is this ok?</div>
                </div>
                <div class="d-flex justify-content-start mb-2">
                    <div class="border rounded-pill p-2">By seeing this I can say YES!!!</div>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <div class="border rounded-pill p-2">Big oof</div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>