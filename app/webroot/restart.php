<?php
system('killall /usr/bin/python');
system('tracd -d --port 8000 --auth="*,/var/lib/trac/users.digest,trac" /var/lib/trac/*');
echo 'success';
?>