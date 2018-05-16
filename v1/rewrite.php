<?php
RewriteEngine On # Turn on the rewriting engine
RewriteRule ^myAPI/?$ myAPI.php [NC,L]
RewriteRule ^myAPI/([0-9]+)/?$ myAPI.php?id=$1 [NC,L]
?>