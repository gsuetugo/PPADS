<?php
class url
{
    private $complemento;
    private $protocolo;

    public function __construct()
    {
        $this->setComplemento('projeto/');
        $this->setProtocolo('http://');
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function getProtocolo()
    {
        return $this->protocolo;
    }

    public function setComplemento($valor)
    {
        $this->complemento = $valor;
    }

    public function setProtocolo($valor)
    {
        $this->protocolo = $valor;
    }
}

class pg_acessada
{
    private $atual;
    private $tipoAtual;
    private $contagem;

    public function __construct()
    {
        $this->atual();
    }

    public function atual()
    {
        $url = new url();
        $pagina = substr($_SERVER['REQUEST_URI'],strlen('/'.$url->getComplemento()));
        $pag = explode('/', $pagina);
        $pag2 = explode('?', $pag[count($pag)-1]);
        $pag[count($pag)-1] = $pag2[0];
        $this->setContagem(count($pag));
        if ($pag[count($pag)-1] == '') {
            $pag[count($pag)-1] = 'home';
        }
        $this->setAtual($pag);
    }

    public function getAtual($valor)
    {
        return $this->atual[$valor];
    }

    public function getContagem()
    {
        return $this->contagem;
    }

    public function setAtual($valor)
    {
        $this->atual = $valor;
    }

    public function setContagem($valor)
    {
        $this->contagem = $valor;
    }
}

class conexao
{
    private $conn;

    public function __construct()
    {
        $dbhost = 'maridoaluguel.cgddlbwec8qk.us-east-1.rds.amazonaws.com';
        $dbname = 'marido_aluguel';
        $username = 'admin';
        $password = 'mackenzie';
        try {
            $conn = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->setConn($conn);
        } catch(PDOException $e) {
            echo 'ERROR: '.$e->getMessage();
        }
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($valor)
    {
        $this->conn = $valor;
    }
}

class dados extends conexao
{
    private $pdo = null;
    private $tabela = null;

    public function __construct($tabela=null)
    {
        parent::__construct();
        $this->pdo = $this->getConn();
        $this->setTableName($tabela);
    }

    public function setTableName($tabela)
    {
        $this->tabela = $tabela;
    }

    private function buildInsert($arrayDados)
    {
        $sql = "";
        $campos = "";
        $valores = "";

        foreach ($arrayDados as $chave => $valor) {
            $campos .= $chave . ', ';
            $valores .= '?, ';
        }

        $campos = (substr($campos, -2) == ', ') ? trim(substr($campos, 0, (strlen($campos) - 2))) : $campos;
        $valores = (substr($valores, -2) == ', ') ? trim(substr($valores, 0, (strlen($valores) - 2))) : $valores;
        $sql .= "INSERT INTO {$this->tabela} (" . $campos . ")VALUES(" . $valores . ")";
        return trim($sql);
    }

    public function insert($arrayDados, $id=FALSE)
    {
        try {
            $sql = $this->buildInsert($arrayDados);
            $stm = $this->pdo->prepare($sql);
            $cont = 1;

            foreach ($arrayDados as $valor) {
                $stm->bindValue($cont, $valor);
                $cont++;
            }

            $retorno = $stm->execute();

            if ($id) {
                $retorno = $this->pdo->lastInsertId();
            }
            
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function getSQLGeneric($sql, $arrayParams=null, $fetchAll=TRUE)
    {
        try {
            $stm = $this->pdo->prepare($sql);
            if (!empty($arrayParams)) {
                $cont = 1;
                foreach ($arrayParams as $valor) {
                    $stm->bindValue($cont, $valor);
                    $cont++;
                }
            }
            $stm->execute();

            if ($fetchAll) {
                $dados = $stm->fetchAll(PDO::FETCH_OBJ);
            } else {
                $dados = $stm->fetch(PDO::FETCH_OBJ);
            }

            return $dados;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
}

class data
{
    private $data;

    function __construct($data)
    {
        $this->montaData($data);
    }

    public function montaData($data)
    {
        $arrayData = explode("-",$data);
        $this->setData($arrayData[2].' de '.$this->meses[$arrayData[1]].' de '.$arrayData[0]);
    }
  
    public $meses = array(
        '01' => 'Janeiro',
        '02' => 'Fevereiro',
        '03' => 'Março',
        '04' => 'Abril',
        '05' => 'Maio',
        '06' => 'Junho',
        '07' => 'Julho',
        '08' => 'Agosto',
        '09' => 'Setembro',
        '10' => 'Outubro',
        '11' => 'Novembro',
        '12' => 'Dezembro',
    );

    public function getData()
    {
        return $this->data;
    }

    public function setData($valor)
    {
        $this->data = $valor;
    }
}