<?php 

function switcher($i){
 switch ($i) {
      case "a":
        echo "<div id='$i' ></div> "; 
        break;
      case 'b':
        echo "<div id='$i' ></div>"; 
        break;
      case 'c':
        echo "<div id='$i' ></div>"; 
        break;
      case 'd':
        echo "<div id='$i' ></div>"; 
        break;
      case 'e':
        echo "<div id='$i' ></div>"; 
        break;
      case 'f':
        echo "<div id='$i' ></div>"; 
        break;
      case 'g':
        echo "<div id='$i' ></div>"; 
        break;
      case 'h':
        echo "<div id='$i' ></div>"; 
        break;
      case 'i':
        echo "<div id='$i' ></div>"; 
        break;
      case 'j':
        echo "<div id='$i' ></div>"; 
        break;
      case 'k':
        echo "<div id='$i' ></div>"; 
        break;
      case 'l':
        echo "<div id='$i' ></div>"; 
        break;
      case 'm':
        echo "<div id='$i' ></div>"; 
        break;
      case 'n':
        echo "<div id='$i' ></div>"; 
        break;
      case 'o':
        echo "<div id='$i' ></div>"; 
        break;
      case 'p':
        echo "<div id='$i' ></div>"; 
        break;
      case 'q':
        echo "<div id='$i' ></div>"; 
        break;
      case 'r':
        echo "<div id='$i'></div>";
        break;
      case 's':
        echo "<div id='$i' ></div>"; 
        break;
      case 't':
        echo "<div id='$i' ></div>"; 
        break;
      case 'u':
        echo "<div id='$i' ></div>"; 
        break;
      case 'v':
        echo "<div id='$i' ></div>"; 
        break;
      case 'w':
        echo "<div id='$i' ></div>"; 
        break;
      case 'x':
        echo "<div id='$i' ></div>"; 
        break;
      case 'y':
        echo "<div id='$i' ></div>"; 
        break;
      case 'z':
        echo "<div id='$i'></div>"; 
        break;
    }

}


function bstyler($score){

  switch ($score) {
    case 'A': 
       return $soulA = "soulA";
       //$mateA = "mateA";
       break; 

    case 'B': 
        return $soulB = "soulB";
        //$mateB = "mateB";
        break;
    
    case 'C': 
        return $soulC = "soulC";
      break;

    case 'D':
      return $soulD = "soulD";
      break;

    case 'E': 
      return $soulE = "soulE";
      break; 
    
  }
}

function pstyler($score){

  switch ($score) {
    case 'A': 
       return $mateA = "mateA";
       break; 

    case 'B': 
        return $mateB = "mateB";
        break;
    
    case 'C': 
        return $mateC = "mateC";
      break;

    case 'D':
      return $mateD = "mateD";
      break;

    case 'E': 
      return $mateE = "mateE";
      break; 
    
  }
} 

function scoryer($score){
switch ($score) {
    case 'A': 
       return $teA = "A - Absence of sugars , salt , lipids";
       break; 

    case 'B': 
        return $teB = "B - No or little of sugars , salt , lipids";
        break;
    
    case 'C': 
        return $teC = "C - Little quantity of sugars , salt , lipids";
      break;

    case 'D':
      return $teD = "D - Considerable quantity of sugars ,salt , lipids";
      break;

    case 'E': 
      return $teE = "E - Extensive amount of sugars , salt , lipids";
      break; 
    
  }
} 

function coloryer($score){
switch ($score) {
    case 'A': 
       return $eA = "nayerA";
       break; 

    case 'B': 
        return $eB = "nayerB";
        break;
    
    case 'C': 
        return $eC = "nayerC";
      break;

    case 'D':
      return $eD = "nayerD";
      break;

    case 'E': 
      return $eE = "nayerE";
      break; 
    
  }
}

function imgyer($score){
switch ($score) {
    case 'A': 
       return $imA = "Nutri-A.png";
       break; 

    case 'B': 
        return $imB = "Nutri-B.png";
        break;
    
    case 'C': 
        return $imC = "Nutri-C.png";
      break;

    case 'D':
      return $imD = "NUTRI-d.png";
      break;

    case 'E': 
      return $imE = "nutri-E.png";
      break; 
    
  }
}
?>