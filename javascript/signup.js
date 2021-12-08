const form = document.querySelector('.signup form'),
      continueBtn = form.querySelector('.button input'),
      errorText = form.querySelector('.error-txt');

form.onsubmit = (e) => {
    e.preventDefault();      // Preventing form from submitting
}

continueBtn.onclick = () => {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/signup.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == 'SUCCESS!') {
                    location.href = 'users.php';
                }
                else {
                    errorText.textContent = data;
                    errorText.style.display = 'block';
                }
            }
        }
    }
    // Sending form data through ajax to php
    let formData = new FormData(form)
    xhr.send(formData)
}