<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

require_once __DIR__ . "/../config/base.php";

function requireLogin(): void {
  if (empty($_SESSION["account_id"])) {
    header("Location: " . BASE_URL . "/PHP/login.php");
    exit();
  }
}

function requireUser(): void {
  requireLogin();
  if (($_SESSION["role"] ?? "") !== "user") {
    header("Location: " . BASE_URL . "/index.php");
    exit();
  }
}

function requireAdmin(): void {
  requireLogin();
  if (($_SESSION["role"] ?? "") !== "admin") {
    header("Location: " . BASE_URL . "/index.php");
    exit();
  }
}
