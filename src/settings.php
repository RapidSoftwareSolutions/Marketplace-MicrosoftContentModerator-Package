<?php
return [
    'settings' => [
        'langSelect' => [
            "Afrikaans"=>"afr",
            "Albanian"=>"sqi",
            "Amharic"=>"amh",
            "Arabic"=>"ara",
            "Armenian"=>"hye",
            "Assamese"=>"asm",
            "Azerbaijani"=>"aze",
            "Bangla - Bangladesh"=>"bng",
            "Bangla - India"=>"ben",
            "Basque"=>"eus",
            "Belarusian"=>"bel",
            "Bosnian - Cyrillic"=>"bos",
            "Bosnian - Latin"=>"bsb",
            "Breton [non-GeoPol]"=>"bre",
            "Bulgarian"=>"bul",
            "Catalan"=>"cat",
            "Central Kurdish"=>"kur",
            "Cherokee"=>"chr",
            "Chinese (Simplified)"=>"zho",
            "Chinese (Traditional) - Hong Kong SAR"=>"zh-hk",
            "Chinese (Traditional) - Taiwan"=>"zh-tw",
            "Croatian"=>"hrv",
            "Czech"=>"ces",
            "Danish"=>"dan",
            "Dari"=>"prs",
            "Dutch"=>"nld",
            "English"=>"eng",
            "Estonian"=>"est",
            "Filipino"=>"fil",
            "Finnish"=>"fin",
            "French"=>"fra",
            "Galician"=>"glg",
            "Georgian"=>"kat",
            "German"=>"deu",
            "Greek"=>"ell",
            "Gujarati"=>"guj",
            "Hausa"=>"hau",
            "Hebrew"=>"heb",
            "Hindi"=>"hin",
            "Hungarian"=>"hun",
            "Icelandic"=>"isl",
            "Igbo"=>"ibo",
            "Indonesian"=>"ind",
            "Inuktitut"=>"iku",
            "Irish"=>"gle",
            "isiXhosa"=>"xho",
            "isiZulu"=>"zul",
            "Italian"=>"ita",
            "Japanese"=>"jpn",
            "Kannada"=>"kan",
            "Kazakh"=>"kaz",
            "Khmer"=>"khm",
            "K'iche"=>"quc",
            "Kinyarwanda"=>"kin",
            "Kiswahili"=>"swa",
            "Konkani"=>"kok",
            "Korean"=>"kor",
            "Kyrgyz"=>"kir",
            "Lao"=>"lao",
            "Latvian"=>"lav",
            "Lithuanian"=>"lit",
            "Luxembourgish"=>"ltz",
            "Macedonian"=>"mac",
            "Malay"=>"msa",
            "Malayalam"=>"mym",
            "Maltese"=>"mlt",
            "Maori"=>"mri",
            "Marathi"=>"mar",
            "Mongolian"=>"mon",
            "Nepali"=>"nep",
            "Norwegian (Bokmål)"=>"nob",
            "Norwegian (Nynorsk)"=>"nno",
            "Odia"=>"ori",
            "Pashto"=>"pus",
            "Persian"=>"fas",
            "Polish"=>"pol",
            "Portuguese - Brazil"=>"por",
            "Portuguese - Portugal"=>"1or",
            "Pulaar"=>"ful",
            "Punjabi"=>"pan",
            "Punjabi (Pakistan)"=>"pnb",
            "Quechua (Peru)"=>"qup",
            "Romanian"=>"ron",
            "Russian"=>"rus",
            "Scottish Gaelic"=>"gla",
            "Serbian (Cyrillic)"=>"srp",
            "Serbian (Cyrillic, Bosnia and Herzegovina)"=>"srn",
            "Serbian (Latin)"=>"1rp",
            "Sesotho"=>"sot",
            "Sesotho sa Leboa"=>"nso",
            "Setswana"=>"tsn",
            "Sindhi"=>"sin",
            "Sinhala"=>"sin",
            "Slovak"=>"slk",
            "Slovenian"=>"slv",
            "Spanish"=>"spa",
            "Swedish"=>"swe",
            "Tajik"=>"tgk",
            "Tamil"=>"tam",
            "Tatar"=>"tat",
            "Telugu"=>"tel",
            "Thai"=>"tha",
            "Tigrinya"=>"tir",
            "Turkish"=>"tur",
            "Turkmen"=>"tuk",
            "Ukrainian"=>"ukr",
            "Urdu"=>"urd",
            "Uyghur"=>"uig",
            "Uzbek"=>"uzb",
            "Valencian"=>"cat",
            "Vietnamese"=>"vie",
            "Welsh"=>"cym",
            "Wolof"=>"wol",
            "Yoruba"=>"yor"
        ],
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ]
    ],
];
