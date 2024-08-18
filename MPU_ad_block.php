<head>
    <style>
        .ad-container-in_content {
            max-width: 400px;
            height: 400px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
            margin: 0 auto;
            padding: 10px;
            box-sizing: border-box;
        }

        .ad-label p {
            font-size: 14px;
            color: #666;
            margin: 0 0 10px;
        }

        @media only screen and (max-width: 768px) {
            .ad-container-in_content {
                max-width: 100%;
                height: auto;
                background-color: #f2f2f2;
            }
        }

        @media only screen and (max-width: 480px) {
            .ad-container-in_content {
                height: 350px;
                background-color: #f2f2f2;
            }
        }
    </style>

    <?php
    // Get the in-content MPU script field and sanitize output
    $in_content_mpu_bottom_script = wp_kses_post(get_field('in-content_mpu_script', 'option'));
    ?>
</head>

<!-- Ad block middle -->
<aside class="ad-container-in_content mt-4 mb-2" role="complementary" aria-label="Advertisement">
    <div class="ad-label">
        <p>Advertisement</p>
    </div>
    <div class="mpu-in_content_block">
        <?php 
        // Safely output the MPU script
        $in_content_mpus = wp_kses_post(get_field('in-content_mpus_body_script', 'option'));
        echo $in_content_mpus;
        ?>
    </div>
</aside>
<!-- End Ad block middle -->
