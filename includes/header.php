<?php


$pageTitle = $pageTitle ?? 'Task House';
$assetBasePath = rtrim((string) ($assetBasePath ?? 'assets'), '/');
$additionalStylesheets = is_array($additionalStylesheets ?? null) ? $additionalStylesheets : [];
$bodyClass = trim('app-body ' . (string) ($bodyClass ?? ''));


?><!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />

  <link rel="stylesheet" href="<?= htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8') ?>/css/styles.css" />
  <?php foreach ($additionalStylesheets as $stylesheet): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($assetBasePath, ENT_QUOTES, 'UTF-8') ?>/<?= htmlspecialchars(ltrim((string) $stylesheet, '/'), ENT_QUOTES, 'UTF-8') ?>" />
  <?php endforeach; ?>
</head>
<body class="<?= htmlspecialchars($bodyClass, ENT_QUOTES, 'UTF-8') ?>">
  <div class="app-shell">
