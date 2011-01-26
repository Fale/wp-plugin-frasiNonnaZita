<?php
/*
Plugin Name: Grimp - Frasi Nonna Zita
Plugin URI: http://git.grimp.eu/projects/wp-plugin-frasiNonnaZita
Description: This plugin will allow you to show a rotating phrase.
Version: 0.1
Author: Fabio Alessandro Locati
Author URI: http://grimp.eu
License: GPL2
*/

add_action("widgets_init", "grimp_fnz_init");

function grimp_fnz_init(){
    register_widget("grimp_fnz");
}


class grimp_fnz extends WP_Widget {
    function grimp_fnz() {
        /* Impostazione del widget */
        $widget_ops = array( 'classname' => 'grimp-fnz', 'description' => 'This plugin will allow you to show a rotating phrase.' );

        /* Impostazioni di controllo del widget */
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'grimp-fnz' );
        /* Creiamo il widget */
        $this->WP_Widget( 'grimp-fnz', 'Frasi Nonna Zita', $widget_ops, $control_ops );
    }


    function widget( $args, $instance ) {
        extract( $args );
        $frasi = array();
        $frasi[] = 'C&amp;è un solo modo di risolvere un problema: affrontarlo';
        $frasi[] = 'Perdonare è da cristiani, dimenticare da stupidi';
        $frasi[] = 'Togliere le macchie appena possibile, il risultato è sempre migliore';
        $frasi[] = 'Anche gli asini lavorano';
        $frasi[] = 'Credi ma non scommettere';
        $frasi[] = 'Non sfregare le macchie, tamponale';
        $frasi[] = 'Credi sempre ma controlla sempre';
        $frasi[] = 'Tutto può tornare utile, anche le unghie per sbucciare l&amp;aglio';
        $frasi[] = 'Quello che vuoi fallo, quello che non vuoi demandalo';
        $frasi[] = 'Tutti hanno un loro credo';
        $frasi[] = 'Un leggero appretto facilita la stiratura';
        $frasi[] = 'Le grandi spese si programmano, le piccole ti rendono povero';
        $frasi[] = 'Si ha più successo con la sfacciataggine che con un portafoglio pieno';
        $frasi[] = 'Si sa come si nasce ma non come si muore';
        $frasi[] = 'Il cotone si stira umido, la lana asciutta';
        $frasi[] = 'Un bel tacer non fu mai detto';
        $frasi[] = 'Carta canta e villan dorme';
        $frasi[] = 'Le tarme mangiano più volentieri le parti sporche';
        $frasi[] = 'Se parli, dì la verità, ma non sempre è il caso di parlare';
        $frasi[] = 'Occhio non vede, cuore non duole';
        $frasi[] = 'Provare sempre gli smacchiatori in una zona nascosta dell&amp;indumento';
        $frasi[] = 'Meglio un avversario intelligente che un socio stupido';
        $frasi[] = 'Chi dorme non piglia pesci';
        $frasi[] = 'Prevenire è meglio che...smacchiare';
        $frasi[] = 'L\'uomo propone ma il Signore dispone';
        $frasi[] = 'Il diavolo fa le pentole ma non i coperchi';
        $frasi[] = 'Tra il dire ed il fare c&amp;è; di mezzo il mare';
        $frasi[] = 'Leggi le etichette';
        $frasi[] = 'Solo le forbici tolgono tutte le macchie';
        $frasi[] = 'L\'occhio del padrone ingrassa il cavallo';
        $frasi[] = 'Via il gatto, i topi ballano';
        $frasi[] = 'Sporco o macchiato?';
        $frasi[] = 'Tanto va la gatta al lardo che ci lascia lo zampino';
        $frasi[] = 'Si sa come si nasce ma non come si muore';
        $frasi[] = 'Di notte tutti i gatti sono grigi';
        $frasi[] = 'Una rondine non fa primavera';
        $frasi[] = 'Le tarme mangiano le parti sporche';
        $frasi[] = 'L\'abito non fa il monaco';
        $frasi[] = 'Se ti danno un euro per cinquanta centesimi, è un inganno';
        $frasi[] = 'Un bucato ben steso si stira meglio';
        $frasi[] = 'La vita è fatta anche di piccoli piaceri';
        $frasi[] = 'La pelle bagnata sempre lontana dal calore';
        $frasi[] = 'Ognuno faccia il suo lavoro';
        $frasi[] = 'Per comandare bisogna saper ubbidire';
        $frasi[] = 'Candeggina e perborato non vanno assieme';
        $frasi[] = 'Non è tutto oro quello che luccica';
        $frasi[] = 'A volte, il meglio è nemico del bene';
        $frasi[] = 'Comincia col provare la soluzione più semplice';
        $frasi[] = 'I bottoni belli, è meglio toglierli';
        $frasi[] = 'Il primo guadagno è il risparmio';
        $title = apply_filters('widget_title', $instance['title'] );
        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;        
        $day= date ('d', time()) + date ('m', time()) + date ('w', time());
        $frase = $frasi[$day-1];
        echo "<center><b><font color=#FF0000>$frase</font></b></center>";
        echo $after_widget;
    }
    
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }

    function form( $instance ) {

        /* Impostazioni di default del widget */
        $defaults = array( 'title' => 'I detti di nonna Zita');
        $instance = wp_parse_args( (array) $instance, $defaults );
        ?>
<p>
    <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
    <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
</p>
        <?php
   }
}

?>
