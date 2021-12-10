const form = document.querySelector('.chat-area .typing-area'),
      sendBtn = form.querySelector('button');

form.onsubmit = (e) => {
    e.preventDefault()      // Preventing form from submitting
}

/* Inserting chat msg data into database */
sendBtn.onclick = () => {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/chat-insert.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                inputField.value = "";  //Input Field becomes blank after insertion of message into database
            }
        }
    }
    // Sending form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}