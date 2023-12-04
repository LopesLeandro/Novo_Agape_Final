<?php
class SessionManager {
    public static function displayMessage() {
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        if(isset($_SESSION['success_message'])) {
            echo '<p class="success">' . $_SESSION['success_message'] . '</p>';
            unset($_SESSION['success_message']);
        }
    }

    public static function setErrorMessage($message) {
        $_SESSION['error_message'] = $message;
    }

    public static function setSuccessMessage($message) {
        $_SESSION['success_message'] = $message;
    }
}
?>
