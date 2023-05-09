<!-- html5 boilerplate -->
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>EDEN Database</title>
   <link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="text">
   <h1>EDEN Albums</h1>
</div>
<!-- dropdown box to select which album is wanted -->
<div class="dropdown">
<form method="post">
   <label for="table-select">Select an album from the dropdown menu:
   <select name="table" id="table-select"></label>
       <option value="album1" <?php echo ($_POST['table'] ?? '') == 'album1' ? 'selected' : '' ?>>End Credits</option>
       <option value="album2" <?php echo ($_POST['table'] ?? '') == 'album2' ? 'selected' : '' ?>>i thnk you think too much of me</option>
       <option value="album3" <?php echo ($_POST['table'] ?? '') == 'album3' ? 'selected' : '' ?>>vertigo</option>
       <option value="album4" <?php echo ($_POST['table'] ?? '') == 'album4' ? 'selected' : '' ?>>about time</option>
       <option value="album5" <?php echo ($_POST['table'] ?? '') == 'album5' ? 'selected' : '' ?>>all you need is love</option>
       <option value="album6" <?php echo ($_POST['table'] ?? '') == 'album6' ? 'selected' : '' ?>>no future</option>
       <option value="album7" <?php echo ($_POST['table'] ?? '') == 'album7' ? 'selected' : '' ?>>ICYMI</option>
   </select>
   <button type="submit">Display Table</button>
</form>
</div>


<?php
// connection credentials for mySQL phpmyadmin and pointng to the database 'eden-db'
$user = 'root';
$pass = '';
$db = 'eden-db';
$connect = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");


// check if form is submitted from pressing 'display table' button
if (isset($_POST['table'])) {
   $table = $_POST['table'];


   // fetch data from the database
   if ($table == 'album1') {
       $result = mysqli_query($connect, "SELECT *
           FROM albums
           JOIN songs ON albums.id = songs.albumID
           JOIN tours ON albums.albumName = tours.touralbum
           WHERE albums.id = 1");


       // generate the HTML table for table 1
       $endcredit_table = "<table border='1'>
           <tr>
               <th>Song Name</th>
               <th>Length</th>
               <th>Genre</th>
               <th>Record Label</th>
               <th>Streams</th>
               <th>Tour Relating To Album</th>
           </tr>";

        //input data from selected rows from database into html table 1
       while ($row = mysqli_fetch_array($result)) {
           $endcredit_table .= "<tr>";
           $endcredit_table .= "<td>" . $row['title'] . "</td>";
           $endcredit_table .= "<td>" . $row['length'] . "</td>";
           $endcredit_table .= "<td>" . $row['genre'] . "</td>";
           $endcredit_table .= "<td>" . $row['recordLabel'] . "</td>";
           $endcredit_table .= "<td>" . $row['plays'] . "</td>";
           $endcredit_table .= "<td>" . $row['TourName'] . "</td>";
           $endcredit_table .= "</tr>";
       }


       $endcredit_table .= "</table>";


       // return the HTML table for table 1
       echo $endcredit_table;
    }
    
    elseif ($table == 'album2') {
       $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName, tours.id, tours.touralbum, tours.TourName
           FROM songs
           JOIN albums ON songs.albumID = albums.id
           JOIN tours ON albums.albumName = tours.touralbum
           WHERE albums.id = 2");


       // generate the HTML table for table 2
       $ityttmom_table = "<table border='1'>
           <tr>
               <th>Song Title</th>
               <th>Length</th>
               <th>Track Number</th>
               <th>Streams</th>
               <th>Album Name</th>
               <th>Album Relating To Tour</th>
           </tr>";

        //input data from selected rows from database into html table 2
       while ($row = mysqli_fetch_array($result)) {
           $ityttmom_table .= "<tr>";
           $ityttmom_table .= "<td>" . $row['title'] . "</td>";
           $ityttmom_table .= "<td>" . $row['length'] . "</td>";
           $ityttmom_table .= "<td>" . $row['trackNo'] . "</td>";
           $ityttmom_table .= "<td>" . $row['plays'] . "</td>";
           $ityttmom_table .= "<td>" . $row['albumName'] . "</td>";
           $ityttmom_table.= "<td>" . $row ['TourName'] . "</td>";
           $ityttmom_table .= "</tr>";
       }


       $ityttmom_table .= "</table>";


       // return the HTML table for table 2
       echo $ityttmom_table;
   }

   elseif ($table == 'album3') {
    $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName, tours.id, tours.touralbum, tours.TourName
        FROM songs
        JOIN albums ON songs.albumID = albums.id
        JOIN tours ON albums.albumName = tours.touralbum
        WHERE albums.id = 3");


        // generate the HTML table for table 3
        $vertigo_table = "<table border='1'>
            <tr>
                <th>Song Title</th>
                <th>Length</th>
                <th>Track Number</th>
                <th>Streams</th>
                <th>Album Name</th>
                <th>Album Relating To Tour</th>
            </tr>";

        //input data from selected rows from database into html table 3
        while ($row = mysqli_fetch_array($result)) {
            $vertigo_table .= "<tr>";
            $vertigo_table .= "<td>" . $row['title'] . "</td>";
            $vertigo_table .= "<td>" . $row['length'] . "</td>";
            $vertigo_table .= "<td>" . $row['trackNo'] . "</td>";
            $vertigo_table .= "<td>" . $row['plays'] . "</td>";
            $vertigo_table .= "<td>" . $row['albumName'] . "</td>";
            $vertigo_table.= "<td>" . $row ['TourName'] . "</td>";
            $vertigo_table .= "</tr>";
        }


        $vertigo_table .= "</table>";


        // return the HTML table for table 3
        echo $vertigo_table;
    }

    elseif ($table == 'album4') {
        $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName
            FROM songs
            JOIN albums ON songs.albumID = albums.id
            WHERE albums.id = 4");
    
    
            // generate the HTML table for table 4
            $abouttime_table = "<table border='1'>
                <tr>
                    <th>Song Title</th>
                    <th>Length</th>
                    <th>Track Number</th>
                    <th>Streams</th>
                    <th>Album Name</th>
                </tr>";
    
            //input data from selected rows from database into html table 4
            while ($row = mysqli_fetch_array($result)) {
                $abouttime_table .= "<tr>";
                $abouttime_table .= "<td>" . $row['title'] . "</td>";
                $abouttime_table .= "<td>" . $row['length'] . "</td>";
                $abouttime_table .= "<td>" . $row['trackNo'] . "</td>";
                $abouttime_table .= "<td>" . $row['plays'] . "</td>";
                $abouttime_table .= "<td>" . $row['albumName'] . "</td>";
                $abouttime_table .= "</tr>";
            }
    
    
            $abouttime_table .= "</table>";
    
    
            // return the HTML table for table 4
            echo $abouttime_table;
        }

        elseif ($table == 'album5') {
            $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName
                FROM songs
                JOIN albums ON songs.albumID = albums.id
                WHERE albums.id = 5");
        
        
                // generate the HTML table for table 5
                $aynil_table = "<table border='1'>
                    <tr>
                        <th>Song Title</th>
                        <th>Length</th>
                        <th>Track Number</th>
                        <th>Streams</th>
                        <th>Album Name</th>
                    </tr>";
        
                //input data from selected rows from database into html table 5
                while ($row = mysqli_fetch_array($result)) {
                    $aynil_table .= "<tr>";
                    $aynil_table .= "<td>" . $row['title'] . "</td>";
                    $aynil_table .= "<td>" . $row['length'] . "</td>";
                    $aynil_table .= "<td>" . $row['trackNo'] . "</td>";
                    $aynil_table .= "<td>" . $row['plays'] . "</td>";
                    $aynil_table .= "<td>" . $row['albumName'] . "</td>";
                    $aynil_table .= "</tr>";
                }
        
        
                $aynil_table .= "</table>";
        
        
                // return the HTML table for table 5
                echo $aynil_table;
            }

     elseif ($table == 'album6') {
        $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName, tours.id, tours.touralbum, tours.TourName
            FROM songs
            JOIN albums ON songs.albumID = albums.id
            JOIN tours ON albums.albumName = tours.touralbum
            WHERE albums.id = 6");
            
            
        // generate the HTML table for table 6
        $nofuture_table = "<table border='1'>
            <tr>
                <th>Song Title</th>
                <th>Length</th>
                <th>Track Number</th>
                <th>Streams</th>
                <th>Album Name</th>
                <th>Tour Relating To Album</th>
            </tr>";
            
            //input data from selected rows from database into html table 6
        while ($row = mysqli_fetch_array($result)) {
            $nofuture_table .= "<tr>";
            $nofuture_table .= "<td>" . $row['title'] . "</td>";
            $nofuture_table .= "<td>" . $row['length'] . "</td>";
            $nofuture_table .= "<td>" . $row['trackNo'] . "</td>";
            $nofuture_table .= "<td>" . $row['plays'] . "</td>";
            $nofuture_table .= "<td>" . $row['albumName'] . "</td>";
            $nofuture_table .= "<td>" . $row['TourName'] . "</td>";
            $nofuture_table .= "</tr>";
        }
            
            
        $nofuture_table .= "</table>";
            
            
        // return the HTML table for table 6
        echo $nofuture_table;
    }

    elseif ($table == 'album7') {
        $result = mysqli_query($connect, "SELECT songs.title, songs.length, songs.trackNo, songs.plays, albums.albumName, tours.id, tours.touralbum, tours.TourName
            FROM songs
            JOIN albums ON songs.albumID = albums.id
            JOIN tours ON albums.albumName = tours.touralbum
            WHERE albums.id = 7");
            
            
        // generate the HTML table for table 7
        $icymi_tabe = "<table border='1'>
            <tr>
                <th>Song Title</th>
                <th>Length</th>
                <th>Track Number</th>
                <th>Streams</th>
                <th>Album Name</th>
                <th>Tour Relating To Album</th>
            </tr>";
            
            //input data from selected rows from database into html table 7
        while ($row = mysqli_fetch_array($result)) {
            $icymi_tabe .= "<tr>";
            $icymi_tabe .= "<td>" . $row['title'] . "</td>";
            $icymi_tabe .= "<td>" . $row['length'] . "</td>";
            $icymi_tabe .= "<td>" . $row['trackNo'] . "</td>";
            $icymi_tabe .= "<td>" . $row['plays'] . "</td>";
            $icymi_tabe .= "<td>" . $row['albumName'] . "</td>";
            $icymi_tabe .= "<td>" . $row['TourName'] . "</td>";
            $icymi_tabe .= "</tr>";
        }
            
            
        $icymi_tabe .= "</table>";
            
            
        // return the HTML table for table 7
        echo $icymi_tabe;
    }
        

// close the database connection
mysqli_close($connect);
}
?>
</body>
</html>