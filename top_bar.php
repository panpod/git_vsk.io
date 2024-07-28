<?php
// index.php
include_once"core/TopBarItem.php";

// Instantiate the factory with the path to the config file
$factory = new TopBarItemFactory('ini/top_bar.ini');

// Define the item keys to create
$itemKeys = ['opening_hour', 'call_us', 'email_us'];


echo '<div class="row">';

foreach ($itemKeys as $key) {
    try {
        $item = $factory->create($key);
        echo '<div class="col-4">';
        echo '<div class="top-bar-item">';
        echo '<div class="top-bar-icon">';
        echo '<i class="' . htmlspecialchars($item->getIcon()) . '"></i>';
        echo '</div>';
        echo '<div class="top-bar-text">';
        echo '<h3>' . htmlspecialchars($item->getTitle()) . '</h3>';
        echo '<p>' . htmlspecialchars($item->getContent()) . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        if($key=='email_us'){
            $admin_email = $item->getContent();
        } else if($key=='call_us'){
            $admin_phone = $item->getContent();
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

echo '</div>';
