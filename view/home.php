<?php
$title = 'Accueil';

ob_start(); 
?>

<div class="container-fluid">
    <div class="row">
        <!-- left element -->
        <div class="card" style="width: 15%; min-height: 100vh;">
            <!-- title of the left element -->
            <div class="card-header">
                Home
            </div>
            <!-- content of the left element -->
            <div class="card-body">
                <?php foreach ($users as $user) { ?>
                    <div class="p-2 rounded-lg bg-secondary text-white">
                        <img src="static/img/trueno.jpg" class="rounded-circle mr-3" style="max-width: 70px; border:1px solid black;">
                        <span><b><?= $user ?></b></span>
                    </div>
                <hr>
                <?php } ?>
            </div>
        </div>

        <!-- right element -->
        <div class="card" style="width: 85%;">
            <!-- title of the left element -->
            <div class="card-header">
                <?= $_SESSION['username'] ?>
            </div>
            <!-- content of the left element -->
            <div class="card-body">
                <div class="d-flex justify-content-end mb-2">
                    <div class="border rounded-pill sent-message p-2">Is this ok?</div>
                </div>
                <div class="d-flex justify-content-start mb-2">
                    <div class="border rounded-pill received-message p-2">By seeing this I can say YES!!!</div>
                </div>
                <div class="d-flex justify-content-end mb-2">
                    <div class="border rounded-pill sent-message p-2">Big oof</div>
                </div>
            </div>
            <div class="input-group mx-auto mb-2" style="width: 80%;">
                <input type="text" class="form-control border rounded-pill" placeholder="Message" style="background-color: #f1f0f0; color: black;">  <!-- aria-label="Username" aria-describedby="basic-addon1" -->
            </div>
        </div>
    </div>
</div>

<?php 
$content = ob_get_clean(); 
require('view/template.php'); 
?>