<?php
if (session_status() !== PHP_SESSION_ACTIVE)
  session_start();
?>

<!doctype html>
<html lang="it">

    <head>

        <meta charset="utf-8">
        <title>Home</title>
        <meta name="author" content="Letizia Pontarolo" >
        <link rel="stylesheet" type="text/css" href="../altro/stile.css">

    </head>

    <body>
    
    <header class="titolo"><?php include '../altro/titolo.php'; ?></header>

   <div class="intestazione" ><?php include '../altro/intestazione.php'; ?></div>

		<h2 id="home" >Home</h2>

    <div class="menu" ><?php include '../altro/menu.php'; ?></div>

    <div class="centro">


        <p> Sito web per la compilazione del piano didattico per gli studenti universitari 
          iscritti al Politecnico di Busto Arsizio realizzato da Letizia Pontarolo.</p>
        <h3> Corsi di laurea: </h3>
        <div class="ING"> Ingegneria Informatica (INF) </div> Guardando al futuro, a dieci anni da oggi, quali saranno le tecnologie 
        che pervaderanno la nostra vita e quali saranno le idee che rivoluzioneranno l’uso di tali tecnologie a supporto del cittadino 
        e della società? La competenza dell'ingegnere non si limita al sapere, ma include il saper applicare la conoscenza acquisita. 
        Diventerai ingegnere informatico, una figura in grado di gestire sistemi digitali complessi e di valutare le alternative 
        nell’acquisizione di beni e servizi informatici. Sarai in grado di interagire efficacemente con altre figure professionali 
        sia nel campo dell’ingegneria che in altre discipline, allo scopo di formare sinergie in grado di continuare a innovare il 
        mondo dell’informazione, rendendo le tecnologie sempre più pervasive e al servizio degli utenti.
        <div class="ING"> Ingegneria Gestionale (GES) </div> Il contesto in cui studiare per diventare i manager di domani. 
        Il corso di Laurea offre la possibilità di caratterizzare la propria formazione relativa alle capacità di gestione 
        operativa delle risorse dell’impresa lungo due filoni culturali: il primo relativo alla conoscenza dei processi produttivi 
        e delle relazioni con fornitori e clienti (classe L-9); il secondo focalizzato sulla analisi dei flussi informativi aziendali 
        e la valutazione e gestione di progetti di innovazione organizzativa e tecnologica attraverso le Information and Communication 
        Technologies (ICT) (classe L-8). Diventerai ingegnere gestionale di primo livello, una tipologia ambivalente di ingegnere, 
        focalizzata sia sulle metodologie di gestione ed organizzazione di sistemi complessi sia sulla gestione e conduzione di sistemi 
        logistici e di produzione.
        <div class="ING"> Architettura (ARC) </div> Architettura come passione per il progetto, desiderio di trasformare l’ambiente 
        per migliorare la qualità della vita. Diventerai architetto junior, figura professionale autonoma in grado di "progettare 
        edifici civili semplici con l'uso di metodologie standardizzate" e "di effettuare rilievi diretti e strumentali sull'edilizia 
        attuale e storica", nonché di collaborare al processo progettuale di architettura alle diverse scale, dall'ideazione alla 
        realizzazione, alla gestione, con capacità di analisi e di elaborazione critica, in studi professionali di progettazione, nel 
        campo della pubblica amministrazione, in società di ingegneria e architettura, industrie di settore e imprese di costruzione.
        <div class="ING"> Design (DES) </div> Il Design ci circonda, modella il nostro ambiente, contribuisce a definire il nostro 
        pensiero e la nostra cultura. Diventerai designer di primo livello, una figura di progettista in grado di elaborare concept 
        innovativi di comunicazione, di prodotto e di servizio, che tengano conto dell’essere umano e dell'ambiente, inteso come 
        contesto storico, sociale, culturale, economico e naturale in cui i prodotti vengono utilizzati. Sarai capace di collaborare 
        con specialisti e specialiste delle aree tecnico-scientifiche e umanistiche attraverso il confronto, in campo progettuale, 
        sui temi dei materiali e della produzione, della sostenibilità ambientale, della storia, della valutazione economica, della 
        psicologia dei consumi, dell'ergonomia cognitiva e della comunicazione.
  
      </div>
        

<footer>
  
<?php include '../altro/footer.php'; ?>

</footer>

</body>

</html>