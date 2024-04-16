<?php

require_once 'pathfinder.php'; // Include file that I am testing

use PHPUnit\Framework\TestCase;

class PathfinderTest extends TestCase
{

    // Run tests for isValid function
    public function testIsValid()
    {

        $pathfinder = new Pathfinder();

        $grid = [
            [true, true, true, true, true],
            [true, false, false, false, true],
            [true, true, true, true, true],
            [true, true, true, true, true],
            [true, true, true, true, true]
        ];

        // Testing valid and invalid coordinates

        // Top left corner, should be valid
        $this->assertTrue($pathfinder->isValid($grid, 0, 0)); 

        // Inside a wall, should be invalid
        $this->assertFalse($pathfinder->isValid($grid, 1, 1)); 

        // Out of bounds, should be invalid
        $this->assertFalse($pathfinder->isValid($grid, 5, 5)); 
    }


    public function testShortestPath()
    {

        $pathfinder = new Pathfinder();

        $map = [
            [true, true, true, true, true],
            [true, false, false, false, true],
            [true, true, true, true, true],
            [true, false, false, false, false],
            [true, true, true, false, true]
        ];

        $start = [0, 0];
        $end = [4, 2];

        // Expected shortest path length from (0,0) to (4,2) in the given map is 6
        $this->assertEquals(6, $pathfinder->shortestPath($map, $start, $end));

        // Testing when start and end points are the same
        $this->assertEquals(0, $pathfinder->shortestPath($map, $start, $start));

        // Testing when start and end points are next to eachother
        $start = [0, 0];
        $end = [0, 1];
        $this->assertEquals(1, $pathfinder->shortestPath($map, $start, $end));

        // Testing when there is no valid path between start and end points
        $start = [0, 0];
        $end = [4, 4];
        $this->assertEquals(-1, $pathfinder->shortestPath($map, $start, $end));
    }
}
?>
