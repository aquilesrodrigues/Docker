Debian-apache =>
Imagens utilizadas - Debian e Apache

Zabbix-grafana-postgres => 4 containers: zabbix-server, zabbix-frontend, grafana e mysql.

    Foram utilizadas as imagens oficiais do Zabbix, do Grafana e do MySQL. Os links para consulta estão no final deste artigo.
    Ao executar o comando docker-compose up, o Docker irá subir de forma automática os containers do Zabbix, do Grafana e do MySQL. Além disso, o Zabbix já estará conectado ao banco de dados MySQL e o Grafana já estará com o plugin do Zabbix instalado.

    Executar o seguinte comando na pasta que esta localizado o arquivo docker-compose.yml para subir os containers:
