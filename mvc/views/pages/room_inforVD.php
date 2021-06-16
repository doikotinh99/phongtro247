<?php 
    $infor = json_decode($data["vendor"]);
    $infor = (array)$infor[0];
?>
<section class="sticky-top-50">
    <div class="card">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 text-center">
                <img width="100px" height="100px" src="/public/upload/image/<?php 
                if(isset($infor["infor_avatar"])){
                    echo $infor["infor_avatar"];
                }else{
                    echo "slideshow1.jpg";
                }?>" class="rounded-circle" alt="...">
            </div>
            <div class="card-body col-12 col-sm-12 col-md-12 col-lg-12 p-1">
                <p class="card-text mb-1 ellipsis-1 text-dark">
                    <?php 
                        echo $infor["infor_firstname"]." ".$infor["infor_lastname"];
                    ?>
                </p>
                <p class="mb-1">
                    <span class="text-muted">
                        <i class="fas fa-map-marker-alt"></i> 
                        <span>
                            <?php 
                                echo $infor["add_apart"].", ".$infor["add_wards"].", ".$infor["add_district"].", ".$infor["add_province"];
                            ?>
                        </span>
                    </span>
                </p>
                <div class="w-100 d-flex row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <p class="mb-0 text-1 font-weight-bold text-danger">
                            <i class="fas fa-phone-alt"></i> 
                            <span class=""><?php echo $infor["infor_phone"] ?></span>
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <p class="text-colorl text-1"><i class="fas fa-comment-dots"></i> Live chat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</section>