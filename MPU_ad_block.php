<head>

<style>
.ad-container-in_content{
    width: 400px;
    height: 400px;
    text-align: center;
    display: block;
    justify-content: center;
    align-items: center;
    background-color: #f2f2f2f2;
    margin: 0 auto;
    }

    @media only screen and (max-width: 480px) {
        .ad-container-in_content{
            width:100%;
            height: 350px;
            background-color: #f2f2f242;
            margin: 0 auto;

            }
        }  




</style>
<?php
$in_content_mpu_bottom_script = get_field('in-content_mpu_script', 'option');
?>


</head>

<!-- Ad block middle -->
<div class="ad-container-in_content mt-4 mb-2">
    <div class="ad-label">
        <p>Advertisement</p>
    </div>
    <div class="mpu-in_content_block">
      
<?php 
$in_content_mpus = get_field('in-content_mpus_body_script', 'option');
echo $in_content_mpus;
?>





    </div>
</div>
<!-- End Ad block middle -->
