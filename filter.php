<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

$filterconf = $_GET['filterconf'];
$filtername = `grep '^groupname' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;
$naughtynesslimit = `grep '^naughtynesslimit' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;

echo '<table align="center">';

echo '<tr><td align="center"><b>' . $filtername . '</b></td></tr>';
echo '<tr><td><hr></td></tr>';

echo '<tr><td align="center">Peso m&aacute;ximo permitido</td></tr>';
echo '<tr><td align="center"><input style="text-align:center;" type="text" name="naughtynesslimit" value="' . $naughtynesslimit . '"></td></tr>';
echo '<tr><td align="center"><input type="button" value="Modificar"</td></tr>';

echo '<tr><td><hr></td></tr>';

echo '<tr><td align="center">Membros do Grupo</td></tr>';
echo '<tr><td align="center"><input type="button" value="Gerenciar"</td></tr>';

echo '<tr><td><hr></td></tr>';

echo '<tr><td align="center">Filtragem de conte&uacute;do</td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=bannedphraselist"><input type="button" value="bannedphraselist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=weightedphraselist"><input type="button" value="weightedphraselist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=exceptionphraselist"><input type="button" value="exceptionphraselist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=bannedsitelist"><input type="button" value="bannedsitelist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=greysitelist"><input type="button" value="greysitelist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=exceptionsitelist"><input type="button" value="exceptionsitelist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=bannedurllist"><input type="button" value="bannedurllist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=greyurllist"><input type="button" value="greyurllist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=exceptionurllist"><input type="button" value="exceptionurllist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=exceptionregexpurllist"><input type="button" value="exceptionregexpurllist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=bannedregexpurllist"><input type="button" value="bannedregexpurllist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=picsfile"><input type="button" value="picsfile"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=contentregexplist"><input type="button" value="contentregexplist"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?filtername=' . $filtername . '&filterconf=' . $filterconf . '&cat=urlregexplist"><input type="button" value="urlregexplist"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
