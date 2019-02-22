PngTextUtil::displayPngText
================

PngTextUtil::displayPngText — Displays a png text.

Description
---------------


public static [PngTextUtil::displayPngText](https://github.com/lingtalfi/WebBox/blob/master/doc/api/WebBox/Image/PngTextUtil/displayPngText.md)(string $text, array $options = []) : void




Displays a png text.

Note: this method is meant to be used as a webservice.

Options:
------------
- **font**: string = arial/Arial.ttf
The font to use.
If the path starts with a slash, it's an absolute path to the font file.
Else if the path doesn't start with a slash, it's a relative path to the font directory provided
by this class (the WebBox/assets/fonts directory in this repository).
- **fontSize**: int = 12
The font size.
- **color**: string = 000000
The color of the text in hexadecimal format (6 chars).
This can optionally be prefixed with a pound symbol (#).




Parameters
--------------


- text
        

- options
        


Return values
----------------

Returns void.









See Also
-----------

The [PngTextUtil](https://github.com/lingtalfi/WebBox/blob/master/doc/api/WebBox/Image/PngTextUtil.md) class.
