<!DOCTYPE html>
<html lang="id">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Hitung Faktorial</title>
   <style>
   body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 20px;
   }

   h1 {
      text-align: center;
      color: #333;
   }

   form {
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      max-width: 400px;
      margin: 0 auto;
   }

   label {
      display: block;
      margin-bottom: 10px;
      font-weight: bold;
   }

   input[type="number"] {
      width: 95%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
   }

   button {
      width: 100%;
      padding: 10px;
      background-color: #5cb85c;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
   }

   button:hover {
      background-color: #4cae4c;
   }

   .error {
      color: red;
      font-weight: bold;
      text-align: center;
      margin-top: 20px;
      font-size: 18px;
   }

   .result {
      margin-top: 20px;
      font-size: 18px;
      text-align: center;
      font-weight: bold;
   }
   </style>
</head>

<body>
   <h1>Hitung Faktorial</h1>
   <form method="post">
      <label for="angka">Masukkan Angka:</label>
      <input type="number" name="angka" required>
      <button type="submit" name="submit">Hitung</button>
   </form>

   <?php

class Minus extends Exception {}
class Infinity extends Exception {}   

    if (isset($_POST['submit'])) {
        $angka = $_POST['angka'];

        try {
            if ($angka < 0) {
                throw new Minus("Angka tidak boleh <b>kurang</b> dari 0.");
            } elseif ($angka == 0) {
                $faktorial = 1;
                $proses = "1"; // Menampilkan proses untuk 0!
            }  elseif ($angka > 170) {
               throw new Infinity("Faktorial terlalu besar (INF)!!");
            } elseif ($angka >= 1) {
               function hitungFaktorial($angka) {
                  $faktorial = 1;
                  $proses = ""; // Variabel untuk menyimpan langkah perhitungan
                  for ($i = $angka; $i >= 1; $i--) {
                      $faktorial *= $i;
                      $proses .= "$i" . ($i > 1 ? " x " : " "); // Menambahkan langkah ke string
                  }
                  
                  return [$faktorial, $proses]; // Mengembalikan faktorial dan proses
              }
  
              list($faktorial, $proses) = hitungFaktorial($angka); // Mengambil nilai faktorial dan proses
            }
            
            echo "<div class='result'>Faktorial dari $angka adalah : $faktorial</div>";
            echo "<div class='result'>Proses Perhitungan : $angka! = $proses</div>";
            
        } catch (Exception $e) {
            echo "<div class='error'>ERROR : " . $e->getMessage() . "</div>";
        }
    }
    ?>
</body>

</html>