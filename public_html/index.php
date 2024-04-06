<?php
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <title>EcoHub</title>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/minisearch@6.1.0/dist/umd/index.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style6.css">

    <script type="module" src="scripts/search-result.js" defer></script>
    <script src="scripts/lazy-load.js" defer></script>

    <script type="module" src="scripts/post-modal-handler.js" defer></script>
    <script type="module" src="scripts/post-more-options-handler.js" defer></script>
    <script type="module" src="scripts/post-likes-modal-handler.js" defer></script>
    <script type="module" src="scripts/post-interactions-handler.js" defer></script>
    <script type="module" src="scripts/follow-handler.js" defer></script>
</head>

<body class="h-100 w-100 m-0 p-0">
    <?php include('partials/post_modal.php') ?>
    <?php include('partials/delete_post_modal.php') ?>
    <?php include('partials/post_likes_modal.php') ?>
    <?php include('partials/toast.php') ?>
    <div class="w-100 h-100 body-container container-fluid border-start m-0 p-0">
    <?php require_once('post_display.php');?>
      <?php include('partials/header.php'); ?>

        <?php
        if(isset($_GET['badgeImageUrl'])) {
            // If present, include the post_modal.php file
            include('partials/post_modal.php');
            // Output JavaScript code to trigger the modal when the page loads
            echo "<script>
                document.addEventListener('DOMContentLoaded', () => {
                    console.log('DOMContentLoaded event fired.');

                    const showModal = (mode, postId = null) => {
                        const modal = new bootstrap.Modal(document.getElementById('post-modal'));
                        modal.show();
                    };

                    const headerPostModalTrigger = document.getElementById('post-modal-trigger');
                    if(headerPostModalTrigger) {
                        console.log('Click event triggered on header post modal trigger.');
            
                        showModal('create');
                        document.body.classList.add('modal-open');

                        headerPostModalTrigger.click();

                        const badgeImageUrl = '../{$_GET['badgeImageUrl']}';
                        const postModalImage = document.getElementById('post-modal-image');
                        const postModalImagePicker = document.getElementById('post-modal-image-picker');

                        postModalImage.src = badgeImageUrl;
                
                        // Hide the file input and display the image
                        postModalImage.classList.remove('d-none');
                        postModalImagePicker.classList.add('d-none');

                        // Extract the badge name from the URL
                        const badgeName = badgeImageUrl.split('/').pop().replace(/\.[^/.]+$/, '');

              
                        const defaultCaption = 'Check out my awesome badge! 🌱 Let\'s make a positive impact together by reducing our carbon footprint! #GoGreen #EcoFriendly';
                        const postModalCaption = document.getElementById('post-modal-caption');
                        
                        // Set the default value of the textarea
                        postModalCaption.value = defaultCaption;

                        
                        function uploadFileToServer(file) {
                            const formData = new FormData();
                            formData.append('post_modal_image_picker', file);

                            // Send the FormData object to the server using AJAX
                            fetch('../core/upload_badge.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => {
                                // Handle the server response
                                console.log('File upload response:', response);
                            })
                            .catch(error => {
                                console.error('Error uploading file:', error);
                            });
                        }

                        // Trigger file upload and handle image upload on server-side
                        fetch(badgeImageUrl)
                            .then(response => response.blob())
                            .then(blob => {
                                const file = new File([blob], 'badge_image.png', { type: 'image/png' });
                                uploadFileToServer(file);
                            })
                            .catch(error => {
                                console.error('Error fetching badge image:', error);
                            });

                         
                    }
                    else {
                        console.log('Header post modal trigger element not found.'); 
                    }
                });
                </script>";
        }
        ?>
    
        <?php include('partials/sidebar.php'); ?>
        <main class="page-home d-flex flex-column h-100 bg-light align-items-center justify-content-start">
            <div
                class="d-flex feed-container flex-column pt-5 pb-5 align-items-start align-items-center justify-content-center">
                <div class="feed-top w-100 mb-4" style="margin-right:25%;">
                    <p class="h3 fw-semibold" >Feed</p>
                </div>
                <div class="feed-posts-container d-flex flex-column align-items-center justify-content-center gap-4">
                    <?php display_all_posts() ?>
                </div>
            </div>
        </main>
        <?php include('partials/footer.php'); ?>
    </div>
</body>
</html>