document.addEventListener('DOMContentLoaded', function() {
    // Check if localStorage has stored email value
    const storedEmail = localStorage.getItem('rememberedEmail');
    if (storedEmail) {
        document.getElementById('login_info').value = storedEmail;
        document.getElementById('rememberMe').checked = true;
    }

    // Event listener for checkbox change
    document.getElementById('rememberMe').addEventListener('change', function() {
        const emailInput = document.getElementById('login_info');
        if (this.checked) {
            // Store email in localStorage
            localStorage.setItem('rememberedEmail', emailInput.value);
        } else {
            // Clear stored email from localStorage
            localStorage.removeItem('rememberedEmail');
        }
    });
});
