<!DOCTYPE html>
<html lang="en">
<?php include "./inc/head.php"; ?>
<body>
        
    <?php
            
            if (!isset($_GET['mostrar']) || $_GET['mostrar']=="") {
                $_GET['mostrar']="principal";
            }

            if(is_file("./vista/".$_GET['mostrar'].".php")){
                include "./inc/header.php";
                include "./vista/".$_GET['mostrar'].".php";
                include "./inc/footer.php";
            }else{
                echo "error";
            }

    ?>

<script src="js/ajx.js"></script>
<script src="js/sweetaler.js"></script>

</body>

</html>

















<!-- <!DOCTYPE html>
<html lang="en"> -->

<?php 
    // include "./inc/head.php";
    
?>

<!-- </body>

</html> -->