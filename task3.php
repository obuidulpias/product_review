<?php 
function findIndicesForSum($targetSum, $numbers) {
    $left = 0;
    $right = count($numbers) - 1;
    // echo "<pre>";
    // print_r($numbers);
    while ($left < $right) {
        $currentSum = $numbers[$left] + $numbers[$right];
        if ($currentSum === $targetSum) {
            return [$left + 1, $right + 1];
        } elseif ($currentSum < $targetSum) {
            $left++;
        } else {
            $right--;
        }
    }
    return null;
}

$targetSum = 10;
$numbers_arr = [6, 7, 2, 15];

$result = findIndicesForSum($targetSum, $numbers_arr);

if ($result !== null) {
    echo "Indices values add up $targetSum: " . implode(', ', $result);
} else {
    echo "There are no such numbers in the list sum of : $targetSum";
}

?>