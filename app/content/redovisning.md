Redovisning
====================================
 

Kmom02: Kontroller och modeller
------------------------------------

> Hur känns det att jobba med Composer?

Jag var på ett seminarium för en tid sedan där jag fick se hur man jobbar med
[yo](https://www.npmjs.org/package/yo), 
[bower](http://bower.io/) och 
[grunt](http://gruntjs.com/) och blev rätt imponerad. Själv är jag ingrodd
Windowsanvändare med Linuxwannabe - och jag har en tröskel att komma över när
det gäller terminalen och alla utsökta möjligheter som verkar finnas där.

När jag fått igång composer på min lokala miljö så fick jag lite flashback på
seminariet och tyckte det var rätt kul att få det att fungera i Windows på det
sättet. För att testa på studentservern fick jag dock [gå tillbaka lite](http://dbwebb.se/kunskap/att-koppla-upp-dig-mot-en-server-med-ssh-via-terminalen)
för att kolla hur jag kopplade upp mig med putty, men efter det var det inga 
problem.

-----

> Vad tror du om de paket som finns i Packagist, är det något du kan tänka dig att använda och hittade du något spännande att inkludera i ditt ramverk?

Min första tanke var att det är ju fantastiskt smidigt! Åter igen så föll tankarna
tillbaka på seminariet där han med några kommandon kunde ladda ned en mängd paket
och alla dess dependencies. Jag kan helt klart se nyttan i att lägga upp och
hantera paket på detta sätt - och att via composer enkelt kunna hålla referenserna
uppdaterade är ju också väldigt smidigt!

Jag är dock inte van att sitta med kommandopromoten öppen och jobba så pass aktivt
med den hela tiden, men det är något jag gärna skulle vilja vänja mig vid.

Jag hittade en mängd paket för LESS och minifiering av CSS, JavaScript och HTML som
jag tyckte så intressanta ut. Sedan fanns det ju paket för t.ex. fotoalbum, 
porfolios och sökning m.m. Ett riktigt smörgåsbord som jag måste kika i nästa
gång jag ska bygga något.

-----

> Hur var begreppen att förstå med klasser som kontroller som tjänster som dispatchas, fick du ihop allt? 

Det begrepp som jag inte riktigt hade hört tidigare var "dispatchern". Men jag tycker
att begreppen sitter rätt bra nu, och i instruktionerna så läste jag meningen som
sammanfattade allt på ett väldigt bra sätt:

>"En frontcontroller som tar emot requesten och dispatchar till controllern
>som använder sig av modellen för att hämta och uppdatera informationen och därefter
>används vyn för att rendera resultatet till en HTML-sida.""

Att sitta och vidareutveckla kommentarfunktionen ledde ju till att jag fick
skapa nya vyer, utöka CommentController, skapa en ny klass som laddas in i
DI, få undersöka vilka funktioner som finns för t.ex. session, request och response.

Även om jag förstod begreppen innan så var det nyttigt att lösa olika utmaningar med
hjälp av ramverket för att få en bättre förståelse. 

Jag samlade lite funktionalitet i en ny klass som jag kallade [PageComments](source?path=vendor/phpmvc/comment/src/Comment/PageComments.php).
När man lagt in den klassen och CommentController så är det lätt att lägga in all kommentarfunktionalitet
med funktionen [addToPage](http://localhost:2014/phpmvc/kmom02/webroot/source?path=webroot/index.php#L48).

Lade även in extrafunktionerna med att den större delen av kommentar-formuläret visas
när textarean får fokus. Om man tömmer textfältet och textarean inte har fokus 
så döljs det igen.

Även gravatarfunktionaliteten är inlagd, både med PHP och JavaScript så att den
uppdateras automatiskt när man skriver in en e-postadress och fältet förlorar fokus.

Jämfört med Icke-MVC-Anax så tycker jag redan att den här versionen känns bättre
att jobba med. Strukturen känns tydligare i och med att man alltid har DI i grunden
där man kommer åt allt man kan behöva.

-----

> Hittade du svagheter i koden som följde med phpmvc/comment? Kunde du förbättra något?

Jag lade in lite validering så att man måste fylla i åtminstone kommentar och namn.



Jag fixade även en liten bugg där [CSession::get](source?path=src/Session/CSession.php#L68)
returnerade null istället för det defaultvärde man kan skicka in som parameter.

Kmom01: PHP-baserade och MVC-inspirerade ramverk
------------------------------------

> Vilken utvecklingsmiljö använder du?

Jag sitter med Windows 8.1, XAMPP v3.2.1, PHP 5.4.22 och Sublime Text 3. Jag
har min utvecklingsmiljö portabel i en mapp i min DropBox som gör att det är
ganska lätt att utveckla var jag än sitter eller vilken dator jag än har. Det
ger mig en flexibilitet som gör det lite lättare att läsa dessa kurser eftersom
jag samtidigt jobbar, åker runt mycket och sitter på många olika datorer.

> Är du bekant med ramverk sedan tidigare?

Nej. Jag har vid tillfällen börjat kika runt lite med ambitionen att läsa och
lära mig mer om hur dessa ramverk fungerar så att jag själv kan bygga någonting
liknande med en bra standard. Men det har slutat med att andra saker har fått
prioritet istället.

Jag tyckte guiden om Me-sidan med ANAX MVC var bra, men kände mig också rätt
förvirrad. Det tar jag som ett gott tecken såhär i början av kursen

Jag gillade kapitlet om "Dependency Injection/Service Location" i dokumentationen
för Phalcon och fick både mersmak och huvudvärk då jag insåg hur mycket jag
skulle vilja lära mig mer om detta!

> Är du sedan tidigare bekant med de lite mer avancerade begrepp som introduceras?

Det var ett gäng nya begrepp som jag inte har haft koll på tidigare. T.ex. 
är "Dispatcher" något som jag nog aldrig haft ett namn på tidigare och som
vad jag förstått är koden som tar reda på vilken kontroller som ska användas.

Dependency Injection är något jag inte heller haft en term för, men i varje
litet hobbyprojekt jag gjort så har ju precis de tankarna varit i fokus många
gånger, men de har aldrig riktigt landat.

Övriga begrepp är bektanta. Men även om jag känner till begreppen så skulle
jag inte påstå att jag har någon djupare förståelse för dem, så jag ser fram
emot att lära mig mer!

> Din uppfattning om Anax, och speciellt Anax-MVC?

Som sagt, något förvirrande till en början. Det är många filer och många
moduler i ramverket. Jag blev först lite fundersam över att det allra första steget
var att ladda ned det färdiga ramverket, jag hade ju velat koda själv för att
förstå det djupare. 

Men jag sneglade på kmom02 och ska fortsätta läsa länkarna i kmom01, och jag
tror att jag kommer att ha rätt mycket att göra utan att skriva allt från grunden!

Från tidigare kurser har Anax kännts som en väldigt smidig mall att använda
för att snabbt få upp en sida, och vad jag sett hittills av Anax-MVC så är det
en väldigt spännande förbättring.

Jag lade även upp Anax-MVC på min Github med ambitionen att hålla den uppdaterad
under kursens gång.