FROM elasticsearch:7.12.1

MAINTAINER echo <paliyapraveen@gmail.com>

RUN /usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-icu
RUN /usr/share/elasticsearch/bin/elasticsearch-plugin install analysis-phonetic

RUN chown -R 1000:1000 /usr/share/elasticsearch/.*