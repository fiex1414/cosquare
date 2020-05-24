<?php
/*Template Name: Kontaktside*/

$contactformular = get_field('shortcode_formular');

$group_opening = get_field('aabningstider');
$group_opening_monday = $group_opening['mandag'];
$group_opening_tuesday = $group_opening['tirsdag'];
$group_opening_wednesday = $group_opening['onsdag'];
$group_opening_thursday = $group_opening['torsdag'];
$group_opening_friday = $group_opening['fredag'];
$group_opening_saturday = $group_opening['lordag'];
$group_opening_sunday = $group_opening['sondag'];

$group_place = get_field('placering_contact');
$group_place_icon = $group_place['ikon_placering'];
$group_place_text = $group_place['adresse_placering'];
$group_place_number = $group_place['postnummer_placering'];

$group_phone = get_field('telefon_contact');
$group_phone_icon = $group_phone['ikon_telefon'];
$group_phone_number = $group_phone['telefonnummer'];

$group_email = get_field('email_contact');
$group_email_icon = $group_email['ikon_email'];
$group_email_text = $group_email['email'];

get_header();
?>

<v-container class="mb7">
    <div class="d-flex justify-center">
        <div class="pattern_bg cover borderradius" style="background-image: url('<?php the_field('bg_pattern')?>');" >
            <div class="contactformular turquise_bg_opacity borderradius contactform_padding" >
                <?php echo $contactformular ?>
            </div>
        </div>
        <div class="darkblue_bg borderradius_right pa7 flex-column fill-height" style="display:flex;align-self:center;">
            <div :class="{'pr7': $vuetify.breakpoint.mdAndUp}">
                <h4 class="orange_color mb-1">Kontakt os direkte</h4>
                <ul id="information_contactform" class="mb-5">
                    <li class="inline_display mb-3" style="line-height:17px;">
                        <v-img src="<?php echo $group_place_icon ?>" contain class="mr-5 contactform_icon"></v-img>
                        <span class="white_text"><?php echo $group_place_text ?>,
                        <br>
                        <?php echo $group_place_number ?></span>
                    </li>
                    <li class="inline_display mb-3">
                        <v-img src="<?php echo $group_phone_icon ?>" contain class="mr-5 contactform_icon"></v-img>
                        <span class="white_text"><?php echo $group_phone_number ?></span>
                    </li>
                    <li class="inline_display">
                        <v-img src="<?php echo $group_email_icon ?>" contain class="mr-5 contactform_icon"></v-img>
                        <span class="white_text"><?php echo $group_email_text ?></span>
                    </li>
                </ul>
                <div style="line-height:20px;" class="mt-5">
                    <h4 class="orange_color mb-3 mt-5">Åbningstider</h4>
                    <div class="weekday white_text">
                        <span class="alignleft">Mandag</span>
                        <span class="alignright"><?php echo $group_opening_monday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Tirsdag</span>
                        <span class="alignright"><?php echo $group_opening_tuesday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Onsdag</span>
                        <span class="alignright"><?php echo $group_opening_wednesday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Torsdag</span>
                        <span class="alignright"><?php echo $group_opening_thursday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Fredag</span>
                        <span class="alignright"><?php echo $group_opening_friday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Lørdag</span>
                        <span class="alignright"><?php echo $group_opening_saturday?></span>
                    </div>
                    <br>
                    <div class="weekday white_text">
                        <span class="alignleft">Søndag</span>
                        <span class="alignright"><?php echo $group_opening_sunday?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</v-container>

<?php
get_footer();
?>