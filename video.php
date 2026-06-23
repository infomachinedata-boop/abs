<?php
require_once 'db.php';

$video_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$video = get_video_by_id($video_id);

// If video not found, redirect to home
if (!$video) {
    header("Location: index.php");
    exit;
}

require_once 'header.php';
$related_videos = get_related_videos($video['id'], 4);
?>

<div class="video-page-wrapper">
    
    <!-- Left Main Column (Player & Details) -->
    <main class="video-main">
        
        <!-- Video Player Container (16:9 Aspect Ratio) -->
        <div class="player-container">
            <iframe 
                src="https://www.youtube.com/embed/<?php echo htmlspecialchars($video['youtube_id']); ?>?autoplay=1&rel=0" 
                title="<?php echo htmlspecialchars($video['title']); ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe>
        </div>

        <!-- Video Metadata & Details -->
        <div class="video-details-box">
            <h1 class="video-page-title"><?php echo htmlspecialchars($video['title']); ?></h1>
            
            <div class="video-stats-bar">
                <span class="stat-pill"><i class="fa-solid fa-eye"></i> <?php echo htmlspecialchars($video['views']); ?> Views</span>
                <span class="stat-pill rating"><i class="fa-solid fa-thumbs-up"></i> <?php echo htmlspecialchars($video['rating']); ?> Rating</span>
                <span class="stat-pill category-badge <?php echo strtolower($video['category']); ?>"><?php echo htmlspecialchars($video['category']); ?></span>
                <span class="stat-pill difficulty-badge"><?php echo htmlspecialchars($video['difficulty']); ?></span>
            </div>

            <hr class="separator">

            <div class="video-description">
                <h3>Workout / Guide Details</h3>
                <p><?php echo nl2br(htmlspecialchars($video['description'])); ?></p>
            </div>

            <div class="video-tags-container">
                <h3>Tags</h3>
                <div class="tags-list">
                    <?php foreach ($video['tags'] as $tag): ?>
                        <a href="index.php?search=<?php echo urlencode($tag); ?>" class="tag-link">#<?php echo htmlspecialchars($tag); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Under Player Banner Ad -->
        <div class="ad-banner-under-player">
            <div class="ad-container">
                <span class="ad-label">SPONSORED PROGRAM</span>
                <div class="ad-content">
                    <h4><a href="#ref=under_player_shred">Shred Body Fat Faster: 14-Day Abs Challenge</a></h4>
                    <p>Lose up to 8lbs of fat and uncover your abs. Guided workout calendar, nutrition handbook, and community support included.</p>
                </div>
                <a href="#ref=under_player_shred" class="btn-ad-cta highlight">Get Access Now <i class="fa-solid fa-bolt"></i></a>
            </div>
        </div>

    </main>

    <!-- Right Sidebar Column (Related Videos & Sidebar Ad) -->
    <aside class="video-sidebar">
        
        <!-- Sidebar Product Promo Ad -->
        <div class="ad-widget-sidebar">
            <span class="ad-widget-label">RECOMMENDED SUPPLEMENT</span>
            <h3><?php echo htmlspecialchars($affiliate_ads['sidebar']['title']); ?></h3>
            <p class="tagline">"<?php echo htmlspecialchars($affiliate_ads['sidebar']['tagline']); ?>"</p>
            <p class="description"><?php echo htmlspecialchars($affiliate_ads['sidebar']['description']); ?></p>
            <a href="<?php echo htmlspecialchars($affiliate_ads['sidebar']['link']); ?>" class="btn-sidebar-cta"><?php echo htmlspecialchars($affiliate_ads['sidebar']['cta']); ?> <i class="fa-solid fa-basket-shopping"></i></a>
        </div>

        <!-- Related Videos Grid -->
        <div class="sidebar-widget related-videos-widget">
            <h3>You Might Also Like</h3>
            <div class="related-videos-list">
                <?php foreach ($related_videos as $rel): ?>
                    <a href="video.php?id=<?php echo $rel['id']; ?>" class="related-card">
                        <div class="rel-thumb">
                            <img src="https://img.youtube.com/vi/<?php echo $rel['youtube_id']; ?>/mqdefault.jpg" alt="<?php echo htmlspecialchars($rel['title']); ?>">
                            <span class="rel-duration"><?php echo htmlspecialchars($rel['duration']); ?></span>
                        </div>
                        <div class="rel-info">
                            <h4><?php echo htmlspecialchars($rel['title']); ?></h4>
                            <div class="rel-meta">
                                <span class="rel-rating"><i class="fa-solid fa-thumbs-up"></i> <?php echo htmlspecialchars($rel['rating']); ?></span>
                                <span class="rel-cat"><?php echo htmlspecialchars($rel['category']); ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    </aside>

</div>

<?php
require_once 'footer.php';
?>
