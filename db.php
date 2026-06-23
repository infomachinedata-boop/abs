<?php
// Mock database for ABSMUNDO.COM

$videos = [
    [
        'id' => 1,
        'title' => '8 Min Abs Workout - Home Six Pack Routine',
        'category' => 'Exercises',
        'youtube_id' => 'AnY198t8Bw0',
        'duration' => '8:15',
        'views' => '1.2M',
        'rating' => '98%',
        'description' => 'A fast-paced home workout routine designed to build strength and definition in your abdominal muscles. No equipment needed, follow along in real-time!',
        'tags' => ['Home Workout', 'Six Pack', 'No Equipment', 'Daily Routine'],
        'difficulty' => 'Intermediate'
    ],
    [
        'id' => 2,
        'title' => 'Perfect Abs Workout - Science-Based Exercises',
        'category' => 'Exercises',
        'youtube_id' => '7My5M-T7pNo',
        'duration' => '10:45',
        'views' => '3.4M',
        'rating' => '99%',
        'description' => 'A comprehensive, science-backed workout targeting all areas of the core including upper abs, lower abs, and obliques to optimize muscle hypertrophy.',
        'tags' => ['Science', 'Core Strength', 'Advanced', 'Hypertrophy'],
        'difficulty' => 'Advanced'
    ],
    [
        'id' => 3,
        'title' => '10 Minute Core Workout - Tone & Tighten',
        'category' => 'Exercises',
        'youtube_id' => 'dJlFm3ux2xg',
        'duration' => '10:12',
        'views' => '750K',
        'rating' => '96%',
        'description' => 'Great beginner-friendly workout routine to build foundation core stability and start defining your midsection safely.',
        'tags' => ['Beginner', 'Tone Core', 'Quick Workout', 'Foundation'],
        'difficulty' => 'Beginner'
    ],
    [
        'id' => 4,
        'title' => 'Lower Abs Workout - Targeted Routine to Lose Belly Fat',
        'category' => 'Exercises',
        'youtube_id' => 'm1c828VlP7M',
        'duration' => '12:30',
        'views' => '2.1M',
        'rating' => '97%',
        'description' => 'Specialized routine focusing on the lower rectus abdominis muscle. Ideal for toning and strengthening the lower part of the core.',
        'tags' => ['Lower Abs', 'Belly Fat', 'Routine', 'Toning'],
        'difficulty' => 'Intermediate'
    ],
    [
        'id' => 5,
        'title' => 'Abs Diet - What to Eat to Show Your Six Pack',
        'category' => 'Nutrition',
        'youtube_id' => '09k1nFhTiwI',
        'duration' => '9:40',
        'views' => '920K',
        'rating' => '95%',
        'description' => 'Learn the key dietary principles required to lower body fat percentage so your abdominal muscles become visible. Diet is 80% of the work!',
        'tags' => ['Diet', 'Six Pack', 'Fat Loss', 'Healthy Eating'],
        'difficulty' => 'All Levels'
    ],
    [
        'id' => 6,
        'title' => '5 Crucial Nutrition Rules for Visible Abs',
        'category' => 'Nutrition',
        'youtube_id' => 'U835Q_u3YmI',
        'duration' => '11:20',
        'views' => '1.5M',
        'rating' => '98%',
        'description' => 'Avoid these common dietary mistakes. Discover the 5 essential nutrition rules, from protein intake to calorie deficits, to reveal your six pack.',
        'tags' => ['Rules', 'Abs', 'Nutrition', 'Protein'],
        'difficulty' => 'All Levels'
    ],
    [
        'id' => 7,
        'title' => 'How to Eat for Abs - Complete Meal Prep Guide',
        'category' => 'Nutrition',
        'youtube_id' => '7bLpB_bXz-k',
        'duration' => '15:05',
        'views' => '640K',
        'rating' => '94%',
        'description' => 'Watch this step-by-step cooking and prep video showing high-protein, low-calorie meals perfect for maintaining a lean core year-round.',
        'tags' => ['Meal Prep', 'Healthy Eating', 'Recipe', 'High Protein'],
        'difficulty' => 'Beginner'
    ],
    [
        'id' => 8,
        'title' => 'Intermittent Fasting & Six Pack Abs - Science Explained',
        'category' => 'Nutrition',
        'youtube_id' => '5x1aV_t6YnU',
        'duration' => '14:15',
        'views' => '1.8M',
        'rating' => '97%',
        'description' => 'An in-depth explanation of how intermittent fasting affects hormones, insulin levels, and fat oxidation, helping you shred final body fat deposits.',
        'tags' => ['Fasting', 'Science', 'Fat Burn', 'Hormones'],
        'difficulty' => 'Intermediate'
    ]
];

$affiliate_ads = [
    'leaderboard' => [
        'title' => 'Tear Up Your Fat: Ultimate Abs Shredder Course (Special 75% OFF)',
        'description' => 'Join 50,000+ students in the most effective online video program. Guarantee six-pack abs in 60 days.',
        'link' => '#ref=absshredder_course',
        'badge' => 'OFFER'
    ],
    'sidebar' => [
        'title' => 'Keto-Core Shred Supplement',
        'tagline' => 'Accelerate Fat Oxidation by 300%',
        'description' => '100% natural, scientifically formulated ingredients to burn stubborn lower belly fat while preserving lean core muscle.',
        'cta' => 'Order Bottle Now',
        'link' => '#ref=ketocoreshred'
    ],
    'native_grid' => [
        'title' => 'Custom Six-Pack Meal Plan Generator',
        'duration' => 'SPONSORED',
        'views' => 'AD',
        'rating' => '99%',
        'description' => 'Get a fully customized, calorie-calculated weekly meal plan based on your body weight and fat goal. Get shredded without starving!',
        'tags' => ['Affiliate', 'Custom Plan', 'Fat Loss'],
        'difficulty' => 'Promo',
        'link' => '#ref=mealplan_gen'
    ]
];

// Helper functions
function get_video_by_id($id) {
    global $videos;
    foreach ($videos as $video) {
        if ($video['id'] == $id) {
            return $video;
        }
    }
    return null;
}

function get_related_videos($current_id, $limit = 4) {
    global $videos;
    $related = [];
    $count = 0;
    foreach ($videos as $video) {
        if ($video['id'] != $current_id) {
            $related[] = $video;
            $count++;
            if ($count >= $limit) {
                break;
            }
        }
    }
    return $related;
}
?>
