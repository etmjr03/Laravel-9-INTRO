<h1>Curso Laravue 9 INTRO</h1>

<h2>Artisan</h2>

- Help: Para utilizar o help (passe o comando artisan e no seu final use "--help", exemplo: php artisan make:model --help)
- Make: Categoria do artisan utilizada para criar recursos, como migrations, controlers...
- Migrate: Para migrar informações para o banco de dados, exemplo: no arquivo database > seeders > DataBaseSeeder.php descomente
a linha que vem comentada e execute o comando php artisan migrate --seed (lembre de configurar seu banco no .env)

<h2>Rotas</h2>

- As rotas do Laravel ficam em routes é necessário ter conhecimento da diferença entre API e WEB, para isso vá ao arquivo
app > Http > Kernel.php. Essa classe possui o atributo $middlleware, ele será executado em todas as requests, ela é 
responsável por realizar verificações. Já o atributo $middlewareGroups é um array com arrays e possui dois indices, 
'api' e 'web' e cada um possui sua responsabilidade, o 'web' por exemplo possui mais verificações de recursos do que a 'api'.

<h3>Rotas web</h3>

- Para utilizar rotas web é bem simples, você vai precisar chamar o método <b>Route::get</b> (você pode usar os outros metodos post, put) 
e passar no parâmetro a rota e a função que será responsável por manipular e retornar o que será necessário, 
por exemplo retornar a função view('nome-do-arquivo');.
- Para recuperar valores dos parâmetros da url basta você utilizar a variável {variavel} onde você vai declarar a view e passar no parâmetro
da função a variviável $variavel, lembre-se que a ordem que importa está no parâmetro da função.
- Para utilizar parâmetros opicionais nas url basta utilizar a variável onde declalra a view um '?', por exemplo: {variavel?}
- Para criar um agrupamento de rotas é necessário usar o método <b>Route::prefix('grupo')->group()</b>, no parâmetro do método group
é necessário passar uma função que irá receber as rotas normais.
- Para injetar parametros em uma rota, é necessário passar um model e uma variável no parametro da função da rota, por exemplo: Route::get(
'usuario/{id}', function(Model $id){}); *Lembre-se que o valor padrão para buscar é sempre o id e para especificar o campo que se refere para
realizar a busca deve-se utilizar na string da rota o campo da seguinte maneira {user:name}*
- Para linkar uma rota com um controller ao invés de utilziar uma função no parametro do método, use um array com o primeiro parâmetro sendo
o nome da classe do controller e o segundo parâmetro o método, exemplo: Route::get('usuario', [UserController::class, 'getUser']);

<h2>Debug</h2>

- Como o Laravel é um framework inteligente, para debugar podemos usar a função dd

<h2>Camas de Request</h2>

- Para utilizar a injeção de dependências da request basta usar no parametro da função da rota a Classe Illuminate\Http\Request, agora veja
alguns exemplos de uso da request: 
<a href="https://laravel.com/docs/9.x/requests" target="_blank">referência da documentação</a>
1. $request->all() responsável por retornar os dados passados por query string ou no body de uma requisição POST
2. $request->query() responsável por retornar a query string passada no parametro da url
3. $request->input('parametro') responsável por retornar o valor do parametro, por exemplo ?parametro=123 será retornado o 123
4. $request->path() responsável por retornar o caminho do endereço
5. $request->url() responsável por retornar a url
6. $request->fullUrl() responsável por trazer a url completa, incluindo por exemplo as query string
7. $request->header() responsável por trazer o header da requisição
8. $request->has('parametro') responsável por retornar true se o parametro existe ou false se não existir
9. $request->whenHas('parametro', function($parametro){}); responsável por executar uma função caso o parametro exista
10. $request->whenFilled('parametro', function($parametro){}); responsável por executar uma função caso o parametro exista e possua valor
11. $request->ip() responsável por retornar o ip

<h2>Blade template</h2>

- Para utilizar o blade template e aproveitar seus recursos você precisa utilizar a extensão .blade.php, pois assim o laravel vai reconhecer
que você quer utilizar os recursos dele, veja exemplos: 
<a href="https://laravel.com/docs/9.x/blade" target="_blank">referência da documentação do blade template</a>
- Para adicionar variável php no blade template você precisa passar no segundo parâmetro do metodo view um array, onde o índice será a variável
que será utilizada no blade template dentro da syntaxe {{ $nome }} e ela receberá o valor desse índice, exemplo: view('user', ['nome' => 'Usuário']);

<h3>Diretivas</h3>

- Algumas diretivas do blade template:
1. @if é o if do blade
2. @elseif é o else if do blade
3. @empty mesmo comportamento da função empty nativa do php
4. @php permite utilizar o php no blade
5. @foreach é o foreach do blade
6. @unless é o oposto do if
7. @yield é o local que será recuperado em outra view, para tribuir o valor, adicione a string no primeiro parâmetro para criar um valor padrão 
use no segundo parâmetro
8. @section é a sessão que será recuperada em outra view, para adicionar um html você irá precisar fechar com a diretiva @show
9. @extends extende o layout para ser recuperado
10. @push é responsável por armazenar link ou conteúdo script, você vai passar uma string do seu nome no parâmetro, é necessário fechar com @endpush
11. @stack é responsável por receber os conteúdos que estão no push, indicando pela qual conteúdo do push pela string de seu nome no parâmetro

<h2>Banco de dados</h2>

- O laravel disponibiliza varios recursos para gerenciar o banco de dados

<h3>Migrations create</h3>

- Para criar uma migration é necessário criar um arquivo php dentro de databese > migrations > arquivo.php, esses arquivos contam com os métodos up e down, para criar e resetar ou deletar uma migration.
- Comando para criar uma migration <b>php artisan make:migrate create_nomeDaTabela_table</b>, pois assim o schema do método de criar (up) já virá padronizado
- Preenchendo schemas para criar tabelas, utilizaremos o método create da classe Schema para criar tabelas, no seu parâmetro passaremos o nome da tabela e uma função onde injetaremos
no seu parâmetro a classe Blueprint e a variável $table exemplo: <b>Schema::create('tabela', function(BluePrint $table){});</b> e dentro do seu conteúdo iremos criar as colunas.
- Como criar colunas na tabela, dentro do método create iremos atribuir à variável $table os objetos e em seu parâmetro o nome da coluna, exemplo: <b>$table->string('titulo');</b>
- Identificar que uma coluna da tabela não é obrigatória devemos passar o objeto nullable(), exemplo: <b>$table->string('titulo')->nullable();</b>
- Para adicionar uma coluna após uma coluna específica deve usar o after e passar em seu parâmetro o nome da tabela que vem antes, exemplo: <b>$table->string('titulo')->after('imagem')</b>
- Como executar a migration <b>php artisan migrate</b>
- Como adicionar colunas em tabelas existentes com migrations, exemplo: <b>php artisan make:migrate add_colunaNova_to_tabela_table</b>, isso irá criar um método com table e nele
você irá adicionar o nome da coluna nova, seguindo o mesmo padrão de criar. Você também terá que adicionar um drop da coluna no método down, exemplo: <b>$table->dropColumn('coluna')</b>
- Veja todos os tipos de dados do banco, referência: <a href="https://laravel.com/docs/9.x/migrations#available-column-types" target="_blank">Todos os tipos de dados de banco para migrate</a>

<h3>Migrations drop e rollback</h3>

- Para executar um rollback em uma migrate basta executar o comando <b>php artisan migrate:rollback</b>
- Como dar rollback para uma migration específica, exemplo: <b>php artisan migrate:rollback --step=2</b>, cada migrate criada equivale a um step.

<h3>Migrations de relacionamento</h3>

- Para criar um relacionamento, por exemplo de um usuário com o id_usuario do post, você deve utilizar, $table->foreignId('colunaQueRepresentaOId')->constrained()->onDelete('CASCADE')->onUpdate('CASCADE'), lembre-se que o constrained é para deixar restrito somente para id de usuários que existem, o onDelete irá excluir todo o vinculo do id_usuario quando o usuário for deletado e o onUpdate irá atualizar automaticamente o id_usuario se o id do usuário por alterado.

<h3>Migrations de update</h3>

- Primeiro para poder criar uma migrate de update, você precisa instalar um drive: <a href="https://laravel.com/docs/9.x/migrations#modifying-columns" target="_blank">doctrine/dbal</a>, seu comando é <b>composer require doctrine/dbal</b>
- Para manipular dados de timestap é necessário alterar a configuração do DBAL.
- Para criar uma migrate de update, exemplo: <b>php artisan make:migration update_colunaAtual_Tabela_table</b>
- Como alterar um nome de coluna, é necessário utilizar $table->renameColumn('nomeDaColunaAtual', 'nomeNovoDaColuna'); e adicionar para o métodos down $table->renameColumn('nomeAntigoDaColuna', 'nomeQueSeraAlterado');

<h2>Model</h2>

- Um model é a representação de um dado do banco de dados, exemplo se você tem uma tabela de usuário e nela tem uma linha de dados de um usuário, sua representação será uma model

<h3>Criando model</h3>

- Para criar um model, exemplo: <b>php artisan make:model NomeDoModel</b> para criar um mini template, lembre-se que o nome do model, geralmente segue a representação do dado, tabela de usuário model Usuario
- Os models ficam em app > Models > NomeDoModel.php
- Também é possível criar o model junto com o controler e as migrations, exemplo: <b>php artisan make:model NomeDoModel --migration</b>