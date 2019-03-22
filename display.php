<div class="container-fluid bg-dark">
    <h1 align="center" class="text-white"> © Charaf Tchi
    </h1>
</div>

<?php    
       require 'root/cnxDB.php'; 
       require 'temp.php';
        $target="vids";
        $vid_url =$target."/";
        $result = mysqli_query($con,"SELECT * FROM videos ORDER BY id");
        //$row = mysqli_fetch_assoc($result);
        echo '<div class="container-fluid">
        <div class="row">
        ';
        while($row=mysqli_fetch_array($result))
        {
            echo '<div class="col-md-6" style="margin-bottom:2%";>';
            $video = $vid_url.$row["file_name"];
            $type = $row["type"];
            ?>
<div class="card">
    <div class="card-body bg-dark text-white">
        <p class="card-text font-weight-bold" align="center"><?php echo $row["file_name"]; ?></p>
    </div>
    <video width="100%" controls>
        <source src="<?php echo $video; ?>" type="video/<?php echo $type; ?>">
    </video>

</div>
</div>
<?php
    
        }
        echo '</div> </div>';
    ?>
<div class="container-fluid" style="margin-top:5%;">
    <a href="index.php" class="btn btn-info btn-block">
        <i class="fa fa-home" aria-hidden="true"></i>
        Home</a>
</div>