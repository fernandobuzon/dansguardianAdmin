<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

if ( $_GET['action'] == 'stop' )
{
	system("$bin -q");
	echo '<tr><td align="center">Servi&ccedil;o parado</td></tr>';
	echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['action'] == 'start' )
{
        system("$bin");
        echo '<tr><td align="center">Servi&ccedil;o inicializado</td></tr>';
        echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['action'] == 'reload' )
{
        system("$bin -g");
        echo '<tr><td align="center">Configura&ccedil;&otilde;es recarregadas</td></tr>';
        echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['action'] == 'restart' )
{
        system("$bin -q");
	sleep(3);
        system("$bin");
        echo '<tr><td align="center">Servi&ccedil;o reiniciado</td></tr>';
        echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}

echo '</table>';

echo '</body>';
echo '</html>';

?>
