<?php

class Lingkaran {
    // Property = Variabel
    private $jari; 
    const PHI = 3.14;

    // Method atau function
    function __construct($r){
        $this->jari = $r;
    }

    function getLuas(){
        return self::PHI * $this->jari * $this->jari;
    }

    function getKeliling(){
        return 2 * self::PHI * $this->jari;
    }
}

// Instance Object
$lingkaran1 = new Lingkaran(10);
echo 'Luas Lingkaran 1 = ' . $lingkaran1->getLuas();
echo '<br>Keliling Lingkaran = ' . $lingkaran1->getKeliling();