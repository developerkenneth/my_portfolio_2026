
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
changeProfile.addEventListener("click", async (e) => {
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

    // send request
    const userData = {
        email: email,
        name: name,
        id: 1
    }

    try {
        const url = "api/user.php";
        const response = await fetch(url, {
            headers: {
                "Content-Type": "application/json"
            },
            method: "PATCH",
            body: JSON.stringify(userData)
        })

        const data = await response.json();

        if (response.status > 201) {
            showToast(data.message, "error");
            return;

        } else {
            showToast(data.message, "success");
            return;
        }
    } catch (error) {
        showToast("oops an error occured", "error");
        console.error(error);
    }



}); 