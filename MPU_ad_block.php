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
            }
        }

        @media only screen and (max-width: 480px) {
            .ad-container-in_content {
                height: 350px;
            }
        }
    </style>

    <?php
    // Retrieve and sanitize the in-content MPU script
    $in_content_mpu_script = wp_kses_post(get_field('in-content_mpu_script', 'option'));
    ?>
</head>

<!-- Ad block middle -->
<aside class="ad-container-in_content mt-4 mb-2" role="complementary" aria-label="Advertisement">
    <div class="ad-label">
        <p>Advertisement</p>
    </div>
    <div class="mpu-in_content_block">
        <?php 
        // Retrieve and sanitize the MPU body script
        $in_content_mpus_body_script = wp_kses_post(get_field('in-content_mpus_body_script', 'option'));

        // Check if the MPU script is available before echoing
        if (!empty($in_content_mpus_body_script)) {
            echo $in_content_mpus_body_script;
        } else {
            echo '<!-- No MPU script available -->';
        }
        ?>
    </div>
</aside>
<!-- End Ad block middle -->
