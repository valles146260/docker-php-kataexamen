<?php

namespace Deg540\DockerPHPKataExamen;

class Example
{
    function add(string $numbers2): int
    {
        $cleanedNumbers = $this->getCleanedString($numbers2);

        if ($this->isOnlyOneNumber($cleanedNumbers)) {
            return intval($cleanedNumbers[0]);
        }

        if ($this->isMoreOfOneNumber($cleanedNumbers)) {
            return array_sum(array_map('intval', $cleanedNumbers));
        }

        $this->checkNegativeNumbers($cleanedNumbers);

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

    /**
     * @param array $numbers
     * @return void
     */
    public function checkNegativeNumbers(array $numbers): void
    {
        $negativos = [];
        foreach ($numbers as $number) {
            if (intval($number) < 0) {
                $negativos[] = $number;
            }
        }

        if (!empty($negativos) > 0) {
            throw new \InvalidArgumentException("negativos no soportados: " . implode(", ", $negativos));
        }
    }

    /**
     * @param string $numbers
     * @return string[]
     */
    public function getCleanedString(string $numbers): array
    {
        $numbers = explode(',', $numbers);
        return $numbers;
    }
}
