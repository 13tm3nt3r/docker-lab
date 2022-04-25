# Cloud docker-lab
This docker-compose is used on the Digital Ocean droplet with **IP: 178.128.253.70** to practice in a pentesting base laboratory.
<br>

## How to use
The process to access to this server is the following:<br><br>
**NEW**
1. Download the OpenVPN file.
2. Execute the OpenVPN file:<br>
`openvpn base-client.ovpn`
3. Connecto to any machine below using the provided IP.

<br>

**OLD**
1. Connect via SSH to the user-droplet:<br>
`ssh user@178.128.253.70`<br>
_password:_ `c0nTraseniaUser`
2. Access to each machine using the IPs below.
3. In case you want to use the Kali machine as your pentester localhost, connect via SSH following the same procedure as before:<br>
`ssh kali@172.19.0.3`<br>
_password:_ `kali`
4. Now you can perform any action you want to the rest of machines in your Kali.
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
