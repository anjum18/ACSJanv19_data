<?php

include('Connection.php')


// if (($handle = fopen("dpt2017filles-lilou.csv", "r")) !== FALSE) {
// 			$line=0;
//             $data = fgetcsv($handle, 1000, ",");
//             for ($line=140811; $line < $data; $line++) { 
 //if($line === 1 ) continue; //zapper la ligne 1 avec les entetes
//                 $req = $dbh->prepare("INSERT INTO prenoms (genre, nom, annee, nombre) VALUES (?,?,?,?)");
//                 $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4]));
//             }
//             fclose($handle);
//         }


if (($handle = fopen("boys.csv", "r")) !== FALSE) {
            $line=0;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $line++;
                if($line === 1 ) continue; //zapper la ligne 1 avec les entetes
               
                // connection à pdo puis : 
                $req = $dbh->prepare("INSERT INTO prenoms (genre, nom, annee, nombre) VALUES (?,?,?,?)");
                $req->execute(array($data[0],$data[1],$data[2],$data[3]));
            
            }
        fclose($handle);
        }

// if (($handle = fopen("dpt2017filles-lilou.csv", "r")) !== FALSE) {
// 	$line = fgets($handle);
// 	while (($data = fgetcsv($handle, 100, ",")) !== FALSE) {
// 		$line++;
// 		if($line > 2 ) die();
// 		if($line === 1 ) {
//                 continue; //zapper la ligne 1 avec les entetes
//             }
//         echo($line);

//                 // connection à pdo puis : 
//         $req = $dbh->prepare("INSERT INTO prenoms (genre, nom, annee, departement, nombre) VALUES (?,?,?,?,?)");
//         $req->execute(array($data[0],$data[1],$data[2],$data[3],$data[4]));
            
            
//         }
//         fclose($handle);
//     }

