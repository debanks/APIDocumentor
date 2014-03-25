API Documentor
==============

apiDoc.php
--------------

The translator from the XML file to the interface. Defines what goes where with the look
being defined by the CSS. Make Edits here to alter display.

xml/api.xml
--------------

The definition of the API you want to document. You can define a system to auto generate
if needed. Has the Structure:

-root
--api version

--categories
---category
----name
----functions
-----function
------type
------descriptions

------classes
-------class
--------name
--------parameters of class

------parameters
-------parameter
--------name
--------description
--------type

------errors
-------error
--------status
--------message

------examples
-------example
--------name
--------url