import { addTransformationParameters } from "./utility-functions.js";
import { getUsersList } from "./request-utils.js";

getUsersList()
  .then((data) => {
    const searchInput = document.getElementById("search-bar");
    const resultsContainer = document.getElementById("search-results");

    const miniSearch = new MiniSearch({
      fields: ["username", "user_display_name"],
      storeFields: ["id", "username", "user_display_name", "profilePicture"],
    });
    miniSearch.addAll(data);

    const showResultsContainer = () => {
      if (resultsContainer.classList.contains("hidden")) {
        resultsContainer.classList.remove("hidden");
      }
    };

    const hideResultsContainer = () => {
      if (!resultsContainer.classList.contains("hidden")) {
        resultsContainer.classList.add("hidden");
      }
    };

    const displayResults = (results) => {
      let html = "";
      results.forEach((result) => {
       `<?php
        // PHP code to retrieve profile picture based on userID
        $sql = "SELECT profilePicture FROM user WHERE id = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $result.id); 
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $profilePicture);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        ?>
`
        // JavaScript code to display search results
        
        const profilePicTransformedUrl = `<?php echo $profilePicture; ?>`
    

        html += `
          <li class="search-result-item w-100">
            <a href="user_profile.php?userID=${result.id}"
              class="text-decoration-none w-100 d-flex gap-2 p-2 align-items-center justify-content-start">
              <img class='search-result-profile-picture flex-shrink-0' src='${profilePicTransformedUrl}' alt='${result.user_display_name}'s profile picture'>
              <p class="search-result-text text-nowrap m-0 fw-semibold fs-6 overflow-hidden flex-shrink-0 fs-6 text-body">${result.user_display_name}</p>
              <p class="search-result-text text-nowrap m-0 text-secondary fs-6 overflow-hidden ellipsis fs-6">@${result.username}</p>
            </a>
          </li>`;
      });
      resultsContainer.innerHTML = html;
    };

    const handleSearchInput = () => {
      const query = searchInput.value.trim();
      const results = miniSearch.search(query, { prefix: true, fuzzy: 0.2 });
      displayResults(results);

      if (searchInput.value.trim() === "" || results.length === 0) {
        hideResultsContainer();
        return;
      }
      showResultsContainer();
    };

    searchInput.addEventListener("input", handleSearchInput);
  })
  .catch((error) => {
    console.error("Error:", error);
  });
