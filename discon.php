<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #1f1f1f, #2c3e50);
        margin: 0;
        padding: 40px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #ecf0f1;
    }

    .container {
        background-color: #2c3e50;
        padding: 30px 40px;
        border-radius: 16px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
        max-width: 500px;
        width: 100%;
        animation: fadeIn 0.6s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #ffffff;
        margin-bottom: 25px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #bdc3c7;
        font-weight: 600;
    }

    input[type="number"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #444;
        background-color: #1e272e;
        color: #ecf0f1;
        border-radius: 8px;
        transition: border 0.3s ease;
        font-size: 15px;
    }

    input[type="number"]:focus {
        border-color: #00a8ff;
        outline: none;
    }

    .diskon-container {
        display: flex;
        gap: 10px;
        margin-bottom: 10px;
    }

    .diskon-container label {
        display: flex;
        align-items: center;
        gap: 5px;
    }
    
    button {
        background-color: #00a8ff;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    button:hover {
        background-color: #0097e6;
    }

    h3 {
        margin-top: 20px;
        color: #f1f2f6;
        font-weight: normal;
    }

    h3[style*="color: red;"] {
        background-color: #ff6b6b20;
        padding: 10px;
        border-left: 5px solid #ff6b6b;
        border-radius: 6px;
        color: #ff6b6b;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>



<body>
    <div class="container">
        <h2>Hitung Diskon</h2>
        <form method="POST" action="">
            <label for="harga">Harga barang</label>
            <input type="number" id="harga" name="harga" step="any" required>
            <br>
            <label>Diskon (%)</label>
            <div class="diskon-container">
                <label><input type="radio" name="diskon" value="0" required> 0%</label>
                <label><input type="radio" name="diskon" value="5"> 5%</label>
                <label><input type="radio" name="diskon" value="10"> 10%</label>
                <label><input type="radio" name="diskon" value="15"> 15%</label>
                <label><input type="radio" name="diskon" value="20"> 20%</label>
            </div>
            <br>
            <button type="submit" name="submit">Hitung</button>
        </form>

        <?php
        $harga = 0;
        $diskon = 0;
        $total_diskon = 0;
        $total_bayar = 0;
        $error = '';

        if (isset($_POST['submit'])) {
            $harga = floatval($_POST['harga']);
            $diskon = floatval($_POST['diskon']);

            if ($harga <= 0 || $diskon < 0 || $diskon > 100) {
                $error = "Harga harus lebih dari 0 dan diskon antara 0-100%";
            }else{
                $total_diskon = $harga * $diskon / 100;
                $total_bayar = $harga - $total_diskon;
            }}
        ?>
        <?php if ($error):?>
            <h3 style="color: red;"><?php echo $error;?></h3>
        <?php elseif (isset($_POST['submit'])): ?>
            <h3>Harga = Rp. <?php echo number_format($harga, 2, ',', '.');?></h3>
            <h3>Diskon = Rp. <?php echo number_format($total_diskon, 2, ',', '.');?></h3>
            <h3>Total Bayar = Rp. <?php echo number_format($total_bayar, 2, ',', '.');?></h3>
        <?php endif; ?>
    </div>
</body>
</html>