<?php

namespace Deg540\DockerPHPBoilerplate;

class Example
{
    function add(string $numbers): int
    {
        $numbers = explode(',',$numbers);

        if ($this->isOnlyOneNumber($numbers)) {
            return intval($numbers[0]);
        }

        if ($this->isMoreOfOneNumber($numbers)) {
            return array_sum(array_map('intval', $numbers));
        }
        
        return 0;
    }


    /**
     * @param array $numbers
     * @return bool
     */
    public function isMoreOfOneNumber(array $numbers): bool
    {
        return count($numbers) > 1;
    }

    /**
     * @param array $numbers
     * @return bool
     */
    public function isOnlyOneNumber(array $numbers): bool
    {
        return count($numbers) === 1;
    }
}
