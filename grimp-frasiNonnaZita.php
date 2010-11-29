<?php
/*
Plugin Name: Grimp-Hosting
Plugin URI: http://git.grimp.eu/projects/wp-hosting
Description: This plugin will allow you to manage hosting plans, hosting comparison etc.
Dependencies: grimp-php/grimp-php.php
Version: 0.1
Author: Fabio Alessandro Locati
Author URI: http://grimp.eu
License: GPL2
*/
 
function grimp_frasiNonnaZita_widget() {
  global $wpdb;
  $day= date ('d', time()) + date ('m', time()) + date ('w', time());
  $frase = $wpdb->get_var("SELECT Frase FROM frasi_zita WHERE ID LIKE '$day'");
  echo "<center><b><font color=#FF0000>$frase[Frase]</font></b></center>";
}

function grimp_frasiNonnaZita_setup() {
  global $wpdb;
  global $grimp_frasiNonnaZita_db_version;

  $table_name = $wpdb->prefix . "frasiNonnaZita";
  if($wpdb->get_var("show tables like '$table_name'") != $table_name) {
    $sql = "CREATE TABLE IF NOT EXISTS `frasi_zita` (
  `ID` int(3) NOT NULL auto_increment,
  `Frase` text NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

INSERT INTO `frasi_zita` (`ID`, `Frase`) VALUES
(1, 'C&amp;è un solo modo di risolvere un problema: affrontarlo'),
(2, 'Perdonare è da cristiani, dimenticare da stupidi'),
(3, 'Togliere le macchie appena possibile, il risultato è sempre migliore'),
(4, 'Anche gli asini lavorano'),
(5, 'Credi ma non scommettere'),
(6, 'Non sfregare le macchie, tamponale'),
(7, 'Credi sempre ma controlla sempre'),
(8, 'Tutto può tornare utile, anche le unghie per sbucciare l&amp;aglio'),
(9, 'Quello che vuoi fallo, quello che non vuoi demandalo'),
(10, 'Tutti hanno un loro credo'),
(11, 'Un leggero appretto facilita la stiratura'),
(12, 'Le grandi spese si programmano, le piccole ti rendono povero'),
(13, 'Si ha più successo con la sfacciataggine che con un portafoglio pieno'),
(14, 'Si sa come si nasce ma non come si muore'),
(15, 'Il cotone si stira umido, la lana asciutta'),
(16, 'Un bel tacer non fu mai detto'),
(17, 'Carta canta e villan dorme'),
(18, 'Le tarme mangiano più volentieri le parti sporche'),
(19, 'Se parli, dì la verità, ma non sempre è il caso di parlare'),
(20, 'Occhio non vede, cuore non duole'),
(21, 'Provare sempre gli smacchiatori in una zona nascosta dell&amp;indumento'),
(22, 'Meglio un avversario intelligente che un socio stupido'),
(23, 'Chi dorme non piglia pesci'),
(24, 'Prevenire è meglio che...smacchiare'),
(25, 'L''uomo propone ma il Signore dispone'),
(26, 'Il diavolo fa le pentole ma non i coperchi'),
(27, 'Tra il dire ed il fare c&amp;è; di mezzo il mare'),
(28, 'Leggi le etichette'),
(29, 'Solo le forbici tolgono tutte le macchie'),
(30, 'L&amp;occhio del padrone ingrassa il cavallo'),
(31, 'Via il gatto, i topi ballano'),
(32, 'Sporco o macchiato?'),
(33, 'Tanto va la gatta al lardo che ci lascia lo zampino'),
(34, 'Si sa come si nasce ma non come si muore'),
(35, 'Di notte tutti i gatti sono grigi'),
(36, 'Una rondine non fa primavera'),
(37, 'Le tarme mangiano le parti sporche'),
(38, 'L&amp;abito non fa il monaco'),
(39, 'Se ti danno un euro per cinquanta centesimi, è un inganno'),
(40, 'Un bucato ben steso si stira meglio'),
(41, 'La vita è fatta anche di piccoli piaceri'),
(42, 'La pelle bagnata sempre lontana dal calore'),
(43, 'Ognuno faccia il suo lavoro'),
(44, 'Per comandare bisogna saper ubbidire'),
(45, 'Candeggina e perborato non vanno assieme'),
(46, 'Non è tutto oro quello che luccica'),
(47, 'A volte, il meglio è nemico del bene'),
(48, 'Comincia col provare la soluzione più semplice'),
(49, 'I bottoni belli, è meglio toglierli'),
(50, 'Il primo guadagno è il risparmio');";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option("grimp_hosting_db_version", $grimp_hosting_db_version);
  }
}

function grimp_frasiNonnaZita_init(){
	register_sidebar_widget("Triqui", "triqui_widget");   
}
 
add_action("plugins_loaded", "grimp_frasiNonnaZita_init");
 
?>
