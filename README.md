# 🌍 Skole Database

Et enkelt system for å administrere elever, bygget med PHP og MySQL.

## Funksjoner

- Vis alle elever i en tabell
- Legg til nye elever
- Rediger elevdata
- Slett elever

## Installasjon

1. **Flytt filene til server-mappen**
   - XAMPP: `C:\xampp\htdocs\SkoleDB\`

2. **Start Apache og MySQL**

3. **Opprett database i phpMyAdmin**
   ```sql
   CREATE DATABASE skole;
   
   USE skole;
   
   CREATE TABLE elever (
       id INT(11) AUTO_INCREMENT PRIMARY KEY,
       fornavn VARCHAR(50) NOT NULL,
       etternavn VARCHAR(50) NOT NULL,
       klasse VARCHAR(10) NOT NULL
   );
   ```

4. **Åpne i nettleseren**
   - `http://localhost/SkoleDB/index.php`

## Filer

- `index.php` - Hovedside med elevliste
- `create.php` - Legg til nye elever
- `update.php` - Rediger elever
- `db.php` - Database-tilkobling
- `style.css` - Styling

## Database-innstillinger (db.php)

```php
$host = "localhost";
$user = "root";
$password = "";
$db = "skole";
```

---

**Laget for å lære PHP og MySQL**
