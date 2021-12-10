const searchBar = document.querySelector('.users .search input'),
      searchBtn = document.querySelector('.users .search button'),
      usersList = document.querySelector('.users .users-list');

/* Search Bar Functioning */
searchBtn.onclick = () => {
    searchBar.classList.toggle('active');
    searchBtn.classList.toggle('active');
    searchBar.focus();
    searchBar.value = ''; // cleans the previous search values
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/search.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}

/* Making users-list dynamic using AJAX */
setInterval(() => {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'php/users.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response

                // If search bar is not active, we want all users listed
                if (! searchBar.classList.contains('active')) {
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // This function will run frequently after 500ms
         // Due to this, if new users sign up or previous users become active, the page automatically refreshes the data
