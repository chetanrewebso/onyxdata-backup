

<?php
/*
Template Name: old User Registration
 * Template Post Type:page
*/

if (is_user_logged_in()) {
    wp_redirect(home_url()); // Redirect logged-in users
    exit;
}

get_header();

?>

<div class="register-form-container">
    <h2>Register</h2>
    <form id="custom-register-form" method="post">
        <p>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </p>
        <p>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </p>
        <p>
            <input type="checkbox" id="terms" required>
            I accept all terms & conditions and privacy policy.
        </p>
        <p>
            <input type="submit" id="register_user" name="register_user" value="Register"required>
        </p>
        <div id="register-message"></div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("register-form").addEventListener("submit", function (e) {
        e.preventDefault();

        let username = document.getElementById("username").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value.trim();
        let terms = document.getElementById("terms").checked;
        let formMessage = document.getElementById("form-message");

        if (!username || !email || !password || !terms) {
            formMessage.innerHTML = "<p style='color: red;'>All fields are required, and terms must be accepted.</p>";
            return;
        }

        let formData = new FormData();
        formData.append("action", "custom_register_user");
        formData.append("nonce", ajax_object.nonce);
        formData.append("username", username);
        formData.append("email", email);
        formData.append("password", password);

        fetch(ajax_object.ajax_url, {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                formMessage.innerHTML = "<p style='color: green;'>" + data.data.message + "</p>";
                document.getElementById("register-form").reset();
            } else {
                formMessage.innerHTML = "<p style='color: red;'>" + data.data.message + "</p>";
            }
        })
        .catch(error => console.error("Error:", error));
    });
});


</script>

<?php
get_footer();
?>
