# PayMeLater

Instalação

1. Baixar depencias 
composer install

2. Configurar Banco de Dados
cp config/db-config.sample.php config/db-config.php
Preencher configurações em config/db-config.php

3. Criar estrutura do Banco de Dados
php vendor/doctrine/orm/bin/doctrine orm:schema-tool:create
