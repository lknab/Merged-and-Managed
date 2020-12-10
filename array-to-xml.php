<?php
/**
 * Array to XML
 * Write a script that defines the following array. 
 * Append your own character, then convert the * array into XML with a label of "characters" and output it to a file named characters.xml.
 * Submit your code, or a link to the file in a repository that is accessible.
 */
echo '<h1>Array to XML Characters</h1>';
echo '<h2>Created by: Logan Knab</h2>';

// initialize array of characters
$CharacterArray = array(
   array("name" => "Peter Parker", "email" => "peterparker@mail.com",),
   array("name" => "Clark Kent", "email" => "clarkkent@mail.com",),
   array("name" => "Harry Potter", "email" => "harrypotter@mail.com",),);
   
// add a new character to the array
$CharacterArray[] = array("name" => "Logan","email" => "knab5363@fredonia.edu",);
 
// Convert to XML
$XMLDoc = new DOMDocument();

// create characters element
$CharactersElement = $XMLDoc->createElement('characters');

foreach ($CharacterArray as $character) {
  // create character element and place it in
  $SingleChar = $XMLDoc->createElement('character');
  $SingleChar->appendChild($XMLDoc->createElement('name', $character['name']));
  $SingleChar->appendChild($XMLDoc->createElement('email', $character['email']));
  // add single character to characters element
  $CharactersElement->appendChild($SingleChar);
}

// add characters to document
$XMLDoc->appendChild($CharactersElement);

// Writes to file
$xml_file = 'characters.xml';
if ($XMLDoc->save($xml_file)) {
  echo '<p><a href="' . $xml_file . '">'.$xml_file.'</a></p>';
}

?>