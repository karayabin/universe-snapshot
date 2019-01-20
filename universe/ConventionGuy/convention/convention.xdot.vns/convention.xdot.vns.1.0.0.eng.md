Xdot -- Version Naming System
=========================
2015-10-15


Xdot (Xtensible dot) is a string containing 3 components separated by dots.



Each component is a number.


The first component is called the major component, the one if the middle the minor component, 
and the third is called the patch component.



- xDot: \<major> (\<.> \<minor> (\<.> \<patch>)?  )?
- major: [0]*[1-9]+
- minor: [0]*[1-9]+
- patch: [0]*[1-9]+


When a new version is released, one and only one of the category numbers has to be incremented.
Incrementation must be done with a step of one (you cannot jump from 1 to 3 without passing by 2).
Incrementation starts with 1 for each category number.

The very first incrementation has to start with the major number,
and therefore the very first version is 1.0.0 (which can also be written as 1.0 or 1).


Comparison is done by comparing the categories from the left to the right, one by one until 
one beats (is numerically greater than) the other.


The major is incremented whenever the api author thinks there is major change in the api.
It is not necessarily related to a backward compatibility break.

The minor number indicates that a new feature has been introduced, or changed, or removed.

The patch number indicates a bug fix, or a doc update.











Sources
-----------
http://semver.org/