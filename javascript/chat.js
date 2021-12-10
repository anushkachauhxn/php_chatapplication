const form = document.querySelector('.chat-area .typing-area'),
      inputField = form.querySelector('.input-field'),
      sendBtn = form.querySelector('button'),
      chatBox = document.querySelector('.chat-area .chat-box');

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

/* Making chat-area dynamic using AJAX */
setInterval(() => {
    // AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/chat-get.php', true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }
    // Sending form data through ajax to php
    let formData = new FormData(form);
    xhr.send(formData);
}, 500); // This function will run frequently after 500ms
         // Due to this, if new users sign up or previous users become active, the page automatically refreshes the data
