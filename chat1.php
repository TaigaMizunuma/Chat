<?php
if(isset($_POST["botan"]))
{
   $moji='"';
   $moji.=htmlspecialchars($_POST["namae"],ENT_NOQUOTES);
   $moji.='"';

   $moji.=",";

   $moji.='"';
   $moji.=htmlspecialchars($_POST["data"],ENT_NOQUOTES);
   $moji.='"';

   $moji.=",";


   $moji.='"';
   $moji.=date("Y/m/d G:H:s");
   $moji.='"';

   $moji.="\r\n";

   $file=@fopen("test10_2.csv","a");
   if(!$file)
   {
   }
   else
   {
      fputs($file,$moji);
      fclose($file);
   }

   $_POST["botan"]=NULL;
}
?>



<?php
$file=@fopen("test10_2.csv","r");
if(!$file)
{
}
else
{
  $i=0;
  while($data=fgetcsv($file,1024))
  {
     $List[$i]=$data;
     $i++;
  }
  fclose($file);

  print "<table border=1>";
  for($i=count($List)-5;$i<count($List);$i++)
  {
     if($i<0)
     {
         continue;
     }
     print "<tr>";
     for($j=0;$j<count($List[$i]);$j++)
     {
        print "<td>";
        print nl2br($List[$i][$j]);
        print "</td>";
     }
     print "</tr>";
  }
  print "</table>";
}
