// Attach an event listener to the search input field
const searchInput = document.getElementById("search-bar");
const searchResults = document.getElementById("search-results");

function updateSearchResults(searchQuery) {
    // Clear the previous search results
    searchResults.innerHTML = "";

    if (searchQuery === "") {
        // If the search bar is empty, fetch and display all results
        fetchAllResults();
        return;
    }

    // Send a request to fetch new search results
    fetch(`search.php?query=${searchQuery}`)
        .then(response => response.json())
        .then(data => {
            displayResults(data);
        })
        .catch(error => {
            console.error("An error occurred:", error);
        });
}

// Fetch and display all results
function fetchAllResults() {
    fetch(`search.php?query=all`)
        .then(response => response.json())
        .then(data => {
            displayResults(data);
        })
        .catch(error => {
            console.error("An error occurred:", error);
        });
}

// Function to display search results
function displayResults(results) {
    if (results.length === 0) {
        searchResults.innerHTML = "No results found.";
    } else {
        const resultList = document.createElement("ul");
        results.forEach(result => {
            const listItem = document.createElement("li");
            listItem.textContent = result.name; // Replace 'name' with the appropriate field from your database
            resultList.appendChild(listItem);
        });
        searchResults.appendChild(resultList);
    }
}

// Attach an input event listener to the search bar
searchInput.addEventListener("input", function () {
    const searchQuery = this.value.trim(); // Trim whitespace from the search query
    updateSearchResults(searchQuery);
});

// Initially fetch and display all results
fetchAllResults();