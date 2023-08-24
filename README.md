# Timestamp Dashboard Jms

* Um projeto meu que se refere a um dashbord que controla o Ponto dos colaboradores, marcando entrada e saída da jornada diária de trabalho.
* Contém 4 tabelas no banco de dados, Users, Colaborators, Timestamps, Holidays.
* é possível entrar como Admin o qual contém um dashboard de Opçoes que um Usuario do tipo colaborador não consegue.
* é possível entrar como colaborador para bater o ponto quantas vezes necessárias por dia.
* o colaborador também consegue acessar as datas de feriados, assim como outras opções do dashboard, como perfil etc.
* o Admin pode criar, editar ou deletar novos usuarios, assim como novos colaboradores.
* Se o Admin criar um colaborador, automaticamente cria um usuario. porém vice-versa não, pois um usuario pode não ser um colaborador e ser apenas Admin.


### Para subir o projeto:

Entrar com um terminal dentro da api e rodar: docker-compose up -d
Webapp: Acessar: http://localhost:8080/


Entrar com um terminal dentro da webApp e rodar: docker-compose up -d
Api:    Acessar: http://localhost:8988/

Para acessar o banco de dados:
Dbeaver ou PgAdmin.


### Tecnologias:

* o projeto foi divido em um pasta frontend e outra backend
* Laravel 10 -> Sanctum -> 
* Vuejs -> vuex -> axios -> vue3-google-map -> vue3-pagination -> vue-toast-notification -> bootsrtrap
* Docker
* Postgres11