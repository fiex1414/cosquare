<?php
/*Template Name: Lejere*/

$slogan = get_field('slogan_banner');
$bannertext = get_field('tekst_banner');
$bannerimage = get_field('billede_banner');

$bannerbutton = get_field('knap_banner');
$bannerbutton_label = $bannerbutton['label_knap_banner'];
$bannerbutton_dialog = $bannerbutton['modalboks_knap_banner'];
$bannerbutton_link = $bannerbutton['link_knap_banner'];


$contactme = get_field('shortcode_contactme', '21');
$contactme_logo = get_field('dialog_logo', '21');

$whitequote = get_field('citationstegn_white');
$orangequote = get_field('citationstegn_orange');


get_header();
?>

<v-container>
    <v-row>
        <?php 

        $args = array(
            'post_type' => 'lejere',
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()){
            $blogposts->the_post();
        ?>
            <v-col cols="6" class="renter_col">
                <v-card class="rental_box_container hovershadow" style="background-image: url(<?php the_field('baggrundsbillede_af_lejer'); ?>);">
                    <div class="rental_box">
                        <a href="<?php the_field('link_hjemmeside'); ?>" target="_blank">    
                            <div class="d-flex flex-row">
                                <div class="pr-5">
                                    <v-img contain id="renter_logo" class="fill-height" src="<?php the_field('lejerens_logo'); ?>"></v-img>
                                </div>
                                <div class="pl-1">
                                    <span class="subheader white--text">Story of</span>
                                    <br>
                                    <h3 class="turquise--text" style="line-height:30px;"><?php the_title();?></h3>
                                </div>
                            </div>
                        </a>    
                        <a href="<?php the_field('link_hjemmeside'); ?>" target="_blank">
                            <div class="white_text mt-5">
                                <span><?php the_content();?></span>
                            </div>
                        </a>
                        <?php if( get_field('citat_fra_lejer') ): ?>
                            <v-dialog v-model="quotedialog<?php the_field('id_renter');?>" class="quote_dialog" width="700">
                                <template v-slot:activator="{ on }">
                                    <div class="renter_quote_container d-flex flex-row justify-end">
                                        <span class="renter_quote align-self-center pr-5 ">Hvad siger <?php the_title();?> om cosquare?</span>
                                        <v-icon class="chatbubble" color="orange"  v-on="on">chat_bubble</v-icon>
                                    </div>
                                </template>
                                <v-card class="dialog_content" color="orange">
                                    <v-img src="<?php the_field('baggrundsbillede_af_lejer'); ?>" height="30vh">
                                        <v-card-actions>
                                            <v-spacer></v-spacer>
                                            <v-btn color="orange" icon @click="quotedialog<?php the_field('id_renter');?> = false">
                                                <i class="fas fa-times"></i>
                                            </v-btn>
                                        </v-card-actions>
                                    </v-img>
                                    <v-card-text class="italic">
                                        <div class="card_text_container d-flex flex-row">
                                            <v-img src="<?php echo $whitequote ?>" height="20px" width="30px" contain></v-img>
                                            <span class="pl-5"> <?php the_field('citat_fra_lejer'); ?> </span>
                                        </div>
                                        <div class="text-end">
                                            <span class="quoteby">- <?php the_field('udtalt_af'); ?></span>
                                        </div>
                                    </v-card-text>
                                </v-card>
                            </v-dialog>
                        <?php endif; ?>
                    </div>
                </v-card>
            </v-col>
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