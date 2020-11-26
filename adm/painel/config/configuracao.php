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

    private function buildUpdate($arrayDados, $arrayCondicao)
    {
        $sql = "";
        $valCampos = "";
        $valCondicao = "";

        foreach ($arrayDados as $chave => $valor) {
            $valCampos .= $chave . '=?, ';
        }

        foreach ($arrayCondicao as $chave => $valor) {
            $valCondicao .= $chave . '? AND ';
        }

        $valCampos = (substr($valCampos, -2) == ', ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 2))) : $valCampos;
        $valCondicao = (substr($valCondicao, -4) == 'AND ') ? trim(substr($valCondicao, 0, (strlen($valCondicao) - 4))) : $valCondicao;
        $sql .= "UPDATE {$this->tabela} SET " . $valCampos . " WHERE " . $valCondicao;
        return trim($sql);
    }
      
    private function buildDelete($arrayCondicao)
    {
        $sql = "";
        $valCampos= "";

        foreach ($arrayCondicao as $chave => $valor) {
           $valCampos .= $chave . '? AND ';
        }

        $valCampos = (substr($valCampos, -4) == 'AND ') ? trim(substr($valCampos, 0, (strlen($valCampos) - 4))) : $valCampos;
        $sql .= "DELETE FROM {$this->tabela} WHERE " . $valCampos;
        return trim($sql);
    }
    
    public function insert($arrayDados)
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
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function update($arrayDados, $arrayCondicao)
    {
        try {
            $sql = $this->buildUpdate($arrayDados, $arrayCondicao);
            $stm = $this->pdo->prepare($sql);
            $cont = 1;

            foreach ($arrayDados as $valor) {
                $stm->bindValue($cont, $valor);
                $cont++;
            }

            foreach ($arrayCondicao as $valor) {
                $stm->bindValue($cont, $valor);
                $cont++;
            }

            $retorno = $stm->execute();
            return $retorno;
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }
    
    public function delete($arrayCondicao)
    {
        try {
            $sql = $this->buildDelete($arrayCondicao);
            $stm = $this->pdo->prepare($sql);

            $cont = 1;
            foreach ($arrayCondicao as $valor) {
                $stm->bindValue($cont, $valor);
                $cont++;
            }

            $retorno = $stm->execute();
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

class pg_acessada
{
    private $atual;
    private $tipoAtual;
    private $titulo;

    public $tituloArray = array(
        'cases' => 'Cases',
        'categorias' => 'Categorias',
        'clientes' => 'Clientes',
        'configuracao' => 'Configuração',
        'diferenciais' => 'Diferenciais',
        'distribuidores' => 'Distribuidores',
        'faq' => 'FAQ',
        'menus' => 'Menus',
        'noticias' => 'Notícias',
        'newsletter' => 'Newsletter',
        'paginas' => 'páginas',
        'produtos' => 'Produtos',
        'servicos' => 'Serviços',
        'slides' => 'Slides',
        'subprodutos' => 'Sub Produtos',
        'usuarios' => 'Usuários'
    );

    public function __construct()
    {
        $url = new url();
        $pagina = substr($url->getComplemento().$_SERVER['REQUEST_URI'],strlen($url->getComplemento()));
        $pag = explode('/', $pagina);
        $pag2 = explode('?', $pag[count($pag)-1]);
        $tipo = explode('=', $pag2[1]);
        $pag[count($pag)-1] = $pag2[0];
        $this->setTipoAtual($tipo[0]);
        if ($pag[count($pag)-1]) {
            $this->setAtual($pag[count($pag)-1]);
            $this->setTitulo($this->tituloArray[$pag[count($pag)-1]]);
        } else {
            $this->setAtual('home');
        }
    }

    public function getAtual()
    {
        return $this->atual;
    }

    public function getTipoAtual()
    {
        return $this->tipoAtual;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setAtual($valor)
    {
        $this->atual = $valor;
    }

    public function setTipoAtual($valor)
    {
        $this->tipoAtual = $valor;
    }

    public function setTitulo($valor)
    {
        $this->titulo = $valor;
    }
}
