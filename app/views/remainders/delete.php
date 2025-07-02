<?php include 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="page-header mb-4">
        <h2>Delete Remainder</h2>
    </div>

    <div class="alert alert-warning">
        <p>Do you want to delete this remainder?</p>
        <p><strong>Subject:</strong> <?= htmlspecialchars($remainder['subject']); ?></p>
        <p><strong>Description:</strong> <?= htmlspecialchars($remainder['description']); ?></p>
    </div>

    <form action="/remainders/confirm_delete/<?= $remainder['id'] ?>" method="post">
        <div class="d-flex flex-wrap gap-2">
            <button type="submit" class="btn btn-danger">Confirm Delete</button>
            <a href="/remainders" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php include 'app/views/templates/footer.php'; ?>
