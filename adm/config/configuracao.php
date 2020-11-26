<?php
class url
{
    private $complemento;
    private $protocolo;

    public function __construct()
    {
        $this->setComplemento('adm/');
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
            echo 'ERROR: ' . $e->getMessage();
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
    private $dados;
    private $numDados;

    public function __construct($tabela,$campo,$dados)
    {
        parent::__construct();
        $sql = 'SELECT * FROM '.$tabela.' WHERE '.$campo.' = :dados';
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute(array('dados' => $dados));
        $this->setDados($stmt->fetchAll());
        $this->setNumDados($stmt->rowCount());
    }

    public function getDados($valor1, $valor2)
    {
        return $this->dados[$valor1][$valor2];
    }

    public function getNumDados()
    {
        return $this->numDados;
    }

    public function setDados($valor)
    {
        $this->dados = $valor;
    }

    public function setNumDados($valor)
    {
        $this->numDados = $valor;
    }
}

class login extends conexao
{
    private $dados;
    private $numDados;

    public function __construct($login,$senha)
    {
        parent::__construct();
        $stmt = $this->getConn()->prepare('SELECT * FROM usuarios WHERE email = :login AND senha = :senha');
        $stmt->execute(array('login' => $login, 'senha' => $senha,));
        $this->setDados($stmt->fetch());
        $this->setNumDados($stmt->rowCount());
    }

    public function getDados($valor)
    {
        return $this->dados[$valor];
    }

    public function getNumDados()
    {
        return $this->numDados;
    }

    public function setDados($valor)
    {
        $this->dados = $valor;
    }

    public function setNumDados($valor)
    {
        $this->numDados = $valor;
    }
}
