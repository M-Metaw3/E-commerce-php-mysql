<?php
// Function to upload an image file
function upload_image($file) {
    $target_dir = 'uploads/';
    $target_file = $target_dir . basename($file['name']);
    move_uploaded_file($file['tmp_name'], $target_file);
    return $target_file;
}

// Function to delete an image file
function delete_image($file) {
    if ($file) {
        unlink($file);
    }
}
?>