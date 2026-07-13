// Sidebar Toggle functionality for mobile devices
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');
    const closeBtn = document.getElementById('sidebarClose');

    function toggleSidebar() {
        if (sidebar && overlay) {
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }
    }

    if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
    if (closeBtn) closeBtn.addEventListener('click', toggleSidebar);
    if (overlay) overlay.addEventListener('click', toggleSidebar);

    // Bind password strength checker if element exists
    const newPassInput = document.getElementById('new_password');
    if (newPassInput) {
        newPassInput.addEventListener('input', (e) => {
            const val = e.target.value;
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[a-z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;

            const bar = document.getElementById('passwordStrengthBar');
            const text = document.getElementById('passwordStrengthText');
            if (bar && text) {
                let width = '0%';
                let color = 'var(--text-muted)';
                let label = 'Too Short';

                if (val.length === 0) {
                    width = '0%';
                    label = '';
                } else if (val.length < 8) {
                    width = '20%';
                    color = 'var(--danger)';
                    label = 'Weak (Min 8 chars)';
                } else {
                    switch (score) {
                        case 1:
                        case 2:
                            width = '40%';
                            color = 'var(--danger)';
                            label = 'Weak';
                            break;
                        case 3:
                            width = '60%';
                            color = 'var(--warning)';
                            label = 'Fair (Add uppercase/number)';
                            break;
                        case 4:
                            width = '80%';
                            color = 'var(--primary)';
                            label = 'Good';
                            break;
                        case 5:
                            width = '100%';
                            color = 'var(--success)';
                            label = 'Strong';
                            break;
                    }
                }
                bar.style.width = width;
                bar.style.backgroundColor = color;
                text.textContent = label;
                text.style.color = color;
            }
        });
    }
});

// Make helper functions available globally for inline blade onclick handlers
window.togglePassword = function (inputId = 'password') {
    const passwordInput = document.getElementById(inputId);
    if (passwordInput) {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    }
};

window.previewProfileImage = function (input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const preview = document.getElementById('imagePreview');
            if (preview) {
                preview.src = e.target.result;
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
};

// Custom modal confirmation for delete
let activeDeleteForm = null;

window.showDeleteModal = function (event, userId, userName) {
    event.preventDefault();
    activeDeleteForm = event.target.closest('form');
    
    const modal = document.getElementById('deleteConfirmModal');
    const deleteName = document.getElementById('deleteUserName');
    if (modal && deleteName) {
        deleteName.textContent = userName;
        modal.classList.add('active');
    }
};

window.closeDeleteModal = function () {
    const modal = document.getElementById('deleteConfirmModal');
    if (modal) {
        modal.classList.remove('active');
    }
    activeDeleteForm = null;
};

window.confirmDelete = function () {
    if (activeDeleteForm) {
        activeDeleteForm.submit();
    }
};
