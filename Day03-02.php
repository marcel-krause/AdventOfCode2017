<style> * {font-family: monospace;}</style>
<?php
 
 /***************************************************************************************************************/
/*                                                                                                               */
/*                               Advent of Code 2017 - Solutions of Problems                                     */
/*                                                                                                               */
/*   Author:     Marcel Krause                                                                                   */
/*   Date:       15.01.2021                                                                                      */
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
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Day&nbsp;03&nbsp;-&nbsp;Riddle&nbsp;02&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|<br>
+------------------------------------+<br><br>
EOT;
echo($greeting);

// Load the data
$data = 325489;

// Generate all values in the circular grid until we hit a value which is greater or equal than our data
$row = 0;
$col = 0;
$n = 0;
$values = [];
while(true) {
    $adder = 0;
    if (sizeof($values) === 0) {
        $values[$col . ',' . $row] = 1;
    }
    else {
        for ($i = -1; $i <= 1; $i++) {
            for ($j = -1; $j <= 1; $j++) {
                $currKey = ($col + $i) . ',' . ($row + $j);
                if (!array_key_exists($currKey, $values)) {
                    continue;
                }
                else {
                    $adder += $values[$currKey];
                }
            }
        }
        $values[$col . ',' . $row] = $adder;
    }

    if ($adder > $data) {
        break;
    }
    if ( ( ($row === 0) && ($col === 0) ) || ( ($row === -1*$n) && ($col === $n) ) ) {
        $n++;
        $col++;
    }
    elseif ( ($col === $n) && ($row < $n) ) {
        $row++;
    }
    elseif ( ($row === $n) && ($col > -1*$n) ) {
        $col--;
    }
    elseif ( ($col === -1*$n) && ($row > -1*$n) ) {
        $row--;
    }
    elseif ( ($row === -1*$n) && ($row < $n) ) {
        $col++;
    }
}

printf('The first value that is larger than our input is %d.', $adder);

?>