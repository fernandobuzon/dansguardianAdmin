<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$method = $_GET['method'];

if ($method == 'ip')
{
	system("$sed -i '' \"s/^authplugin.*$/authplugin = '\/usr\/local\/etc\/dansguardian\/authplugins\/ip.conf'/\" $conf");
}
elseif ($method == 'login')
{
	system("$sed -i '' \"s/^authplugin.*$/authplugin = '\/usr\/local\/etc\/dansguardian\/authplugins\/proxy-basic.conf'/\" $conf");
}

echo '<tr><td align="center">M&eacute;todo de autentica&ccedil;&atilde;o alterado para ' . $method . '.</td></tr>';
echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
