<?php

Class Mahasiswa {
    // Property
    public $ipk;
    public $nama;
    public $nim;
    public $prodi;
    public $angkatan;

    // Method
    function __construct($_nim, $_nama){
        $this->nim = $_nim;
        $this->nama = $_nama;
    }

    function predikat_ipk(){
        if($this->ipk < 2.0){
            return 'Cukup';
        } elseif ($this->ipk >= 2.0 && $this->ipk < 3.0){
            return 'Baik';
        } elseif ($this->ipk >= 3.0 && $this->ipk < 3.75){
            return 'Memuaskan';
        } elseif ($this->ipk >= 3.75 && $this->ipk <= 4.0){
            return 'Cum Laude';
        } else{
            return 'Nilai Diluar Jangkauan';
        }
    }

}

// Instance Object
$mahasiswa1 = new Mahasiswa(110223268, 'Rizaldy Rafa Akhmad');
$mahasiswa1->ipk = 3.0;
$mahasiswa1->prodi = 'Teknik Informatika';
$mahasiswa1->angkatan = 2023;