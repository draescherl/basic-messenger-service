<?php
$title = 'Admin page';
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