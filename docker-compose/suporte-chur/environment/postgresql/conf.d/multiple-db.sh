#!/bin/bash
# Não esqueça de atribuir modo execução ao arquivo 
# chmod +x /dados/docker/environment/postgresql/conf.d/multiple-db.sh
#
# Comando abaixo: Sai imediatamente se um comando sair com status diferente de zero
set -e
# Comando abaixo: Trata variáveis ​​não definidas como um erro ao substituir
set -u

# DECLARAÇÃO DA FUNÇÃO QUE CRIARÁ BANCO COM USUÁRIO
function create_databases() {
    database=$1
    password=$2
	echo "Criando usuário e Banco de dados '$database' com senha '$password'"
    psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" <<-EOSQL
      CREATE USER $database with encrypted password '$password';
      CREATE DATABASE $database;
      GRANT ALL PRIVILEGES ON DATABASE $database TO $database;
EOSQL
}

# Variável que recebe os nomes dos bancos que serão criados;
# Os bancos de dados são separados por vírgula; 
# O usuário terá o mesmo nome do banco de dados;
# e a senha que é opcional, deverá ser inserida depois dos dois pontos;
# POSTGRES_MULTIBLE_DATABASES=db1:password,db2

if [ -n "$POSTGRES_MULTIBLE_DATABASES" ]; then
  echo "Criação de vários bancos de dados solicitada: $POSTGRES_MULTIBLE_DATABASES"
  for db in $(echo $POSTGRES_MULTIBLE_DATABASES | tr ',' ' '); do
    user=$(echo $db | awk -F":" '{print $1}')
    pswd=$(echo $db | awk -F":" '{print $2}')
    if [[ -z "$pswd" ]]
    then
      pswd=$user
    fi
    echo "user is $user and pass is $pswd"
    create_databases $user $pswd
  done
  echo "Multiple databases created!"
fi