<?php
namespace Monetizze;

class Sorteio{
    
    private $dezenas;
    private $resultado;
    private $total;
    private $jogos;

    public function getDezenas(){
        return $this->dezenas;
    }

    public function setDezenas($dezenas){
        $this->dezenas = $dezenas;
        return $this;
    }

    public function getResultado(){
        return $this->resultado;
    }

    public function setResultado($resultado){
        $this->resultado = $resultado;
        return $this;
    }

    public function getTotal(){
        return $this->total;
    }
 
    public function setTotal($total){
        $this->total = $total;
        return $this;
    }

    public function getJogos(){
        return $this->jogos;
    }
 
    public function setJogos($jogos){
        $this->jogos = $jogos;
        return $this;
    }

    function __construct($qtdDezenas, $totalJogos){
        if(!($qtdDezenas >= 6 && $qtdDezenas <= 10)) $qtdDezenas = 6;
        $this->setDezenas($qtdDezenas);
        $this->setTotal($totalJogos);
    }

    private function gerarDezenas(){
        $dados = array();
        
        for($i=0; $i<$this->getDezenas(); $i++){
            $numero = rand(1,60);
            while(in_array($numero, $dados)){
                $numero = rand(1,60);
            }
            $dados[$i] = $numero;
        }
        sort($dados, SORT_NUMERIC);
        return $dados;
    }

    public function gerarJogos(){
        $dados = array();

        for($i=0; $i<$this->getTotal(); $i++){
            $dados[$i] = $this->gerarDezenas();
        }

        $this->setJogos($dados);
    }

    private function sorteio($quantidade = 6){
        $dados = array();
        
        for($i=0; $i<$quantidade ; $i++){
            $numero = rand(1,60);
            while(in_array($numero, $dados)){
                $numero = rand(1,60);
            }
            $dados[$i] = $numero;
        }
        sort($dados, SORT_NUMERIC);
        $this->setResultado($dados);
    }

    public function conferirJogos(){
        $dados = array();

        for($i=0; $i<count($this->jogos); $i++){
            foreach($this->resultado as $key => $valor){
                if(in_array($valor, $this->jogos[$i])){
                    $dados[$i][array_search($valor, $this->jogos[$i])] = $valor;
                }             
            }
        }
        return $dados;       
    }

    public function realizarSorteio(){
        $this->gerarJogos();
        $this->sorteio();
        return $this->conferirJogos();;
    }

    public function marcarNumero($valor, $key, $jogo){
        if(key_exists($key, $jogo)){
            if(array_search($valor, $jogo[$key])){
                return true;
            }         
        }          
        return false;
    }
}
?>