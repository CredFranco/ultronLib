<?php

namespace Ultron\Adapter;

class FiltersBrokersAdapter
{
    public static function adapt(array $data):array
    {
        $fieldMap = [
            'name'        => 'NomeCorretor',
            'broker_cod'  => 'CodCorretor',
        ];

        $convertedFilters = [];

        foreach ($data as $key => $value) {
            if ($key === 'orderby' && isset($fieldMap[$value])) {
                $convertedFilters['orderby'] = $fieldMap[$value];
                continue;
            }

            $newKey = $fieldMap[$key] ?? $key;
            $convertedFilters[$newKey] = $value;
        }

        return $convertedFilters;
    }
}
