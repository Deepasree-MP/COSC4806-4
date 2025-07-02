<?php include 'app/views/templates/header.php'; ?>

<div class="container">
    <div class="page-header mb-4">
        <h2>Edit Remainder</h2>
    </div>

    <form action="/remainders/update/<?= $remainder['id'] ?>" method="post">
        <div class="mb-3">
            <label class="form-label">Subject:</label>
            <input type="text" name="subject" value="<?= htmlspecialchars($remainder['subject']); ?>" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description:</label>
            <textarea name="description" rows="5" class="form-control" required><?= htmlspecialchars($remainder['description']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-danger">Update</button>
        <a href="/remainders" class="btn btn-outline-secondary">Cancel</a>
    </form>
</div>

<?php include 'app/views/templates/footer.php'; ?>
