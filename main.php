# github:lovedder1995/pipe#1.0.0

$reduce = module('node_modules/array-reduce/index.php')

return function ($expressions) use ($reduce)
    return $reduce($expressions, function($value, $item, $index, $expressions) {
        $last_expression = $index === sizeof($expressions) - 1
        if (!$last_expression)
            return $expressions[$index + 1]($value)

        return $value
    }, $expressions[0])
