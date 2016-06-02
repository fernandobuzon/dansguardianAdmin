<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';
echo '<form action="ac_edit.php" method="post">';

echo '<input type="hidden" name="file" value="' . $_GET['edit'] . '">';

echo '<table align="center">';

if ( $_GET['edit'] == 'exceptioniplist' )
{
	echo '<tr><td align="center">Exce&ccedil;&otilde;es por IP</td></tr>';
	echo '<tr><td align="center"><textarea name="content" rows="30" cols="100">' . htmlspecialchars(file_get_contents($exceptioniplist)) . '</textarea></td></tr>';
	echo '<tr><td align="center"><input type="submit" value="Salvar">&nbsp;<a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['edit'] == 'filtergroupslist' )
{
	echo '<tr><td align="center">Exce&ccedil;&otilde;es por Usu&aacute;rios</td></tr>';
	echo '<tr><td align="center">(Um usu&aacute;rio por linha)</td></tr>';
	echo '<tr><td align="center"><textarea name="content" rows="30" cols="100">';

	$lines = file($filtergroupslist);
	foreach($lines as $line)
	{
		//echo $line;
		$values = explode('=', $line);
		if (rtrim($values[1]) == 'filter2')
		{
			$to_sort[] = $values[0] . "\n";
		}
	}

	sort($to_sort);
	foreach($to_sort as $line)
	{
		echo $line;
	}

	echo '</textarea></td></tr>';
	echo '<tr><td align="center"><a href="ac_edit.php"><input type="submit" value="Salvar"></a>&nbsp;<a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}

echo '</table>';

echo '</form>';
echo '</body>';
echo '</html>';

?>
