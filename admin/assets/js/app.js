// Dark mode detection and application
function applyTheme() {
    const savedTheme = localStorage.getItem('theme');
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
    const html = document.documentElement;

    if (savedTheme === 'dark' || (!savedTheme && prefersDark)) {
        html.classList.add('dark');
        updateToggleIcon(true);
    } else {
        html.classList.remove('dark');
        updateToggleIcon(false);
    }
}

function toggleTheme() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        updateToggleIcon(false);
    } else {
        html.classList.add('dark');
        localStorage.setItem('theme', 'dark');
        updateToggleIcon(true);
    }
}

function updateToggleIcon(isDark) {
    const toggleBtn = document.getElementById('dark-mode-toggle');
    if (toggleBtn) {
        const icon = toggleBtn.querySelector('.material-symbols-outlined');
        if (icon) {
            icon.textContent = isDark ? 'light_mode' : 'dark_mode';
        }
    }
}

// Apply theme on load
applyTheme();

// Listen for changes in user's color scheme preference
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', applyTheme);

// Add toggle event listener
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('dark-mode-toggle');
    if (toggleBtn) {
        toggleBtn.addEventListener('click', toggleTheme);
    }
});

const dateSpan = document.querySelectorAll(".date");
const date = new Date();

dateSpan.forEach(span => {
    span.textContent = date.getFullYear();
});
