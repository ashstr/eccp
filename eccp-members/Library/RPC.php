<?php

function cleanIt($str,$type){
    $very_pad = array(
              '.', "\.", "\..", "\...",
              ">", '<', ".",
              '&&', '||', '\\',"\\","\/","\"","\'","|", '/',
              "\&","\!", '\"',"\'",
              '?', '$', '~', '!', '@', '#', '$', '^',
              '*', '=', "'", ":", ';', "'", '"', ',',
              '[', ']', '{', '}', "(",")",
              '<', '>','%3A', '%2F',
              );
    $txt_pad = array("\t", "\n",     "\r", "\n\n",         "\t\t", '  ', '   ', '    ');
    $good    = array(' ',  '<br />', '',   '<br /><br />', ' ',    ' ',  ' ',   ' ');
    switch ($type){
        #########################
        case "ALL":
              $str = str_replace($txt_pad,$good,$str);
              $str = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$str);
              $str = trim($str);
              $cleanStr = str_replace($very_pad,'',$str);
        break;
        #########################
        case "HTML2TXT":
             $str2 = htmlentities($str);
             $cleanStr = str_replace($txt_pad,$good,$str2);
        break;
        #########################
        case "NO_HTML" :
              $str2 = preg_replace("/(<\/?)(\w+)([^>]*>)/e","",$str);
              $cleanStr = str_replace($txt_pad,$good,$str2);
        break;
        #########################
        case "SLASH":
              $cleanStr = addslashes($str);
        break;
        #########################
        case "ALLFormated":
              $str = strip_tags($str);
              #$str = str_replace($very_pad,$good,$str);
              $cleanStr = str_replace($txt_pad,$good,$str);
        break;
        #########################
        case "makeLinks":
              $regex =
                   "{ \\b
                   (
                   (https?|telnet|gopher|file|wais|ftp) : \n
                   [\\w/\\#~:.?+=&%@!\\-]+?
                   )\n
                   (?=
                   [.:?\\-]*
                   (?:[^\\w/\\#~:.?+=&%@!\\-]
                   |$)
                   ) }x";
              $str = preg_replace($regex, "<a href=\"$1\">$1</a>", $str);
              $cleanStr = $str;
        break;
        #########################
        case "makeLinks2":
        $regex = "#\[(([a-zA-Z]+://)([a-zA-Z0-9?&%.;:/=+_-]*))\]#e";
        $cleanStr = preg_replace($regex, "'<a href=\"$1\" target=\"_blank\">'. $3 .'</a>'", $str);
        break;
        #########################
    }
    return $cleanStr;
} ?>