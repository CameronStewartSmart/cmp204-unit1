<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <script src="/js/script.js"></script>
    <link rel="stylesheet" href="css/cookieBubble.min.css">
    
    <title>Albums</title>
</head>
    
    
<body>
    <!-- COOKIE POP UP START -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/cookieBubble.min.js"></script>
    <script>
        (function ($) {
                $.cookieBubble();
        })(jQuery);
    </script>
    <!-- COOKIE POP UP END -->
    
    <!-- JUMBOTRON START -->
    <div class="jumbotron text-center" id="jumbotron">
        <h1>Albums and Singles</h1>
    </div>
    <!-- JUMBOTRON END -->
    
    <!-- NAVBAR START -->
    
    <div id="navbar">
    <nav class="navbar fixed-top navbar-expand-lg">
        <a class="navbar-brand hvr-grow" href="index.html">
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="images/icons/menu.png" width="30" height="30" alt="Menu button">
        </button>
        
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a class="navbar-brand hvr-grow" href="https://www.instagram.com/billieeilish/">
                    <img src="images/icons/instagram.png" width="30" height="30" alt="Instagram" loading="lazy">
                </a>
                <a class="navbar-brand hvr-grow" href="https://twitter.com/billieeilish">
                    <img src="images/icons/twitter.png" width="30" height="30" alt="Twitter" loading="lazy">
                </a>
                <a class="navbar-brand hvr-grow" href="https://open.spotify.com/artist/6qqNVTkY8uBg9cP3Jd7DAH">
                    <img src="images/icons/spotify.png" width="30" height="30" alt="Spotify" loading="lazy">
                </a>
                <li class="nav-item active">
                    <a class="nav-link hvr-grow" href="index.html">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvr-grow" href="merchandise.html">Merchandise</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvr-grow" href="tours.html">Tours</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link hvr-grow" href="albums.php">Albums and Singles</a>
                </li>
            </ul>
        </div>
    </nav>
    </div>
    
    <!-- NAVBAR END -->
    
    <!-- CONTENT START -->
    
    
    <?php 
//        ini_set("display_errors", 1);
//        error_reporting(E_ALL);

        $username="sql1901578";
        $password="DDcSb6qrn9cK";
        $host="lochnagar.abertay.ac.uk";
        $dbname="sql1901578";   

        $order = $_GET["sort"];
        $order2 = $_GET["ASCDESC"];
    
        if (empty($_GET["sort"])) {
            $order = 'AlbumName';
        }
        if (empty($_GET["ASCDESC"])) {
            $order2 = 'ASC';
        }

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "SELECT * FROM Albums ORDER BY ".$order." ".$order2;
        $result=mysqli_query($conn,$sql);

        mysqli_close($conn);
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h6>Sorted by: <?php 
                    if ($order == "releaseYear") { 
                        print_r("release year"); 
                    } elseif ($order == "AlbumName") {
                        print_r("album name");
                    }
                    if ($order2 == "ASC") { 
                        print_r(", ascending"); 
                    } elseif ($order2 == "DESC") {
                        print_r(", descending");
                    }
                    ?>
                </h6>
                
                
                <form action="albums.php" method="get">
                    <select id="sort" name="sort">
                        <option value="AlbumName">name</option>
                        <option value="releaseYear">year</option>
                    </select>
                    <select id="ASCDESC" name="ASCDESC">
                        <option value="ASC">ascending</option>
                        <option value="DESC">descending</option>
                    </select>
                    <input type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
    
    <?php 
        $AlbumName = array();
        $imageName = array();
        $Featuring = array();
        $Year = array();

        while ($db_field = mysqli_fetch_assoc($result)) {
            array_push($AlbumName, $db_field['AlbumName']);
            array_push($imageName, $db_field['imageName']);
            array_push($Featuring, $db_field['Featuring']);
            array_push($Year, $db_field['releaseYear']);
        } 
        mysqli_free_result($result);
    ?>
    
    <div class="container">
        <div class="row" id="albums">
        <?php for($i = 0; $i < count($AlbumName); $i++){ ?>

                <!-- ALBUMS IMAGE SOURCE: https://www.discogs.com/artist/5590213-Billie-Eilish -->
                <div class="col-sm-4" id="cover">

                    <img src="images/albums/<?php print_r($imageName[$i])?>.jpg" class="img-fluid float-right" width="100%" height="100%">

                    <h3 ><?php print_r($AlbumName[$i]) ?></h3>

                    <h5>By Billie Eilish <?php print_r($Featuring[$i]) ?></h5>
                    <h6>Released in <?php print_r($Year[$i]) ?></h6>
                </div>

        <?php } ?>
        </div>
    </div>
    
    <!-- CONTENT END -->

        
    <!-- FOOTER START -->
    
    <div class="jumbotron text-center" id="footer">
        <h4>CMP204 Assessment. Cameron Smart 2020</h4>
    </div>
    
    <!-- FOOTER END -->
    
    <!-- JS: must be at end of body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- END JS -->
    
</body>

</html>