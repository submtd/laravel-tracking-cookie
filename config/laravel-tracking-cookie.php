<?php

return [
    'honorDoNotTrack' => true,
    'cookieName' => 'tracking', // name of the cookie
    'cookieLifetime' => 43200, // 30 days
    'cookiePath' => '/',
    'useSecureCookie' => false, // only set the cookie over https connections
    'httpOnly' => false, // only allow the cookie to be read over http (no javascript, etc)
];
