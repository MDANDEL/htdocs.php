<?php if (isset($_SESSION['message']) && $_SESSION['message']) : ?>

<div class="alert alert-info">
     <?php echo $_SESSION['message']; ?>
</div>
<?php echo $_SESSION['message'] = null; ?>
<?php endif; ?>