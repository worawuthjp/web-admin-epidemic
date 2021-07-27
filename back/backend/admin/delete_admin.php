<?php include('header.php');?>

<div class="right_col" role="main">

<?php if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "DELETE from tb_admin where admin_id = '$id' ";
                    $cls_conn->write_base($sql);
                    echo $cls_conn->goto_page(0,'show_admin.php');
                    }
                    ?>
 
</div>
<?php include('footer.php');?>
     