
<?php

function sanitize($input) {
 return addslashes(htmlspecialchars(strip_tags(trim($input))));
}

?>