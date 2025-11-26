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

    showTerms.addEventListener('click', (e) => {
        e.preventDefault();
        termsModal.style.display = 'block';
    });

    closeTerms.addEventListener('click', (e) => {
        e.preventDefault();
        termsModal.style.display = 'none';
    });

    function showError(input, message) {
        const formControl = input.parentElement;
        const errorDiv = formControl.querySelector(".error");
        errorDiv.textContent = message;
        input.classList.add("error-input");
    }

    function clearErrors(input) {
        const formControl = input.parentElement;
        const errorDiv = formControl.querySelector(".error");
        errorDiv.textContent = "";
        input.classList.remove("error-input");
    }

    function validateForm() {
        let valid = true;

        if (email.value.trim() === '') {
            showError(email, "Email is required");
            valid = false;
        } else {
            clearErrors(email);
        }

        if (username.value.trim() === '') {
            showError(username, "Username is required");
            valid = false;
        } else {
            clearErrors(username);
        }

        if (firstname.value.trim() === '') {
            showError(firstname, "First name is required");
            valid = false;
        } else {
            clearErrors(firstname);
        }

        if (lastname.value.trim() === '') {
            showError(lastname, "Last name is required");
            valid = false;
        } else {
            clearErrors(lastname);
        }

        if (pword.value.trim() === "") {
            showError(pword, "Password is required");
            valid = false;
        } else if (pword.value !== pword2.value) {
            showError(pword2, "Passwords do not match");
            valid = false;
        } else {
            clearErrors(pword);
            clearErrors(pword2);
        }

        if (!terms.checked) {
            showError(terms, "You must agree to the terms");
            valid = false;
        } else {
            clearErrors(terms);
        }

        return valid;
    }

        form.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!validateForm()) return;

        const formData = new FormData(form);

        try {
            const response = await fetch('registration.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();

            if (result.success) {
                window.location.href = "login.php";
            } else {
                alert(result.message || "Registration failed.");
            }

        } catch (error) {
            alert("Error: " + error.message);
        }
    });
});

