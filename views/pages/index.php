<?php
$dir_view = SITE_DIR . "/views/";
?>

<?php include $dir_view . "sections/header.php"; ?>

<?php include $dir_view . "sections/sidebar.php"; ?>

<!--BEGIN SITE MAIN-->
<div id="site_main">

    <div class="container-fluid">
        <?php
        if ( $data[ 'content' ] != "" && file_exists( $dir_view . $data[ 'content' ] ) ) {
            include $dir_view . $data[ 'content' ];
        }else{
            echo '<div class="well">Content Not Found !</div>';
        }
        ?>
    </div>

</div>
<!--END SITE MAIN-->

<?php include $dir_view . "sections/footer.php"; ?>

