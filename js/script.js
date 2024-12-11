   // Lấy nút chuyển chế độ và kiểm tra trạng thái chế độ tối
            const themeToggleButton = document.getElementById("theme-toggle");
            const themeIcon = document.getElementById("theme-icon");

            // Kiểm tra nếu chế độ tối đã được lưu trong localStorage
            if (localStorage.getItem("theme") === "dark") {
                document.body.classList.add("dark-mode");
                themeIcon.src = "img/moon-icon.png";  // Đổi biểu tượng sang mặt trăng
            }

            // Thêm sự kiện click cho nút chuyển chế độ 
            themeToggleButton.addEventListener("click", function () {
                document.body.classList.toggle("dark-mode");

                // Lưu trạng thái chế độ vào localStorage để nhớ khi tải lại trang
                if (document.body.classList.contains("dark-mode")) {
                    localStorage.setItem("theme", "dark");
                    themeIcon.src = "img/sun-icon.png";  // Đổi biểu tượng sang mặt trăng
                } else {
                    localStorage.setItem("theme", "light");
                    themeIcon.src = "img/moon-icon.png";  // Đổi biểu tượng sang mặt trời
                }
            });
            // Danh sách nội dung tìm kiếm (demo)
const searchData = [
    { title: "Sublime Text", link: "sublimetext.html" },
    { title: "Code Block", link: "codeblock.html" },
    { title: "Tài liệu HTML cơ bản", link: "tailieuhtmlcoban.html" },
    { title: "Tài liệu C++ cơ bản", link: "tailieuc++coban.html" },
    { title: "Tài liệu Toán CNTT", link: "tl_toan_cntt.html" },
];

// Các phần tử HTML
const searchInput = document.getElementById("search-input");
const searchButton = document.getElementById("search-button");
const searchResults = document.getElementById("search-results");

// Thêm sự kiện tìm kiếm
// script.js

// Xử lý sự kiện khi nhấn nút tìm kiếm
document.getElementById("search-button").addEventListener("click", function() {
    const query = document.getElementById("search-input").value;  // Lấy từ khóa tìm kiếm
    if (query) {
        // Chuyển hướng đến trang kết quả tìm kiếm, kèm từ khóa tìm kiếm trong URL
        window.location.href = `search-results.html?query=${encodeURIComponent(query)}`;
    } else {
        alert("Vui lòng nhập từ khóa tìm kiếm!");
    }
});


const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const switchToRegister = document.getElementById("switch-to-register");
const switchToLogin = document.getElementById("switch-to-login");

// Chuyển đổi giữa form Đăng nhập và Đăng ký
switchToRegister.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.style.display = "none";
    registerForm.style.display = "block";
});

switchToLogin.addEventListener("click", (e) => {
    e.preventDefault();
    registerForm.style.display = "none";
    loginForm.style.display = "block";
});

// Xử lý đăng nhập
loginForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = document.getElementById("login-email").value;
    const password = document.getElementById("login-password").value;

    // Kiểm tra tài khoản giả lập
    if (email === "test@example.com" && password === "123456") {
        alert("Đăng nhập thành công!");
    } else {
        alert("Email hoặc mật khẩu không đúng!");
    }
});

// Xử lý đăng ký
    registerForm.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = document.getElementById("register-email").value;
    const password = document.getElementById("register-password").value;
    const confirmPassword = document.getElementById("confirm-password").value;

    if (password !== confirmPassword) {
        alert("Mật khẩu xác nhận không khớp!");
    } else {
        alert("Đăng ký thành công! Bây giờ bạn có thể đăng nhập.");
        registerForm.style.display = "none";
        loginForm.style.display = "block";
    }
});