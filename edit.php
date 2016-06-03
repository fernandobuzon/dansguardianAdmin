<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';
echo '<form action="ac_edit.php" method="post">';

echo '<table align="center">';

if ( $_GET['edit'] == 'exceptioniplist' )
{
	echo '<input type="hidden" name="file" value="' . $_GET['edit'] . '">';
	echo '<tr><td align="center">Exce&ccedil;&otilde;es por IP</td></tr>';
	echo '<tr><td align="center"><textarea name="content" rows="30" cols="100">' . file_get_contents($exceptioniplist) . '</textarea></td></tr>';
	echo '<tr><td align="center"><input type="submit" value="Salvar">&nbsp;<a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['edit'] == 'filtergroupslist' )
{
	echo '<input type="hidden" name="file" value="' . $_GET['edit'] . '">';
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
elseif ( $_GET['filtername'] && $_GET['cat'] )
{
	$filtername = $_GET['filtername'];
	$cat = $_GET['cat'];
	$filterconf = $_GET['filterconf'];
	$file = "$lists_dir/$filtername/$cat";

	echo '<input type="hidden" name="file" value="' . $file . '">';
	echo '<input type="hidden" name="filterconf" value="' . $filterconf . '">';

	echo '<tr><td align="center"><b>' . $filtername . '</b></td></tr>';
	echo '<tr><td align="center"><b>' . $cat . '</b></td></tr>';
	echo '<tr><td align="center"><textarea name="content" rows="30" cols="100">' . file_get_contents("$file") . '</textarea></td></tr>';
	echo '<tr><td align="center"><input type="submit" value="Salvar">&nbsp;<a href="filter.php?filterconf=' . $filterconf . '"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_GET['members'] == 'OK' )
{
	$filterconf = $_GET['filterconf'];
	$filtername = $_GET['filtername'];

	echo '<input type="hidden" name="members" value="OK">';
	echo '<input type="hidden" name="filterconf" value="' . $filterconf . '">';

	$num = `echo $filterconf | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
	$num = intval($num);
	$content = `grep 'filter$num\$' $filtergroupslist | sed 's/=filter$num//'`;

	echo '<tr><td align="center"><b>Membros do grupo ' . $filtername . '</b></td></tr>';
	echo '<tr><td align="center"><textarea name="content" rows="30" cols="100">' . $content . '</textarea></td></tr>';
	echo '<tr><td align="center"><input type="submit" value="Salvar">&nbsp;<a href="filter.php?filterconf=' . $filterconf . '"><input type="button" value="Voltar"></a></td></tr>';
}

echo '</table>';

echo '</form>';
echo '</body>';
echo '</html>';

?>
