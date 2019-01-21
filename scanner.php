<?php
error_reporting(0);
$pr = file_get_contents("lib/port.txt");
$port = explode("\n", $pr);
echo "\r
###################################
# ICWR-TECH - Service Port Scaner #
#       Coded By ErrorByte        #
###################################
\n";
while(true) {
echo "Target => ";
$target = trim(fgets(STDIN));
if($target == "exit") {
echo "\nGood Bye ...\n\n";
exit;
}
echo "\nScanning...\n\n";
if(fsockopen("udp://".$target, 53)) {
echo "Result :\n\n";
foreach($port as $p) {
$con = fsockopen($target, $p);
$res = "Opened";
if($con) {
echo $p." ".getservbyport($p, 'tcp')." $res\n";
fclose($con);
} else {
fclose($con);
continue;
}
}
} else {
echo "Error : $target Not Connected\n";
}
echo "\n";
}
?>
