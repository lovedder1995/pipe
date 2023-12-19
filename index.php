<?php
# github:lovedder1995/pipe#1.0.0

$reduce = (function () {
# github:lovedder1995/array-reduce#1.0.0

return function ($array, $reducer) {
    $index = -1;
    return array_reduce($array, function($reduced, $item) use ($array, $reducer, &$index) {
        $index++;
        return $reducer($reduced, $item, $index, $array);
    }, $array[0]);
};

})();

return function ($expressions) use ($reduce) {
    return $reduce($expressions, function($value, $item, $index, $expressions) {
        $last_expression = $index === sizeof($expressions) - 1;
        if (!$last_expression) {
            return $expressions[$index + 1]($value);};

        return $value;
    }, $expressions[0]);
};
