        <?php 
        $contactformular = get_field('shortcode_formular', '21');

        $group_opening = get_field('aabningstider', '21');
        $group_opening_monday = $group_opening['mandag'];
        $group_opening_tuesday = $group_opening['tirsdag'];
        $group_opening_wednesday = $group_opening['onsdag'];
        $group_opening_thursday = $group_opening['torsdag'];
        $group_opening_friday = $group_opening['fredag'];
        $group_opening_saturday = $group_opening['lordag'];
        $group_opening_sunday = $group_opening['sondag'];

        $group_place = get_field('placering_contact', '21');
        $group_place_icon = $group_place['ikon_placering'];
        $group_place_text = $group_place['adresse_placering'];
        $group_place_number = $group_place['postnummer_placering'];

        $group_phone = get_field('telefon_contact', '21');
        $group_phone_icon = $group_phone['ikon_telefon'];
        $group_phone_number = $group_phone['telefonnummer'];

        $group_email = get_field('email_contact', '21');
        $group_email_icon = $group_email['ikon_email'];
        $group_email_text = $group_email['email'];


        $field_bg = get_field('footer_bg', 'nav_menu_3');
        $field_logo = get_field('footer_logo', 'nav_menu_3');
        $field_cvr = get_field('cvr', 'nav_menu_3');

        $pattern = get_field('bg_pattern', '21');

        ?>
      
        <?php if(!is_page(21)){ ?>
          <v-container class="mb7">
            <h2 class="text-center blue_color mb6 mt-2">Ønsker du mere information?</h2>
            <div class="d-flex justify-center">
              <div class="pattern_bg cover borderradius" style="background-image: url('<?php echo $pattern ?>');" >
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
        <?php } ?>

        <footer>
          <div class="footer_bg" style="background-image: url(<?php echo $field_bg ?>);">
            <div class="footer_overlay">
              <a href="<?php echo get_home_url();?>">
                <v-img src="<?php echo $field_logo ?>" height="100px" contain></v-img>
              </a>
              <v-spacer></v-spacer>
              <?php 
              $args = array(
                'theme_location' => 'secondary'
                )
              ?>
              <?php wp_nav_menu($args); ?>
            </div>
          </div>
          <div class="copyright d-flex flex-wrap justify-center">
            <div class="pr-5">
              &copy; <b><?php bloginfo('name'); ?></b>, <?php echo date('Y'); ?>. Alle rettigheder forbeholdes.
            </div>
            <div class="pl-5">
              <b>CVR</b> <?php echo $field_cvr ?>
            </div>
          </div>
        </footer>
      </v-content>
    </v-app>
  </div>

  <?php wp_footer(); ?>

  </body>
</html>