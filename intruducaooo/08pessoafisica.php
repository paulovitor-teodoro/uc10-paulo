<?php
   require_once("08conta.php");

   class PessoaFisica{
    private string $nome;
    private string $cpf;
    private Conta $conta;

    public function __construct(string $nome, string $cpf, Conta $conta){
        $this -> nome = $nome;
        $this -> cpf = $cpf;
        $this -> conta = $conta;
    }

    public function imprime(): void{
    echo "CONTA: " .mb_strtoupper($this->conta->getTipoDeConta(), 'UTF-8') . " - "   . "Agência: " . $this->conta->getAgencia() .  " - " . "Conta: " . $this->conta->getConta() . " - " . "Saldo: R$ " . number_format($this->conta->calculaSaldo(), 2, ',', '.') . "<br>";
}
   }
?>