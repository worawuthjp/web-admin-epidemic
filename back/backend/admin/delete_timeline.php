<?php include('header.php');?>

<div class="right_col" role="main">

<?php if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $sql = "DELETE from tb_timeline where timeline_id = '$id' ";
                    $cls_conn->write_base($sql);
                    echo $cls_conn->goto_page(0,'show_timeline.php');
                    }
                    ?>
 
</div>
<?php include('footer.php');?>
     