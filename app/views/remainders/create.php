<?php include 'app/views/templates/header.php'; ?>

<h2>Create New Remainder</h2>

<form action="/remainders/store" method="post">
    <label>Subject:</label><br>
    <input type="text" name="subject" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="5" cols="40" required></textarea><br><br>

    <button type="submit">Save</button>
    <a href="/remainders">Cancel</a>
</form>

<?php include 'app/views/templates/footer.php'; ?>
