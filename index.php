<html>
 <head>
  <title></title>
 </head>
 <body>
<?php

// echo '<pre>';
// die(var_dump($_SERVER));
// echo '<pre>';

require 'helper.php';

// die(createComponent());

if (isset($_REQUEST['ok'])) {
 $xml = new DOMDocument("1.0","UTF-8");
 $xml->load("pro.xml");
 $rootTag = $xml->getElementById("_WiWHMDQBEeegr7mwXb5Jtw");

 if ($_REQUEST['device'] !== "" && $_REQUEST['assembly'] !== "") {
   $deviceTag = $xml->getElementsByTagName("packagedElement")->item(0);
   $deviceOwnAttrTag = $xml->getElementsByTagName("ownedAttribute")->item(0);

   $assemblyTag = $xml->getElementsByTagName("packagedElement")->item(2);

   $deviceTag->setAttribute("name", $_REQUEST['device']);
   $deviceOwnAttrTag->setAttribute("name", $_REQUEST['assembly']);

   $assemblyTag->setAttribute("name", $_REQUEST['assembly']);
 }

 // New component (packagedElement)Tag with all its attributes
 $componentTag = $xml->createElement("packagedElement");
 $componentTag->setAttribute("name", $_REQUEST['component']);
 $componentTag->setAttribute("xmi:type", "uml:Association");
 $componentTag->setAttribute("xmi:id", "_WiWHPTQBEeegr7mwXb5Jtw");
 $componentTag->setAttribute("memberEnd", "_WiWHOjQBEeegr7mwXb5Jtw _WiWHPjQBEeegr7mwXb5Jtw");
 $componentTag->setAttribute("xmi:type", "uml:Association");

 // ownedEnd tag goes into packagedElement
 $ownedEndTag = $xml->createElement("ownedEnd");
 $ownedEndTag->setAttribute("xmi:id", "_WiWHPjQBEeegr7mwXb5Jtw");
 $ownedEndTag->setAttribute("visibility", "public");
 $ownedEndTag->setAttribute("type", "_WiWHOTQBEeegr7mwXb5Jtw");
 $ownedEndTag->setAttribute("association", "_WiWHPTQBEeegr7mwXb5Jtw");

 // new lowerValueTag goes in to ownedEndTag
 $lowerValueTag = $xml->createElement("lowerValue");
 $lowerValueTag->setAttribute("xmi:type", "uml:LiteralInteger");
 $lowerValueTag->setAttribute("xmi:id", "_WiWHPzQBEeegr7mwXb5Jtw");

 // appendChild to ownedEnd
 $ownedEndTag->appendChild($lowerValueTag);

 // appendChild to componentTag
 $componentTag->appendChild($ownedEndTag);

 $rootTag->appendChild($componentTag);

 $xml->save("pro.xml");
}
?>

<form action="index.php" method="post">
 Device Name: <input type="text" name="device" /> <br>
 Assembly Name: <input type="text" name="assembly" /> <br>
 Component Name: <input type="text" name="component" /> <br>
 <input type="submit" value="Generate XML"name="ok">
</form>

 </body>
</html>﻿
