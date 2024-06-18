<h1>Curso Laravue 9 INTRO</h1>

<h2>Artisan</h2>

- Help: Para utilizar o help (passe o comando artisan e no seu final use "--help", exemplo: php artisan make:model --help)
- Make: Categoria do artisan utilizada para criar recursos, como migrations, controlers...

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