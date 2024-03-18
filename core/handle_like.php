<?php
require_once 'db_functions.php';

function execute($params)
{
    $pdo = connect_to_db();

    $params = json_decode($params, true);

    $like_action = isset($params['like_action']) ? trim($params['like_action']) : '';
    $userID = isset($params['userID']) ? trim($params['userID']) : '';
    $post_id = isset($params['post_id']) ? trim($params['post_id']) : '';

    if (empty($userID) || empty($post_id)) {
        return ['success' => false, 'error' => 'Invalid request: missing userID or post_id parameter'];
    }

    $success = $like_action === 'add' ? add_like($pdo, $userID, $post_id) : remove_like($pdo, $userID, $post_id);

    if ($success) {
        return ['success' => true];
    }
    return ['success' => false, 'error' => 'Unable to add the like'];
}
?>