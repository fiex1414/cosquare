<?php
/*Template Name: Standard-skabelon m. banner*/

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

<?php

if (have_posts()) :
    while (have_posts()) : the_post();?>

        <v-container>
            <?php the_content(); ?>
        </v-container>

    <?php endwhile;

endif; ?>

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