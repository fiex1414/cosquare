<?php
/*Template Name: Priser*/

get_header();

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
?>


<v-container>
    <div class="d-flex flex-wrap mb-5">
        <?php 
        $args = array(
            'post_type' => 'priser',
            'orderby' => 'date',
            'order' => 'ASC',
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()){
            $blogposts->the_post();
        ?>   
            <v-dialog v-model="dialogdetails<?php the_field('id_price');?>" content-class="dialog_details">
                <template v-slot:activator="{ on }">
                    <div class="price_flex_box pa-3">
                        <v-card class="price_card hovershadow cover"style="background-image: url('<?php the_field('billede_pristype'); ?>');">
                            <div class="price_overlay">
                                <div v-on="on" class="active_cursor">
                                    <v-card-title class="justify-center"><?php the_title();?></v-card-title>
                                    
                                    <?php 
                                    $group_bullets = get_field('fremhaevede_punkter_pristype');
                                    $bullet1 = $group_bullets['punkt_1_pristype'];
                                    $bullet2 = $group_bullets['punkt_2_pristype'];
                                    $bullet3 = $group_bullets['punkt_3_pristype'];
                                    ?>
                                    
                                    <p class="price_bullet"><span class="fa-stack" style="vertical-align: top;"><i class="fas fa-circle orange_bullet fa-stack-2x"></i><i class="fas fa-check-square fa-stack-1x fa-inverse orange_color facilities_icon icon_lineheight"></i></span><?php echo $bullet1;?></p>
                                    <p class="price_bullet"><span class="fa-stack" style="vertical-align: top;"><i class="fas fa-circle orange_bullet fa-stack-2x"></i><i class="fas fa-check-square fa-stack-1x fa-inverse orange_color facilities_icon icon_lineheight"></i></span><?php echo $bullet2;?></p>
                                    <p class="price_bullet"><span class="fa-stack" style="vertical-align: top;"><i class="fas fa-circle orange_bullet fa-stack-2x"></i><i class="fas fa-check-square fa-stack-1x fa-inverse orange_color facilities_icon icon_lineheight"></i></span><?php echo $bullet3;?></p>
                                    <p class="details text-center">Flere detaljer</p>
                                    <p class="price_number text-center"><?php the_field('pris_pristype');?>,-</p>
                                    <p class="price_payment text-center"><?php the_field('betalingsform_pristype');?></p>
                                </div>
                                <v-card-actions>
                                    <v-btn color="orange" block @click="dialog_contactme = !dialog_contactme">Kontakt mig</v-btn>
                                </v-card-actions>
                            </div>
                        </v-card>
                    </div>
                </template>
                <v-card class="cover" style="background-image: url('<?php the_field('billede_pristype'); ?>');">
                    <div class="dialog_details_overlay">
                        <v-card-actions>
                            <v-spacer></v-spacer>
                            <v-btn color="white" icon @click="dialogdetails<?php the_field('id_price');?> = false">
                                <i class="fas fa-times"></i>
                            </v-btn>
                        </v-card-actions>
                        <div class="dialog_facilities dialog_margin">
                            <div class="dialog_description">
                                <v-card-title class="white_text font_30 semibold pt-0">
                                    <?php the_title();?>
                                </v-card-title>
                                <v-card-text class="pb-0">
                                    <?php the_field('beskrivelse_pristype');?>
                                </v-card-text>
                                <p class="price_number text-center"><?php the_field('pris_pristype');?>,-</p>
                                
                                <p class="price_payment text-center"><?php the_field('betalingsform_pristype');?></p>
                                <v-btn class="dialog_facilities_btn" color="turquise" @click="dialog_contactme = !dialog_contactme">Kontakt mig</v-btn>
                            </div>  
                            <div class="facilities_list_container">
                                <h4 class="semibold white_text facilities_subheader">
                                    Inkluderet
                                </h4>
                                <?php
                                $facilities = get_field('faciliteter_inkluderet_pristype');
                                $extra_facilities = get_field('faciliteter_tilkob_pristype');

                                if( $facilities ): ?>
                                    <ul class="facilities_list white_text">
                                        <?php foreach( $facilities as $facility ): ?>
                                            <li><span class="fa-stack" style="vertical-align: top;"><i class="fas fa-circle turquise_bullet fa-stack-2x"></i><i class="fas fa-check-square fa-stack-1x fa-inverse turquise_color facilities_icon"></i></span><?php echo $facility; ?></li>
                                        <?php endforeach; ?>
                                        <br><br>
                                        <h4 class="semibold facilities_subheader" style="margin-top:-7px;">
                                            Tilkøb
                                        </h4>
                                        <?php
                                        if( $extra_facilities ): ?>
                                            <?php foreach( $extra_facilities as $extra_facility ): ?>
                                                <li><span class="fa-stack" style="vertical-align: top;"><i class="fas fa-circle turquise_bullet fa-stack-2x"></i><i class="fas fa-check-square fa-stack-1x fa-inverse turquise_color facilities_icon"></i></span><?php echo $extra_facility; ?></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>             
                    </div>
                </v-card>
            </v-dialog>
        <?php } ?>
    </div>
</v-container>

<v-dialog v-model="dialog_contactme" width="300px">
    <v-card class="cover" style="background-image: url('<?php echo $bannerimage ?>');">
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
<v-container class="pt-0">
    <?php
        if (have_posts()) :
        while (have_posts()) : the_post();?>

        <?php the_content();?>
        <?php endwhile;?>
        <?php endif; 
    ?>
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


<?php
get_footer();
?>