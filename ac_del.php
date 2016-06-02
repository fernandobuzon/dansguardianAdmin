<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$filterconf = $_GET['filterconf'];
$num = `echo $filterconf | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
$num = intval($num);
$filtername = `grep '^groupname' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;

// Rename confs
foreach (glob("$etc/dansguardianf*.conf") as $config)
{
	$current = `echo $config | awk -F 'dansguardianf' '{print \$2}' | sed 's/\.conf//'`;
	$current = intval($current);
	if ( $current > $num )
	{
		$next = $current - 1;
		system("mv $etc/dansguardianf$current.conf $etc/dansguardianf$next.conf");
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

echo '<tr><td align="center">Filtro ' . $filtername . ' removido</td></tr>';
echo '<tr><td align="center">Os usu&aacuterios dessa filtragem passar&atilde;o agora para o filtro default</td></tr>';
echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
