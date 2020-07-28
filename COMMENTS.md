[![N|Solid](https://www.grupoa.com.br/hs-fs/hubfs/logo-grupoa.png?width=300&name=logo-grupoa.png)](https://www.grupoa.com.br) 


Full Stack Web Developer PHP
===================

### Decisão da arquitetura utilizada
O projeto foi estruturado com Slim Framework em sua versão 4, a Arquitetura do sistema foi baseada no Skel de https://odan.github.io/slim4-skeleton/ que por sua vez implementa a Arquitetura ADR (Action Domain Responder).


### Lista de bibliotecas de terceiros utilizadas
 * Slim
 * JQuery
 * Bootstrap
 * Phinx
 * Cakephp/Database

### O que você melhoraria se tivesse mais tempo
Utilizaria uma abordagem diferente da entregue. Manteria no Backend em PHP somente uma API Rest com todos os Endpoints necessários e desenvolveria o FrontEnd com ReactJS. Optaria por essa abordagem porque permitiria utilizar a API em outros projetos além de otimizar o uso de servidores, uma vez que as aplicações SPA trabalham de forma mais otimizada em questões de renderização de tela e requisições pro backend.

### Quais requisitos obrigatórios que não foram entregues

- A validação do registro acadêmico duplicado ficou faltando.
- As exceções disparadas na validação dos formulários não foram tratadas de forma a ser mais amigável ao usuário.
- Tive problemas para executar as migrações do banco ao subir as instancias do docker, rodo isso por um bash script via ENTRYPOINT, porém não estava dando tempo de subir a instancia do banco. Coloquei um sleep 5 no phinx.sh pra dar tempo