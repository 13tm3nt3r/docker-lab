# Local docker-lab
This docker-compose allows you to have a pentesting base laboratory to practice without problems in your own computer.
<br>

## How to use
1. Install Docker and docker-compose in your computer.
2. In your favourite folder, clone this repository:<br>
`git clone https://github.com/13tm3nt3r/docker-lab.git`
3. Now you have all the required folders. Follow the next steps to start all the containers:<br>
`cd docker-lab/`<br>
`cd local/`<br>
`docker-compose up`<br>
4. Practice your pententer skills with each machine started.
5. To stop the structure of machines:<br>
`docker-compose down`
<br>

## Machines
* **Kali** <br>
IP: 172.19.0.3
* **Mutillidae web** <br>
IP: 172.19.1.3
* **DVWA web** <br>
IP: 172.19.1.4
* **Juice Shop** <br>
IP: 172.19.1.5:3000
* **Wordpress** <br>
IP: 172.19.1.6
* **Metasploitable2** <br>
IP: 172.19.1.8
