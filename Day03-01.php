<style> * {font-family: monospace;}</style>
<?php
 
 /***************************************************************************************************************/
/*                                                                                                               */
/*                               Advent of Code 2017 - Solutions of Problems                                     */
/*                                                                                                               */
/*   Author:     Marcel Krause                                                                                   */
/*   Date:       14.01.2021                                                                                      */
/*   Copyright:  Copyright (C) 2021, Marcel Krause                                                               */
/*   License:    GNU General Public License (GNU GPL-3.0-or-later)                                               */
/*                                                                                                               */
/*               This program is released under GNU General Public License (GNU GPL-3.0-or-later).               */
/*               This program is free software: you can redistribute it and/or modify it under the terms of the  */
/*               GNU General Public License as published by the Free Software Foundation, either version 3 of    */
/*               the License, or any later version.                                                              */
/*                                                                                                               */
/*               This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;       */
/*               without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.       */
/*               See the GNU General Public License for more details.                                            */
/*                                                                                                               */
/*               You have received a copy LICENSE.md of the GNU General Public License along with this program.  */
/*                                                                                                               */
 /***************************************************************************************************************/


/*---------------------------*/
/*        Main Program       */
/*---------------------------*/

$greeting = <<<EOT
+------------------------------------+<br>
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Advent&nbsp;of&nbsp;Code&nbsp;2017&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day&nbsp;03&nbsp;-&nbsp;Riddle&nbsp;01&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
+------------------------------------+<br><br>
EOT;
echo($greeting);

// Load the data
$data = 325489;

// Find the two squares between which the input data lies
$n = 1;
while(true) {
    $sqLower = pow(2*($n-1)+1, 2);
    $sqUpper = pow(2*$n+1, 2);
    if (($data >= $sqLower) && ($data <= $sqUpper)) {
        break;
    }
    $n++;
}

// Define the min, max and starting values for the Manhattan distance calculation
$minDist = $n;
$maxDist = 2*$n;
$currDist = 2*$n - 1;
$startVal = pow(2*($n-1)+1, 2) + 1;
$valDiff = $data - $startVal;
$add = -1;

// Iterate over the Manhattan distances that are possible
for ($i = 0; $i < $valDiff; $i++) {
    if ($currDist === $minDist) {
        $add = 1;
    }
    if ($currDist === $maxDist) {
        $add = -1;
    }
    $currDist += $add;
}

printf('Data from step %d must be carried %d steps.', $data, $currDist);

?>