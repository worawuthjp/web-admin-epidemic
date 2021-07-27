<?php include('header.php');?>

<div class="right_col" role="main">

<?php if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "DELETE from tb_vaccine where vaccine_id = '$id' ";
                    $cls_conn->write_base($sql);
                    echo $cls_conn->goto_page(0,'show_vaccine.php');
                    }
                    ?>
 
</div>
<?php include('footer.php');?>
     