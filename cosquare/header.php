<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/c28efafd95.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400|Rajdhani:500,600,700|Material+Icons&display=swap|" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body >
    <div id="app">
        <v-app>
            <v-content>
                <v-img id="<?php if (!is_page(9)) echo 'header_image'; ?><?php if (is_page(9)) echo 'header_image_frontpage'; ?>" <?php if (is_page(9)){?>height="100vh"<?php }?> <?php if (!is_page(9)&&!$post->post_parent == '185'&&!is_page(185)){?>height="312px"<?php }?> <?php if (is_page(185)||$post->post_parent == '185' ){?> height="406px"<?php }?>>
                    <?php
                    $video = get_field('headervideo', 'nav_menu_2');
                    ?>
                    <div class="video-background">
                            <video autoplay muted loop playsinline>
                                <source src="<?php echo $video?>" type="video/mp4" class="video_header">
                            </video>
                    </div>            
                    <v-app-bar flat style="background-color:unset;" class="hidden-md-and-up">
                        <?php if (!is_page(9)){?>
                            <div id="brand-logo_small">
                                <?php
                                    if ( function_exists( 'the_custom_logo' ) ) {
                                        the_custom_logo();
                                    }
                                ?>
                            </div>  
                        <?php }?>  
                        <v-spacer></v-spacer>
                        <v-app-bar-nav-icon class="mr-1" color="white" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                    </v-app-bar>
                    <v-row row wrap justify="end" class="hidden-sm-and-down mr-4" >
                        <?php if (!is_page(9)){?>
                            <div id="brand-logo">
                                <?php
                                    if ( function_exists( 'the_custom_logo' ) ) {
                                        the_custom_logo();
                                    }
                                ?>
                            </div>  
                        <?php }?>
                        <v-spacer></v-spacer>
                        <?php 
                            $args = array(
                            'theme_location' => 'primary'
                            )
                        ?>
                        <?php wp_nav_menu($args); ?>
                    </v-row>
                    <v-row row wrap align="center" class="fill-height">
                        <v-col cols="12" justify="center">
                            <v-row justify="center">
                                <?php if (is_page(9)){?>
                                    <v-col id="logo-container" cols="12">
                                        <v-img src="<?php the_field('logo'); ?>" height="150" contain></v-img>
                                    </v-col>
                                <?php }?>
                                <?php if (!is_page(9)){?>
                                    <col cols="12" class="page_title text-center">
                                        <h1><?php the_title(); ?></h1>
                                    </col> 
                                <?php }?>  
                                <?php if (is_page(185)||$post->post_parent == '185' ){?> 
                                    <v-col cols="12">
                                        <v-row class="info_menu">
                                            <?php
                                            $args = array(
                                                'post_type'      => 'page',
                                                'post_parent'    => 185,
                                                'orderby' => 'date',
                                                'order' => 'ASC'
                                            );

                                            $parent = new WP_Query( $args );

                                            if ( $parent->have_posts() ) : ?>

                                                <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>   
                                                    <v-col>
                                                        <v-btn class="center <?php if (is_page(get_the_ID())) echo ' activebtn'; ?>" block dark <?php if (is_page(get_the_ID())) echo 'disabled'; ?> href="<?php echo get_the_permalink( ); ?>" color="orange"><?php the_title(); ?></v-btn>
                                                    </v-col> 
                                                <?php endwhile; ?>
                                            <?php endif; wp_reset_postdata(); ?>
                                        </v-row>
                                    </v-col>
                                <?php }?>          
                            </v-row>
                        </v-col>
                    </v-row>
                </v-img> 
                <v-app-bar id="big-screen-appbar" class="hidden-sm-and-down" color="dark" flat fixed inverted-scroll>     
                    <v-row id="header-margin" row wrap class="mr-4">
                        <div id="brand-logo">
                            <?php
                                if ( function_exists( 'the_custom_logo' ) ) {
                                    the_custom_logo();
                                }
                            ?>
                        </div>
                        <v-spacer></v-spacer>
                        <?php 
                            $args = array(
                            'theme_location' => 'primary'
                            )?>
                        <?php wp_nav_menu($args); ?>
                    </v-row>
                </v-app-bar>
                <v-app-bar id="big-screen-appbar" class="hidden-md-and-up" color="dark" flat fixed inverted-scroll>
                    <v-row id="header-margin" row wrap class="mr-4">
                        <div id="brand-logo_small">
                            <?php
                                if ( function_exists( 'the_custom_logo' ) ) {
                                    the_custom_logo();
                                }
                            ?>
                        </div>
                    </v-row>  
                    <v-spacer></v-spacer>
                    <v-app-bar-nav-icon class="mr-1" color="white" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                </v-app-bar>
                <v-navigation-drawer id="nav-drawer" v-model="drawer"  fixed temporary right app>
                    <?php 
                        $args = array(
                        'theme_location' => 'navdrawer',
                        )
                    ?>
                    <?php wp_nav_menu($args); ?>
                </v-navigation-drawer>