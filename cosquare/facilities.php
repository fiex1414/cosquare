<?php
/*Template Name: Faciliteter*/

$slogan = get_field('slogan_banner');
$bannertext = get_field('tekst_banner');
$bannerimage = get_field('billede_banner');

$bannerbutton = get_field('knap_banner');
$bannerbutton_label = $bannerbutton['label_knap_banner'];
$bannerbutton_dialog = $bannerbutton['modalboks_knap_banner'];
$bannerbutton_link = $bannerbutton['link_knap_banner'];

$contactme = get_field('shortcode_contactme', '21');
$contactme_logo = get_field('dialog_logo', '21');

$orangequote = get_field('citationstegn_orange');

get_header();
?>

<v-container>
    <v-row>
        <?php 
        $args = array(
            'post_type' => 'faciliteter',
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()){
            $blogposts->the_post();
        ?>

            <?php if ( get_field( 'tilkob_facilitet' ) == false ): ?>
            
                <v-col cols="12" sm="6" style="min-height:150px;">
                    <div class="d-flex">
                        <div>
                            <v-img contain height="80px" src="<?php the_field('ikon_facilitet'); ?>"></v-img>
                        </div>
                        <div>
                            <h4 class="turquise--text" ><?php the_title();?></h4>
                            <span ><?php the_field('tekst_facilitet'); ?></span>
                        </div>
                    </div>
                </v-col>
            <?php endif; // end of if field_name logic ?>
            
        <?php } ?>
        <v-col cols="12">
            <span class="italic">Alle faciliteter er inkluderet i lejemål hos cosquare. Bemærk, at flere indebærer muligheder for tilkøb, som ikke er inkluderet i lejemålets standardpris. Gratis brug af mødelokaler gælder kun faste lejere hos cosquare og dermed ikke drop-in.</span>
            <div class="text-center mt-5">
                <h2 class="turquise--text">Tilkøb</h2>
            </div>
        </v-col>

        <?php 
        $args = array(
            'post_type' => 'faciliteter',
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()){
            $blogposts->the_post();
        ?>
            <?php if ( get_field( 'tilkob_facilitet' )): ?>
                <v-col cols="12" sm="6" style="min-height:150px;">
                    <div class="d-flex">
                        <div>
                            <v-img contain height="80px" src="<?php the_field('ikon_facilitet'); ?>"></v-img>
                        </div>
                        <div>
                            <h4 class="turquise--text" ><?php the_title();?></h4>
                            <span ><?php the_field('tekst_facilitet'); ?></span>
                        </div>
                    </div>
                </v-col>
            <?php endif; // end of if field_name logic ?>
        <?php } ?>
    </v-row>
</v-container>

<div class="cover parallaxeffect mt-5" style="background-image: url('<?php echo $bannerimage ?>">
    <div class="darkblue_opacity_normal banner_padding text-center">
        <v-container>
            <div class="d-flex quote_section justify-center">
                <v-img src="<?php echo $orangequote ?>" height="20px" width="30px" contain></v-img>
                <?php if( $slogan ): ?>
                    <h2 class="pl-2 italic white_text semibold" :class="{'mb6': $vuetify.breakpoint.mdAndUp}" style="font-family:'open sans!important"> <?php bloginfo('description'); ?> </h2>
                <?php else :?>
                    <h2 class="pl-2 italic white_text semibold" :class="{'mb6': $vuetify.breakpoint.mdAndUp}" style="font-family:'open sans!important"> <?php echo $bannertext ?> </h2>
                <?php endif; ?>
            </div>
            <?php if($bannerbutton_label):?>
                <?php if ($bannerbutton_dialog):?>
                    <v-btn :class="{'mb6': $vuetify.breakpoint.mdAndUp}"  @click="dialog_contactme = !dialog_contactme" color="orange" style="width:200px;"><?php echo $bannerbutton_label ?></v-btn>
                <?php else:?>
                    <v-btn href="<?php echo $bannerbutton_link?>" color="orange" style="width:200px;"><?php echo $bannerbutton_label ?></v-btn>
                <?php endif; ?>
            <?php endif; ?>             
        </v-container>
    </div>
</div>
<v-dialog v-model="dialog_contactme" width="300px">
    <v-card class="cover" style="background-image: url('<?php echo $bannerimage?>');">
        <div class="contact_dialog_overlay">
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="white" icon @click="dialog_contactme = false">
                    <i class="fas fa-times"></i>
                </v-btn>
            </v-card-actions>
            <div class="contactmeform dialog_margin_2">
                <v-img src="<?php echo $contactme_logo?>" contain  class="mb-3"></v-img>
                <?php echo $contactme ?>
            </div>
        </div>
    </v-card>
</v-dialog> 
<?php
get_footer();
?>