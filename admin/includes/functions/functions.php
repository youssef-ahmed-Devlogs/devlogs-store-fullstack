<?php

function setPageTitle()
{
    global $pageTitle;
    return isset($pageTitle) ? "$pageTitle | ADMIN OLX" : "ADMIN OLX";
}
