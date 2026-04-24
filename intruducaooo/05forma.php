<?php
    abstract class Forma{
        public $tipoForma = 'Forma Abstrata';


        public function imprimeForma()
        {
            echo $this-> tipoForma . ' com Área de ' . $this-> calculaArea();
        }

        abstract public function calculaArea();
    }

    class Quadrado extends Forma{
        public $lado;

        public function __construct(float $varLado){
            $this -> tipoForma = 'Quadrado';
            $this -> lado = $varLado;
        }

        public function calculaArea()
        {
            return $this -> lado * $this-> lado;
        }
    }

    class Retangulo extends Forma{
        private float $base;
        private float $altura;

        public function __construct(float $base, float $altura){
            $this -> tipoForma = 'Retângulo';
            $this -> base = $base;
            $this -> altura = $altura;
        }

        public function calculaArea()
        {
            return $this -> base * $this -> altura;
        }
    }

    class Triangulo extends Forma{
        private float $cumprimentobase;
        private float $altura;

        public function __construct(float $cumprimentobase, float $altura){
            $this -> tipoForma = 'Triângulo';
            $this -> cumprimentobase = $cumprimentobase;
            $this -> altura = $altura;
        }

        public function calculaArea()
        {
            return ($this -> cumprimentobase * $this -> altura) / 2;
        }
    }
    //Instanciação da Classe concreta
    $objQuadrado = new Quadrado(10.0);

    //Atribuição de um valor a um Atributo
   
    //$objQuadrado ->  lado = 10;

    //Acessando o Membro de uma Classe
    $objQuadrado -> imprimeForma();

    echo '<br/>';
    $objRetangulo = new Retangulo(10.0, 5.0);
    $objRetangulo -> imprimeForma();

    echo '<br/>';
    $objTriangulo = new Triangulo(15.0, 6.0);
    $objTriangulo -> imprimeForma();

    //Não pode redimensionar o objeto, pois o atributo é privado
    //$objRetangulo -> base = 15.0;
?>