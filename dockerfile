# Usa imagem oficial com PHP + Apache
FROM php:8.2-apache

# Copia os arquivos para dentro do container
COPY . /var/www/html/

# Habilita permissões de leitura/escrita no CSV
RUN chmod -R 777 /var/www/html

# Expõe a porta 80 (padrão do Apache)
EXPOSE 80
