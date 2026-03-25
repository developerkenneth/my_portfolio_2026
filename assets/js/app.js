const dateSpan = document.querySelectorAll(".date");
const date = new Date();

dateSpan.forEach(span => {
    span.textContent = date.getFullYear();
});

// Contact form validation
const contactForm = document.querySelector('form');
if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const message = document.getElementById('message').value.trim();

        // Validation
        if (!name) {
            showToast('Please enter your full name.', 'error');
            return;
        }

        if (!email) {
            showToast('Please enter your email address.', 'error');
            return;
        }

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            showToast('Please enter a valid email address.', 'error');
            return;
        }

        if (!message) {
            showToast('Please enter your message.', 'error');
            return;
        }

        // If all validations pass
        const formData = {
            name: name,
            email: email,
            message: message,
            timestamp: new Date().toISOString()
        };

        // Send data to API
        sendContactData(formData);
    });
}

function showToast(message, type) {
    Toastify({
        text: message,
        duration: 3000,
        gravity: "top",
        position: "right",
        backgroundColor: type === 'success' ? "#10b981" : "#ef4444",
        stopOnFocus: true,
    }).showToast();
}

async function sendContactData(data) {
    try {
        const response = await fetch('/api/contact.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(data)
        });

        if (response.ok) {
            const result = await response.json();
            showToast('Message sent successfully! I\'ll get back to you soon.', 'success');
            contactForm.reset();
        } else {
            throw new Error('Failed to send message');
        }
    } catch (error) {
        console.error('Error sending contact data:', error);
        showToast('Failed to send message. Please try again later.', 'error');
    }
}