<?php
require_once ('08conta.php');

    class PessoaJuridica{
        private string $nome;
        private string $cnpj;
        private Conta $conta;

        public function __construct(string $nome, string $cnpj, Conta $conta){
            $this -> nome = $nome;
            $this -> cnpj = $cnpj;
            $this -> conta = $conta;
        }

       public function imprime(): void{
       echo "CONTA: " .strtoupper($this->conta->getTipoDeConta()) . " - "   . "Agência: " . $this->conta->getAgencia() .  " - " . "Conta: " . $this->conta->getConta() . " - " . "Saldo: R$ " . number_format($this->conta->calculaSaldo(), 2, ',', '.') . "<br>";
}
    }
?>