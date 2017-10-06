<?php
$routes = [
    'metadata',
    'evaluateImage',
    'findFaces',
    'getMatchImage',
    'getImageText',
    'detectLanguage',
    'detectProfanityLanguage',
    'addImageInList',
    'deleteImageFromList',
    'deleteAllImagesFromList',
    'getAllImagesFromList',
    'getImageListDetails',
    'createImageList',
    'deleteImageList',
    'getAllImageLists',
    'refreshImageSearchIndex',
    'updateImageList',
    'addTerm',
    'deleteTerm',
    'deleteAllTermsFromList',
    'getAllTermsFromList',
    'createTermList',
    'deleteTermList',
    'getAllTermLists',
    'getTermListDetails',
    'refreshTermSearchIndex',
    'updateTermList'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

