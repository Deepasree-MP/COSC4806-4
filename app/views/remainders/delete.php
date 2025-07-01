<?php include 'app/views/templates/header.php'; ?>

<h2>Delete Remainder</h2>

<p>Are you sure you want to delete this remainder?</p>

<p><strong>Subject:</strong> <?= htmlspecialchars($remainder['subject']); ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($remainder['description']); ?></p>

<form action="/remainders/confirm_delete/<?= $remainder['id'] ?>" method="post">
    <button type="submit">Confirm Delete</button>
    <a href="/remainders">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
