<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require ('../accounts.php');


function connect_to_db()
{
    require_once 'config.php';

    $dsn = "mysql:host=" . DB_CONFIG['host'] . ";dbname=" . DB_CONFIG['db'];
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4' COLLATE 'utf8mb4_unicode_ci'",
    ];

    try {
        return new PDO($dsn, DB_CONFIG['user'], DB_CONFIG['pass'], $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
}

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


function add_post($pdo, $userID, $caption)
{
    $target_dir = 'EcoTrace/posts';

    $query_callback = function ($pdo, $new_post_modal_image_picker_path, $new_post_image_public_id) use ($userID, $caption) {
        $sql = "INSERT INTO posts_table (userID, image_dir, image_public_id, caption, created_at) 
                  VALUES (?, ?, ?, ?, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$userID, $new_post_modal_image_picker_path, $new_post_image_public_id, $caption]);

        return $stmt->rowCount() > 0;
    };

    return process_file_and_execute_query($pdo, $_FILES['post_modal_image_picker'], $target_dir, $query_callback);
}

function get_user_by_credentials($pdo, $username, $password)
{

    $sql = "SELECT * 
              FROM user 
              WHERE username = ?
                OR email = ?
                OR phone_number = ?;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $username,
        $username,
        $username
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return false;
    }

    $hashed_password = $row['password'];

    if (password_verify($password, $hashed_password)) {
        return $row;
    }

    return false;
}

function get_user_info_from_username($pdo, $username)
{

    $sql = "SELECT * 
              FROM user 
              WHERE username = ?
                OR email = ?
                OR phone_number = ?;";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $username,
        $username,
        $username
    ]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        return false;
    }

    return $row;
}

function fetch_posts($pdo, $sql)
{
    $stmt = $pdo->query($sql);
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}

function get_all_posts($pdo)
{
    $sql = "SELECT p.*, u.username, u.user_display_name, u.profilePicture
              FROM posts_table AS p
              JOIN user AS u ON p.userID = u.userID
              ORDER BY p.created_at DESC;
              ";

    return fetch_posts($pdo, $sql);
}

function get_user_posts($pdo, $userID)
{
    $sql = "SELECT p.*, u.username, u.user_display_name, u.profilePicture
              FROM posts_table AS p
              JOIN user AS u ON p.userID = u.userID
              WHERE u.userID = $userID
              ORDER BY p.created_at DESC;
              ";

    return fetch_posts($pdo, $sql);
}

function get_user_post_count($pdo, $userID)
{
    $sql = "SELECT COUNT(*) AS post_count FROM posts_table WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC)['post_count'];
    return $row;
}

function get_all_users($pdo)
{
    $sql = "SELECT id, username, user_display_name, profilePicture FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $profiles = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $profiles[] = $row;
    }

    return $profiles;
}

function get_row_by_id($pdo, $table_name, $row_id)
{
    $sql = "SELECT * 
              FROM $table_name
              WHERE id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$row_id]);

    if (!$stmt || $stmt->rowCount() === 0) {
        return false;
    }

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function get_user_info($pdo, $userID)
{
    $sql = "SELECT * FROM user WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);

    // Check if the query executed successfully
    if ($stmt) {
        // Fetch the user information
        $user_info = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user_info;
    } else {
        // Handle the case where the query fails
        return false;
    }
}

function get_users_info($pdo, $userIDs)
{
    $placeholders = implode(',', array_fill(0, count($userIDs), '?'));
    $sql = "SELECT id, username, user_display_name, profilePicture 
            FROM user 
            WHERE id IN ($placeholders)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($userIDs);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_post($pdo, $post_id)
{
    return get_row_by_id($pdo, 'posts_table', $post_id);
}

function update_post($pdo, $post_id, $new_caption)
{
    $new_image_file = $_FILES['post_modal_image_picker'];
    $new_image_path = null;
    $is_image_updated = !empty($new_image_file['name']);
    $is_caption_updated = isset($new_caption);
    $is_post_updated = $is_caption_updated || $is_image_updated;

    if ($is_post_updated) {
        if ($is_caption_updated && $is_image_updated) {
            $target_dir = 'EcoTrace/posts';
            $image_public_id = get_image_public_id_from_post($pdo, $post_id);
            $new_image_path = upload_image_to_cloudinary($new_image_file, $target_dir, $image_public_id)['secure_url'];

            $sql = "UPDATE posts_table SET 
              image_dir = ?,
              caption = ?,
              updated_at = NOW()
              WHERE id = ?";

            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$new_image_path, $new_caption, $post_id]);
        }
        if ($is_caption_updated) {
            $sql = "UPDATE posts_table SET 
              caption = ?,
              updated_at = NOW()
              WHERE id = ?";

            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$new_caption, $post_id]);
        }
        if ($is_image_updated) {
            $target_dir = 'EcoTrace/posts';
            $image_public_id = get_image_public_id_from_post($pdo, $post_id);
            $new_image_path = upload_image_to_cloudinary($new_image_file, $target_dir, $image_public_id)['secure_url'];

            $sql = "UPDATE posts_table SET 
              image_dir = ?,
              updated_at = NOW()
              WHERE id = ?";

            $stmt = $pdo->prepare($sql);
            return $stmt->execute([$new_image_path, $post_id]);
        }
    }
    return true;
}

function update_user_profile($pdo, $userID, $new_display_name, $new_bio)
{
    $new_image_file = $_FILES['profile_picture_picker'];
    $is_image_updated = !empty($new_image_file['name']);
    $is_display_name_updated = isset($new_display_name);
    $is_bio_updated = isset($new_bio);
    $is_profile_updated = $is_display_name_updated || $is_image_updated || $is_bio_updated;

    $new_image_url = '';

    if ($is_profile_updated) {
        $target_dir = 'EcoTrace/profile-pictures';
        $image_public_id = get_image_public_id_from_user($pdo, $userID);

        if ($is_image_updated) {
            $new_image_url = upload_image_to_cloudinary($new_image_file, $target_dir, $image_public_id)['secure_url'];
            $_SESSION['profilePicture'] = $new_image_url;
        }

        $sql = "UPDATE user SET 
            profilePicture = IF(:is_image_updated, :new_image_url, profilePicture),
            user_display_name = IF(:is_display_name_updated, :new_display_name, user_display_name),
            user_bio = IF(:is_bio_updated, :new_bio, user_bio)
            WHERE userID = :userID";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':is_image_updated', $is_image_updated, PDO::PARAM_BOOL);
        $stmt->bindParam(':new_image_url', $new_image_url);
        $stmt->bindParam(':is_display_name_updated', $is_display_name_updated, PDO::PARAM_BOOL);
        $stmt->bindParam(':new_display_name', $new_display_name);
        $stmt->bindParam(':is_bio_updated', $is_bio_updated, PDO::PARAM_BOOL);
        $stmt->bindParam(':new_bio', $new_bio);
        $stmt->bindParam(':userID', $userID);

        return $stmt->execute();
    }
}

function delete_image_from_cloudinary($public_id)
{
    require_once '../vendor/autoload.php';

    try {
        $result = (new Cloudinary\Api\Upload\UploadApi())->destroy($public_id);
        return !empty($result) && $result['result'] == 'ok';
    } catch (\Exception $e) {
        return false;
    }
}

function get_image_public_id_from_user($pdo, $userID)
{
    $sql = "SELECT image_public_id FROM user WHERE userID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['image_public_id'])) {
        return $result['image_public_id'];
    } else {
        return null;
    }
}

function get_image_public_id_from_post($pdo, $post_id)
{
    $sql = "SELECT image_public_id FROM posts_table WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result && isset($result['image_public_id'])) {
        return $result['image_public_id'];
    } else {
        return null;
    }
}

function delete_post($pdo, $post_id)
{
    $sql = "DELETE FROM posts_table WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id]);

    return $stmt->rowCount() > 0;
}

function delete_post_with_image($pdo, $post_id)
{
    $image_public_id = get_image_public_id_from_post($pdo, $post_id);

    $image_deleted = delete_image_from_cloudinary($image_public_id);

    if (!$image_deleted) {
        return false;
    }

    $post_deleted = delete_post($pdo, $post_id);

    if (!$post_deleted) {
        return false;
    }

    return true;
}

function does_value_exist($pdo, $table, $column, $value)
{
    $sql = "SELECT * FROM $table WHERE $column = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$value]);
    $result = $stmt->fetchAll();
    return count($result) > 0;
}

function does_row_exist($pdo, $table, $column1, $value1, $column2, $value2)
{
    $sql = "SELECT * FROM $table WHERE $column1 = ? AND $column2 = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$value1, $value2]);
    $result = $stmt->fetchAll();
    return count($result) > 0;
}

function add_like($pdo, $liker_id, $post_id)
{
    $sql = "INSERT INTO likes_table (liker_id, post_id) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$liker_id, $post_id]);

    return $stmt->rowCount() > 0;
}

function remove_like($pdo, $liker_id, $post_id)
{
    $sql = "DELETE FROM likes_table WHERE liker_id = ? AND post_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$liker_id, $post_id]);

    return $stmt->rowCount() > 0;
}

function get_post_likes($pdo, $post_id)
{
    $sql = "SELECT u.*
            FROM user AS u
            JOIN likes_table AS l ON u.userID = l.liker_id
            WHERE l.post_id = ?
            ORDER BY liked_at;
            ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$post_id]);

    $profiles = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $profiles[] = $row;
    }

    return $profiles;
}

function get_user_followers(PDO $pdo, $userID)
{
    $sql = "SELECT u.* 
            FROM user u 
            INNER JOIN followers_table f ON u.userID = f.follower_id
            WHERE f.followed_id = :userID";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function get_followed_users_by_user(PDO $pdo, $userID)
{
    $sql = "SELECT u.* 
            FROM user u 
            INNER JOIN followers_table f ON u.userID = f.followed_id
            WHERE f.follower_id = :userID";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userID', $userID, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function follow_user(PDO $pdo, $follower_id, $followed_id)
{
    $sql = "INSERT INTO followers_table (follower_id, followed_id) VALUES (:follower_id, :followed_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
    $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
    $success = $stmt->execute();
    return $success;
}

function unfollow_user(PDO $pdo, $follower_id, $followed_id)
{
    $sql = "DELETE FROM followers_table WHERE follower_id = :follower_id AND followed_id = :followed_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':follower_id', $follower_id, PDO::PARAM_INT);
    $stmt->bindParam(':followed_id', $followed_id, PDO::PARAM_INT);
    $success = $stmt->execute();
    return $success;
}
?>