<?php
    //Declaração da Classe
    abstract class Forma{
        //Declaração e Atribuição de um Atributo
        public $tipoForma = 'Forma Abstrata';

        //Declaração do método
        public function imprimeForma()
        {
            echo $this-> tipoForma . ' com Área de ' . $this-> calculaArea();
        }

        abstract public function calculaArea();
    }

    //Criando uma herança entre as classes base Forma e a classe Quadrado
    class Quadrado1 extends Forma{
        //Declaração de um Atributo
        public $lado;

        //Implementação do método abstrato da classe base 
        public function calculaArea()
        {
            return $this -> lado * $this-> lado;
        }
    }

    //Instanciação da Classe concreta
    $obj = new Quadrado1();

    //Atribuição de um valor a um Atributo
    $obj -> tipoForma = 'Quadrado';
    $obj ->  lado = 10;

    //Acessando o Membro de uma Classe
    $obj -> imprimeForma();
?>