<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Проверка на простое число</title>
</head>
<body>
    <h2>Введите число от 0 до 1 000 000:</h2>
    <form method="post">
        <input type="number" name="number" min="0" max="1000000" required>
        <button type="submit" name="submit">Проверить</button>
    </form>

    <?php
    function isPrime($num) {
        if ($num <= 1) {
            return false;
        }
        for ($i = 2; $i <= sqrt($num); $i++) {
            if ($num % $i == 0) {
                return false;
            }
        }
        return true;
    }

    if (isset($_POST['submit'])) {
        $number = $_POST['number'];

        if (is_numeric($number)) {
            if ($number >= 0 && $number <= 1000000) {
                if (isPrime($number)) {
                    echo "<p>$number является простым числом.</p>";
                } else {
                    $left_prime = $number - 1;
                    while (!isPrime($left_prime)) {
                        $left_prime--;
                    }
                    $right_prime = $number + 1;
                    while (!isPrime($right_prime)) {
                        $right_prime++;
                    }
                    echo "<p>$number не является простым числом.</p>";
                    echo "<p>Ближайшее простое число слева: $left_prime</p>";
                    echo "<p>Ближайшее простое число справа: $right_prime</p>";
                }
            } else {
                echo "<p>Число должно быть от 0 до 1 000 000.</p>";
            }
        } else {
            echo "<p>Пожалуйста, введите корректное число.</p>";
        }
    }
    ?>
</body>
</html>

