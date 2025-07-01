<?php
session_start();
require_once 'app/models/Remainder.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /app/controllers/login.php');
    exit();
}

$remainderModel = new Remainder();

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'index': index($remainderModel); break;
    case 'create': create(); break;
    case 'store': store($remainderModel); break;
    case 'edit': edit($remainderModel); break;
    case 'update': update($remainderModel); break;
    case 'delete': delete($remainderModel); break;
    case 'confirm_delete': confirm_delete($remainderModel); break;
    case 'complete': complete($remainderModel); break;
    case 'confirm_complete': confirm_complete($remainderModel); break;
    default: index($remainderModel); break;
}

function index($model) {
    $remainders = $model->get_all_remainders_by_id($_SESSION['user_id']);
    include 'app/views/remainders/index.php';
}

function create() {
    include 'app/views/remainders/create.php';
}

function store($model) {
    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);

    if ($subject && $description) {
        $model->create_remainder($_SESSION['user_id'], htmlspecialchars($subject), htmlspecialchars($description));
    }
    header('Location: ?controller=remainders&action=index');
}

function edit($model) {
    $id = (int)$_GET['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $remainder = $rem;
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }
    include 'app/views/remainders/edit.php';
}

function update($model) {
    $id = (int)$_POST['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }

    $subject = trim($_POST['subject']);
    $description = trim($_POST['description']);
    if ($subject && $description) {
        $model->update_remainder($id, htmlspecialchars($subject), htmlspecialchars($description));
    }
    header('Location: ?controller=remainders&action=index');
}

function delete($model) {
    $id = (int)$_GET['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $remainder = $rem;
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }
    include 'app/views/remainders/delete.php';
}

function confirm_delete($model) {
    $id = (int)$_POST['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }
    $model->delete_remainder($id);
    header('Location: ?controller=remainders&action=index');
}

function complete($model) {
    $id = (int)$_GET['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $remainder = $rem;
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }
    include 'app/views/remainders/complete.php';
}

function confirm_complete($model) {
    $id = (int)$_POST['id'];
    $records = $model->get_all_remainders_by_id($_SESSION['user_id']);
    $found = false;
    foreach ($records as $rem) {
        if ($rem['id'] == $id) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo 'Access Denied';
        exit();
    }
    $model->complete_remainder($id);
    header('Location: ?controller=remainders&action=index');
}

?>
