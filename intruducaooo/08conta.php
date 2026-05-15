<?php


abstract class Conta{
    private string $tipoDeConta;
    private string $agencia;
    private string $conta;
    protected float $saldo;

    private array $movimentacao = [];

    public function __construct(string $tipoDeConta, string $agencia, string $conta, float $saldo){
        $this -> tipoDeConta = $tipoDeConta;
        $this -> agencia = $agencia;
        $this -> conta = $conta;
        $this -> saldo = $saldo;
    }

    public function imprimeExtrato(): void {
        echo 'Conta: ' . $this-> tipoDeConta . ' - Agência: ' . $this-> agencia . ' - Conta: ' . $this-> conta . ' - Saldo: ' . $this-> saldo;
        foreach ($this-> movimentacao as $itemExtrato){
            echo "<br>" . $itemExtrato-> imprimeItem();
        }
    }

    public function deposito(float $valor): void {
        $this-> saldo = $this-> saldo + $valor;
        $this-> incluiMovimentacao(new ItemExtrato("Depósito", $valor));
    }

    public function saque(float $valor): void{
       if($valor > $this-> saldo){
        echo "Saldo insuficiente para saque.";
       } else {
        $this-> saldo -= $valor;
        $this-> incluiMovimentacao(new ItemExtrato("Saque", $valor));
       }
    }

    public function saldo(): float{
        return $this-> saldo;
    }

    public function incluiMovimentacao(ItemExtrato $item){
        $this->movimentacao[] = $item;
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
