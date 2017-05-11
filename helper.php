<?php
function createComponent($xml, $rootTag, $name) {
   $xml->load("pro.xml");
  // New component (packagedElement)Tag with all its attributes
  $componentTag = $xml->createElement("packagedElement");
  $componentTag->setAttribute("name", $name);
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
}
