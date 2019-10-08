<?php
  require ("../../../config_vp2019.php");
  require ("function_film.php");
  //echo $serverHost;
  $userName = "Dante Teder";
  $database = "if19_dante_te_1";
  //anda ennem algmuutujatele vaikimisi väärtused n4 kodutöö
  //kui postiti siis postitud väärtused panna value, et peaks meeles

  //var_dump($_POST);
  if(isset($_POST["submitFilm"])) {
    //echo "Keegi sumbittis!";
    //n4 kodutöö kõik postitud asjad võtta ja salvestada muutujatesse
    if(!empty($_POST["filmTitle"])) {
      storeFilmInfo($_POST["filmTitle"], $_POST["filmYear"], $_POST["filmDuration"], $_POST["filmGenre"], $_POST["filmStudio"], $_POST["filmDirector"]);
    }
  }

  //$filmInfoHTML = readAllFilms();

    require ("header.php");

        echo "<h1>" .$userName .", veebiprogrammeerimine 2019</h1>";
    ?>
    <p>See veebileht on valminud õppetöö käigus ning ei sisalda mingisugust tõsiseltvõetavat sisu</p>
  <hr>
  <h2>Eesti Filmi info lisamine</h2>
  <p>Meie andmebaasi uue filmi lisamine: </p>
  <hr>
  <form method="POST">
    <label>Filmi pealkiri: </label>
    <input type="text" value="<?php echo $filmTitle; ?>" name="filmTitle">
    <br>
    <label>Filmi aasta: </label>
    <input type="number" min="1912" max="2019" value ="2019" name="filmYear">
    <br>
    <label>Filmi kestus: </label>
    <input type="number" min="1" max="300" value ="75" name="filmDuration">
    <br>
    <label>Filmi žanr: </label>
    <input type="text" value="<?php echo $filmGenre; ?>" name="filmGenre">
    <br>
    <label>Filmi tootja: </label>
    <input type="text" value="<?php echo $filmStudio; ?>" name="filmStudio">
    <br>
    <label>Filmi lavastaja: </label>
    <input type="text" value="<?php echo $filmDirector; ?>" name="filmDirector">
    <br>
    <input type="submit" value="Talleta filmi info" name="submitFilm">
  </form>
</body>
</html>