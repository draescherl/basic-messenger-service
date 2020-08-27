<?php
$title = $_SESSION['username'] . '\'s profile';
ob_start(); ?>

<style></style>

<?php $style = ob_get_clean();

ob_start();
?>



<?php
$content = ob_get_clean();
ob_start();
?>

<script>
    $(document).ready(function() {


        
    });
</script>


<?php
$script = ob_get_clean();
require('view/template.php');
?>