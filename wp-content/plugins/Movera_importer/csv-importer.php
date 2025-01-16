<?php
/*
Plugin Name: CSV Importer to wp_movera
Description: Imports CSV files into wp_movera table.
Version: 1.0
Author: Your Name
*/

ini_set('memory_limit', '512M'); // Increase memory limit to 512MB

// Hook for adding admin menus
add_action('admin_menu', 'csv_importer_menu');

// Action function for above hook
function csv_importer_menu() {
    add_menu_page('CSV Importer', 'CSV Importer', 'manage_options', 'csv_importer', 'csv_importer_page');
}

// Function to display the plugin admin page
function csv_importer_page() {
    ?>
    <h2>Import CSV to wp_movera</h2>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="file" name="file" id="file" accept=".csv">
        <input type="submit" name="import" value="Import">
    </form>
    <?php
    if (isset($_POST['import'])) {
        handle_csv_import();
    }
}

// Function to handle the CSV import
function handle_csv_import() {
    global $wpdb;  // Declare $wpdb as global to use it for database operations

    if (isset($_FILES['file']) && $_FILES['file']['type'] === 'text/csv') {
        $file = $_FILES['file']['tmp_name'];
        $handle = fopen($file, "r");
        if ($handle !== FALSE) {
            // Optionally, skip the header row if your CSV file includes headers
            fgetcsv($handle); // Skip header if necessary, also adapt if headers are used.

            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) { // Change delimiter to semicolon
                var_dump($data); // Continue debugging if needed
                $wpdb->insert(
                    'wp_movera', // Table name
                    array( // Data
                        'ordernumber' => isset($data[0]) ? $data[0] : null,
                        'mainnumber' => isset($data[1]) ? $data[1] : null,
                        'name' => isset($data[2]) ? $data[2] : null,
                        'supplier' => isset($data[3]) ? $data[3] : null,
                        'tax' => isset($data[4]) ? $data[4] : null,
                        'VK' => isset($data[5]) ? $data[5] : null,
                        'b2cStatus' => isset($data[6]) ? $data[6] : null,
                        'description_long' => isset($data[7]) ? $data[7] : null,
                        'VariantDescription' => isset($data[8]) ? $data[8] : null,
                        'purchaseunit' => isset($data[9]) ? $data[9] : null,
                        'referenceunit' => isset($data[10]) ? $data[10] : null,
                        'packunit' => isset($data[11]) ? $data[11] : null,
                        'unitID' => isset($data[12]) ? $data[12] : null,
                        'suppliernumber' => isset($data[13]) ? $data[13] : null,
                        'weight' => isset($data[14]) ? $data[14] : null,
                        'ean' => isset($data[15]) ? $data[15] : null,
                        'similar' => isset($data[16]) ? $data[16] : null,
                        'accessory' => isset($data[17]) ? $data[17] : null,
                        'configuratorOptions' => isset($data[18]) ? $data[18] : null,
                        'configuratorOptions_5' => isset($data[19]) ? $data[19] : null,
                        'cat_mapping_no' => isset($data[20]) ? $data[20] : null,
                        'categories' => isset($data[21]) ? $data[21] : null,
                        'category_path' => isset($data[22]) ? $data[22] : null,
                        'propertyValueName' => isset($data[23]) ? $data[23] : null,
                        'propertyValueName_5' => isset($data[24]) ? $data[24] : null,
                        'ghsSignalWord' => isset($data[25]) ? $data[25] : null,
                        'EnergieLabel' => isset($data[26]) ? $data[26] : null,
                        'energyLabelColour' => isset($data[27]) ? $data[27] : null,
                        'imageURL' => isset($data[28]) ? $data[28] : null,
                        'main' => isset($data[29]) ? $data[29] : null,
                        'ghs_codes' => isset($data[30]) ? $data[30] : null,
                        'hp_codes' => isset($data[31]) ? $data[31] : null,
                        'lagerbestand' => isset($data[32]) ? $data[32] : null,
                        'minimum_purchase' => isset($data[33]) ? $data[33] : null,
                        'attachment' => isset($data[34]) ? $data[34] : null,
                        'lieferzeit' => isset($data[35]) ? $data[35] : null,
                        'preis_one_upe' => isset($data[36]) ? $data[36] : null,
                        'im_angebot' => isset($data[37]) ? $data[37] : null,
                        'top_produkt' => isset($data[38]) ? $data[38] : null,
                        'prozent' => isset($data[39]) ? $data[39] : null,
                        'haendlerid' => isset($data[40]) ? $data[40] : null,
                        'localcount' => isset($data[41]) ? $data[41] : null,
                        'waehrung' => isset($data[42]) ? $data[42] : null,
                        'europreisupe' => isset($data[43]) ? $data[43] : null,
                        'europreisimangebot' => isset($data[44]) ? $data[44] : null,
                        'VKEUR' => isset($data[45]) ? $data[45] : null,
                        'zusatzkategorie' => isset($data[46]) ? $data[46] : null,
                        'herstellerdaten' => isset($data[47]) ? $data[47] : null,
                    ),
                    array(
                        '%d', '%s', '%s', '%s', '%f', '%f', '%s', '%s', '%s',
                        '%s', '%s', '%s', '%d', '%s', '%f', '%s', '%s', '%s',
                        '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s',
                        '%s', '%s', '%d', '%s', '%s', '%d', '%d', '%s', '%s',
                        '%f', '%d', '%d', '%f', '%d', '%d', '%s', '%f', '%f',
                        '%f', '%s', '%s'
                    )
                );
            }
            fclose($handle);
            echo "<p>Import successful!</p>";
        } else {
            echo "<p>Failed to open the file.</p>";
        }
    } else {
        echo "<p>Invalid file format or file upload error. Please upload a CSV file.</p>";
    }
}



// ---------- Product Automation -------------- //




?>
