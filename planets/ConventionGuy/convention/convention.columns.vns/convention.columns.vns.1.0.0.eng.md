Columns -- Version Naming System
=========================
2015-10-15



Columns (version naming system) is composed of two components separated by a dot.


The first component is called the major component, the second is called columns.



- columnsString: \<major> \<.> \<columns>
- major: [0-9]+
- columns: \<minor> (\<patch>)?
- minor: [0-9]{2}
- patch: [0-9]+


A category number is either the major number, the minor number, or the patch number.

When a new version is released, one and only one of the category numbers has to be incremented.
Incrementation must be done one by one (you cannot jump from 1 to 3 without passing by 2).
Major number starts at 1.
Minor number starts at 00.
Patch number starts at 1.



Comparison is done by comparing the categories from the left to the right, one by one until one beats the other.


The major is incremented whenever the api author thinks there is major change in the api,
which is not necessarily related to a backward compatibility break,
or when the minor number forces the major number to increase.


The minor number indicates that a new feature has been introduced, or changed, or removed.
You have 100 (from 00 to 99) available minor numbers per major number.

The patch number indicates a bug fix, or a doc update.












Sources
-----------
http://semver.org/