<?php
  function db_connect_shop()
{ global $conn;  
  $conn = @mysqli_connect("p:localhost", "root", "masterkey");
  if ($conn && mysqli_select_db($conn, "shop"))
  { // Настройка локали
    setlocale(LC_ALL, 'ru_RU.65001', 'rus_RUS.65001', 'Russian_Russia. 65001', 'russian');
    // Настройка подключения к базе данных
    mysqli_query($conn, 'SET names "utf8"');
    return($conn);
  }
  return(false);
}
 ?>