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
	$content = $_POST['content'];
	system("sed -i '' '/filter2\$/d' $filtergroupslist");

	foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line)
	{
		system("sed -i '' '/^$line\=/d' $filtergroupslist");
		system("echo '$line=filter2' >> $filtergroupslist");
	}
	system("sed -i '' '/^\=/d' $filtergroupslist");

	echo '<tr><td align="center">Par&acirc;metros atualizados</td></tr>';
	echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_POST['file'] && $_POST['filterconf'] )
{
	$file = $_POST['file'];
	$filterconf = $_POST['filterconf'] ;

	file_put_contents($file, $_POST['content']);
	echo '<tr><td align="center">Par&acirc;metros atualizados</td></tr>';
	echo '<tr><td align="center"><a href="filter.php?filterconf=' . $filterconf . '"><input type="button" value="Voltar"></a></td></tr>';
}
elseif ( $_POST['members'] == 'OK' )
{
	$content = $_POST['content'];
        $filterconf = $_POST['filterconf'];

        $num = `echo $filterconf | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
        $num = intval($num);

	system("sed -i '' '/filter$num\$/d' $filtergroupslist");

	foreach(preg_split("/((\r?\n)|(\r\n?))/", $content) as $line)
	{
		system("sed -i '' '/^$line\=/d' $filtergroupslist");
		system("echo '$line=filter$num' >> $filtergroupslist");
	}
	system("sed -i '' '/^\=/d' $filtergroupslist");
 
	echo '<tr><td align="center">Par&acirc;metros atualizados</td></tr>';
	echo '<tr><td align="center"><a href="filter.php?filterconf=' . $filterconf . '"><input type="button" value="Voltar"></a></td></tr>';
}

echo '</table>';

echo '</body>';
echo '</html>';

?>
