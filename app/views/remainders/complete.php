<?php include 'app/views/templates/header.php'; ?>

<h2>Complete Remainder</h2>

<p>Are you sure you want to mark this remainder as completed?</p>

<p><strong>Subject:</strong> <?= htmlspecialchars($remainder['subject']); ?></p>
<p><strong>Description:</strong> <?= htmlspecialchars($remainder['description']); ?></p>

<form action="/remainders/confirm_complete/<?= $remainder['id'] ?>" method="post">
    <button type="submit">Confirm Complete</button>
    <a href="/remainders">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
