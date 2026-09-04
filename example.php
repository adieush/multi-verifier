<?php

function calculatePrice($price, $discount)
{
    return $price - ($price * $discount);
}