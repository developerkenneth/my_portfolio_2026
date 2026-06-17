
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


const changeProfile = document.querySelector("#changeProfile");
changeProfile.addEventListener("click", (e) => {
    e.preventDefault();

    const name = document.querySelector("#name").value;
    const email = document.querySelector("#emailAddress").value;


    if (name.length < 1 || email.length < 1) {
        showToast('name or email cannot be empty', 'error');
        return;

    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        showToast('Please enter a valid email address.', 'error');
        return;
    }
}); 