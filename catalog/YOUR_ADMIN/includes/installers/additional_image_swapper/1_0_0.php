<?php
// use $configuration_group_id where needed

// For Admin Pages

$zc150 = (PROJECT_VERSION_MAJOR > 1 || (PROJECT_VERSION_MAJOR == 1 && substr(PROJECT_VERSION_MINOR, 0, 3) >= 5));
if ($zc150) { // continue Zen Cart 1.5.0
    $admin_page = 'configAddtionalImgSwap';
  // delete configuration menu
  $db->Execute("DELETE FROM ".TABLE_ADMIN_PAGES." WHERE page_key = '".$admin_page."' LIMIT 1;");
  // add configuration menu
  if (!zen_page_key_exists($admin_page)) {
    if ((int)$configuration_group_id > 0) {
      zen_register_admin_page($admin_page,
                              'BOX_MODULE_ADDTIONAL_IMAGE_SWAPPER', 
                              'FILENAME_CONFIGURATION',
                              'gID=' . $configuration_group_id, 
                              'configuration', 
                              'Y',
                              $configuration_group_id);
        
      $messageStack->add('Enabled Additional Image Swapper Configuration Menu.', 'success');
    }
  }
}
/* If your checking for a field
 * global $sniffer;
 * if (!$sniffer->field_exists(TABLE_SOMETHING, 'column'))  $db->Execute("ALTER TABLE " . TABLE_SOMETHING . " ADD column varchar(32) NOT NULL DEFAULT 'both';");
 */
/*
 * For adding a configuration value
 * 
 */
 $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description, set_function) "
         . "VALUES (" . (int) $configuration_group_id . ", 'ADDT_IMAGE_SWAPPER_ENABLE', 'Enable Addtional Image Swapper', 'true', 'Do you want to disable Additional Image Swapper', 'zen_cfg_select_option(array(\'true\', \'false\'),');");
 

 $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description) "
         . "VALUES (" . (int) $configuration_group_id . ", 'ADDT_IMAGE_SWAPPER_ADDTL_IMG_ID', 'Div ID of Additional Images', 'productAdditionalImages', 'The ID of the Div that contains the additional images');");
 
 $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description) "
         . "VALUES (" . (int) $configuration_group_id . ", 'ADDT_IMAGE_SWAPPER_MAIN_IMG_ID', 'ID of Main Image', 'productMainImage', 'The ID of the Div that contains the main product image');");
 
 
 $db->Execute("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_group_id, configuration_key, configuration_title, configuration_value, configuration_description) "
         . "VALUES (" . (int) $configuration_group_id . ", 'ADDT_IMAGE_SWAPPER_ADDTL_IMG_CLASS', 'Class of Additional Images', 'additionalImages', 'The class of the additional images div');");