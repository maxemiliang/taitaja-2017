<?php 

function calculateHand($p1, $p2, $p3, $p4) {
    $sum = $p1+$p2+$p3+$p4;
    $hand = round((-($sum)/100+41), 1);
    if ($hand < 1) {
        return 1;
    } else {
        return $hand;
    }
}