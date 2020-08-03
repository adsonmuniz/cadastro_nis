# Cadstro NIS
## Pequeno projeto web para cadastro de NIS

### Rodar o programa
Requisitos:
- MySQL
- Xampp
- Composer
1) Após instalar o , Composer, Xampp e o MySQL, desligar o serviço MySQL80 no services.msc, abrir na pasta do Xampp o executável xampp-control.exe. Executar o Apache e o MySQL.
2) Baixe o phpMyAdmin4 (https://www.phpmyadmin.net/). Extrair o conteúdo e colocar na pasta do Xampp (../xampp/). Para facilitar ao extrair o conteúdo deixe a pasta com o nome phpMyAdmin.
3) Na pasta do phpMyAdmin, procure o arquivo config.sample.inc.php e renomear para config.inc.php. Abrir o arquivo com editor de texto e modificar o valor da linha $cfg['Servers'][$i]['AllowNoPassword'] para true.
4) Fazer o download do ZIP do projeto em "https://github.com/adsonmuniz/cadastro_nis". Na pasta "../xampp/htdocs/" colar o conteúdo do download, renomeando a pasta de "cadastro_nis-master" para "cadastro_nis". Ou clonar o projeto através do GIT no mesmo caminho pela url "https://github.com/adsonmuniz/cadastro_nis.git".
5) No navegador, digitar e abrir o caminho "localhost/phpMyAdmin", inserir o usuário root e Executar. No menu superior, clicar na guiar SQL, copiar e colar o conteúdo do arquivo "../cadastro_nis/scripts/scripts_create.sql" do projeto. Por fim, execute o código SQL.
6) Abrir com prompt de comando o caminho do projeto, na pasta raíz executar o comando "composer install".
7) Pronto, agora no navegador digite "localhost/cadastro_nis".
