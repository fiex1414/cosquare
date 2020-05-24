<?php
/*Template Name: Forside*/
$field_about = get_field('introtekst', '11');

$group_about = get_field('om_cosquare_forside');
$group_about_logo = $group_about['logo_om_cosquare'];
$group_about_img = $group_about['billede_om_cosquare'];

$group_price = get_field('priser_forside');
$group_price_bg = $group_price['baggrundsbillede_priser'];
$group_price_title = $group_price['overskrift_priser_forside'];
$price_type = get_field('betalingsform_pristype');
$price = get_field('pris_pristype');

$group_renters = get_field('lejere_forside');
$group_renters_title = $group_renters['overskrift_lejere'];

$gallery = get_field('galleri_forside');
$video = get_field('headervideo');

$group_facilities = get_field('faciliteter_frontpage');
$group_facilities_bg = $group_facilities['baggrundsbillede_faciliteter'];

$orangequote = get_field('citationstegn_orange', '13');


get_header();
?>


<v-container>
    <v-row class="my7">
        <v-col cols="12" sm="6" class="order_second" style="display:grid;" :class="{'pr-3': $vuetify.breakpoint.xsOnly, 'pr-5': $vuetify.breakpoint.smOnly, 'pr7': $vuetify.breakpoint.mdAndUp}">
            <v-img class="no_border_radius" src="<?php echo $group_about_logo ?>" contain></v-img>
            <div style="align-self:center;"><?php echo $field_about ?></div>
            <v-btn color="orange" style="align-self:end;width:200px;" href="<?php echo get_the_permalink(11); ?>"><?php echo get_the_title( 11 ); ?></v-btn>
        </v-col>
        <v-col cols="12" sm="6" class="order_first" :class="{'pl-3': $vuetify.breakpoint.xsOnly, 'pl-5': $vuetify.breakpoint.smOnly, 'pl7': $vuetify.breakpoint.mdAndUp}">
            <v-img src="<?php echo $group_about_img ?>" height="100%"></v-img>
        </v-col>
    </v-row>
</v-container>

<div class="cover parallaxeffect" style="background-image: url('<?php echo $group_price_bg;?>');">
    <div class="darkblue_opacity text-center">
        <v-container>
            <h2 :class="{'my-4': $vuetify.breakpoint.xsOnly, 'my7': $vuetify.breakpoint.smAndUp}">
                <?php echo $group_price_title ?>
            </h2>
            <div class="show700 flex-wrap" style="display:flex;">
                <?php 
                $args = array(
                'post_type' => 'priser',
                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => 3,
                );

                $blogposts = new WP_Query($args);

                while ($blogposts->have_posts()){
                $blogposts->the_post();
                ?> 
                    <div class="price_flex_box pl7 pr7">
                        <p class="price_number_frontpage text-center pb-2" style="border-bottom:2px solid white;"><?php the_title();?></p>
                        <p class="price_number_frontpage text-center pt-2"><?php the_field('pris_pristype');?>,-</p>
                        <p class="price_payment_frontpage text-center"><?php the_field('betalingsform_pristype');?></p>
                    </div>

                <?php
                }
                ?>
            </div>
            <div class="hide700" :class="{'mt7 mb-5': $vuetify.breakpoint.xsOnly}">
                <v-carousel hide-delimiters cycle interval="2000" show-arrows-on-hover>
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
                        <v-carousel-item>
                            <div class="price_flex_box pl7 pr7">
                                <p class="price_number text-center pb-2" style="border-bottom:2px solid white;"><?php the_title();?></p>
                                <p class="price_number text-center pt-2"><?php the_field('pris_pristype');?>,-</p>
                                <p class="price_payment text-center"><?php the_field('betalingsform_pristype');?></p>
                            </div>
                        </v-carousel-item>
                    <?php } ?>
                </v-carousel>
            </div>
            <v-btn color="orange" style="width:200px;" href="<?php echo get_the_permalink(191); ?>" :class="{'mt-3 mb-5': $vuetify.breakpoint.xsOnly, 'my7': $vuetify.breakpoint.smAndUp}">
                <?php echo get_the_title( 191 ); ?>
            </v-btn>
        </v-container>
    </div>
</div>

<v-container>
    <h2 class="text-center mb-5 mt-2">
        <?php echo $group_renters_title ?>
    </h2>
    <?php 
        $args = array(
        'post_type' => 'lejere',
        );

        $blogposts = new WP_Query($args);

        while ($blogposts->have_posts()){
            $blogposts->the_post();
    ?>
        <?php if( get_field('citat_fra_lejer') ): ?>
            <v-col cols="12" class=" pa-5">
                <a href="<?php echo get_permalink(13)?>"> 
                    <v-card class="rental_box_container_frontpage hovershadow cover" style="background-image: url(<?php the_field('baggrundsbillede_af_lejer'); ?>); background-position:50% 20%;">
                        <div class="rental_box_frontpage">   
                            <div class="flex-row" :class="{'d-flex': $vuetify.breakpoint.smAndUp}">
                                <div :class="{'mr6': $vuetify.breakpoint.smAndUp}">
                                    <v-img contain class="renter_logo_frontpage fill-height no_border_radius" src="<?php the_field('lejerens_logo'); ?>"></v-img>
                                </div>
                                <div class="renter_text" :class="{'pr-3': $vuetify.breakpoint.xsOnly, 'pr8': $vuetify.breakpoint.smAndUp}">
                                    <h3 class="turquise--text" style="line-height:30px;" :class="{'text-center': $vuetify.breakpoint.xsOnly}"><?php the_title();?></h3>
                                    <span class="italic white_text"> "<?php the_field('citat_fra_lejer'); ?>" </span>
                                    <br>
                                    <span class="white_text">- <?php the_field('udtalt_af'); ?> </span>
                                </div>
                            </div>                
                        </div>
                    </v-card>
                </a>
            </v-col>
        <?php endif; ?>
    <?php } ?>

    <div class="text-center">
        <v-btn color="orange" class="mb7 mt-5" style="width:200px;" href="<?php echo get_the_permalink(13); ?>"><?php echo get_the_title( 13 ); ?></v-btn>
    </div>
</v-container>

    
<?php echo $gallery?>

<v-container>
    <div class="d-flex quote_section justify-center my7">
        <v-img src="<?php echo $orangequote ?>" height="20px" width="30px" contain></v-img>
        <h2 class="pl-2 italic" style="font-family:'open sans!important"> <?php bloginfo('description'); ?> </h2>
    </div>
</v-container>

<div class="cover parallaxeffect" style="background-image: url('<?php echo $group_facilities_bg;?>');">
    <div class="darkblue_opacity text-center">
        <v-container>
            <h2 :class="{'my-4': $vuetify.breakpoint.xsOnly, 'my7': $vuetify.breakpoint.smAndUp}">
                <?php echo get_the_title( 193 ); ?>
            </h2>
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
                    <?php if ( get_field( 'vis_paa_forsiden' ) ): ?>
                        <v-col cols="6" sm="3" style="min-height:150px;">
                            <v-tooltip bottom max-width="400px" color="orange">
                                <template v-slot:activator="{ on }">
                                    <div class="mb-2">
                                        <v-img v-on="on" contain height="80px" src="<?php the_field('turkis_ikon_facilitet'); ?>"></v-img>
                                    </div>
                                </template>
                                <span><?php the_field('tekst_facilitet'); ?></span>
                            </v-tooltip>
                            <div>
                                <h4 class="white_text" ><?php the_title();?></h4>
                            </div>
                        </v-col>
                    <?php endif;  ?>
                <?php
                }
                ?>
            </v-row>
        

            <v-btn color="orange" style="width:200px;" href="<?php echo get_the_permalink(193); ?>" :class="{'mt-3 mb-5': $vuetify.breakpoint.xsOnly, 'my7': $vuetify.breakpoint.smAndUp}">
                <?php echo get_the_title( 193 ); ?>
            </v-btn>
        </v-container>
    </div>
</div>

<?php
get_footer();
?>