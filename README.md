## ontwebframework
Dit is een framework voor eerstejaars HZ-studenten.
De studenten kunnen dit framework in hun eigen branch aanpassen en vervolgens de aanpassingen terug comitten naar de head-branch.

## het framework installeren op localhost
### benodigdheden
- xampp
- skills

### uitvoering
Download de hele github-directory in je xampp htdocs-folder.
Laadt dbtest.sql, te vinden in de data-folder, in je phpmyadmin-applicatie.
Zorg dat er met de database geconnect kan worden met de volgende gegevens:
	Host: p:localhost
	Username: dbtest
	Password: dbtest
	Database: dbtest
Klaar.

## modules aanmaken 
0. kijk naar het voorbeeld in my_module
1. maak een nieuwe map aan onder 'modules/' bijvoorbeeld: 'my_module_2'
2. zet je 'my_page.php' in folder 'my_module_2/pages', deze page is verantwoordelijk voor het laden van je template
3. zet je 'my_template.tpl' in folder 'my_module_2/templates', dit zal de layout van pagina bepalen
4. model is geen verplichte directory
5. voeg je page toe aan de tabel 'page' in de database met als uri '?module=my_module_2&page=my_page'
6. voeg eventueel meer pagina's toe aan je module


