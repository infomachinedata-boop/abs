<?php
require_once 'db.php';
require_once 'header.php';

// Get filter parameters
$category_filter = isset($_GET['cat']) ? $_GET['cat'] : '';
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';

// Filter videos
$filtered_videos = [];
foreach ($videos as $video) {
    // Apply category filter
    if ($category_filter && $video['category'] !== $category_filter) {
        continue;
    }
    // Apply search filter
    if ($search_query) {
        $query = strtolower($search_query);
        $title_match = strpos(strtolower($video['title']), $query) !== false;
        $desc_match = strpos(strtolower($video['description']), $query) !== false;
        $tag_match = false;
        foreach ($video['tags'] as $tag) {
            if (strpos(strtolower($tag), $query) !== false) {
                $tag_match = true;
                break;
            }
        }
        if (!$title_match && !$desc_match && !$tag_match) {
            continue;
        }
    }
    $filtered_videos[] = $video;
}
?>

<!-- Affiliate Leaderboard Banner -->
<div class="ad-banner-leaderboard">
    <div class="ad-container">
        <span class="ad-label"><?php echo htmlspecialchars($affiliate_ads['leaderboard']['badge']); ?></span>
        <div class="ad-content">
            <h4><a href="<?php echo htmlspecialchars($affiliate_ads['leaderboard']['link']); ?>"><?php echo htmlspecialchars($affiliate_ads['leaderboard']['title']); ?></a></h4>
            <p><?php echo htmlspecialchars($affiliate_ads['leaderboard']['description']); ?></p>
        </div>
        <a href="<?php echo htmlspecialchars($affiliate_ads['leaderboard']['link']); ?>" class="btn-ad-cta">Join Now <i class="fa-solid fa-arrow-trend-up"></i></a>
    </div>
</div>

<!-- Section Header & Category Pills -->
<div class="section-controls">
    <div class="filter-title">
        <h2>
            <?php 
            if ($search_query) {
                echo 'Search Results for: "' . htmlspecialchars($search_query) . '"';
            } elseif ($category_filter) {
                echo htmlspecialchars($category_filter) . ' Videos';
            } else {
                echo 'All Abs Workouts & Nutrition';
            }
            ?>
            <span class="result-count">(<?php echo count($filtered_videos); ?> items)</span>
        </h2>
    </div>

    <!-- Category Selector Pills -->
    <div class="category-pills">
        <a href="index.php<?php echo $search_query ? '?search='.urlencode($search_query) : ''; ?>" class="pill <?php echo !$category_filter ? 'active' : ''; ?>">All Content</a>
        <a href="index.php?cat=Exercises<?php echo $search_query ? '&search='.urlencode($search_query) : ''; ?>" class="pill <?php echo $category_filter === 'Exercises' ? 'active' : ''; ?>"><i class="fa-solid fa-dumbbell"></i> Exercises</a>
        <a href="index.php?cat=Nutrition<?php echo $search_query ? '&search='.urlencode($search_query) : ''; ?>" class="pill <?php echo $category_filter === 'Nutrition' ? 'active' : ''; ?>"><i class="fa-solid fa-plate-wheat"></i> Nutrition</a>
    </div>
</div>

<!-- Main Feed Layout (Grid + Sidebar) -->
<div class="feed-layout">
    
    <!-- Video & Native Ads Grid -->
    <main class="grid-container">
        <?php if (empty($filtered_videos)): ?>
            <div class="no-results">
                <i class="fa-regular fa-face-frown"></i>
                <h3>No videos found matching your criteria.</h3>
                <p>Try searching for "six pack", "diet", "meal prep", or browse our tabs above.</p>
                <a href="index.php" class="btn-reset">Reset Filters</a>
            </div>
        <?php else: ?>
            <div class="video-grid">
                <?php 
                $item_index = 0;
                foreach ($filtered_videos as $video): 
                    // Inject Sponsored/Affiliate Native Ad card after every 3rd items
                    if ($item_index > 0 && $item_index % 3 == 0): 
                        $ad = $affiliate_ads['native_grid'];
                ?>
                        <!-- Native Sponsored Card -->
                        <div class="video-card sponsored-card">
                            <a href="<?php echo htmlspecialchars($ad['link']); ?>" class="card-link-wrapper">
                                <div class="thumbnail-wrapper ad-thumbnail">
                                    <!-- Dynamic CSS Gradient background for the Ad thumbnail -->
                                    <div class="ad-gradient-bg">
                                        <i class="fa-solid fa-fire"></i>
                                        <span>CUSTOM MEAL PLAN</span>
                                    </div>
                                    <span class="duration-badge sponsored-badge"><?php echo htmlspecialchars($ad['duration']); ?></span>
                                    <span class="rating-badge"><i class="fa-solid fa-thumbs-up"></i> <?php echo htmlspecialchars($ad['rating']); ?></span>
                                    <span class="views-badge"><i class="fa-solid fa-star"></i> <?php echo htmlspecialchars($ad['views']); ?></span>
                                </div>
                                <div class="card-info">
                                    <h3 class="video-title"><?php echo htmlspecialchars($ad['title']); ?></h3>
                                    <p class="video-desc-short"><?php echo htmlspecialchars($ad['description']); ?></p>
                                    <div class="video-tags">
                                        <?php foreach ($ad['tags'] as $tag): ?>
                                            <span class="tag">#<?php echo htmlspecialchars($tag); ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="sponsored-action">
                                        <span>Create Plan Now <i class="fa-solid fa-chevron-right"></i></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                <?php 
                    endif; 
                ?>

                    <!-- Regular Video Card -->
                    <div class="video-card">
                        <a href="video.php?id=<?php echo $video['id']; ?>" class="card-link-wrapper">
                            <div class="thumbnail-wrapper">
                                <img src="https://img.youtube.com/vi/<?php echo $video['youtube_id']; ?>/hqdefault.jpg" alt="<?php echo htmlspecialchars($video['title']); ?>" loading="lazy">
                                <div class="hover-overlay">
                                    <i class="fa-solid fa-play"></i>
                                </div>
                                <span class="duration-badge"><?php echo htmlspecialchars($video['duration']); ?></span>
                                <span class="rating-badge"><i class="fa-solid fa-thumbs-up"></i> <?php echo htmlspecialchars($video['rating']); ?></span>
                                <span class="views-badge"><i class="fa-solid fa-eye"></i> <?php echo htmlspecialchars($video['views']); ?></span>
                            </div>
                            <div class="card-info">
                                <div class="card-meta-row">
                                    <span class="category-tag <?php echo strtolower($video['category']); ?>">
                                        <?php echo htmlspecialchars($video['category']); ?>
                                    </span>
                                    <span class="difficulty-level"><?php echo htmlspecialchars($video['difficulty']); ?></span>
                                </div>
                                <h3 class="video-title"><?php echo htmlspecialchars($video['title']); ?></h3>
                                <div class="video-tags">
                                    <?php foreach ($video['tags'] as $tag): ?>
                                        <span class="tag">#<?php echo htmlspecialchars($tag); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php 
                    $item_index++;
                endforeach; 
                ?>
            </div>
        <?php endif; ?>
    </main>

    <!-- Sidebar with Widgets and Ad space -->
    <aside class="sidebar">
        
        <!-- Sidebar Affiliate Banner -->
        <div class="ad-widget-sidebar">
            <span class="ad-widget-label">SPONSORED PRODUCT</span>
            <h3><?php echo htmlspecialchars($affiliate_ads['sidebar']['title']); ?></h3>
            <p class="tagline">"<?php echo htmlspecialchars($affiliate_ads['sidebar']['tagline']); ?>"</p>
            <p class="description"><?php echo htmlspecialchars($affiliate_ads['sidebar']['description']); ?></p>
            <a href="<?php echo htmlspecialchars($affiliate_ads['sidebar']['link']); ?>" class="btn-sidebar-cta"><?php echo htmlspecialchars($affiliate_ads['sidebar']['cta']); ?> <i class="fa-solid fa-basket-shopping"></i></a>
        </div>

        <!-- Tag Cloud Widget -->
        <div class="sidebar-widget">
            <h3>Trending Topics</h3>
            <div class="tag-cloud">
                <a href="index.php?search=six+pack" class="cloud-tag">Six Pack</a>
                <a href="index.php?search=diet" class="cloud-tag">Diet</a>
                <a href="index.php?search=no+equipment" class="cloud-tag">No Equipment</a>
                <a href="index.php?search=meal+prep" class="cloud-tag">Meal Prep</a>
                <a href="index.php?search=science" class="cloud-tag">Science</a>
                <a href="index.php?search=beginner" class="cloud-tag">Beginner</a>
            </div>
        </div>

        <!-- Quick Tips Widget -->
        <div class="sidebar-widget">
            <h3>Daily Core Tip</h3>
            <div class="daily-tip">
                <i class="fa-regular fa-lightbulb"></i>
                <p><strong>Calories Out:</strong> Even if you perform 1,000 crunches a day, your abs won't show unless your body fat percentage is low enough. Prioritize a clean, high-protein caloric deficit!</p>
            </div>
        </div>
    </aside>

</div>

<?php
require_once 'footer.php';
?>
