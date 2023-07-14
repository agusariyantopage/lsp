<?php
include "../koneksi.php";
$queryTables    = $mysqli->query('SHOW TABLES'); 
while($row = $queryTables->fetch_row()) 
{ 
    $target_tables[] = $row[0]; 
}   
//get table structure
foreach($target_tables as $table)
{
$result = $mysqli->query('SELECT * FROM '.$table);
$fields_amount = $result->field_count;
$rows_num=$mysqli->affected_rows;
$res = $mysqli->query('SHOW CREATE TABLE '.$table);
$TableMLine =$res->fetch_row();
$content =(!isset($content) ?  '' : $content) . "\n\n".$TableMLine[1].";\n";
for ($i = 0, $st_counter = 0; $i < $fields_amount;   $i++, $st_counter=0)
{
   while($row = $result->fetch_row())
   { //when started (and every after 100 command cycle):
   if ($st_counter%100 == 0 || $st_counter == 0 )
   {
     $content .= "\nINSERT INTO ".$table." VALUES";
   }
   $content .= "\n(";
   for($j=0; $j<$fields_amount; $j++)
   {
     $row[$j] = str_replace(array("\r\n\r\n","\n\r\n","\r\n","\n\n","\n"),array("\\r\\n","\\r\\n","\\r\\n","\\r\\n","\\r\\n"), addslashes($row[$j]) );
     if (isset($row[$j]))
     {
        $content .= '"'.$row[$j].'"' ;
     }
     else
     {
        $content .= '""';
     }
     if ($j<($fields_amount-1))
     {
        $content.= ',';
     }
   }
   $content .=")";
   //every after 100 command cycle [or at last line] ....p.s. but should be inserted 1 cycle eariler
   if ( (($st_counter+1)%100==0 && $st_counter!=0) || $st_counter+1==$rows_num)
   {
     $content .= ";";
   }
   else
   {
     $content .= ",";
   }
   $st_counter=$st_counter+1;
   }
}
}
// save as .sql file
//give additional description
$content_="\n-- Database Backup --\n";
$content_ .="-- Ver. : 1.0.1\n";
$content_ .="-- Host : Server Host\n";
$content_ .="-- Generating Time : ".date("M d").", ".date("Y")." at ".date("H:i:s:").date("A")."\n";
$content_ .=$content;
//save the file
$backup_file_name = "../maintenance/backup/".$database." ".date("Y-m-d H-i-s").".sql";
$fp = fopen($backup_file_name ,'w+');
$result = fwrite($fp, $content_);
fclose($fp);
//download file directly from browser
$file_path = $backup_file_name;
if(!empty($file_path) && file_exists($file_path)){
header("Pragma:public");
header("Expired:0");
header("Cache-Control:must-revalidate");
header("Content-Control:public");
header("Content-Description: File Transfer");
header("Content-Type: application/octet-stream");
header("Content-Disposition:attachment; filename=\"".basename($file_path)."\"");
header("Content-Transfer-Encoding:binary");
header("Content-Length:".filesize($file_path));
flush();
readfile($file_path);
exit();
}
