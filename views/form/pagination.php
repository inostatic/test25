<?php
// Определяем текущую страницу
$uri = trim($_SERVER['REQUEST_URI'], "/");
if (empty($uri)) {
    $currentPage = 1;
} else {
    $currentPage = $uri;
}
//Стрелка в право >>
if ($currentPage >= 1 and $currentPage < $resultCount) {
    $hrefLeft = $currentPage + 1;
    echo "<a class=\"aPag\" href='$hrefLeft'>>></a>";
} else {
    echo "<a class=\"aPagDest\" href=''>>></a>";
}
//Вывод номеров страниц
for ($i = $resultCount; $i >= 1; $i--) {
    if ($i == $currentPage) {
        echo "<a class=\"active\" href=\"$i\">$i</a>";
    } else
        echo "<a class = \"aPag\" href = \"$i\">$i</a>";
}
//СТрелка в лево <<
if ($currentPage > 1 and $currentPage <= $resultCount) {
    $hrefLeft = $currentPage - 1;
    echo "<a class=\"aPag\" href=\"$hrefLeft\"><<</a>";
} else {
    echo "<a class=\"aPagDest\" href=''><<</a>";
}