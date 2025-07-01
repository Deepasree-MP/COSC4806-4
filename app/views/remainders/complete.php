<?php include 'app/views/templates/header.php'; ?>

<h2>Complete Remainder</h2>
<p>Are you sure you want to mark this remainder as completed?</p>
<p><strong>Subject:</strong> <?= htmlspecialchars($remainder['subject']); ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($remainder['description']); ?></p>

<form action="?controller=remainders&action=confirm_complete" method="post">
    <input type="hidden" name="id" value="<?= $remainder['id'] ?>">
    <button type="submit">Confirm Complete</button>
    <a href="?controller=remainders&action=index">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
