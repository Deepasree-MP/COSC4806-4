<?php include 'app/views/templates/header.php'; ?>

<h2>Edit Remainder</h2>

<form action="/remainders/update/<?= $remainder['id'] ?>" method="post">
    <label>Subject:</label><br>
    <input type="text" name="subject" value="<?= htmlspecialchars($remainder['subject']); ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="5" cols="40" required><?= htmlspecialchars($remainder['description']); ?></textarea><br><br>

    <button type="submit">Update</button>
    <a href="/remainders">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
