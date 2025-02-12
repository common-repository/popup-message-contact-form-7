<?php

if (!defined('ABSPATH'))
    exit;

if (!class_exists('OCCF7POPUP_menu')) {

    class OCCF7POPUP_menu {

        protected static $menuinstance;

        function init() {
           add_filter( 'wpcf7_editor_panels', array( $this, 'OCCF7POPUP_wpcf7_editor_panels'), 10, 1 ); 
           add_action('admin_footer', array( $this, 'OCCF7POPUP_wpcf7_admin_script'));
        }

        function OCCF7POPUP_wpcf7_editor_panels( $panels ) { 
            $panels_popup = array(
                'popup-panel' => array(
                    'title' => __( 'Popup Setting', 'contact-form-7' ),
                    'callback' => array( $this, 'OCCF7POPUP_wpcf7_editor_panel_popup'),
                ),
            );
            $panels = array_merge($panels,$panels_popup);
            return $panels; 
        }

        function OCCF7POPUP_wpcf7_editor_panel_popup() { 
            $formid = sanitize_text_field($_REQUEST['post']);
            // POPUP ADMINPANEL FORMAT
            ?>
            <h2><?php echo __('Success Message Settings','popup-message-contact-form-7');?></h2>
            <fieldset>
                <legend><?php echo __('You can Enable/Disable this Form popup and also you can other setting related to popup.','popup-message-contact-form-7');?></legend>
                <p>
                    <label>

                        <input type="checkbox" name="enabled_popup_val" value="popupenable" <?php if (isset($_REQUEST['post'])){if (get_post_meta( $formid, 'enabled-popup', true ) == $formid) {echo ' checked="checked"';}} ?>><?php echo __('Enable/Disable this Form popup','popup-message-contact-form-7');?>
                    </label>
                </p>

                <table class="form-table tbl_main">

                    <tbody>

                        <tr>
                            <th scope="row">
                                <label><?php echo __('Popup Text','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="popup_message" class="regular-text" id="popup_message" value="<?php echo get_post_meta( $formid, 'popup_message', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Button Text','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="popup_button_text" class="regular-text" value="<?php echo get_post_meta( $formid, 'popup_button_text', true );?>">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Select Template','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <label>
                                    <?php 
                                      if(empty(get_post_meta( $formid, 'popup_templet', true ))){
                                        $templet_sel = 'templet1';
                                      } else {
                                        $templet_sel = get_post_meta( $formid, 'popup_templet', true );
                                       }
                                     ?>
                                    <input type="radio" id="t1" name="popup_templet" value="templet1" <?php if($templet_sel == 'templet1'){echo "checked";} ?>><label for="t1"><?php echo __('Template 1','popup-message-contact-form-7');?></label>

                                    <input type="radio" id="t2" name="popup_templet" value="templet2" <?php if($templet_sel == 'templet2'){echo "checked";}?>><label for="t2"><?php echo __('Template 2','popup-message-contact-form-7');?></label>

                                    <input type="radio" id="t3" name="popup_templet" value="templet3" <?php if($templet_sel == 'templet3'){echo "checked";}?>><label for="t3"><?php echo __('Template 3','popup-message-contact-form-7');?></label>

                                    <input type="radio" id="t4" name="popup_templet" value="templet4" <?php if($templet_sel == 'templet4'){echo "checked";}?>><label for="t4"><?php echo __('Template 4','popup-message-contact-form-7');?></label>

                                    <input type="radio" id="t5" name="popup_templet" value="templet5" <?php if($templet_sel == 'templet5'){echo "checked";}?>><label for="t5"><?php echo __('Template 5','popup-message-contact-form-7');?></label>

                                    <input type="radio" id="ct" name="popup_templet" value="custom_templet" <?php if($templet_sel == 'custom_templet'){echo "checked";}?>><label for="ct"><?php echo __('Custom Template','popup-message-contact-form-7');?></label>
                                </label>
                            </td>
                        </tr>
                        <tr class="custom_templet_1">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 1 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="custom_templet_1">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/theme_1.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="custom_templet_2">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 2 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="custom_templet_2">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/theme_2.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="custom_templet_3">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 3 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="custom_templet_3">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/theme_3.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="custom_templet_4">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 4 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="custom_templet_4">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/theme_4.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="custom_templet_5">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 5 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="custom_templet_5">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/theme_5.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="tr_custom_templet failure_popup">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Select Popup Background :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="tr_custom_templet failure_popup">
                            <th scope="row">
                            </th>
                            <td>
                                <table class="tbl_child">
                                    <tr>
                                        <td>
                                            <?php 
                                              if(empty(get_post_meta( $formid, 'popup_background_option', true ))){
                                                $val = 'bg_color';
                                              } else {
                                                $val = get_post_meta( $formid, 'popup_background_option', true );
                                               }
                                             ?>
                                            <label>
                                                <input type="radio" name="popup_background_option" value="bg_color" <?php if($val == 'bg_color'){echo "checked";}?>><?php echo __('Background Color','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="popup_background_color" value="<?php echo get_post_meta( $formid, 'popup_background_color', true );?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="popup_background_option" value="image" <?php if($val == 'image'){echo "checked";}?>><?php echo __('Background Image','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <?php  
                                                echo $this->OCCF7POPUP_image_uploader_field( 'image1', get_post_meta($formid, 'hidden_img_count', true ) );
                                            ?>
                                        </td>
                                        <td>
                                            <?php if(!empty(get_post_meta($formid, 'popup_image_color', true ))){ ?>
                                            <img src="<?php echo get_post_meta($formid, 'popup_image_color', true ); ?>" width="50px" height="50px">
                                            <?php } ?>
                                            <input type="hidden" name="popup_image_color" class="hidden_img" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="popup_background_option" value="gradient_color" <?php if($val == 'gradient_color'){echo "checked";}?>><?php echo __('Gradient Color','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="popup_gradient_color" value="<?php echo get_post_meta( $formid, 'popup_gradient_color', true );?>">
                                        </td>
                                        <td>
                                            <input class="jscolor gra_box" name="popup_gradient_color1" value="<?php echo get_post_meta( $formid, 'popup_gradient_color1', true );?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php echo __('Popup Text Color','popup-message-contact-form-7');?></label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="popup_text_color" id="popup_text_color" value="<?php echo get_post_meta( $formid, 'popup_text_color', true );?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php echo __('Button background color','popup-message-contact-form-7');?></label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="popup_button_background_color" value="<?php echo get_post_meta( $formid, 'popup_button_background_color', true );?>">
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                         <tr><td><span class=pmcf7_pro_colour><a href="https://www.xeeshop.com/product/contact-form-7-popup-message-pro/" target="_blank"><?php echo __('Go Pro','popup-message-contact-form-7');?></a></span></td></tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Popup Width','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="m_popup_width" class="regular-text" value="<?php echo get_post_meta( $formid, 'm_popup_width', true );?>">
                                <span class="description"><?php echo __('Value must be like: 500px / auto / 50%','popup-message-contact-form-7');?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Popup Border Radius','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="number" name="m_popup_radius" class="regular-text" value="<?php echo get_post_meta( $formid, 'm_popup_radius', true );?>">
                                
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Auto Hide after','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="m_popup_duration" class="regular-text" disabled="" >
                                <span class="description"><?php echo __('Duration in milliseconds eg. 5000 (Popup will hide after 5 Seconds).','popup-message-contact-form-7');?></span>
                                <label></label>
                                 <label class="pmc7_pro_link">Only available in pro version <a href="https://www.xeeshop.com/product/contact-form-7-popup-message-pro/" target="_blank">link</a></label>
                            </td>
                        </tr>
                       
                        
                    </tbody>
                </table>
            </fieldset>
            <h2><?php echo __('Failure message Settings','popup-message-contact-form-7');?><span class="pmcf7_pro_colour"><a href="https://www.xeeshop.com/product/contact-form-7-popup-message-pro/" target="_blank"><?php echo __('Go Pro','popup-message-contact-form-7');?></a></span></h2>
            <fieldset class="failure_popup">
                <legend><?php echo __('You can Enable/Disable this Failure popup and also you can you other setting related to Failure popup.','popup-message-contact-form-7');?></legend>
                <p>
                    <label>

                        <input type="checkbox" name="enabled_failure_popup_val" value="failurepopupenable"><?php echo __('Enable/Disable this Failure popup','popup-message-contact-form-7');?>
                    </label>
                </p>
                <table class="form-table">
                    <tbody>

                        
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Failure Button Text','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="failure_popup_button_text" class="regular-text" value="">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Select Template','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <label>
                                    <input type="radio" id="fpt1" name="failure_popup_templet" value="templet1" checked><label for="fpt1"><?php echo __('Template 1','popup-message-contact-form-7');?></label>
                                    <input type="radio" id="fpt2" name="failure_popup_templet" value="templet2"><label for="fpt2"><?php echo __('Template 2','popup-message-contact-form-7');?></label>
                                    <input type="radio" id="fpt3" name="failure_popup_templet" value="templet3"><label for="fpt3"><?php echo __('Template 3','popup-message-contact-form-7');?></label>
                                    <input type="radio" id="fpt4" name="failure_popup_templet" value="templet4"><label for="fpt4"><?php echo __('Template 4','popup-message-contact-form-7');?></label>
                                    <input type="radio" id="fpt5" name="failure_popup_templet" value="templet5"><label for="fpt5"><?php echo __('Template 5','popup-message-contact-form-7');?></label>
                                    <input type="radio" id="fptct" name="failure_popup_templet" value="custom_templet"><label for="fptct"><?php echo __('Custom Template','popup-message-contact-form-7');?></label>
                                </label>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet_1">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 1 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet_1">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/f_theme_1.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet_2">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 2 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet_2">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/f_theme_2.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet_3">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 3 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet_3">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/f_theme_3.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet_4">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 4 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet_4">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/f_theme_4.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet_5">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Template 5 :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet_5">
                            <th scope="row">
                            </th>
                            <td>
                                <img src="<?php echo OCCF7POPUP_PLUGIN_DIR.'/images/f_theme_5.png'; ?>"/>
                            </td>
                        </tr>
                        <tr class="failuretr_custom_templet">
                            <th scope="row" colspan="2">
                                <label><?php echo __('Select Popup Background :','popup-message-contact-form-7');?></label>
                            </th>
                        </tr>
                        <tr class="failuretr_custom_templet">
                            <th scope="row">
                            </th>
                            <td>
                                <table class="tbl_child">
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="failure_popup_background_option" value="bg_color"><?php echo __('Background Color','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="failure_popup_background_color" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="failure_popup_background_option" value="image"><?php echo __('Background Image','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <?php  
                                                echo $this->OCCF7POPUP_image_uploader_field_failer ( 'image_failure', get_post_meta($formid, 'failure_hidden_img_count', true ) );
                                            ?>
                                        </td>
                                        <td>
                                            <?php if(!empty(get_post_meta($formid, 'failure_popup_image_color', true ))){ ?>
                                            <img src="<?php echo get_post_meta($formid, 'failure_popup_image_color', true ); ?>" width="50px" height="50px">
                                        <?php } ?>
                                            <input type="hidden" name="failure_popup_image_color" class="failure_hidden_img" >
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="radio" name="failure_popup_background_option" value="gradient_color"><?php echo __('Gradient Color','popup-message-contact-form-7');?>
                                            </label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="failure_popup_gradient_color" value="">
                                        </td>
                                        <td>
                                            <input class="jscolor gra_box" name="failure_popup_gradient_color1" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php echo __('Failure Popup Text Color','popup-message-contact-form-7');?></label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="failure_popup_text_color" id="failure_popup_text_color" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label><?php echo __('Button background color','popup-message-contact-form-7');?></label>
                                        </td>
                                        <td>
                                            <input class="jscolor" name="failure_popup_button_background_color" value="">
                                        </td>
                                    </tr>

                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Failure Popup Width','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="failure_popup_width" class="regular-text" value="">
                                <span class="description"><?php echo __('Value must be like: 500px / auto / 50%','popup-message-contact-form-7');?></span>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('failure Popup Border Radius','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="number" name="failure_popup_radius" class="regular-text" value="">
                                
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <label><?php echo __('Auto Hide after(Failure)','popup-message-contact-form-7');?></label>
                            </th>
                            <td>
                                <input type="text" name="failure_popup_duration" class="regular-text" value="">
                                <span class="description"><?php echo __('Duration in milliseconds eg. 5000 (Popup will hide after 5 Seconds).','popup-message-contact-form-7');?></span>
                            </td>
                        </tr>
                        
                        
                    </tbody>
                </table>
            </fieldset>
            <?php 
        }

        function OCCF7POPUP_image_uploader_field( $name, $value = '') {
            $image = ' button">Upload image';
            $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
            $display = 'none'; // display state ot the "Remove image" button
         
            if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
         
                // $image_attributes[0] - image URL
                // $image_attributes[1] - image width
                // $image_attributes[2] - image height
         
                $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
                $display = 'inline-block';
         
            } 
         
            return '
            <div>
                <a href="#" class="misha_upload_image_button' . $image . '</a>
                <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
            </div>';
        }

        function OCCF7POPUP_image_uploader_field_failer( $name, $value = '') {
            $image = ' button">Upload image';
            $image_size = 'full'; // it would be better to use thumbnail size here (150x150 or so)
            $display = 'none'; // display state ot the "Remove image" button
         
            if( $image_attributes = wp_get_attachment_image_src( $value, $image_size ) ) {
         
                // $image_attributes[0] - image URL
                // $image_attributes[1] - image width
                // $image_attributes[2] - image height
         
                $image = '"><img src="' . $image_attributes[0] . '" style="max-width:95%;display:block;" />';
                $display = 'inline-block';
         
            } 
         
            return '
            <div>
                <a href="#" class="misha_upload_image_button_failer' . $image . '</a>
                <input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '" />
            </div>';
        }

        function OCCF7POPUP_wpcf7_admin_script() {
            ?>
            <script type="text/javascript">
                jQuery( document ).ready(function() {
                    var radioValue = jQuery("input[name='popup_templet']:checked").val();
                    if(radioValue == "templet1"){
                        jQuery('.custom_templet_1').css("display", "table-row");
                    }
                    if(radioValue == "templet2"){
                        jQuery('.custom_templet_2').css("display", "table-row");
                    }
                    if(radioValue == "templet3"){
                        jQuery('.custom_templet_3').css("display", "table-row");
                    }
                    if(radioValue == "templet4"){
                        jQuery('.custom_templet_4').css("display", "table-row");
                    }
                    if(radioValue == "templet5"){
                        jQuery('.custom_templet_5').css("display", "table-row");
                    }
                    if(radioValue == "custom_templet"){
                        jQuery('.tr_custom_templet').css("display", "table-row");
                    }

                    var f_radioValue = jQuery("input[name='failure_popup_templet']:checked").val();
                    if(f_radioValue == "templet1"){
                        jQuery('.failuretr_custom_templet_1').css("display", "table-row");
                    }
                    if(f_radioValue == "templet2"){
                        jQuery('.failuretr_custom_templet_2').css("display", "table-row");
                    }
                    if(f_radioValue == "templet3"){
                        jQuery('.failuretr_custom_templet_3').css("display", "table-row");
                    }
                    if(f_radioValue == "templet4"){
                        jQuery('.failuretr_custom_templet_4').css("display", "table-row");
                    }
                    if(f_radioValue == "templet5"){
                        jQuery('.failuretr_custom_templet_5').css("display", "table-row");
                    }
                    if(f_radioValue == "custom_templet"){
                        jQuery('.failuretr_custom_templet').css("display", "table-row");
                    }

                    jQuery("input[name='popup_templet']").click(function(){
                        var radioValue = jQuery("input[name='popup_templet']:checked").val();
                        if(radioValue == "custom_templet"){
                            jQuery('.tr_custom_templet').css("display", "table-row");
                        }else{
                            jQuery('.tr_custom_templet').css("display", "none");
                        }

                        if(radioValue == "templet1"){
                            jQuery('.custom_templet_1').css("display", "table-row");
                        }else{
                            jQuery('.custom_templet_1').css("display", "none");
                        }

                        if(radioValue == "templet2"){
                            jQuery('.custom_templet_2').css("display", "table-row");
                        }else{
                            jQuery('.custom_templet_2').css("display", "none");
                        }

                        if(radioValue == "templet3"){
                            jQuery('.custom_templet_3').css("display", "table-row");
                        }else{
                            jQuery('.custom_templet_3').css("display", "none");
                        }

                        if(radioValue == "templet4"){
                            jQuery('.custom_templet_4').css("display", "table-row");
                        }else{
                            jQuery('.custom_templet_4').css("display", "none");
                        }

                        if(radioValue == "templet5"){
                            jQuery('.custom_templet_5').css("display", "table-row");
                        }else{
                            jQuery('.custom_templet_5').css("display", "none");
                        }
                    });

                    jQuery("input[name='failure_popup_templet']").click(function(){
                        var radioValue = jQuery("input[name='failure_popup_templet']:checked").val();
                        if(radioValue == "custom_templet"){
                            jQuery('.failuretr_custom_templet').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet').css("display", "none");
                        }

                        if(radioValue == "templet1"){
                            jQuery('.failuretr_custom_templet_1').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet_1').css("display", "none");
                        }

                        if(radioValue == "templet2"){
                            jQuery('.failuretr_custom_templet_2').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet_2').css("display", "none");
                        }

                        if(radioValue == "templet3"){
                            jQuery('.failuretr_custom_templet_3').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet_3').css("display", "none");
                        }

                         if(radioValue == "templet4"){
                            jQuery('.failuretr_custom_templet_4').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet_4').css("display", "none");
                        }

                         if(radioValue == "templet5"){
                            jQuery('.failuretr_custom_templet_5').css("display", "table-row");
                        }else{
                            jQuery('.failuretr_custom_templet_5').css("display", "none");
                        }
                    });
                });
            </script>
            <style type="text/css">
                .form-group.smartcat-uploader {
                    display: inline-block;
                }
                table.tbl_child td {
                    padding: 0px 6px;
                }
                .form-table td {
                    padding: 0px;
                }
                .tr_custom_templet,.failuretr_custom_templet,.custom_templet_1,.custom_templet_2,.custom_templet_3,.custom_templet_4,.custom_templet_5,.failuretr_custom_templet_1,.failuretr_custom_templet_2,.failuretr_custom_templet_3,.failuretr_custom_templet_4,.failuretr_custom_templet_5{
                    display: none;
                }
                .failure_popup {
                    pointer-events: none;
                    opacity: 0.7;
                }
                .pmcf7_pro_colour a {
               color: red;
               padding-left: 10px;
                   }
            </style>
            <?php
        }


        public static function menuinstance() {
            if (!isset(self::$menuinstance)) {
                self::$menuinstance = new self();
                self::$menuinstance->init();
            }
            return self::$menuinstance;
        }
    }
    OCCF7POPUP_menu::menuinstance();
}
