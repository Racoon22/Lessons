<?php

function existence_allow_mails() {
       if (isset($ad['allow_mails'])) {
        $ad['allow_mails'] = '1';
    } else {
        $ad['allow_mails'] = '0';
    }
    return $ad['allow_mails'];
}

function existence_private() {
   if (!isset($ad['private'])) {
        $ad['private'] = '0';
    }
    return $ad['private'];
}
?>