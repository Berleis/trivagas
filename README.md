- Baixe e instale a ultima versão do xampp

- https://www.apachefriends.org/xampp-files/7.1.11/xampp-win32-7.1.11-0-VC14-installer.exe

- Baixe e instale o GitHub Desktop

- https://desktop.github.com/

- Baixe e instale o eclipse PHP

- http://www.eclipse.org/downloads/packages/eclipse-php-developers/oxygen1a

- Depois de fazer login no git desktop, clique em file e selecione clone repository, na
URL cole isso https://github.com/Berleis/trivagas e no caminho cole isso C:\xampp\htdocs\trivagas

- No eclipse PHP, selecione o seguinte local como workspace C:\xampp\htdocs

- Depois de aberto, clique em file, depois selecione open projects from file system, em import source cole isso C:\xampp\htdocs\trivagas e dê finish

- Para rodar o projeto, abra o xampp e dê start no apache e no mysql, no navegador digite localhost/trivagas

##### Adicionando a base no phpmyadmin #####

- No navegador, digite localhost/phpmyadmin

- No painel esquerdo, clique em New

- Coloque o nome trivagas e em agrupamento selecione utf8_general_ci

- Depois disso, no painel superior clique em SQL, cole os códigos do script que está na pasta Database e execute