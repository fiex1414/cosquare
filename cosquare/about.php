<?php
/*Template Name: Vores historie*/

$pattern = get_field('bg_pattern', '21');

get_header();

if (have_posts()) :
    while (have_posts()) : the_post();?>

<v-container>
    <?php the_content();?>
</v-container>
<div class="cover parallaxeffect" style="background-image: url('<?php echo $pattern ?>');">
    <div style="background-color:rgba(94, 184, 168, 0.92)">
        <v-container>
            <v-row>
                <v-col class="turquise_text" cols="12" sm="6">
                    <?php the_field('turkis_tekst'); ?>
                </v-col>
                <v-col cols="12" sm="6" class="turquise_image">
                    <v-img src="<?php the_field('turkis_billede'); ?>"></v-img>
                </v-col>
            </v-row>
        </v-container>
    </div>
</div>

<?php endwhile;

else :
    echo '<p>Der blev ikke fundet noget indhold på siden.</p>';

endif;

get_footer();
?>