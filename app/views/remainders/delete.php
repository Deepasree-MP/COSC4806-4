<?php include 'app/views/templates/header.php'; ?>

<h2>Delete Remainder</h2>
<p>Are you sure you want to delete this remainder?</p>
<p><strong>Subject:</strong> <?= htmlspecialchars($remainder['subject']); ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($remainder['description']); ?></p>

<form action="?controller=remainders&action=confirm_delete" method="post">
    <input type="hidden" name="id" value="<?= $remainder['id'] ?>">
    <button type="submit">Confirm Delete</button>
    <a href="?controller=remainders&action=index">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
