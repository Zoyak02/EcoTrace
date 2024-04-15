<style>
    .custom-red-button {
        background-color: #dc3545; /* Darker shade of red */
        border-color: #dc3545; /* Border color same as background */
    }

    .custom-red-button:hover {
        background-color: #9c1d26; /* Even darker shade of red on hover */
        border-color: #9c1d26;
        color : white; /* Border color same as background on hover */
    }
</style>

<nav class="header navbar navbar-light fixed-top bg-white w-100 border-bottom-1 m-0 p-0 border-bottom flex-nowrap">
    <div class="container-fluid d-flex justify-content-between w-100 pt-2 pe-5 pb-2 ps-5">
        <a class="navbar-brand d-flex align-items-center justify-content-center align-self-start gap-2"
            href="../index.php">
            <img src="../images/EcoTrace Logo.png" width="50" height="50" class="d-inline-block align-top" alt="">
            <p class="h4 m-0 p-0">EcoHub</p>
        </a>

        <div class="form-group has-search d-flex align-items-center flex-column">
            <form id="search-bar-form" autocomplete="off">
                <div class="autocomplete d-flex align-items-center" style="width:300px;">
                    <span class="bi bi-search form-control-feedback"></span>
                    <input id="search-bar" type="search" class="form-control mr-sm-2 bg-light" placeholder="Search"
                        aria-label="Search">
                </div>
                <ul id="search-results"
                    class="d-flex flex-column align-items-center justify-content-center m-0 p-0 mt-2 p-2 border rounded gap-2 hidden">
                </ul>
            </form>
        </div>

        <button type="button"
            class="btn btn-success d-flex align-items-center justify-content-center text-nowrap fw-semibold"
            data-toggle="modal" data-target="#post-modal" id="post-modal-trigger">
            <i class="bi bi-plus fs-4 d-flex me-1"></i>
            Create Post
        </button>
    </div>
</nav>