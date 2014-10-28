<?php
$d = array();
$d["lines"] = json_decode(file_get_contents("lines.txt"))->Lines;
$d["stations"] = json_decode(file_get_contents("stations.txt"))->Stations;
$ids = array("K08","D13","A15","B11","J03","G05","C15","E06","F11","E10","N06","G05");
for($i=0; $i<sizeof($ids); $i++) {
    $d["path-".$ids[$i]."-".$ids[$i+1]] = json_decode(file_get_contents("http://127.0.0.1/wmata/query.php?path=Rail.svc/json/jPath&api_key=***&format=json&FromStationCode=".$ids[$i]."&ToStationCode=".$ids[$i+1]))->Path;
    $i++;
}

die(json_encode($d));
