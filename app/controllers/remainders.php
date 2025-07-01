<?php

class Remainders extends Controller {

  private $remainderModel;
  private $userModel;
  private $userId;

  public function __construct() {
    session_start();

    if (!isset($_SESSION['auth'])) {
      header('Location: /login');
      exit();
    }

    $this->remainderModel = $this->model('Remainder');
    $this->userModel = $this->model('User');

    // 🔑 Lookup user ID from username:
    $username = $_SESSION['username'] ?? '';
    $user = $this->userModel->get_user_by_username($username);

    if (!$user) {
      echo 'Access Denied';
      exit();
    }

    $this->userId = $user['id'];
  }

  public function index() {
    $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
    $this->view('remainders/index', ['remainders' => $remainders]);
  }

  public function create() {
    $this->view('remainders/create');
  }

  public function store() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $subject = trim($_POST['subject']);
      $description = trim($_POST['description']);

      if ($subject && $description) {
        $this->remainderModel->create_remainder(
          $this->userId,
          htmlspecialchars($subject),
          htmlspecialchars($description)
        );
      }

      header('Location: /remainders');
      exit();
    }
  }

  public function edit($id) {
    $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
    $remainder = $this->findRemainder($remainders, $id);

    if (!$remainder) {
      echo 'Access Denied';
      exit();
    }

    $this->view('remainders/edit', ['remainder' => $remainder]);
  }

  public function update($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
      $remainder = $this->findRemainder($remainders, $id);

      if (!$remainder) {
        echo 'Access Denied';
        exit();
      }

      $subject = trim($_POST['subject']);
      $description = trim($_POST['description']);

      if ($subject && $description) {
        $this->remainderModel->update_remainder(
          $id,
          htmlspecialchars($subject),
          htmlspecialchars($description)
        );
      }

      header('Location: /remainders');
      exit();
    }
  }

  public function delete($id) {
    $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
    $remainder = $this->findRemainder($remainders, $id);

    if (!$remainder) {
      echo 'Access Denied';
      exit();
    }

    $this->view('remainders/delete', ['remainder' => $remainder]);
  }

  public function confirm_delete($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
      $remainder = $this->findRemainder($remainders, $id);

      if (!$remainder) {
        echo 'Access Denied';
        exit();
      }

      $this->remainderModel->delete_remainder($id);

      header('Location: /remainders');
      exit();
    }
  }

  public function complete($id) {
    $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
    $remainder = $this->findRemainder($remainders, $id);

    if (!$remainder) {
      echo 'Access Denied';
      exit();
    }

    $this->view('remainders/complete', ['remainder' => $remainder]);
  }

  public function confirm_complete($id) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $remainders = $this->remainderModel->get_all_remainders_by_id($this->userId);
      $remainder = $this->findRemainder($remainders, $id);

      if (!$remainder) {
        echo 'Access Denied';
        exit();
      }

      $this->remainderModel->complete_remainder($id);

      header('Location: /remainders');
      exit();
    }
  }

  private function findRemainder($remainders, $id) {
    foreach ($remainders as $rem) {
      if ($rem['id'] == $id) {
        return $rem;
      }
    }
    return null;
  }

}
