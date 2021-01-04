# DOJO 10 Ajax & Symfony 

## Start porject :

- ```composer install```
- ```bin/console d:d:c```
- ```bin/console make:migration```
- ```symfony server:start```
  
## CRUD AJAX FOR ARTICLE

- In a new controller, add method to getAll/getOne/create/update/delete an article (inspire you of ArticleController, also don't forget to use json format to return your response)
- In templates folder /article, write 5 methods with Axios to getAll/getOne/create/update/delete an article, display response in a console.log
-> for example : 
```
    // USE CDN AXIOS
    // GET ALL ARTICLES 
    <script>
        axios.get('https://localhost:8000/la/route/de/ton/new/controller/pour/getter/tous/les/articles/t'as/vu')
        .then(response => console.log(response.data))
    </script> 
```