<?php
echo "BONJOUR CHER TOUS";
echo '<br>';
echo '<br>';echo '<br>';echo '<br>';

    include('phpqrcode/qrlib.php');


    // how to save PNG codes to server
    
    $tempDir = "qrimg/" ;
    
    $codeContents = 'www.blucash.net';

    
    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.$codeContents.'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    $urlRelativeFilePath = $tempDir.$fileName;

    // var_dump($urlRelativeFilePath);


    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_H);
        echo 'File generated!';
        echo '<hr />';
    } else {
        echo 'File already generated! We can use this cached file to speed up site on common codes!';
        echo '<hr />';
    }
    
    echo 'Server PNG File: '.$pngAbsoluteFilePath;
    echo '<hr />';
    
    // displaying
    echo '<img src="'.$urlRelativeFilePath.'" />';

// fonction qui prend en paramètre 4 variable
// 1) content char
// 2) variable mixte si null affiche l'image sinon le lien vers la localisation de stockage du qr code
// 3) taille de limage par défaut taille est de 480*480
// 4) .........................................