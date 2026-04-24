<?php
    //Declaração da Classe
    class Forma{
        //Declaração e Atribuição de um Atributo
        public $tipoForma = 'Forma Abstrata';

        //Declaração do método
        public function imprimeForma()
        {
            echo $this-> tipoForma;
        }
    }

    //Instanciação da Classe
    $obj = new Forma();

    //Acessando o Membro de uma Classe
    $obj -> imprimeForma();
?>