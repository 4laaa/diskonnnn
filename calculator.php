<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #d7d7d7;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .calculator {
        background-color: #2c2c2c;
        padding: 20px;
        border-radius: 16px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
        width: 300px;
        color: white;
    }

    .calculator h2 {
        text-align: center;
        margin-bottom: 20px;
        font-weight: normal;
        color: #fff;
    }

    form {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 10px;
    }

    input[type="number"] {
        grid-column: span 2;
        padding: 15px;
        font-size: 1.2rem;
        border: none;
        border-radius: 10px;
        background-color: #444;
        color: white;
    }

    select {
        grid-column: span 2;
        padding: 15px;
        font-size: 1.2rem;
        border: none;
        border-radius: 10px;
        background-color: #444;
        color: white;
    }

    button {
        grid-column: span 4;
        padding: 15px;
        font-size: 1.2rem;
        border: none;
        border-radius: 10px;
        background-color: #ff9500;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #e08900;
    }

    .result-box {
        margin-top: 15px;
        padding: 15px;
        background-color: #1e1e1e;
        border-radius: 10px;
        font-size: 1.3rem;
        text-align: right;
        color: #00ff94;
        border: 1px solid #555;
    }

    ::placeholder {
        color: #ccc;
    }
</style>


<body>
    <div class="calculator">
        <h2>Kalkulator sederhana</h2>
        <form method="post">
            <input type="number" step="any" name="num1" required placeholder="Angka pertama">
            <select name="operator" id="">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="number" step="any" name="num2" required placeholder="Angka kedua">
            <button type="submit" name="calculate">Hitung</button>
        </form>
        <?php

        if (isset($_POST['calculate'])) {
            $num1 = (float) $_POST['num1'];
            $num2 = (float) $_POST['num2'];
            $operator = $_POST['operator'];
            $result = '';

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
                    if ($num2 == 0) {
                        $result = "Error: pembagian dengan nol!";
                    }else{
                        $result = $num1 / $num2;
                    }
                    break;
                    default:
                    $result = "operator tidak valid";
                    break;
            }

            echo "<div class='result-box'>Hasil: $result</div>";
        }
        ?>
    </div>
</body>
</html>