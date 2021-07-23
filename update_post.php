<?php 
include 'config/config.php';
$page_title = "Dashboard";
if(!user_login()){
    header("location: login.php?act=dashboard");
}
include 'header.php';
include 'menu.php';
?>



<?php
if(isset($_POST["ok-post"])){
    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $price = mysqli_real_escape_string($conn,$_POST["price"]);
    $phone = mysqli_real_escape_string($conn,$_POST["number"]);
    $state = mysqli_real_escape_string($conn,$_POST["state"]);
    $description = mysqli_real_escape_string($conn,$_POST["desc"]);
    $postid = mysqli_real_escape_string($conn,$_POST["postid"]);

    $sql = "UPDATE posts set name = '$name', price = '$price', phone = '$phone', state = '$state', description = '$description' where postid = '$postid' ";
    $result = $conn->query($sql)or
    die(mysqli_error($conn));

    if($result === TRUE){
        set_flash("Post updated successfully","success");
    }else{
        set_flash("There was error in updating the post","danger");
    }
}

?>



<?php
if(isset($_GET["postid"])){
    $postid = $_GET["postid"];

    $sql = "SELECT * from posts where postid = '$postid' ";
    $result = $conn->query($sql)or
    die(mysqli_error($conn));

    $rs = $result->fetch_assoc();

?>
<div class="col-sm-9 padding-right">
					
    <div class="container" style="padding: 0 100px;">
    <h3 class="head">Update your product</h3>
    <hr>
    <form action="" method="post" enctype="multipart/form-data">
        <?php echo flash(); ?>
        <div class="row">
            <div class="col-25">
                <label for="name">Post Id</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="<?php echo($rs["postid"]) ?>" disabled >
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="name">Name of Product</label>
            </div>
            <div class="col-75">
                <input type="text" id="name" name="name" placeholder="E.g. Shirt" required="" value="<?php echo($rs["name"]); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="price">Price (&#8358;)</label>
            </div>
            <div class="col-75">
                <input type="text" id="price" name="price" placeholder="E.g. 40000" required="" value="<?php echo($rs["price"]); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="number">Phone Number</label>
            </div>
            <div class="col-75">
                <input type="text" id="number" name="number" placeholder="E.g. 08039564196" required="" value="<?php echo($rs["phone"]); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="state">State</label>
            </div>
            <div class="col-75">
                <input type="text" id="state" name="state" placeholder="E.g. Lagos State" required="" value="<?php echo($rs["state"]); ?>">
                <input type="hidden" name="postid" value="<?php echo($rs["postid"]); ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="desc">Description</label>
            </div>
            <div class="col-75">
                <textarea id="desc" name="desc" placeholder="Give a brief description of the item you want to post" style="height:200px"><?php echo $rs["description"]; ?></textarea>
            </div>
        </div>
        <div class="row" style="margin: 10px 20px;">
            <button class="btn-post" name="ok-post" type="submit">Update <i class="fa fa-upload"></i></button>
        </div>
    </form>

    <?php
    }else{
    ?>
        <div class="alert alert-danger text-center" style="margin: 0 150px;">
            <i class="fa fa-warning"></i> Invalid or bad request
        </div>
    <?php
    }
    ?>
</div>					
</div>
