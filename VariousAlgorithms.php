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

        return array_filter(array_map(fn($valueOfElements) => array_slice($elements, array_search($valueOfElements, $elements) * $sliceCount, $sliceCount), $elements));
    }

    /*
     * Objective : create an unary translator for a message in alphanumeric
     */
    static public function unaryTranslator()
    {
        $message = stream_get_line(STDIN, 100 + 1, "\n");
        $msgLen= strlen($message);

        $bits = '';
        for ($i = 0; $i < $msgLen; $i++ ) {
            $bits .= sprintf("%07d", decbin(ord($message[$i])));
        }
        error_log("string in binary format: $bits\n\noutput:");
        $matches = [];
        $occurences = preg_match_all('/0+|1+/', $bits, $matches);
        $final = '';

        foreach ($matches as $match)
        {
            for ($i = 0; $i < count($match); $i++)
            {
                $final .= (substr($match[$i], 0, 1) === "1" ? " 0" : " 00");
                $final .= ' ' . str_pad('', strlen($match[$i]), '0');
            }
        }

        return ltrim($final) . PHP_EOL;
    }
}
