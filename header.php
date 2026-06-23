<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABSMUNDO - Elite Abs Exercises, Nutrition & Guides</title>
    <!-- Google Fonts: Space Grotesk & Urbanist -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;700&family=Urbanist:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Sticky Navbar -->
    <header class="navbar">
        <div class="navbar-container">
            <a href="index.php" class="logo">
                <span class="logo-red">ABS</span>MUNDO
            </a>

            <!-- Search Bar Form -->
            <form action="index.php" method="GET" class="search-form">
                <div class="search-box">
                    <input type="text" name="search" placeholder="Search workouts, recipes, tips..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>

            <input type="checkbox" id="nav-toggle" class="nav-toggle-check">
            <label for="nav-toggle" class="menu-toggle">
                <i class="fa-solid fa-bars"></i>
            </label>

            <!-- Navigation Links -->
            <nav class="nav-menu">
                <ul class="nav-links">
                    <li><a href="index.php" class="<?php echo (!isset($_GET['cat']) && strpos($_SERVER['PHP_SELF'], 'video.php') === false) ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="index.php?cat=Exercises" class="<?php echo (isset($_GET['cat']) && $_GET['cat'] === 'Exercises') ? 'active' : ''; ?>">Exercises</a></li>
                    <li><a href="index.php?cat=Nutrition" class="<?php echo (isset($_GET['cat']) && $_GET['cat'] === 'Nutrition') ? 'active' : ''; ?>">Nutrition</a></li>
                    <li><a href="#ref=ultimate_guide" class="btn-guide"><i class="fa-solid fa-fire-flame-curved"></i> Shred Guide</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Content Container -->
    <div class="main-wrapper">
