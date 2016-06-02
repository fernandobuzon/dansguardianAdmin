<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$name = $_POST['filtername'];

$qtd = `grep '^filtergroups ' $conf | awk -F '=' '{print \$2}' | sed 's/ //g'`;
$qtd = $qtd + 1;

system("$sed -i '' 's/^filtergroups .*/filtergroups = $qtd/' $conf");
system("cp -rp $lists_install $lists_dir/$name");
system("cp -p $conf_install $etc/dansguardianf$qtd.conf");
system("$sed -i '' 's/change_group_name/$name/' $etc/dansguardianf$qtd.conf");

echo '<tr><td align="center">Filtro ' . $_POST['filtername'] . ' adicionado</td></tr>';
echo '<tr><td align="center"><a href="index.php"><input type="button" value="Voltar"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
