<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';
echo '<form action="ac_add.php" method="post">';

echo '<table align="center">';

echo '<tr><td align="center">Novo Grupo de Filtragem</td></tr>';
echo '<tr><td align="center">(Somente letras min&uacute;sculas e sem espa&ccedil;o)</td></tr>';
echo '<tr><td align="center"><input type="text" name="filtername"></td></tr>';
echo '<tr><td align="center"><input type="submit" value="Confirmar">&nbsp;<a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</form>';
echo '</body>';
echo '</html>';

?>
