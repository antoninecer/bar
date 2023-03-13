<h<html>                                                                                                                                                        
<?php
include ('kolackologin.php');
include ('session.php');
include('head.php');
?>
  
<body>
<?php
require_once('./inc/connect.php');
include('menu.php');
?>
<br>
<p><strong>Jak naše aplikace funguje</strong></p>
  
<ul>
  <li><strong>Nastavení a založení podniku v systému</strong></li>
</ul>
  
<p>Administrátor zaregistruje kub na základě jeho žádosti, kdy tento poskytne své základní kontaktní údaje k tomu nutné. Jde o Název a adresu podniku, email, telefon, 
popis podniku a případně požadovaná uživatelská jména. Nastaví se login a heslo pro Superuživatele (SuperUser)
</p>
  
<ul>
  <li><strong>Nastavení provizních položek v systému</strong></li>
</ul>
  
  
<p>Pro správnou funkci aplikace je nutné mít jasné jaké položky jsou provizní včetně výše provize. Pro jednoduché ovládání doporučujeme do 12 položek,<br> ty se vejdou na plochu standardního mobilního telefonu bez rolování. Nastavení těchto položek provádí super uživatel, s prvotním nastavením může pomoci administrátor.</p>
  
<ul>
  <li><strong>Nastavení uživatelů</strong></li>
</ul>
  
<p>Nastavení dalších uživatelů si provede sám Superuživatel podniku (majitel / manažer). Superuživatel nemusí být v podniku jen jeden. Tuto osobu zakládá vždy Administrátor na základě autorizovaného požadavku Superuživatele či osoby, oprávněné jednat za podnik, a to z už známého tel. čísla nebo emailu. Administrátor může takový požadavek dále prověřit než jej realizuje.
Superuživatel zakládá v podniku uživatelské účty nižší úrovně (barman a umělec). Může také měnit jeich hesla nebo uživatele nižší úrovně mazat a editovat.</p>
  
<li><strong>Přihlášení</strong></li>
</ul>

<ol>
	<li>Role Barman a Superuživatel je svázána s podnikem a přihlášením se do aplikace zůstává v prohlížeči uložena přihlašovací data, stačí se tedy překliknout v meny a Barman se automaticky přihlásí.</li>
	<li>Role Umělec není svázána s podnikem a umělec může cestovat mezi jednotlivými podniky, přihlášení se do podniku (lidově odpíchnutí píchaček) dochází načtením QR kódu podniku, který může vygenerovat buď Superuživatel, nebo Barman, doporučujeme mít tento QR kód umístěn v převlékárně, případně dostupný na vyžádání na baru.</li>
</ol>

<ul>
	<li><strong>První přihlášení</strong></li>
</ul>

<p>Při prvním přihlášení musí každý uživatel zadat své jméno (login) a heslo.<br />
Systém si pamatuje přihlášené zařízení a napříště pro něj heslo vyžadovat nebude.<br />
Platnost zapamatování zařízení je 1 rok.</p>

<ul>
	<li><strong>Doporučené užití systému je následující</strong>&nbsp;</li>
</ul>

<p>PPojmenování uživatelů doporučujeme používat bez diakritiky, jednoduše zapamatovatelné, dostačující může být spojeni jmeno.prijmeni, záleží to ale na umělci a klubu.<br />
Umělec příjde do klubu a načte QR kód v šatně, tím dojde k přihlášení se do práce a jeho účet se otevře pro natěžování provizí od barmanů v tomto klubu.<br />
Barman může buď načíst QR kód umělce z jeho mobilního zařízení, nebo po jeho přihlášení jej uvidí v přehledu klubu, po tomto úkonu může barman posílat na otevřený účet umělce jednu, či více provizních položek.<br />
Po skončení pracovní doby klubu barman transakce každého umělce může uzavřít buď s odhlášením, nebo bez odhlášení umělce z klubu a vytvoří se doklad s časovým razítkem, který uvidí jen umělec na svém účtu, nebo Superuživatel v kartě přehledu klubu, dojde k vyplacení provize. Při uzavření účtu dojde k natížení domluveného symbolického transakčního poplatku, který bude po domluveném období účtován jako licenční poplatek za využívání aplikace.<br />
Pokud dojde omylem k natížení chybné položky, musí zakročit Superuživatel a ten z otevřeného účtu umělce může chybně natíženou položku odmazat. Po uzavření účtu již není možné s natíženými položkami již nijak pracovat, nebude možné vznést reklamaci nebo stížnost a částka bude umělci vyplacena.</p>

<ul>
	<li><strong>Vývoj a podpora</strong></li>
</ul>

<p>Aplikaci budeme postupně rozvíjet a vylepšovat = aktualizace / update.<br>
Na žádost klienta lze provádět úpravy = upgrade.</p>

<ul>
	<li><strong>Bezplatné zkušební období</strong></li>
</ul>

<p>Aplikace je v testovacím režimu a je zdarma. Po uplynutí bezplatného období budou podle smluvních podmínek tyto symbolické transakční poplatky klubu účtovány, tyto mikroplatby umožní její další správu a vývoj.</p>


<ul>
	<li><strong>Cíle a výhody používání aplikace</strong></li>
</ul>

<p>Primárním cílem je zpřehlednit výplaty a odměn a provizí umělců v nočních klubech a tedy zamezit např. nechtěné ztrátě žetonů, kartiček nebo klubových dolarů v průběhu večera a transparentností jejich dočasné evidence (nejméně do konce pracovní doby a realizace jejich vyplacení) zabránit případným sporům umělců a obslužného personálu.
Umělci i obslužný personál uvidí online na svých zařízeních aktuální výdělky do okamžiku uzavření směny.<br /></p>

</body>
</html>
