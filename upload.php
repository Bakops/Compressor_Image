<?php
function compressImage ($source, $destination, $quality){

    $imgeinfo = getimagesize($source);
    $mime = $imgeinfo['mime'];

    switch($mime){
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
            case 'image/svg':
            $image = imagecreatefromwebp($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    imagejpeg($image, $destination, $quality);


    return $destination;
}

function convert_filesize($bytes, $decimals = 2) { 
    if ($bytes == 0) {
        return '0 B';
    }
    $size = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
    $factor = (int)floor(log($bytes, 1024)); 
    
    return sprintf("%.{$decimals}f", $bytes / (1024 ** $factor)) . ' ' . $size[$factor];
}

$uploadPath = "uploads/"; 
$statusMsg = ''; 
$status = 'danger'; 
$downloadButton = '';

if (isset($_POST["submit"])) {
    // Vérification de l'input si vide
    if (!empty(array_filter($_FILES["image"]["name"]))) { 
        $uploadPath = "uploads/"; // Définir le chemin du dossier de téléchargement
        $allowTypes = array('jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'); // Types de fichiers autorisés
        $statusMsg = '';
        $error = false;
        
        foreach ($_FILES["image"]["name"] as $key => $fileName) {
            $fileName = basename($fileName); // Extraire le nom de fichier pour chaque fichier téléchargé
            $imageTemp = $_FILES["image"]["tmp_name"][$key];
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

            // Vérifier le type de fichier
            if (in_array($fileType, $allowTypes)) {
                $imageUploadPath = $uploadPath . $fileName;
                $imageSize = convert_filesize($_FILES["image"]["size"][$key]);

                // Compresser l'image
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 90);
                if ($compressedImage) {
                    $compressedImageSize = filesize($compressedImage);
                    $compressedImageSize = convert_filesize($compressedImageSize);
                    $statusMsg .= "<div class='statutmessage'><strong>$fileName</strong> Compressée avec succès ✅<p>Taille originale de l'image:<strong> $imageSize</p></strong>
                <p>Taille compresser de l'image:<strong>$compressedImageSize</strong></p></div>";
                $downloadButton = '<a href="http://localhost/test/'. $compressedImage .'  "id="download-btn" class="download">Télécharger <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="cloud-download" id="downloadbutton" viewBox="0 0 16 16">
                <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/></svg>
                </a>';
                } else {
                    $statusMsg .= "<div class='statutmessagenone'>Échec de la compression de l'image <strong>'$fileName'</strong> ❌.</div>";
                }
            } else {
                $statusMsg .= "Désolé, seuls les fichiers JPG, JPEG, PNG, WEBP, SVG et GIF sont autorisés à être téléchargés. Fichier non autorisé : '$fileName' 😓.<br>";
            }
        }
    }
}



?>
