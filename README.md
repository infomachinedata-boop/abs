# ABSMUNDO - Abs Video & Affiliate Platform

ABSMUNDO is a dynamic, mobile-responsive directory platform designed to compile and showcase high-quality video guides on abs workouts, routines, and nutrition recipes, with integrated native and banner slots for affiliate products.

The user interface features a sleek, premium dark-mode theme with crimson accents inspired by modern video platforms.

## Core Features

- **Categorized Feed:** Easily filter content between workout routines (Exercises) and diet/recipe guides (Nutrition) using fast category pills.
- **Search System:** Search through video titles, descriptions, and tags in real-time.
- **Dynamic Video Player (`video.php`):** Clean player pages containing YouTube embeds, difficulty rankings, view/rating stats, workout descriptions, tags, and a sidebar for related videos.
- **Strategic Affiliate Spaces:**
  - **Leaderboard Banners:** Premium spots positioned right below the header on key pages.
  - **Grid-integrated Native Ads:** Affiliate links designed to match the video card layout, complete with rating overlays and custom badges, acting as high-CTR native ad placements.
  - **Sidebar Product Promos:** Sidebar widgets detailing supplements, meal plans, or courses.
  - **Under-Player Banner Ads:** Direct CTAs positioned directly under the main content on player detail views.
- **Responsive Layout:** Optimized navigation drawer, fluid grids, and responsive sidebar alignments for mobile, tablet, and desktop screens.

## Quick Start

### 1. Requirements
Make sure you have PHP 7.4 or higher installed on your computer.

### 2. Running Locally
1. Clone the repository to your local web server root or workspace.
2. Open your terminal in the repository folder.
3. Run the built-in PHP development server:
   ```bash
   php -S localhost:8000
   ```
4. Open your web browser and navigate to:
   [http://localhost:8000](http://localhost:8000)

## Code Structure

- `index.php` - Homepage, filters, and primary grid feed.
- `video.php` - Video detail page with player, tags, and related videos.
- `db.php` - Simulated database array containing all video metadata and ad data.
- `header.php` / `footer.php` - Reusable layout components including search bar and footer details.
- `css/style.css` - Custom styling rules, colors, and responsive media queries.
