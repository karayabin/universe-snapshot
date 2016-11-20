Din (Dot incremented numbers) -- Version Naming System
=========================
2015-10-15


A version naming system's goal is to indicate the safe ranges of non breaking backward compatibility.


Din (dot incremented numbers) is a string containing 3 components separated by dots.


Each component of the string is called category number.
The first component is called the major component, the one if the middle the minor component, 
and the third is called the patch component.



- dinString: \<major> \<.> \<minor> \<.> \<patch>
- major: [0-9]+
- minor: [0-9]+
- patch: [0-9]+


When a new version is released, one and only one of the category numbers has to be incremented.
Incrementation must be one by one (you cannot jump from 1 to 3 without passing by 2), starting with 0 or 1 
for the major number, and with 0 for the minor and patch numbers.

Comparison is done by comparing the categories from the left to the right, one by one until one beats the other.


The major is incremented whenever the api author thinks there is major change in the api.
It is not necessarily related to a backward compatibility break.

The minor number indicates that a new feature has been introduced, or changed, or removed.

The patch number indicates a bug fix, or a doc update.











Sources
-----------
http://semver.org/