<?php
date_default_timezone_set('Europe/Rome'); //or change to whatever timezone you want
//Password System
$hash = '$2y$10$gnGr.2E8U/kO.9fWAmJO4eFpEvOW7x1cVKdQ/ntJ3hT8NRJ7pMPwO';
$password = "No Passwd";
$password = isset($_POST['password']) ? $_POST['password'] : '';
if (password_verify($password, $hash)) {
    echo 'Password is valid!';


//******* This writes what came from RadioDJ to the files Post.log and Post.txt used for testing  **//
 //file_put_contents("Post.log", print_r($_POST, true));
// file_put_contents("Post.json", json_encode($_POST));


//****** Varible assignments to prevent null errors ******//

$year = "No Year Yet";
$title = "No Title Yet";
$artist = "No Artist Yet";
$album_cover = "no_cover_image.jpg";  // Save your logo as no_cover_image.jpg and add it to your year art folder


// ****************DO NOT EDIT THIS SECTION ************************************// 
$title = isset($_POST['title']) ? $_POST['title'] : '';
$artist = isset($_POST['artist']) ? $_POST['artist'] : '';
$year = isset($_POST['year']) ? $_POST['year'] : NIL;
$album = isset($_POST['album']) ? $_POST['album'] : '';
$album_cover = isset($_POST['image']) ? $_POST['image'] : '';
echo '<script>console.log(`' .$album_cover. '`); </script>';

// PUT VARIBLES INTO AN ARRAY //
$songarray = array(
    'artist' => $artist,
    'title' => $title,
	'year' => $year,
    'album' => $album,
	'image' => $album_cover,
);


// STORE DATA ARRAY TO A FILE //
$rawdatanow = serialize($songarray);
file_put_contents('rdjrawdata.txt', $rawdatanow);
file_put_contents("Post.log", print_r($songarray, true));
file_put_contents("Post.json", json_encode($songarray));

} else {
    echo 'Invalid password.';
}
?>
<script type="text/javascript">
    function sleep(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }
 sleep(3000).then(() => { window.history.back();});

</script>