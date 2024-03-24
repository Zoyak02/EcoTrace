<?php 
require ('../accounts.php');

function upload_image_to_cloudinary($file, $target_dir, $public_id = null)
{
    require_once '../vendor/autoload.php';

    if (!empty($public_id)) {
        return (new Cloudinary\Api\Upload\UploadApi())->upload($file['tmp_name'], [
            'public_id' => $public_id,
            'resource_type' => 'image',
        ]);

    }

    return (new Cloudinary\Api\Upload\UploadApi())->upload($file['tmp_name'], [
        'folder' => $target_dir,
        'resource_type' => 'image',
    ]);
}

function process_file_and_execute_query($pdo, $file, $target_dir, $query_callback)
{
    if (empty($file['name'])) {
        return false;
    }

    $new_image_result = upload_image_to_cloudinary($file, $target_dir);
    $new_image_path = $new_image_result['secure_url'];
    $new_image_public_id = $new_image_result['public_id'];

    if (!$new_image_path || !$new_image_public_id) {
        return false;
    }

    return $query_callback($pdo, $new_image_path, $new_image_public_id);
}

// Handle file upload and execute query
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['post_modal_image_picker'])) {
    $target_dir = 'EcoTrace/posts';

    // Callback function to execute the query
    $query_callback = function ($pdo, $new_post_modal_image_picker_path, $new_post_image_public_id) {
        $sql = "INSERT INTO posts_table (userID, image_dir, image_public_id, caption, created_at) 
                  VALUES (?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userID, $new_post_modal_image_picker_path, $new_post_image_public_id, $caption]);

        return $stmt->rowCount() > 0;
    };

    // Process file upload and execute query
    process_file_and_execute_query($pdo, $_FILES['post_modal_image_picker'], $target_dir, $query_callback);
    // You might need to adjust $userID and $caption variables according to your context.
}

?>


