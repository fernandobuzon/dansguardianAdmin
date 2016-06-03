<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$filterconf = $_POST['filterconf'];
$num = `echo $filterconf | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
$num = intval($num);
$filtername = `grep '^groupname' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;

// Remove users from that filter from filtergroupslist
system("$sed -i '' '/filter$num\$/d' $filtergroupslist");

foreach (glob("$etc/dansguardianf*.conf") as $config)
{
        $arr[] = $config;
}
sort($arr, SORT_NATURAL | SORT_FLAG_CASE);

// Rename confs
foreach ($arr as $config)
{
	$current = `echo $config | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
	$current = intval($current);
	if ( $current > $num )
	{
		$next = $current - 1;
		system("mv $etc/dansguardianf$current.conf $etc/dansguardianf$next.conf");
		system("$sed -i '' 's/filter$current\$/filter$next/' $filtergroupslist");
	}
}

// Update filtergroups param from main conf
$qtd = `grep '^filtergroups ' $conf | awk -F '=' '{print \$2}' | sed 's/ //g'`;
$qtd = $qtd - 1;
system("$sed -i '' 's/^filtergroups .*/filtergroups = $qtd/' $conf");

// Remove filterlist folder
if ( $filtername && $num )
{
	system("rm -rf $lists_dir/$filtername");
}

echo '<tr><td align="center">Grupo ' . $filtername . ' removido</td></tr>';
echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
