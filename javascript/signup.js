const form = document.querySelector('.signup form'),
      continueBtn = form.querySelector('.button input');

form.onsubmit = (e) => {
    e.preventDefault();      // Preventing form from submitting
}

continueBtn.onclick = () => {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/signup.php', true);
    xhr.onload = () => {}
    xhr.send();
}