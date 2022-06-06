# Cloud docker-lab
This is to create a docker laboratory with vulnerable containers in the cloud.<br>
The cloud structure has to be similar to the one represented at the final of this file.<br>

## How to use
Being in the base machine (máquina base) :
1. Install Docker and docker-compose using the console.
2. In the desktop, clone the repository:<br>
`git clone https://github.com/13tm3nt3r/docker-lab.git`
3. Now you have all the required folders. Follow the next steps to start all the containers:<br>
`cd docker-lab/`<br>
`cd local/`<br>
`docker-compose up`<br>
`// Command to stop the laboratory: docker-compose down`
4. Exit the base machine
5. Initialize the VPN in your local machine (PC usuario).
6. Practice your pentester skills with each machine started remotely. Use the IPs below.

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

## Structure
![structure](https://user-images.githubusercontent.com/85936242/172235066-8dd475c5-44ca-46dd-bce7-23f1147adfcc.png)
