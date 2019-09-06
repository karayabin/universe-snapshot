[Back to the Ling/Light_SpinKitHelper api](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper.md)<br>
[Back to the Ling\Light_SpinKitHelper\SpinKitHelperService class](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper/SpinKitHelperService.md)


SpinKitHelperService::render
================



SpinKitHelperService::render — Renders the spinkit html markup in the chosen style.




Description
================


public [SpinKitHelperService::render](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper/SpinKitHelperService/render.md)(string $style = null, string $color = null) : string




Renders the spinkit html markup in the chosen style.
Note: you need to manually add the sk-loading on the position:relative element
containing this markup in order to make the overlay appear.

The available styles are (along with the class to add the background-color on):

- rotatingPlane              .sk-rotating-plane
- doubleBounce               .sk-double-bounce .sk-child
- wave                       .sk-wave .sk-rect
- wanderingCubes             .sk-wandering-cubes .sk-cube
- pulse                      .sk-spinner-pulse
- chasingDots                .sk-chasing-dots .sk-child
- threeBounce                .sk-three-bounce .sk-child
- circle                     .sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before
- cubeGrid                   .sk-cube-grid .sk-cube
- fadingCircle               .sk-circle .sk-child::before, .sk-fading-circle .sk-circle::before
- foldingCube                .sk-folding-cube .sk-cube::before




Parameters
================


- style

    

- color

    A css color.


Return values
================

Returns string.


Exceptions thrown
================

- [Exception](http://php.net/manual/en/class.exception.php).&nbsp;







Source Code
===========
See the source code for method [SpinKitHelperService::render](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/SpinKitHelperService.php#L108-L267)


See Also
================

The [SpinKitHelperService](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper/SpinKitHelperService.md) class.

Previous method: [setDefaultColor](https://github.com/lingtalfi/Light_SpinKitHelper/blob/master/doc/api/Ling/Light_SpinKitHelper/SpinKitHelperService/setDefaultColor.md)<br>

