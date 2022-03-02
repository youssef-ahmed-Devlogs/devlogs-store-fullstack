<?php

function setPageTitle() {
    global $pageTitle;
    return isset($pageTitle) ? "$pageTitle | OLX" : "OLX";
}