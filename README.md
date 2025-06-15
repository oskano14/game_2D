# 🕹️ Game 2D – Dark Revenge

Un jeu d'action-aventure en 2D où un chevalier revient dans son village massacré par l’armée du roi démon. Partez en quête de vengeance dans une ambiance dark fantasy inspirée de **Dark Souls**.

---

## 📁 Structure du projet

```
GAME_2D/
├── back/          → API Symfony pour comptes et progression joueur
├── jeu_2d/        → Jeu 2D développé en JavaScript avec PixiJS v8
├── .gitignore
└── README.md
```

---

## ⚙️ Installation du projet

### 🔧 Prérequis

- Node.js (v18 ou supérieur)
- PHP 8.1+
- Composer
- SQLite (ou autre DB Symfony)
- Git

---

## 🖼️ Partie Front (`jeu_2d/`)

### Installation

```bash
cd jeu_2d
npm install      # (si tu utilises un système de build)
```

### Lancement local (avec un serveur ou live server)

```bash
# Si tu as un index.html :
npx live-server
```

---

## 🧠 Partie Backend Symfony (`back/`)

### Installation

```bash
cd back
composer install
cp .env .env.local    # configure ton environnement local ici
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

### Lancer le serveur Symfony

```bash
symfony server:start
```

L’API sera disponible sur : `http://127.0.0.1:8000`

---

## ✅ Fonctionnalités du jeu

- 👤 Joueur animé (idle, run, jump, attack, roll)
- ⚔️ Attaques avec hitbox sur caisses destructibles
- 🧪 Potions de vie récupérables
- 🧱 Collisions précises avec plateformes
- 🌕 Parallaxe dynamique (lune, brouillard)
- 🪦 Props décoratifs (arbres, tombes, église)
- 🎮 Contrôles :
  - `←/→` ou `A/D` pour se déplacer
  - `↑` ou `W` pour sauter
  - `Espace` pour attaquer
  - `T` pour rouler

---





## 🧠 Roadmap


- [ ] Système de boss
- [ ] Interface login/register (connectée au backend)
- [ ] Système de sauvegarde de progression
- [ ] Déploiement en ligne (GitHub Pages / Vercel + API)

---

## 🧑‍💻 Auteur

**oskano14**  
Projet personnel pour promouvoir un univers original ( fantasy)

---

## 📄 Licence

Ce projet est open-source sous licence MIT.  
