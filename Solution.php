class Solution {
    /**
     * @param String[] $tokens
     * @return Integer
     */
    function evalRPN($tokens) {
        $stack = [];
        $operators = ['+', '-', '*', '/'];

        if (count($tokens) == 1) {
            return $tokens[0];
        }

        foreach ($tokens as $token) {
            if (is_numeric($token)) {
                array_push($stack, $token);
            } else {
                $operand2 = array_pop($stack);
                $operand1 = array_pop($stack);

                switch ($token) {
                    case '+':
                        $result = $operand1 + $operand2;
                        break;
                    case '-':
                        $result = $operand1 - $operand2;
                        break;
                    case '*':
                        $result = $operand1 * $operand2;
                        break;
                    case '/':
                        $result = (int)($operand1 / $operand2);
                        break;
                }

                array_push($stack, $result);                
            }
        }

        return array_pop($stack);
    }
}
