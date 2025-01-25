// Wait for the document to be ready
document.addEventListener('DOMContentLoaded', function () {
    
    // Get the form element
    const form = document.querySelector('form');
    
    // Listen for form submission
    form.addEventListener('submit', function(event) {
        event.preventDefault();  // Prevent the default form submission behavior
        
        // Get form input values
        const firstName = document.querySelector('input[name="first_name"]');
        const lastName = document.querySelector('input[name="last_name"]');
        const email = document.querySelector('input[name="email"]');
        const password = document.querySelector('input[name="password"]');

        // Check if the fields are empty
        if (!firstName.value || !lastName.value || !email.value || !password.value) {
            alert("Please fill in all the fields.");
            return;
        }

        // Basic Email Validation (Regex)
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email.value)) {
            alert("Please enter a valid email address.");
            return;
        }

        // Basic Password Validation (at least 6 characters)
        if (password.value.length < 6) {
            alert("Password should be at least 6 characters.");
            return;
        }

        // If validation is successful, display a success message
        alert("Registration successful! You will be redirected to the login page.");
        
        // After confirmation, you can either submit the form or redirect
        // Form submission (uncomment the line below to allow actual form submission)
        // form.submit();
        
        // Alternatively, you can redirect to the login page
        window.location.href = "login.html";  // Redirect to the login page
    });
});
