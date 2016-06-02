<?php

require_once('config.php');

echo '<html>';
echo '<head>';
echo '<link rel=stylesheet" href="../css/pfSense.css">';
echo '<style>a { text-decoration: none; }</style>';
echo '</head>';
echo '<body>';

echo '<table align="center">';

$status=`ps ax | grep dansguardian | sed '/grep/d'`;
if ( $status )
{
	echo '<tr><td align="center"><b>Status: <font color="green">Rodando.</b></font></td></tr>';
	echo '<tr><td align="center"><a href="ac_status.php?action=stop"><input type="button" value="Parar"></a>&nbsp;<a href="ac_status.php?action=reload"><input type="button" value="Recarregar"></a></td></tr>';
}
else
{
        echo '<tr><td align="center">Status: <font color="red">Parado.</font></td></tr>';
        echo '<tr><td align="center"><a href="ac_status.php?action=start"><input type="button" value="Iniciar"></a></td></tr>';
}

echo '<tr><td><hr></td></tr>';

echo '<tr><td align="center"><a href="edit.php?edit=exceptioniplist"><input type="button" value="Exce&ccedil;&otilde;es por IP"></a></td></tr>';
echo '<tr><td align="center"><a href="edit.php?edit=filtergroupslist"><input type="button" value="Exce&ccedil;&otilde;es por Usu&aacute;rio"></a></td></tr>';

echo '<tr><td><hr></td></tr>';

echo '<tr><td align="center"><b>Grupos de Filtragem:</b></td></tr>';
echo '<tr><td><table>';

foreach (glob("$etc/dansguardianf*.conf") as $filterconf)
{
	if ( $filterconf != "$etc/dansguardianf2.conf" )
	{
		$filtername = `grep '^groupname' $filterconf | awk -F '=' '{print \$2}' | sed 's/^ //' | sed "s/\'//g"`;
		echo '<tr><td align="center">' . $filtername . '</td><td align="right">&nbsp;&nbsp;&nbsp;<input type="button" value="Editar">&nbsp;<a href="ac_del.php?filterconf=' . $filterconf . '"><input type="button" value="Remover"></a></td></tr>';
	}
}

echo '</table></td></tr>';
echo '<tr><td><hr></td></tr>';
echo '<tr><td align="center"><a href="add.php"><input type="button" value="Novo Grupo"></a></td></tr>';

echo '</table>';

echo '</body>';
echo '</html>';

?>
