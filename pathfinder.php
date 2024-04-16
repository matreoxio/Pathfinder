<?php

class Pathfinder {

    // Check if a given coordinate (row, col) is valid.
    // $grid -  Represents the game map.
    // $row -   Row index of the coordinate.
    // $col -   Column index of the coordinate.
    public function isValid($grid, $row, $col) {

        // Calculate the number of rows and columns in the grid 
        $rows = count($grid);
        $cols = count($grid[0]);

        // Check if coordinates are within the bounds and if they are passable(true)
        return ($row >= 0 && $row < $rows && $col >= 0 && $col < $cols && $grid[$row][$col]);
    }

    // Calculates the shortest path between two points on the grid 
    // $grid -  Represents the game map.
    // $start - Starting coordinates.
    // $end -   Target coordinates.
    public function shortestPath($grid, $start, $end) {

        // Calculate the number of rows and columns in the grid 
        $rows = count($grid);
        $cols = count($grid[0]);

        //Create a 2-dimensional array to keep track of visited cells
        $visited = array_fill(0, $rows, array_fill(0, $cols, false));

        // Create a queue
        $queue = new SplQueue();

        // Add the starting point ($start) into the queue along with its distance which is 0
        $queue->enqueue([$start, 0]);

        // Mark the starting point as visited in the $visited array
        $visited[$start[0]][$start[1]] = true;


        // Add all the possible directions taht we can move to
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        // Loop through the queue until it's empty
        while (!$queue->isEmpty()) {

            // Remove current cell and its distance from the queue 
            [$current, $distance] = $queue->dequeue();


            // Check if the current position is our goal coordinate
            if ($current[0] == $end[0] && $current[1] == $end[1]) {
                return $distance;
            }

            // Iterate through possible directions and figgure out where we can move to
            foreach ($directions as $direction) {

                // New direction
                $newRow = $current[0] + $direction[0];
                $newCol = $current[1] + $direction[1];

                // Check if new cooridnates are within the grid bounds and passable
                if ($this->isValid($grid, $newRow, $newCol) && !$visited[$newRow][$newCol]) {
                    // If valid add new coordinates to the queue, increase distance and mark as visited
                    $queue->enqueue([[$newRow, $newCol], $distance + 1]);
                    $visited[$newRow][$newCol] = true;
                }
            }
        }

        return -1; // No valid path
    }

}


// Example based on provided map:
$map = [
    [true, true, true, true, true],
    [true, false, false, false, true],
    [true, true, true, true, true],
    [true, true, true, true, true],
    [true, true, true, true, true]
];

$start = [0, 1];
$end = [3, 2];

$test = new PathFinder();
echo "Shortest path length: " . $test->shortestPath($map, $start, $end);
?>