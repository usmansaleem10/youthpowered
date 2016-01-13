<?php

// Contant For Getting Current URL
/*
 * Configuration Constants
 */
define("ENVIRONMENT_DEV", true);
define("ENVIRONMENT_PRODUCTION", false);
define("HOST_NAME", $_SERVER["SERVER_NAME"]);

if(ENVIRONMENT_DEV)
{
   define("CURRENT_URL", "http://localhost/youthpowered/youth/index.php/");
} 
else if(ENVIRONMENT_PRODUCTION)
{
   define("CURRENT_URL", "http://youthpowered.net/youth/index.php/");
} 