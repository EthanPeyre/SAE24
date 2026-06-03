# 🏥 SAé24 — Déploiement du Système d'Information de Cabinets Paramédicaux

> Projet réalisé dans le cadre du **BUT Réseaux & Télécommunications — 1ère année**  
> IUT de Blagnac — Département Réseaux & Télécoms

---

## 📋 Présentation du projet

Ce projet est une **Situation d'Apprentissage et d'Évaluation (SAé24)** consistant à réaliser une **preuve de concept (PoC)** du système d'information d'un groupement de cabinets paramédicaux.

La société fictive **SipOc**, spécialisée dans la fourniture, l'installation, la configuration et la maintenance de systèmes d'information pour cabinets paramédicaux en région Occitanie, a été mandatée pour concevoir et déployer l'infrastructure réseau et téléphonique de ce groupement implanté sur **2 sites en Haute-Garonne**.

---

## 🏗️ Architecture générale

Le cabinet paramédical type comprend :
- 1 médecin généraliste
- 3 kinésithérapeutes
- 1 dentiste
- 1 secrétaire paramédicale

**Locaux :** local informatique, salle d'attente, sanitaires, salle des kinés.

---

## 🖥️ Infrastructure technique — Besoins intrasites

### Informatique & Réseau

| Composant | Description |
|-----------|-------------|
| **Postes clients** | Ordinateurs de bureau câblés sous Windows, identification login/mot de passe, suite bureautique, navigateur Web, messagerie Thunderbird |
| **Hyperviseur** | VMware ESXi 6.7 (type 1) hébergeant 2 VMs |
| **VM Windows Server 2019** | Contrôleur de domaine — Active Directory, DHCP, DNS, partages utilisateurs, supervision réseau (The Dude) |
| **VM GNU/Linux Ubuntu Mate 22.04 LTS 64 bits** | Serveur applicatif — Web, MySQL, FTP, TFTP, Asterisk (ToIP), SMTP, POP3 |
| **Wi-Fi** | Couverture assurée par un point d'accès unique |
| **Routeur** | Cisco — passerelle réseau |
| **Plan d'adressage** | Classe C privée /24 (au choix, différent de la salle de TP) |

### Site Web interne (Responsive Web Design)

- **Partie publique** : présentation du cabinet en français et en anglais
- **Partie privée** (authentifiée) : documentation du projet, résultats de tests, livrables téléchargeables
- Gestion de versions via **GitHub**

### Téléphonie sur IP (ToIP)

Serveur **Asterisk** avec les fonctionnalités suivantes :

- **Transfert** d'appel, **interception** d'appel
- Mise en **attente**, **enregistrement** d'appel
- **Groupements** d'appels, boîtes vocales
- Messagerie unifiée, **IVR** (serveur vocal interactif)

**Équipements téléphoniques :**

| Poste | Utilisateur |
|-------|-------------|
| Softphone | Tous membres |
| Téléphone numérique | Tous membres |
| Téléphone analogique | Tous membres |
| **Mitel Aastra 320w** (mobile Wi-Fi) | Secrétaire (poste opérateur) |
| **FortiFone FON-175** (numérique) | 1 poste dédié |

> Le plan de numérotation est libre, mais **différent entre chaque site**.

---

## 🌐 Besoins intersites et mobilité

Deux équipes travaillent en parallèle dans la salle E104, chacune déployant un site (PM1 et PM2) avec des plans d'adressage IP et de numérotation distincts.

```
Site PM1 ──── SW1 ──┐
                    ├── Salle E104 (infrastructure commune)
Site PM2 ──── SW2 ──┘
```

> **SW** = Switch

**Objectif :** faire communiquer les 2 sites au niveau **informatique** (routage IP) et **téléphonique** (trunk SIP inter-Asterisk).

Une **simulation complète sous Cisco Packet Tracer** (hors partie téléphonique) est exigée.

---

## 👥 Équipe

| Membre | Rôle / Partie |
|--------|--------------|
| *PEYRE  Ethan* | Chef de projet / serveur (ESXi et XAMPP) |
| *RAKOTOSON Lisa-Marie* | Gestion de projet et Réseau (Packet Tracer et mise en place des équipements réseaux )|
| *CZAPLA Victor* | Serveur Windows : gestion domaine et DHCP/DNS |
| *MASSIOT Clément* | Gestion de projet et serveur Astérisk |
| *TASSIN Mathéo* | Organisation du réseau et projection sur la maquette |
| *RAHALINONY NUNES Angelo* | Configuration des équipements réseaux et serveur Asterisk |
| *DEWATINE Julien* | Code des sites web HTML/CSS et PHP et traduction des pages |

---

## 🛠️ Technologies utilisées

![VMware ESXi](https://img.shields.io/badge/VMware-ESXi_6.7-607078?logo=vmware)
![Windows Server](https://img.shields.io/badge/Windows_Server-2019-0078D6?logo=windows)
![Ubuntu](https://img.shields.io/badge/Ubuntu-22.04_LTS-E95420?logo=ubuntu)
![Asterisk](https://img.shields.io/badge/Asterisk-ToIP-F47B20)
![Cisco](https://img.shields.io/badge/Cisco-Packet_Tracer-1BA0D7?logo=cisco)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql)
![Apache](https://img.shields.io/badge/Apache-Web_Server-D22128?logo=apache)

---

## 📝 Contraintes & bonnes pratiques

- Application des **bonnes pratiques de cybersécurité et d'hygiène informatique**
- Plans d'adressage IP et de numérotation **différents entre PM1 et PM2**
- Site Web : contenu **sans faute d'orthographe**, **responsive**, **sans lien brisé**
- **Partage des compétences** au sein de l'équipe (montée en compétences collective)

---

## 🎯 Évaluation finale — Semaine 26

- Présentation + démonstration technique (intrasite & intersite) — **30 min**
- Questions/réponses — **30 min**
- Livraison du serveur ESXi (DELL T20) avec les VMs configurées
- Rangement complet du matériel et remise en état de la salle de TP

---

*Projet SAé24 — BUT1 R&T — IUT de Blagnac*
