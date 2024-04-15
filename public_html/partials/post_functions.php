<?php

function get_dropdown_menu_item($icon_class, $text, $post_id)
{
    $custom_class_name = '';
    $delete_modal_attributes = '';
    $link_href = '';

    if ($text === 'Follow' || $text === 'Unfollow') {
        $custom_class_name = 'post-follow-button';
    }

    if ($text === 'Delete') {
        $custom_class_name = 'delete-post-button';
        $delete_modal_attributes = "data-bs-toggle='modal' data-bs-target='#modal-confirm-delete-post'";
    }

    if ($text === 'Copy link') {
        $custom_class_name = 'post-copy-link-button';
    }

    if ($text === 'Edit') {
        $custom_class_name = 'post-edit-button';
    }

    if ($text === 'Go to post') {
        $custom_class_name = 'go-to-post-button';
        $link_href = 'href="post.php?post_id=' . $post_id . '"';
    }

    return "
        <a $link_href class='$custom_class_name dropdown-item px-2 py-1 d-flex rounded align-items-center mb-1' $delete_modal_attributes>
            <li class='d-flex w-100 gap-2 align-items-center rounded'>
                <i class='$icon_class d-flex align-items-center justify-content-center'></i>
                <p class='m-0'>$text</p>
            </li>
        </a>
    ";
}

function get_dropdown_menu_items($is_current_user, $post_id, $is_post_page, $is_user_following_poster = false)
{
    $delete_menu_item = get_dropdown_menu_item('bi bi-trash', 'Delete', $post_id);
    $edit_menu_item = get_dropdown_menu_item('bi bi-pencil-square', 'Edit', $post_id);

    if ($is_user_following_poster) {
        $follow_menu_item = get_dropdown_menu_item('bi bi-person-dash', 'Unfollow', $post_id);
    } else {
        $follow_menu_item = get_dropdown_menu_item('bi bi-person-plus', 'Follow', $post_id);
    }

    $go_to_post_menu_item = get_dropdown_menu_item('bi bi-box-arrow-up-right', 'Go to post', $post_id);
    $copy_link_menu_item = get_dropdown_menu_item('bi bi-link-45deg', 'Copy link', $post_id);

    $dropdown_menu_items = $is_current_user ? $delete_menu_item . $edit_menu_item : $follow_menu_item;
    $dropdown_menu_items .= $is_post_page ? $copy_link_menu_item : $go_to_post_menu_item . $copy_link_menu_item;

    return $dropdown_menu_items;
}
?>