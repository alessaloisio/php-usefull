<?php

  function showTable($bdd, $query) {
    $html = "<table>\n";

    $resultat = $bdd->query($query);
    $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);
    $keys = array_keys($donnees[0]);  
      
    $html .= "<tr>\n";
    for ($i=0; $i < count($keys); $i++) { 
      $html .= "<th>".ucfirst($keys[$i])."</th>\n";
    }
    $html .= "</tr>\n";

    for ($i=0; $i < count($donnees); $i++) { 
      $html .= "<tr>\n";
      for ($j=0; $j < count($donnees[$i]); $j++) { 
        $html .= "<td>".$donnees[$i][$keys[$j]]."</td>\n";
      }
      $html .= "</tr>\n";
    }
      
    $resultat->closeCursor();
    
    $html .= "</table>\n";

    return $html;
  };

?>