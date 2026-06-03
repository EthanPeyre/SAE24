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
| **VM Windows Server 2019** | Contrôleur de domaine — Active Directory, DHCP, DNS, partages utilisateurs, supervision réseau (The Dude / Zabbix / Nagios / Cacti…) |
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

- Transfert d'appel, interception d'appel
- Mise en attente, enregistrement d'appel
- Groupements d'appels, boîtes vocales
- Messagerie unifiée, IVR (serveur vocal interactif)

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
Site PM1 ──── CE1 ──┐
                    ├── Salle E104 (infrastructure commune)
Site PM2 ──── CE2 ──┘
```

> **CE** = Customer Edge (routeur de bordure client)

**Objectif :** faire communiquer les 2 sites au niveau **informatique** (routage IP) et **téléphonique** (trunk SIP inter-Asterisk).

Une **simulation complète sous Cisco Packet Tracer** (hors partie téléphonique) est exigée.

---

## 📦 Livrables

### Livrables intermédiaires (Semaine 24 — Ma 09/06 à 18h15)

- [ ] Présentation de l'équipe, répartition des rôles, chef de projet identifié
- [ ] Diagramme de Gantt initial + outils collaboratifs utilisés
- [ ] Plan d'adressage et architecture réseau (en cours)
- [ ] Plan de numérotation téléphonique (en cours)
- [ ] Bilan des problèmes rencontrés et solutions apportées
- [ ] Premières pages du site Web

### Livrables finaux (Semaine 26)

Accessibles depuis le site Web interne et déposés sur Iris* :

- [ ] Présentation de la SAé et des attendus de la PoC
- [ ] Présentation de l'équipe et répartition des tâches
- [ ] Mode d'emploi succinct de la PoC
- [ ] Plan d'adressage et architecture réseau complète (Visio ou équivalent) *
- [ ] Plan de numérotation téléphonique complet *
- [ ] Fichier des logins et mots de passe *
- [ ] Fichier de simulation Packet Tracer
- [ ] Résultats des tests de connectivité (`ping`, `traceroute`, `sip show peers`)
- [ ] Diagramme de Gantt initial et final
- [ ] URL du dépôt GitHub *
- [ ] Synthèse personnelle de chaque membre + autoévaluation /20
- [ ] Évaluation croisée /20 par les pairs
- [ ] Bilan des problèmes et solutions
- [ ] Vidéo de présentation (3 min)
- [ ] Conclusion globale

> \* Également déposé sur la plateforme Iris

---

## 🎯 Évaluation finale — Semaine 26

- Présentation + démonstration technique (intrasite & intersite) — **30 min**
- Questions/réponses — **30 min**
- Livraison du serveur ESXi (DELL T20) avec les VMs configurées
- Rangement complet du matériel et remise en état de la salle de TP

---

## 👥 Équipe

| Membre | Rôle / Partie |
|--------|--------------|
| *PEYRE  Ethan* | Chef de projet / serveur |
| *RAKOTOSON* | ... |
| *(Nom 3)* | ... |
| *(Nom 4)* | ... |
| *(Nom 5)* | ... |
| *(Nom 6)* | ... |
| *(Nom 7)* | ... |

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

## 📁 Structure du dépôt

```
SAé24/
├── README.md
├── docs/
│   ├── plan_adressage.pdf
│   ├── plan_numerotation.pdf
│   ├── architecture_reseau.vsdx
│   └── logins_mdp.pdf
├── packet_tracer/
│   └── simulation_SAe24.pkt
├── site_web/
│   ├── index.html
│   ├── en/
│   └── private/
├── gantt/
│   ├── gantt_initial.pdf
│   └── gantt_final.pdf
└── tests/
    ├── connectivite_reseau.md
    └── tests_telephonie.md
```

---

## 🔗 Ressources

- [Analyse de la SAé24 sur Iris](https://iris.univ-tlse2.fr/course/view.php?id=8602)
- [IUT Blagnac — Réseaux & Télécoms](https://www.iut-blagnac.fr)
- [Démo Aastra 320W](https://www.youtube.com/watch?v=9_dYFshFKvE)
- [Démo FortiFone FON-175](https://www.youtube.com/watch?v=QzpIVWLvi70)

---

## 📝 Contraintes & bonnes pratiques

- Application des **bonnes pratiques de cybersécurité et d'hygiène informatique**
- Plans d'adressage IP et de numérotation **différents entre PM1 et PM2**
- Site Web : contenu **sans faute d'orthographe**, **responsive**, **sans lien brisé**
- **Partage des compétences** au sein de l'équipe (montée en compétences collective)

---

*Projet SAé24 — BUT1 R&T — IUT de Blagnac*
