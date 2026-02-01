// Form Handler for QORTA Demo Requests
// Using Resend API to send emails

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('demo-form');
    const successMessage = document.getElementById('form-success');
    const errorMessage = document.getElementById('form-error');

    if (form) {
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                business: document.getElementById('business').value,
                email: document.getElementById('email').value,
                phone: document.getElementById('phone').value || 'Not provided'
            };

            // Disable submit button
            const submitBtn = form.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;

            try {
                // Submit form data to PHP handler
                const response = await fetch('submit-demo.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams(formData)
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    // Success
                    form.style.display = 'none';
                    successMessage.style.display = 'block';
                    errorMessage.style.display = 'none';
                } else {
                    throw new Error('Email send failed');
                }
            } catch (error) {
                console.error('Error:', error);
                // Show error message
                errorMessage.style.display = 'block';
                successMessage.style.display = 'none';
                
                // Re-enable button
                submitBtn.textContent = originalBtnText;
                submitBtn.disabled = false;
            }
        });
    }
});
