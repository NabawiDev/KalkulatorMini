<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Mini</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .calculator {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px; /* Set width of calculator container */
        }
        input[type="number"], input[type="submit"] {
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        input[type="number"] {
            width: calc(100% - 22px); /* Full width minus padding and border */
        }
        input[type="submit"] {
            width: 60px; /* Fixed width for buttons */
            background-color: #4CAF50;
            color: #fff;
            border: none;
            cursor: pointer;
            margin: 5px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .clear-btn {
            background-color: #f44336; /* Red color for clear button */
        }
        .clear-btn:hover {
            background-color: #e53935;
        }
        .input-group {
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Kalkulator Mini</h2>
        <form method="post" action="">
            <div class="input-group">
                <input type="number" name="num1" placeholder="0">
            <div class="input-group">
                <input type="number" name="num2" placeholder="0">
            </div>
            <div class="input-group">
                <input type="submit" name="operation" value="+">
                <input type="submit" name="operation" value="-">
                <input type="submit" name="operation" value="x">
                <input type="submit" name="operation" value="/">
              
            </div>
            <?php
            $hasil = '';
            $angka1 = $_POST["num1"];
            $angka2 = $_POST["num2"];
            $operation = isset($_POST["operation"]) ? $_POST["operation"] : '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['clear'])) {
                    // Reset inputs and results
                    $angka1 = $angka2 = $hasil = '';
                } elseif (isset($operation)) {
                    // Perform the calculation based on the selected operation
                    switch ($operation) {
                        case '+':
                            $hasil = $angka1 + $angka2;
                            break;
                        case '-':
                            $hasil = $angka1 - $angka2;
                            break;
                        case 'x':
                            $hasil = $angka1 * $angka2;
                            break;
                        case '/':
                            if ($angka2 != 0) {
                                $hasil = $angka1 / $angka2;
                            } else {
                                $hasil = 'Tidak dapat membagi dengan nol';
                            }
                            break;
                        default:
                            $hasil = 'Operasi tidak valid';
                    }
                }
            }
            ?>
            <div class="input-group">
                <input type="number" readonly value="<?php echo htmlspecialchars($hasil); ?>" placeholder="Hasil">
                <input type="submit" class="clear-btn" name="clear" value="Clear">
            </div>
        </form>
    </div>
</body>
</html>
