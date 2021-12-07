/* Password Show/Hide using the eye button */

const passwordField = document.querySelector('.form .field input[type="password"]'),
      toggleBtn = document.querySelector('.form .field i')

toggleBtn.onclick = () => {
    
    if (passwordField.type == 'password') {
        passwordField.type = 'text'          /* toggle to show/hide text */
        toggleBtn.classList.add('active')    /* toggle to change eye icon */
    } 
    else {
        passwordField.type = 'password'
        toggleBtn.classList.remove('active')
    }
}
