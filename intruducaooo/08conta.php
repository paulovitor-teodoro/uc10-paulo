<?php

abstract class Conta{
    private string $tipoDeConta;
    private string $agencia;
    private string $conta;
    protected float $saldo;

    public function __construct(string $tipoDeConta, string $agencia, string $conta, float $saldo){
        $this -> tipoDeConta = $tipoDeConta;
        $this -> agencia = $agencia;
        $this -> conta = $conta;
        $this -> saldo = $saldo;
    }

    public function imprimeExtrato(): void {
        echo $this-> tipoDeConta . ' - ' . $this-> agencia . ' - ' . $this-> conta . ' - ' . $this-> saldo;
    }

    public function deposito(float $valor): void {
        $this-> saldo += $valor;
    }

    public function saque(float $valor): void{
       if($valor > $this-> saldo){
        echo "Saldo insuficiente para saque.";
       } else {
        $this-> saldo -= $valor;
       }
    }

    public function saldo(): float{
        return $this-> saldo;
    }

    public function getTipoDeConta(): string
    {
        return $this->tipoDeConta;
    }

    public function getAgencia(): string
    {
        return $this->agencia;
    }

    public function getConta(): string
    {
        return $this->conta;
    }

    public function getSaldo(): float
    {
        return $this->saldo;
    }

   abstract public function calculaSaldo(): float;
}

    class Poupanca extends Conta{
        private float $reajuste;
        
        public function __construct(string $agencia, string $conta, float $saldoInicial, float $reajuste){
        parent::__construct("Poupança", $agencia, $conta, $saldoInicial);
        $this -> reajuste = $reajuste;
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
        $this -> limiteEspecial = $limiteEspecial;

        }

       public function calculaSaldo(): float{
        return $this -> saldo + $this -> limiteEspecial;
       }
    }