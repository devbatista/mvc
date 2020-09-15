## Instalação
Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*
PS: Esse arquivo está no *.gitignore*, portanto é preciso recriá-lo ao utilizar o projeto em outra estação, com os dados do novo banco

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Classe extends Model {
    public function __construct() {
        parent::__construct();
    }
}
```
Variáveis $tableName e $db estão declaradas no construct da classe pai (Model)

OBS: o nome da classe é o mesmo nome da tabela, porém é declarada no *singular*
A Função **getTableName** na classe pai faz a associação à tabela no plural (acrescenta o 's' no final)
É recomendável alterar a variável na classe cujo plural não seja somente acrescentar um 's'. Ex: *jogadores*, ficaria assim:

```php
class Jogador extends Model {
    public function __construct() {
        parent::__construct();
        $this->tableName = 'jogadores';
    }
}
```

## Modelo de CONTROLLER
```php
<?php
namespace src\controllers;
use \core\Controller;
use \src\models\Classe;

class ClasseController extends Controller
{
    public $classe;

    public function __construct() {
        $this->classe = new Classe();
    }
}
?>
```
