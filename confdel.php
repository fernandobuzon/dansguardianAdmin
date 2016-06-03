<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';
echo '<form action="ac_del.php" method="post">';

$filterconf = $_GET['filterconf'];
$filtername = `grep '^groupname' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;

echo '<table align="center">';

echo '<tr><td align="center"><b>Confirma a exclus&atilde;o do Grupo de Filtragem ' . $filtername . '?</b></td></tr>';
echo '<tr><td align="center">Os usu&aacuterios desse grupo passar&atilde;o para o filtro default</td></tr>';

echo '<tr><td align="center"><input type="hidden" name="filterconf" value="' . $filterconf . '"></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Confirmar">&nbsp;<a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</form>';
echo '</body>';
echo '</html>';

?>
