document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('form');
    const email = document.getElementById('email');
    const username = document.getElementById('username');
    const firstname = document.getElementById('firstname');
    const lastname = document.getElementById('lastname');
    const pword = document.getElementById('pword');
    const pword2 = document.getElementById('pword2');
    const terms = document.getElementById('terms');
    const showTerms = document.getElementById('show-terms');
    const termsModal = document.getElementById('terms-modal');
    const closeTerms = document.getElementById('close-terms');

    showTerms.addEventListener('click', () => {
        e.preventDefault();
        termsModal.style.display = 'block';
    });

    closeTerms.addEventListener('click', () => {
        e.preventDefault();
        termsModal.style.display = 'none';
    });

    function clearErrors(input) {
        const formControl = input.parentElement;
        const errorDiv = formControl.querySelector(".error");
        errorDiv.textContent = message;
        input.classList.remove('error-input');
    }

    async function checkUsername(usernameValue) {
        const response = await fetch('check_username.php?username=' + encodeURIComponent(usernameValue));
        const data = await response.json();
        return data.exists;
    }
    async function validateForm() {
        let valid = true;

    }

    function vaidateForm() {
        let valid = true;

        if (emaail.value.trim() === '') {
            showError(email, 'Email is required');
            valid = false;
            } else if (!/\S+@\S+\.\S+/.test(email.value)) {
            showError(email, 'Email is not valid');
            valid = false;
            } else {
            clearErrors(email);
        }

        if (username.value.trim() === '') {
            showError(username, 'Username is required');
            valid = false;
            } else {
            clearError(username);
            }


        if (firstname.value.trim() === '') {
            showError(firstname, 'First name required');
            valid = false;
            } else {
            clearErrors(firstname);
        }

        if (lastname.value.trim() === '') {
            showError(lastname, 'Last name required');
            valid = false;
            } else {
            clearErrors(lastname);
        }

        if (pword.value.trim() === '') {
            showError(pword, 'Password is required');
            valid = false;
            } else if (pword2.value !== pword.value) {
            showError(pword2, 'Passwords do not match');
            valid = false;
            } else {
            clearErrors(pword2);
            clearErrors(pword);
        }

        if (!terms.checked) {
            showError(terms, 'You must agree to the terms');
            valid = false;
            } else {
            clearErrors(terms);
        }

        return valid;
    }

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        if (!vaidateForm()) return;
        const formData = new FormData(form);
        
        try {
            const response = await fetch('registration.php', {
                method: 'POST',
                body: formData 
            });
            const result = await response.text();

            if (response.ok) {
                alert('Registration successful!');
                window.location.href = 'login.html';
            } else {
                alert('Registration failed: ' + result);
            }
        } catch (error) {
            alert('An error occurred: ' + error.message);
        }
    });
});