<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

if ( $_POST['file'] == 'exceptioniplist' )
{
	file_put_contents($exceptioniplist, $_POST['content']);
	echo '<tr><td align="center">Par&acirc;metros atualizados</td></tr>';
	echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_POST['file'] == 'filtergroupslist' )
{
        $lines = file($filtergroupslist);
        foreach($lines as $line)
        {
                $values = explode('=', $line);
                if (rtrim($values[1]) && rtrim($values[1]) != 'filter2')
                {
                        $new[] = "$values[0]=$values[1]";
                }
        }
	$new = implode('', $new);

	// Append '\n' to last line
	$cont = $_POST['content'] . "\n";

	// Add string '=filter2' after username
	$new .= preg_replace('~[\r\n]+~', "=filter2\n", $cont);

	file_put_contents($filtergroupslist, $new);
	system("sed -i '' '/^=/d' $filtergroupslist");

	echo '<tr><td align="center">Par&acirc;metros atualizados</td></tr>';
	echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}

echo '</table>';

echo '</body>';
echo '</html>';

?>
