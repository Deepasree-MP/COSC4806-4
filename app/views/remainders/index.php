<?php include 'app/views/templates/header.php'; ?>

<h2>My Remainders</h2>
<a href="?controller=remainders&action=create">Create New Remainder</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Serial Number</th>
        <th>Status</th>
        <th>Subject</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php $count = 1; foreach ($remainders as $rem): ?>
    <tr>
        <td><?= $count++; ?></td>
        <td>
            <?php
            if ($rem['status'] == 1) echo 'Active';
            elseif ($rem['status'] == 0) echo 'Completed';
            elseif ($rem['status'] == 2) echo 'Cancelled';
            ?>
        </td>
        <td><?= htmlspecialchars($rem['subject']); ?></td>
        <td><?= htmlspecialchars($rem['description']); ?></td>
        <td>
            <a href="?controller=remainders&action=edit&id=<?= $rem['id'] ?>">Modify</a> |
            <a href="?controller=remainders&action=delete&id=<?= $rem['id'] ?>">Delete</a> |
            <a href="?controller=remainders&action=complete&id=<?= $rem['id'] ?>">Complete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php include 'app/views/templates/footer.php'; ?>
