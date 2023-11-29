<?php

global $wpdb;

add_action('admin_menu', 'port_plug');


function port_plug() {

    //create new top-level menu
    add_menu_page('Portfolio Plugin Settings', 'Portfolio', 'administrator', __FILE__, 'port_settings_page' , 'dashicons-portfolio', );
  

  }


  if (isset($_POST['port_title'])) {
    $data = array(
        'title' => $_POST['port_title'],
        'category' => $_POST['port_cat'],
        'github_link' => $_POST['github_link'],
        'live_link' => $_POST['live_link'],
        'desc' => $_POST['port_desc'],
        'image_url' => $_POST['image_url']
    );
    $table_name = $wpdb->prefix . 'portfolio_item';

    $result = $wpdb->insert($table_name, $data);

    if ($result==1) {
        echo "<script>alert('Portfolio Item added');</script>";
    }else{
        echo "<script>alert('Portfolio Item Failed');</script>";
    }
}

  //content within the av Settings tab
function port_settings_page() {

    ob_start();
    ?> 
  
  <div class="wrap">
  <h1>Add Portfolio Item</h1>
  
  <form method="post" action="">
    <table class="form-table">
        <tr valign="top">
        <th scope="row">Title:</th>
        <td><input type="text" name="port_title" value="" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Category:</th>
        <td><input type="text" name="port_cat" value="" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Github Link:</th>
        <td><input type="text" name="github_link" value="" /></td>
        </tr>
           
        <tr valign="top">
        <th scope="row">Live Link:</th>
        <td><input type="text" name="live_link" value="" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">Description:</th>
        <td>
        <textarea id="port_desc" name="port_desc" rows="4" cols="50"></textarea>
    
    </td>
        </tr>
        <tr valign="top">
                    <th scope="row">Image:</th>
                    <td>
                        <input type="text" id="image_url" name="image_url" value="" readonly>
                        <button type="button" id="upload_image_button" class="button-primary">Upload Image</button>
                    </td>
                </tr>
    </table>
    
    <?php submit_button(); ?>
  
  </form>
  </div>
   <?php
    echo ob_get_clean();
  }