
<?php

require_once 'vendor/autoload.php';

use Aries\Dbmodel\Models\Post;

session_start();

// Usage example
$post = new Post();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <h1>All Blog Posts</h1>
    <?php if (isset($_SESSION['user'])): ?>
        <h2>Welcome <?php echo htmlspecialchars($_SESSION['user']['first_name']); ?></h2>
        <h3>Your Blog Posts:</h3>
        <?php
            // Get the logged-in user's posts
            $userId = $_SESSION['user']['id'];
            $userPosts = $post->getPostsByLoggedInUser ($userId);
            if (!empty($userPosts)) {
                foreach ($userPosts as $postItem) {
                    echo '<li>' . htmlspecialchars($postItem['title']) . '</li>';
                }
            } else {
                echo '<li>No blog posts found.</li>'; 
            }
        ?>
    <?php endif; ?>
</body>
</html>