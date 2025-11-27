<?php
if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<div class="mrp-reservation-form-container">
    <h2>Event registration</h2>
    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="mrp-form">
        <!-- Security Nonce Field -->
        <?php wp_nonce_field('elp_submit_reservation_action', 'elp_reservation_nonce'); ?>

        <!-- Hidden field to tell admin-post.php which action to fire -->
        <input type="hidden" name="action" value="elp_submit_reservation">

        <div class="mrp-form-group">
            <label for="user_name">Full Name:</label>
            <input type="text" id="user_name" name="user_name" required>
        </div>

        <div class="mrp-form-group">
            <label for="user_email">Email Address:</label>
            <input type="email" id="user_email" name="user_email" required>
        </div>
        <button type="submit" class="mrp-submit-btn">Register</button>
    </form>
</div>