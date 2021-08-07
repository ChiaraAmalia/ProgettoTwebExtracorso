<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            ['domanda' => 'Di cosa si occupa ElectroStar?', 'risposta' => 'ElectroStar si occupa della vendita di elettrodomestici quali: frigoriferi, lavastoviglie, lavatrici, asciugatrici, frigoriferi e molto altro.'],
            ['domanda' => 'Da cosa nasce l\' idea di questo sito?', 'risposta' => 'Questo sito nasce per aiutare i nostri tecnici nella risoluzione di problemi legati ai nostri elettrodomestici.'],
            ['domanda' => 'Cosa si può vedere nel catalogo?', 'risposta' => 'Nel catalogo è possibile visualizzare le informazioni relative ai nostri prodotti come le note tecniche di buon uso e le modalità di installazione, privo delle informazioni relative ai malfunzionamenti e alle relative soluzioni.'],
            ['domanda' => 'Accedendo come tecnico, cosa posso visualizzare?', 'risposta' => 'Accedendo come tecnico è possibile visualizzare, oltre che tutti i prodotti nel catalogo, anche i malfunzionamenti e le soluzioni relativi ai prodotti di propria competenza.'],
            ['domanda' => 'Quali sono le funzionalità dello staff?', 'risposta' => 'Un utente registrato come staff ha il compito di aggiornare le schede prodotto con l\' inserimento, la modifica e la cancellazione dei malfunzionamenti e delle soluzioni relative'],
            ['domanda' => 'Quali sono le funzionalità dell\' amministratore?', 'risposta' => 'L\' amministratore gestisce i prodotti e le relative informazioni inclusi i malfunzionamenti e le soluzioni, inoltre gestisce gli utenti registrati nel sito e le FAQ.'],
            ['domanda' => 'Come posso effettuare il login?', 'risposta' => 'Nella barra di navigazione in alto basta cliccare sul link di Log-In e procedere con l\'autenticazione, oppure nella home, cliccando nell\'immagine in fondo, sul frigorifero.'],
        ]);
        
        
        DB::table('users')->insert([
            [ 'username' => 'adminadmin', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'amministratore', 'specializzazione' => Null, 'occupazione' => Null,
              'nome_centro' => Null, 'email' => 'giuseppe.santi3@mail.com', 'email_verified_at' => Null, 'nome' => 'Giuseppe', 'cognome' => 'Santi', 'via' => 'Piagi', 'citta' => 'Ancona',
              'cap' => '60121', 'sesso' => 'M', 'cellulare' => '3556768542'],
            [ 'username' => 'tecntecn', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'tecnico', 'specializzazione' => 'lavatrice', 'occupazione' => 'interna',
              'nome_centro' => Null, 'email' => 'maria.cerrato5@smail.com', 'email_verified_at' => Null, 'nome' => 'Maria', 'cognome' => 'Cerrato', 'via' => 'Donnola', 'citta' => 'Perugia',
              'cap' => '59439', 'sesso' => 'F', 'cellulare' => '3542047281'],
            [ 'username' => 'staffstaff', 'password' => Hash::make('iQRzJDM0'), 'categoria' => 'staff', 'specializzazione' => NULL, 'occupazione' => NULL,
              'nome_centro' => Null, 'email' => 'marco.rerrero7@pmail.com', 'email_verified_at' => Null, 'nome' => 'Marco', 'cognome' => 'Ferrero', 'via' => 'Sudini', 'citta' => 'Roma',
              'cap' => '23918', 'sesso' => 'M', 'cellulare' => '3920173645'],
        ]);
    }
}
