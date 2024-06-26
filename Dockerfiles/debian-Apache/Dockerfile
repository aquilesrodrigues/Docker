FROM debian:bookworm 

LABEL org.opencontainers.image.authors="cyberfazer@gmail.com"
LABEL version="1.0"
LABEL description="Apache WebServe 1.0"

USER root

# Set Apache environment variables (can be changed on docker run with -e)
#
#. usuário que irá executar o apache
ENV APACHE_RUN_USER                         www-data
ENV APACHE_RUN_GROUP                        www-data
ENV APACHE_SERVER_ADMIN                     suporte@localhost
ENV APACHE_SERVER_NAME                      localhost
ENV APACHE_SERVER_ALIAS                     docker.localhost
ENV APACHE_DOCUMENT_ROOT                    /var/www
#. Arquivo de log
ENV APACHE_LOG_DIR                          /var/log/apache2
#. O arquivo que contém o número de identificação do processo
ENV APACHE_PID_FILE                         /var/run/apache2.pid
#
ENV APACHE_RUN_DIR                          /var/run/apache2
#. Evitar que tenha mais de uma sessão do apache em um contêiner:
ENV APACHE_LOCK_DIR                         /var/lock/apache2
#. Porta do Apache
ENV APACHE_PORT="80"

# Com essa configuração abaixo, ao iniciarmos o Apache, ele vai criar: 
# 2 processos filhos (START_SERVERS), e cada processo filho vai iniciar:
# 25 threads (THREADS_PER_CHILD). 
# Nessa situação vamos suportar 50 conexões/clientes simultâneas

ENV APACHE_WORKER_START_SERVERS             2
ENV APACHE_WORKER_MIN_SPARE_THREADS         2
ENV APACHE_WORKER_MAX_SPARE_THREADS         75
ENV APACHE_WORKER_THREAD_LIMIT              25
ENV APACHE_WORKER_SERVER_LIMIT              16
ENV APACHE_WORKER_THREADS_PER_CHILD         25
ENV APACHE_WORKER_MAX_REQUEST_WORKERS       4
ENV APACHE_WORKER_MAX_CONNECTIONS_PER_CHILD 0

# Configurar timezone Brasil
ENV TZ "America/Sao_Paulo" 
ENV DEBIAN_FRONTEND noninteractive
ENV LANGUAGE "pt_BR.UTF-8"



# atualizar d pacotes
RUN apt-get update && \
    apt-get install -y wget curl locales apache2 tzdata unzip zip net-tools && \
    apt-get clean


RUN locale-gen $LANGUAGE && \
    dpkg-reconfigure locales && \
    ln -fs /usr/share/zoneinfo/$TZ /etc/localtime && \
    dpkg-reconfigure -f noninteractive tzdata && \
    update-locale LANG=$LANGUAGE

# Inserir uma pequena página de exemplo
RUN wget  https://github.com/aquilesrodrigues/javascript-memory-game/archive/refs/heads/main.zip && \
    unzip main.zip && \
    mv javascript-memory-game-main/* /var/www/ && \
    rm -r javascript-memory-game-main main.zip

#Descomentar caso queira persistência dos dados
VOLUME /var/www/

#Porta exposta
EXPOSE 80
#Qual Arquivo será executado em primeiro plano:
ENTRYPOINT ["/usr/sbin/apachectl"]
#Indicar que precisa ser executado em primeiro plano
CMD ["-D","FOREGROUND"]

