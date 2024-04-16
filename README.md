# Pathfinder

Imagine representing a grid-shaped game map as a 2-dimensional array. Each value of this array is boolean true or false representing whether that part of the map is passable (a floor) or blocked (a wall).

Write a function that takes such a 2-dimensional array A and 2 vectors P and Q, with 0,0 being the top left corner of the map and returns the distance of the shortest path between those points, respecting the walls in the map.

eg. Given the map (where . is passable - true, and # is blocked - false)

. P . . .
. # # # .
. . . . .
. . Q . .
. . . . .
then pathfind(A, P, Q) should return 6.

Please avoid using libraries to implement the algorithmic side of this challenge, other libraries (such as PHPUnit or Jest for testing) are welcome.

**What to do** 
Implement the function described above in any mainstream language you wish
Provide unit tests for your submission
Fill in the section(s) below
