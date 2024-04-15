<style>


.comment {
  display: grid;
  gap: 14px;
}
.comment .user-banner {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top:10px;
}
.comment .user-banner .user {
  gap: 5px;
  align-items: center;
  display: flex;
}
.comment .user-banner .user .avatar {
  height: 32px;
  width: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 1px solid transparent;
  position: relative;
  border-radius: 100px;
  font-weight: 500;
  font-size: 13px;
  line-height: 20px;
}
.comment .user-banner .user .avatar img {
  max-width: 100%;
  border-radius: 50%;
}

.comment:not(.comment:first-child) {
  padding-bottom: 12px;
  margin-bottom: 12px;
  border-bottom: 1px solid #c7c7c7;
}

.content {
    color: #646464;
    margin-left:6px;
    margin-top:-10px;
}
.is-mute {
  font-weight: 600;
  font-size: 13px;
  line-height: 20px;
  color: #969696;
  margin-right:6px;
}

a {
  line-height: 16px;  
}

.group-button {
  display: flex;
  gap: 16px;
}

.post-chat-icon:hover {
   fill 
}

.con-check {
  --primary: rgb(50, 100, 255);
  position: relative;
  width: 22px;
  height: 22px;
}


.con-check .check{
  position: absolute;
  width: 100%;
  height: 100%;
  opacity: 0;
  z-index: 20;
}

.con-check .checkmark {
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.con-check .filled {
  position: absolute;
  display:none;
}

.con-check .check:checked ~ .checkmark .filled {
  animation: kfr-filled 0.5s;
  display: block;
}


    </style>

<?php
require_once("../core/db_functions.php");
require_once("../core//utility_functions.php");
require_once("partials/post_functions.php");

function get_likes_text($pdo, $post_id)
{
    $likes_total = count(get_post_likes($pdo, $post_id));
    $like_text = $likes_total === 1 ? 'like' : 'likes';
    return $likes_total . ' ' . $like_text;
}

function get_post_comments($pdo, $post_id) {
    // Prepare SQL query to fetch comments for the given post ID
    $sql = "SELECT * FROM comments_table WHERE post_id = :post_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $stmt->execute();

    // Fetch comments as an associative array
    $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $comments;
}


function calculate_time_ago($created_at) {
    // Convert comment creation time to a Unix timestamp
    $comment_timestamp = strtotime($created_at);

    // Get the current Unix timestamp
    $current_timestamp = time();

    // Calculate the difference in seconds
    $difference = $current_timestamp - $comment_timestamp;

    // Define time periods in seconds
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

    // Loop through each period
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    // Round the difference to the nearest whole number
    $difference = round($difference);

    // Add "s" if the difference is greater than 1
    if ($difference != 1) {
        $periods[$j] .= "s";
    }

    // Return the time ago string
    return "$difference $periods[$j] ago";
}




function display_posts($pdo, $posts)
{
    $userID = $_SESSION['userID'];

    $stmt = $pdo->prepare("SELECT username, profilePicture FROM user WHERE userID = :userID");
    $stmt->execute(['userID' => $userID]);
    $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

    $user_username = $userDetails['username'];
    $user_profile_picture = $userDetails['profilePicture'];


    foreach ($posts as $post) {
        $poster_id = $post['userID'];
        $poster_profile_picture = $post['profilePicture'];
        $profile_pic_compression_settings = "w_200/f_auto,q_auto:eco";
        $profile_pic_transformed_url = add_transformation_parameters($poster_profile_picture, $profile_pic_compression_settings);

        $poster_display_name = $post['user_display_name'];
        $poster_username = $post['username'];

        $post_id = $post['id'];
        $post_image_url = $post['image_dir'];
        $post_img_compression_settings = "w_590/f_auto,q_auto:eco";
        $post_img_transformed_url = add_transformation_parameters($post_image_url, $post_img_compression_settings);


        $caption = $post['caption'] ? nl2br($post['caption']) : '';
        $created_at = $post['created_at'];

        $time_ago = calculate_time_ago($created_at);

        $user_profile_link = "user_profile.php?userID=" . $poster_id;

        $is_current_user = $userID === $poster_id;

        $is_post_liked = does_row_exist($pdo, 'likes_table', 'liker_id', $userID, 'post_id', $post_id);

        $like_checked_attribute = $is_post_liked ? 'checked' : '';

        $is_user_following_poster = does_row_exist($pdo, 'followers_table', 'follower_id', $userID, 'followed_id', $poster_id);

        $dropdown_menu_items = get_dropdown_menu_items($is_current_user, $post_id, false, $is_user_following_poster);

        $likes_text = get_likes_text($pdo, $post_id);
        $comments_count = count(get_post_comments($pdo, $post_id));

        $caption_html = $caption === "" ? "" :
            "
            <div class='d-flex flex-column post-caption-container gap-1'>
                <div class='d-flex align-items-start gap-1'>
                    <div class='caption-text'>
                        <p class='post-caption m-0 fw-medium'>
                            {$caption}
                        </p>
                    </div>
                </div>
            </div>
            ";

        echo "<div class='post d-flex w-100  bg-white p-4 border mb-4' data-post-id='{$post_id}' data-poster-id='{$poster_id}'>
                <div class='w-100 d-flex flex-column align-items-start gap-3'>
                    <div class='px-2 post-top d-flex align-items-center w-100 justify-content-between'>
                        <a href='{$user_profile_link}' class='text-decoration-none'>
                            <div class='post-user-info d-flex align-items-center justify-content-center'>
                                <img class='lazy feed-card-profile-picture me-2 flex-shrink-0' data-src='{$profile_pic_transformed_url}' alt='{$poster_display_name}'s profile picture'>
                                <div class='ps-1 d-flex flex-column'>
                                    <p class='m-0 fw-bold text-body post-poster-display-name'>{$poster_display_name}</p>
                                    <p class='m-0 text-secondary'> <small class='post-poster-username' style = 'font-size:12px;' >@{$poster_username}</small></p>
                                </div>
                            </div>
                        </a>
                        <div class='dropdown'>
                            <i class='bi bi-three-dots w-100 h-100 text-body-tertiary post-more-options-menu-button fs-4' data-bs-toggle='dropdown' aria-expanded='false'></i>
                            <ul class='dropdown-menu p-1'> 
                                {$dropdown_menu_items}
                            </ul>
                        </div>
                    </div>

                    <div class='d-flex flex-column w-100 gap-3'>
                        <img class='lazy feed-post-image' data-src='{$post_img_transformed_url}' alt='Post Image'>

                        <div class='px-2 d-flex flex-column gap-2'>
                            <div class='d-flex w-100'>
                                <div class='d-flex gap-3 align-items-center w-100'>
                                    <div class='con-like cursor-pointer'>
                                        <input type='checkbox' class='like cursor-pointer' {$like_checked_attribute}>
                                        <div class='checkmark'>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-heart outline' fill='currentColor' width='22' height='22' viewBox='0 0 16 16'>
                                                <path d='m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z'/>
                                            </svg>
                                            <svg xmlns='http://www.w3.org/2000/svg' class='bi bi-heart-fill filled text-danger' fill='currentColor' width='22' height='22' viewBox='0 0 16 16'>
                                                <path fill-rule='evenodd' d='M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z'/>
                                            </svg>

                                            <svg class='celebrate' width='100' height='100' xmlns='http://www.w3.org/2000/svg'>
                                                <polygon points='10,10 20,20' class='poly'></polygon>
                                                <polygon points='10,50 20,50' class='poly'></polygon>
                                                <polygon points='20,80 30,70' class='poly'></polygon>
                                                <polygon points='90,10 80,20' class='poly'></polygon>
                                                <polygon points='90,50 80,50' class='poly'></polygon>
                                                <polygon points='80,80 70,70' class='poly'></polygon>
                                            </svg>
                                        </div>   
                                    </div>

                                    <div class='con-check cursor-pointer'>
                                        <input type='checkbox' class='check cursor-pointer'>
                                        <div class='checkmark'>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-chat  outline cursor-pointer post-chat-icon'  viewBox='0 0 16 16'>
                                                <path d='M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z'/>
                                            </svg>
                                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-chat-fill filled text-primary cursor-pointer post-chat-icon' id='icon' viewBox='0 0 16 16' >
                                                <path fill-rule='evenodd' d='M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9 9 0 0 0 8 15'/>
                                            </svg>
                                        </div>   
                                    </div>

                                    <svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-send cursor-pointer' viewBox='0 0 16 16'>
                                        <path d='M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z'/>
                                    </svg>
                                </div>

                                <svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-bookmark justify-self-end cursor-pointer' viewBox='0 0 16 16'>
                                    <path d='M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z'/>
                                </svg>
                            </div>


                            <div class='likes-text-container'>
                                <a type='button'
                                    class='like-text p-1 m-0 fw-semibold cursor-pointer text-decoration-none text-dark'
                                    data-toggle='modal' data-target='#post-likes-modal' id='post-likes-modal-trigger'>
                                    {$likes_text}
                                </a>

                                <a type='button' type='button' class='like-text p-1 m-0 fw-semibold cursor-pointer text-decoration-none text-dark'>
                                    {$comments_count} comments
                                    </a>
                            </div>

                                    

                            {$caption_html}

                            <p class='post-creation-date text-secondary flex-shrink-0 pt-1 m-0'><small>{$time_ago}</small></p>
                        </div>
                    </div>";

                    echo "<div class='comment-container' style='display: none;'>
                    <div class='post-comment-section' style='width:460px';>
                        <hr> <!-- Border after the caption -->
                        <h5><b>Comments</b></h5>"; // Heading for comments
          
          // Retrieve comments for the current post
          $comments = get_post_comments($pdo, $post_id);
          
          // Loop through each comment and display it
          foreach ($comments as $comment) {
              $comment_content = $comment['content'];
              $comment_created_at = $comment['created_at'];
          
              // Calculate time ago for the comment
              $comment_time_ago = calculate_time_ago($comment_created_at); // You need to define this function
          
              echo "<div class='comment'>
                      <div class='user-banner'>
                          <div class='user'>
                              <div class='avatar'>
                                  <img src='{$user_profile_picture}'>
                              </div>  
                              <h6 style='margin-bottom:2px; font-size:15px;'>{$user_username}</h6>                        
                          </div>
                          <span class='is-mute'>{$comment_time_ago}</span> 
                      </div>
                      <div class='content'>
                          <small>{$comment_content}</small>
                      </div>
                    </div>";
          }
          
          // Close the post-comment-section div
          echo "</div>";
          
          // Display the comment input form
          echo "<form class='form-inline' role='form' action='../core/comments.php' method='post' >
                  <input type='hidden' name='post_id' value='{$post_id}'>
                  <div class='input-group' style='margin-top:25px;'>
                      <input class='form-control' type='text' placeholder='Your comments' name='content'/>
                      <div class='input-group-append'>
                          <button class='btn btn-success' type='submit'>
                              <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='currentColor' class='bi bi-arrow-up-short' viewBox='0 0 16 16'>
                                  <path fill-rule='evenodd' d='M8 12a.5.5 0 0 0 .5-.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 .5.5'/>
                              </svg>
                          </button>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>";
    }
}


function display_all_posts()
{
    $pdo = connect_to_db();
    $posts = get_all_posts($pdo);
    display_posts($pdo, $posts);
}

function display_user_posts($userID)
{
    $pdo = connect_to_db();
    $posts = get_user_posts($pdo, $userID);
    display_posts($pdo, $posts);
}
?>
 <script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');
    
    // Check if chat icons are found
    const chatIcons = document.querySelectorAll('.post-chat-icon');
    console.log('Found chat icons:', chatIcons);

    // Attach click event listener to each chat icon
    chatIcons.forEach(icon => {
        icon.addEventListener('click', () => {
            console.log('Chat icon clicked');
            const commentContainer = icon.closest('.post').querySelector('.comment-container');
            console.log('Comment container:', commentContainer);
            
            // Check current visibility state and toggle accordingly
            if (commentContainer.style.display === 'none' || commentContainer.style.display === '') {
                commentContainer.style.display = 'block';
            } else {
                commentContainer.style.display = 'none';
            }
        });
    });
});

</script>
