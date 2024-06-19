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

<h2>Debug</h2>

- Como o Laravel é um framework inteligente, para debugar podemos usar a função dd