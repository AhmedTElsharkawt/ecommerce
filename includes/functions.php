<?php 

date_default_timezone_set("Africa/Cairo");

// Upload image function
function uploadImage($myImage) {
    if ($_SERVER['REQUEST_METHOD'] == "POST"):

        // Get image data from $_FILES
        $imageSize         = $myImage['size'];
        $imageError        = $myImage['error'];
        $imageTmp          = $myImage['tmp_name'];
        $imageExtension    = substr_replace($myImage['type'], '.', 0, 6);
        $randImageName     = rand() . date("Y-m-d H-i-s", time()) . $imageExtension;
        $path       = "uploaded images/$randImageName";
        $allowedExtensions = ['.jpg', '.jpeg', '.gif', '.png'];
        $errors = [];
    
        // Check if image uploaded
        if ($imageError == 4):
            echo "No image uploaded";
    
        else:
            // Check of image extension
            if (! in_array($imageExtension , $allowedExtensions)):
                $errors[] = 'Unsupported file type';

            // Display a message if image size is bigger than 2MB
            elseif ($imageSize > 2000000) :
                echo 'Image size must be lower than 2MB';
            
            endif;
        endif;  
    endif;
    
    // Upload image if has no error
    if (empty($errors)):
        move_uploaded_file($imageTmp, $path);

    // Display errors
    else:
        global $msg;
        foreach ($errors as  $error):
            echo "$error <br>";
        endforeach;
        
    endif;

    return $path;
}