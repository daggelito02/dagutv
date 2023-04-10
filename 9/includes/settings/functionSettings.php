<?php
    //handles base url
    function getBaseUrl($prottocol = "http://") {
        $serverName = $_SERVER['SERVER_NAME'];
        $requestURI = $_SERVER['REQUEST_URI'];
        if ($_SERVER['SERVER_NAME'] == "localhost") {
            $baseURL = $prottocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
            $baseURL = substr($baseURL, 0, strrpos($baseURL, '/', 0)) . "/";
        } else {
            $baseURL = $prottocol . $_SERVER['SERVER_NAME'] . "/";
        }
        return $baseURL;
    }
?>