
<?php
include_once 'upload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YellowCompress</title>
    <link rel="icon" type="image/png" href="img/images banlieu.jfif" />
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
        .preview-container {
            margin-top: 3rem;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 40px;
        }
        .preview {
            border: 2px solid #FEE624;
            border-radius: 10px;
            padding: 15px;
            width: 150px;
            text-align: center;
            background-color: #fdf3dc;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .preview img {
            max-width: 100%;
            max-height: 100%;
            height: auto;
            border-radius: 5px;
            
        }
        .preview p {
            font-size: 14px;
            color: #333;
            word-wrap: break-word;
        }
        .preview .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #D40101;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-size: 12px;
            line-height: 20px;
        }

        .preview .close-btn:hover {
            background: #000000;
            color: #FFFFFF;
        }

    </style>

<body>

<header>
    <div class="container">
        <div class="header">
            <div><a href="index.php"><img src="./img/image.png" alt="Logo" class="logo" /></a></div>
        </div>
    </div>
</header> 

<div class="first_title">
<div class="Titre">
    <h1>Compresseur d'images</h1>
</div>
<div class="content_first">
    <p>Meilleur outil de compression d'image pour compresser les fichiers image tout en préservant la qualité de l'image.</p>
</div>
</div>


<div class="upload-container">
<form action="" method="post" enctype="multipart/form-data">
    <label type="file" for="file-upload" class="upload-label">
        <div class="upload-icon">        
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="icon">
            <path d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
            </svg>
        </div>
            <div class="upload-text">
                <span>Déposez vos fichier WebP, PNG ou JPEG ici !</span>
            </div>
            <input type="file" accept="image/*,.jpeg, .jpg, .png, .gif, .webp, .svg" id="file-upload" name="image[]" multiple style="display: none;" class="file-input" onchange="previewFiles()">
                <div class="file-security">
                    <svg xmlns="http://www.w3.org/2000/svg" class="lock-icon" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                    </svg>
                    <p>Vos fichiers sont sécurisés</p>  
                </div>
        &nbsp
        <div class="logo2">
            <img src="./img/logoblanc.png" alt="">
        </div>
    </label>
        <div class="preview-container" id="preview-container"></div>
            <div class="boutons">
                <input type="submit" name="submit" value="Compresser les fichiers" onclick="showDownloadbutton();" class="uploider" id="submit" disabled >
            </div>
    </div>
</form>

<div class="preview_compress">
<?php if(!empty($compressedImage)){ ?>
    <div class="preview_image_compress">
        <img src="<?php echo $compressedImage; ?>"/>
    </div>
    <?php } ?>
    <div class="preview_text_content">
    <?php echo $statusMsg; ?>
    </div>
    <?php echo $downloadButton; ?>
</div>

<div class="info">
    <div class="consigne">
        <div class="icon_consigne">
            <svg xmlns="http://www.w3.org/2000/svg" className="fill-kook-orange mx-auto" width="120" height="120" fill="#FEE624" viewBox="0 0 16 16">
            <path fillRule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0m0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0"/>
            </svg>
        </div>
        <div class="content_consigne">
        <div class="title_consigne">
            <h2 id="Title2">Comment compresser une image ?</h2>
        </div>
        <div class="text_consigne">
            <ul class="list_consigne">
                <li><p>Sélectionnez une image de votre appareil de n'importe quel format tel que png, jpeg ou webP.</p></li>
                <li><p>Après avoir sélectionné une image, cet outil de compression d'image compresse automatiquement la taille de l'image dans la meilleure taille.</p></li>
                <li><p>Après avoir modifié la taille de l'image, vous pouvez la télécharger sur votre appareil.</p></li>
            </ul>
        </div>
        </div>
    </div>    
</div>


<div class="footer-container">
    <footer class="footer"> 
        <div class="footer-content">
            <div class="footer-top">
                <div class="footer-logo">
                    <a href="https://labanlieusarde.fr/" class="logo-link">
                        <img src="./img/image.png" class="logo-img" alt="" />
                    </a>
                </div>
                <div class="footer-links">
                    <div class="footer-section">
                        <h2 class="footer-heading">Ressources</h2>
                        <ul class="footer-list">
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Docs</a></li>
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Tailwind CSS</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h2 class="footer-heading">Suivez-nous</h2>
                        <ul class="footer-list">
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Github</a></li>
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Discord</a></li>
                        </ul>
                    </div>
                    <div class="footer-section">
                        <h2 class="footer-heading">Légal</h2>
                        <ul class="footer-list">
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Privacy Policy</a></li>
                            <li><a href="https://labanlieusarde.fr/" class="footer-link">Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom">
                <span class="footer-text">© 2024 <a href="https://labanlieusarde.fr/" class="footer-link">La Banlieusarde💛</a>. Tous droits réservés.</span>
                <div class="footer-social">
                    <a href="#" class="social-link">
                        <svg class="social-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg class="social-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                        </svg>
                    </a>
                    <a href="#" class="social-link">
                        <svg class="social-icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</div>


<script>
const fileInput = document.getElementById('file-upload');
const submitButton = document.getElementById('submit');
const downloadbutton = document.querySelector('.download');
let filesArray = [];

// Bouton Upload
// Prévisualisation des fichiers
function previewFiles() {
    const previewContainer = document.getElementById('preview-container');
    const newFiles = Array.from(fileInput.files);
    filesArray = filesArray.concat(newFiles); 

    previewContainer.innerHTML = ''; 

    filesArray.forEach(function(file, index) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.createElement('div');
            preview.classList.add('preview');

            if (file.type.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                preview.appendChild(img);
            } else {
                const text = document.createElement('p');
                text.textContent = file.name;
                preview.appendChild(text);
            }

// Bouton déselections fichier
        const closeBtn = document.createElement('button');
            closeBtn.textContent = '×';
            closeBtn.classList.add('close-btn');
            closeBtn.onclick = function() {
                filesArray.splice(index, 1); 
                updateFileInput(filesArray); 
                previewContainer.removeChild(preview);

// Désactivation du bouton de soumission s'il n'y a plus de fichiers
                if (filesArray.length === 0) {
                    submitButton.disabled = true;
                }
            };
            preview.appendChild(closeBtn);
            previewContainer.appendChild(preview);
        }
        reader.readAsDataURL(file);
    });

    if (filesArray.length > 0) {
            submitButton.disabled = false;
            console.log(downloadbutton);
            console.log("test");
            downloadbutton.classList.add("visible");

    } else {
            submitButton.disabled = true;
            }
}

// Mise à jour de l'input files pour sélectionné les fichiers 
function updateFileInput(filesArray) {
    const dataTransfer = new DataTransfer();
    filesArray.forEach(function(file) {
        dataTransfer.items.add(file);
    });
    fileInput.files = dataTransfer.files;
}


function showDownloadbutton(){
var downloadbutton = document.getElementById("downloadbutton").style.display = "block";
}

// Bouton Téléchargement
function compressAndShowDownloadButton() {
            const fileInput = document.getElementById('file-upload');
            const downloadButton = document.getElementById('download-btn');
            
            // Simulation de la compression d'image
            setTimeout(() => {
                // Compression simulée terminée
                
                // Affiche le bouton de téléchargement
                downloadButton.classList.remove('hidden');
                downloadButton.classList.add('visible');
            }, 2000); // Simule une attente de 2 secondes pour la compression
        }




</script>

</body>
</html>




