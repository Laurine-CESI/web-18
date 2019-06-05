<?php

function secureForm($entree)
{
    return addslashes(htmlentities(trim($entree)));
}