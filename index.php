<!DOCTYPE html>
<html>
<head>
    <title>Faarah saed Dirie</title>
    <!-- style or css start -->
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .logo {
            text-align: left;
            margin-bottom: 10px;
        }

        .calculator {
            width: 300px;
            background-color: #fff;
            padding: 20px;
            border: 2px solid #00FF;
            border-radius: 5px;
        }

        .calculator form {
            display: flex;
            flex-direction: column;
        }

        .calculator label {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .calculator input[type="text"] {
            padding: 5px;
            font-size: 16px;
        }

        .calculator select {
            padding: 5px;
            font-size: 16px;
        }

        .calculator input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
           
        }
        /* end */
    </style>
</head>
<body>
    <!-- Qaypta logo part -->
    <div class="container">
        <div class="logo">
            <img src="images.png" alt="Logo">
            <h1>Calculator</h1>
        </div>
        <!-- end -->
        <div class="calculator">
        <!--  calculator form -->
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <label for="num1">Number 1:</label>
                <input type="text" name="num1" id="num1" required>
                <label for="operator">Operator:</label>
                <select name="operator" id="operator">
                    <option value="+">+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
                <label for="num2">Number 2:</label>
                <input type="text" name="num2" id="num2" required>
                <input type="submit" name="calculate" value="calculate">
                <input type="submit" name="clear" value="Clear">
            </form>
<!-- end form -->
<!-- php code ku halkaan ayuu ka bilaab mayaa -->
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['calculate'])) {
                    $num1 = $_POST['num1'];
                    $num2 = $_POST['num2'];
                    $operator = $_POST['operator'];

                    $result = 0;

                    switch ($operator) {
                        case '+':
                            $result = $num1 + $num2;
                            break;
                        case '-':
                            $result = $num1 - $num2;
                            break;
                        case '*':
                            $result = $num1 * $num2;
                            break;
                        case '/':
                            if ($num2 != 0) {
                                $result = $num1 / $num2;
                            } else {
                                echo "Error: Division by zero is not allowed.";
                            }
                            break;
                    }

                    echo "<h2>Result: $result</h2>";
                } elseif (isset($_POST['clear'])) {
                    // Clear the form inputs
                    $_POST['num1'] = "";
                    $_POST['num2'] = "";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
