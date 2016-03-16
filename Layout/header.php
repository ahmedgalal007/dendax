<?php
    $str_browser_language = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
    $str_browser_language = !empty($_GET['language']) ? $_GET['language'] : $str_browser_language;
    switch (substr($str_browser_language, 0,2))
    {
        case 'de':
            $str_language = 'de';
            break;
        case 'en':
            $str_language = 'en';
            break;
        default:
            $str_language = 'en';
    }
    
    $arr_available_languages = array();
    $arr_available_languages[] = array('str_name' => 'English', 'str_token' => 'en');
    $arr_available_languages[] = array('str_name' => 'Deutsch', 'str_token' => 'de');
    
    $str_available_languages = (string) '';
    foreach ($arr_available_languages as $arr_language)
    {
        if ($arr_language['str_token'] !== $str_language)
        {
            $str_available_languages .= '<a href="'.strip_tags($_SERVER['PHP_SELF']).'?language='.$arr_language['str_token'].'" lang="'.$arr_language['str_token'].'" xml:lang="'.$arr_language['str_token'].'" hreflang="'.$arr_language['str_token'].'">'.$arr_language['str_name'].'</a> | ';
        }
    }
    $str_available_languages = substr($str_available_languages, 0, -3);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head lang="<?php echo $str_language; ?>" xml:lang="<?php echo $str_language; ?>">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title><?php echo $Page_Title ?></title>
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/site.css">
<head>

</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/" class = "navbar-brand">Home</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Dendax</a></li>
                    <li><a href="#">AutoLoadItem</a></li>
                    <li>
                        <div class="dropdown" style="position:relative">
                        <a href="#" class="btn dropdown-toggle btn-ddmenu" data-toggle="dropdown" data-childs="1" data-id="1">Click Here <span class="caret"></span></a>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container body-content">