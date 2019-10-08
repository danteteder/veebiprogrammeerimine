<?php 
      function readAllFilms(){ 
        var_dump($GLOBALS);
        //loome andmebaasiühenduse
        //$conn = new mysqli ($serverHost, $serverUsername, $serverPassword, $database);
        $conn = new mysqli ($GLOBALS["serverHost"],$GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        //valmistame ette SQL päringu, nt muutujanimega $query või ...
        $stmt = $conn-> prepare("SELECT pealkiri, aasta FROM film");
        echo $conn->error;
        //seome saadava tulemuse muutujaga, bind_result on funktsioon sellepärast pole $
        $stmt->bind_result($filmTitle, $filmYear);
        //täidame käsu ehk sooritame päringu
        $stmt->execute();
        echo $stmt->error;
        $filmInfoHTML = null;
        //võtan tulemuse (pinu ehk stacki)
        //võib tegevuse tsükkli tingimusse kirjutada
        while($stmt->fetch()) {
          //echo $filmTitle;
          $filmInfoHTML .="<h3>" .$filmTitle ."</h3>";
          $filmInfoHTML .="<h3>" .$filmYear ."</h3>";
        }
        //sulgeme ühendused
        $stmt->close();
        $conn->close();
        return $filmInfoHTML;
      }
      function storeFilmInfo($filmTitle, $filmYear, $filmDuration, $filmGenre, $filmStudio, $filmDirector){
        $conn = new mysqli ($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
        $stmt = $conn->prepare("INSERT INTO film (pealkiri, aasta, kestus, zanr, tootja, lavastaja) VALUES(?,?,?,?,?,?)");
        echo $conn->error;
        //seon saadetava info muutujatega
        //andmetüübid: s - string, i - integer, d - decimal, ehk tähistatud väljade moodi peavad olema järjekorras
        $stmt->bind_param("siisss", $filmTitle, $filmYear, $filmDuration, $filmGenre, $filmStudio, $filmDirector);
        //käsk täitma panna
        $stmt->execute();
        echo $stmt->error;

        $stmt->close();
        $conn->close();
      }