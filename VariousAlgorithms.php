<?php

/**
 * @version PHP 8.1
 */
class VariousAlgorithms
{
    /*
     * Objective : reproduce the array_chunk native function
     */
    static public function arrayChunk($sliceCount)
    {
        $elements = ['A', 'B', 'C', 'D', 'E', 'F'];

        return array_filter(array_map(fn ($valueOfElements) => array_slice($elements, array_search($valueOfElements, $elements) * $sliceCount, $sliceCount), $elements));
    }
}

var_dump(VariousAlgorithms::arrayChunk(3));

