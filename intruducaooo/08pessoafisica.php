<?php
   class Poupanca extends Conta{
        private float $reajuste;
        
        public function __construct(string $agencia, string $conta, float $saldoInicial, float $reajuste){
        parent:: __construct("Poupança", $agencia, $conta, $saldoInicial);
        $this-> deposito($saldoInicial); // Registra o depósito inicial como movimentação
        $this -> reajuste = $reajuste;

        //parent::incluiMovimentacao(new ItemExtrato("Abertura da Conta", $saldoInicial));
        }

       public function calculaSaldo(): float
      {
        return $this -> saldo + ($this -> saldo * $this -> reajuste);
      }
    }

    class Especial extends Conta{
        private float $limiteEspecial;
        public function __construct(string $agencia, string $conta, float $saldoInicial, float $limiteEspecial){
        parent:: __construct("Especial", $agencia, $conta, $saldoInicial);

        $this-> deposito($saldoInicial); // Registra o depósito inicial como movimentação
        $this -> limiteEspecial = $limiteEspecial;
        //parent:: incluiMovimentacao(new ItemExtrato("Abertura da Conta", $saldoInicial));
        }

       public function calculaSaldo(): float{
        return $this -> saldo + $this -> limiteEspecial;
       }
    }
?>