<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$peso = $_POST['naughtynesslimit'];
$filterconf = $_POST['filterconf'];

system("sed -i '' 's/^naughtynesslimit.*/naughtynesslimit = $peso/' $filterconf");

echo '<tr><td align="center">Peso m&aacute;ximo alterado para ' . $peso . '</td></tr>';
echo '<tr><td align="center"><a href="filter.php?filterconf=' . $filterconf . '"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
