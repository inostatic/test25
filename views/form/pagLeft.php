<?php
if ($currentPage > 1 and $currentPage <= $resultCount) {
    $hrefLeft = $currentPage - 1;
    echo "<a class=\"aPag\" href=\"$hrefLeft\"><<</a>";
} else {
    echo "<a class=\"aPag\" href=''><<</a>";
}
