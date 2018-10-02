<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
class WpCsvImporter {
    var $log = array();

    /**
     * Determine value of option $name from database, $default value or $params,
     * save it to the db if needed and return it.
     *
     * @param string $name
     * @param mixed  $default
     * @param array  $params
     * @return string
     */
    function process_option($name, $default, $params) {
        if (array_key_exists($name, $params)) {
            $value = stripslashes($params[$name]);
        } elseif (array_key_exists('_'.$name, $params)) {
            // unchecked checkbox value
            $value = stripslashes($params['_'.$name]);
        } else {
            $value = null;
        }
        $stored_value = get_option($name);
        if ($value == null) {
            if ($stored_value === false) {
                if (is_callable($default) &&
                    method_exists($default[0], $default[1])) {
                    $value = call_user_func($default);
                } else {
                    $value = $default;
                }
                add_option($name, $value);
            } else {
                $value = $stored_value;
            }
        } else {
            if ($stored_value === false) {
                add_option($name, $value);
            } elseif ($stored_value != $value) {
                update_option($name, $value);
            }
        }
        return $value;
    }

    /**
     * Plugin's interface
     *
     * @return void
     */

 function wp_csv_importer_form() {
        $opt_draft = $this->process_option('csv_importer_import_as_draft',
            'publish', $_POST);
        $opt_cat = $this->process_option('csv_importer_cat', 0, $_POST);

        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $this->post(compact('opt_draft', 'opt_cat'));
        }

        // form HTML {{{
?>

<div id="wp-settings"> 
	<div class="wrap importer-form">
	    <h1>Import Community</h1><hr />
		<p>
			<a href="<?php echo get_template_directory_uri(); ?>/sample/community-list.zip" target="_blank">Download Sample Zip </a>
		</p>
	    <form class="add:the-list: validate" method="post" enctype="multipart/form-data">
			<div class="wpimporter-setting">
				<!-- General Setting -->	
				<div class="first wpimporter-tab" id="div-wpimporter-general">
					<h2>Upload zip which contain images and csv</h2>
				   <?php wp_nonce_field( 've_import_csv_action', 've_csv_nonce_field' ); ?>
				<p><label for="csv_import">Upload file:</label>
		        	<input name="csv_import" id="csv_import" type="file" value="" aria-required="true" /></p>
		        <input type="hidden" name="page_type" id="page_type" value="community">
		        <?php submit_button("Import Now"); ?>
		    	</div>
	    	</div>
	     </form>
	</div>
	<div class="wrap importer-help">
		<h1>Instructions</h1><hr />
		<p>
			<a href="<?php echo get_template_directory_uri(); ?>/sample/csv-help-1.png" target="_blank">
				<img src="<?php echo get_template_directory_uri(); ?>/sample/csv-help-1.png">
			</a>
		</p>
	</div>
	<!-- end wrap -->
	<!-- General Setting -->	
</div>

<!-- End Genral settings -->
<?php
        // end form HTML }}}

    }
function print_messages() {
        if (!empty($this->log)) {

        // messages HTML {{{
?>

<div class="wrap">
    <?php if (!empty($this->log['error'])): ?>

    <div class="error">

        <?php foreach ($this->log['error'] as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>

    </div>

    <?php endif; ?>

    <?php if (!empty($this->log['notice'])): ?>

    <div class="updated fade">

        <?php foreach ($this->log['notice'] as $notice): ?>
            <p><?php echo $notice; ?></p>
        <?php endforeach; ?>

    </div>

    <?php endif; ?>
    
    <?php if (!empty($this->log['success'])): ?>

    <div class="updated fade">

        <?php foreach ($this->log['success'] as $success): ?>
            <p><?php echo $success; ?></p>
        <?php endforeach; ?>

    </div>

    <?php endif; ?>
</div><!-- end wrap -->

<?php
        // end messages HTML }}}

            $this->log = array();
        }
    }

    /**
     * Handle POST submission
     *
     * @param array $options
     * @return void
     */
    function post($options) {
    	/*WP_Filesystem();
		$destination = wp_upload_dir();
		print_r($destination);
		exit;
		$destination_path = $destination['path'];
		$unzipfile = unzip_file( $destination_path.'/filename.zip', $destination_path);
   
	   if ( is_wp_error( $unzipfile ) ) {
	         echo 'There was an error unzipping the file.'; 
	   } else {
	      echo 'Successfully unzipped the file!';       
	   }*/
       $destination = wp_upload_dir();
	   if ( ! isset( $_POST['ve_csv_nonce_field'] ) || ! wp_verify_nonce( $_POST['ve_csv_nonce_field'], 've_import_csv_action' ) ) {
				 $this->log['error'][] = 'Invalid attempt';
                 $this->print_messages();
				return;
			}

        if ( ! isset( $_POST['ve_csv_nonce_field'] ) || ! wp_verify_nonce( $_POST['ve_csv_nonce_field'], 've_import_csv_action' ) ) {
				 $this->log['error'][] = 'Invalid attempt';
                 $this->print_messages();
				return;
			}
			
		if (!current_user_can('import')) {
				 $this->log['error'][] = 'You are not permitted for import data';
                 $this->print_messages();
				return;
			}
			
        if (empty($_POST['page_type'])) {
            $this->log['error'][] = 'Please select post type';
            $this->print_messages();
            return;
        }
       
        
        if (empty($_FILES['csv_import']['tmp_name'])) {
            $this->log['error'][] = 'No file uploaded, aborting.';
            $this->print_messages();
            return;
        }

        if (!current_user_can('publish_pages') || !current_user_can('publish_posts')) {
            $this->log['error'][] = 'You don\'t have the permissions to publish posts and pages. Please contact the blog\'s administrator.';
            $this->print_messages();
            return;
        }
        
        $filename = $_FILES["csv_import"]["name"];
		$source = $_FILES["csv_import"]["tmp_name"];
		$type = $_FILES["csv_import"]["type"];

	    $target_path = $destination['path'].'/'.$filename;  // change this to the correct site path
	    //echo $target_path;exit;
	if(move_uploaded_file($source, $target_path)) {
		$zip = new ZipArchive();
		$x = $zip->open($target_path);
		if ($x === true) {
			$zip->extractTo($destination['path']); // change this to the correct site path
			$zip->close();
			unlink($target_path);
		}
	} else {
		$this->log['error'][] = 'There was a problem with the upload. Please try again.';
	    $this->print_messages();
	    return;
	}


        //$csv_file = $_FILES['csv_import']['tmp_name']; 
		$csv_file = $destination['path'].'/community-list/import.csv'; 
		//echo $csv_file = sanitize_file_name($csv_file); 
		$filename = sanitize_file_name($_FILES['csv_import']['name']); 
		$type = strtolower(substr($filename,-3));
		//$type = sanitize_file_name($type); 
        if ($type!='zip') {
            $this->log['error'][] = 'File format is wrong.';
            $this->print_messages();
            return;
        }
        
	    if (! is_file( $csv_file )) {
	            $this->log['error'][] = 'Failed to load CSV file. Re-check for filename in, zip it must be set as import.csv inside folder /community-list';
	            $this->print_messages();
	            return;
	        }

$pageType=$_POST['page_type'];
/** 
 *  Video posts 
 * */
if($pageType!=''){    
/** Store .csv file value into a array */
$fldAry=array("custom_id",
			  "post_title",
			  "post_slug",
			  "menu_order",
			  "post_status",
			  "post_content",
			  "author_id",
			  'meta_title',
			  'meta_desc',
			  'meta_key',
			  'meta_link',
			  'featured_image'
			  );
	$arry=$this->csvIndexArray($csv_file, ",", $fldAry, 0);
	$skipped = 0;
	$imported = 0;
	$time_start = microtime(true);
	$upload_dir = wp_upload_dir();
	$upload_path=$upload_dir['baseurl'];
	//echo '<pre>';
	//print_r($arry);exit;
	global $post,$wpdb;
	if(count($arry) > 0):
	foreach ($arry as $data) {
		$data = wp_slash($data);
		wp_reset_postdata();
		$user_id =get_current_user_id();
			if(isset($data['author_id']) && $data['author_id']!='')
			{
				$user_id=$data['author_id'];
			}
			$post_title=$data['post_title'];
			
			/* check post exist or not */
			if(isset($data['custom_id']) && $data['custom_id']!='')
			{
				$customId=trim($data['custom_id']);
			    $mainquery="SELECT p.ID FROM ".$wpdb->prefix."posts p, ".$wpdb->prefix."postmeta meta WHERE 
				p.ID = meta.post_id 
				AND ( (meta.meta_key = '_wp_importer_unique_id' 
				AND meta.meta_value = '$customId') || (meta.meta_key = 'custom_id' 
				AND meta.meta_value = '$customId') )
				AND p.post_type = '$pageType'
				limit 0,1";	
                $csvpage = $wpdb->get_results($mainquery, OBJECT);
			}
			else
			{
				$csvpage=true;
				return;
				// If no customID is passed, do not add/edit the record
				//$querytext.="AND wp_posts.post_title = '$post_title' ";
			} 
			//echo $mainquery.'<br>'; 
			//print_r($csvpage);
			//exit;
       $checkpoststatus='0';
			if (!$csvpage){
			/* create new post */	
			$new_post = array(
						'post_title'   => convert_chars($data['post_title']),
						'menu_order'   => $data['menu_order'],
						'post_name'   => trim($data['post_slug']),
						'post_status'  => $data['post_status'],
						'post_content' => wpautop(convert_chars($data['post_content'])),
						'post_type'    => $pageType,
						'post_author'  => $user_id,
					);
			// Insert the post into the database
			//echo "<pre>"; print_r($new_post); //exit;
			$existpost_id = wp_insert_post($new_post);
			$this->Generate_Featured_Image($destination['path'].'/community-list/'.$data['featured_image'],$existpost_id);
			$url_array = array('url' => $data['meta_link'],
						'openin' => 'openin');
			update_post_meta($existpost_id,"community",$url_array);
			
			}else
			{
				$existpost_id =$csvpage[0]->ID;
				$update_post = array(
						'ID' 		   =>$existpost_id,
						'post_title'   => convert_chars($data['post_title']),
						'menu_order'   => convert_chars($data['menu_order']),
						'post_status'  => $data['post_status'],
						'post_modified'  => date('Y-m-d h:m:s'),
						'post_author'  => $user_id,
					);
				wp_update_post($update_post);
				$url_array = array('url' => $data['meta_link'],
						'openin' => 'openin');
				update_post_meta($existpost_id,"community",$url_array);
				$checkpoststatus='1';
			}
			
			/* Start custom meta fields */
			
			$videoId='';
			if($existpost_id):	
				if(isset($data['custom_id']) && $data['custom_id']!='')
				 {
					$custom_id=$data['custom_id'];
					if(!add_post_meta($existpost_id, '_wp_importer_unique_id',$custom_id, true))
					{
						update_post_meta($existpost_id, '_wp_importer_unique_id',$custom_id);
						
						}else
						{
							add_post_meta($existpost_id, '_wp_importer_unique_id',$custom_id, true);
							
							}
					}	
				/* Start SEO meta content */
				
				if(isset($data['meta_title']) && $data['meta_title']!='')
				{  
				   $metaTitle=$data['meta_title'];
				   if(!add_post_meta($existpost_id, '_yoast_wpseo_title',$metaTitle, true))
					{
						update_post_meta($existpost_id, '_yoast_wpseo_title',$metaTitle);
						
					}else
					{
						add_post_meta($existpost_id, '_yoast_wpseo_title',$metaTitle, true);
							
					}
				
				}// update meta title
				
				if(isset($data['meta_desc']) && $data['meta_desc']!='')
				{
					$metaDesc=$data['meta_desc'];
					if(!add_post_meta($existpost_id, '_yoast_wpseo_metadesc',$metaDesc, true))
					{
						update_post_meta($existpost_id, '_yoast_wpseo_metadesc',$metaDesc);
						
						}else
						{
							add_post_meta($existpost_id, '_yoast_wpseo_metadesc',$metaDesc, true);
							
							}
			
				} // update meta description
				
				if(isset($data['meta_key']) && $data['meta_key']!='')
				{
				  $metaKeys=$data['meta_key'];
				  if(!add_post_meta($existpost_id, '_yoast_wpseo_metakeywords',$metaKeys, true))
					{
						update_post_meta($existpost_id, '_yoast_wpseo_metakeywords',$metaKeys);
						
						}else
						{
							add_post_meta($existpost_id, '_yoast_wpseo_metakeywords',$metaKeys, true);
							
							}
				
				}// update meta keyuwords'
			 
				/* End SEO meta content */

			$imported++;
			else:
			$skipped++;
			endif;

			if($checkpoststatus=='1'){$msg='Updated';}else{$msg='Created';}	
			$this->log['success'][] = '#'.$existpost_id.'. '.$data['post_title'].' page is <b>'.$msg.'</b>';
			$this->print_messages();
			} 
	endif;
}


        if (file_exists($csv_file)) {
            @unlink($csv_file);
        }
        if (is_dir($destination['path'].'/community-list/')) {
            $this->deleteDirectory($destination['path'].'/community-list/');
        }

        
        $exec_time = microtime(true) - $time_start;

        if ($skipped) {
            $this->log['notice'][] = "<b>Skipped {$skipped} posts (most likely due to empty title, body and excerpt).</b>";
        }
        $this->log['notice'][] = sprintf("<b>Imported {$imported} pages in %.2f seconds.</b>", $exec_time);
        $this->print_messages();
    }
/** Reterive data from csv file to array format */
function csvIndexArray($filePath='', $delimiter='|', $header = null, $skipLines = -1) {
         $lineNumber = 0;
         $dataList = array();
         //$headerItems = array();
        if (($handle = fopen($filePath, 'r')) != FALSE) {
			
		   while (($items = fgetcsv($handle, 1000, ",")) !== FALSE) 
		   {
			    if($lineNumber == 0)
			    { 
					//$header = $items; 
					$lineNumber++; continue; 
				}
				
				$record = array();
				for($index = 0, $m = count($header); $index < $m; $index++){
					//If column exist then and then added in data with header name
					if(isset($items[$index])) {
				   $itmcont = trim(mb_convert_encoding(str_replace('"','',$items[$index]), "utf-8", "HTML-ENTITIES" ));
				   $record[$header[$index]] = str_replace('#',',',$itmcont);
					}
				}
				$dataList[] = $record; 				
				 
				
			}			
			
			
            /* while (($row = fgets($handle, 4096)) !== false) { 
				//echo $delimiter;
				
                if($lineNumber > $skipLines) {
                    $items = explode($delimiter, $row);
                     
                    $record = array();
                    for($index = 0, $m = count($header); $index < $m; $index++){
                        //If column exist then and then added in data with header name
                        if(isset($items[$index])) {
                       $itmcont = trim(mb_convert_encoding(str_replace('"','',$items[$index]), "utf-8", "HTML-ENTITIES" ));
                       $record[$header[$index]] = str_replace('#',',',$itmcont);
                        }
                    }
                    $dataList[] = $record; 
                    print_r($record); exit;
                } else {
                    $lineNumber++;
                }
           }*/
           fclose($handle);
        }
        return $dataList;
    }

public function Generate_Featured_Image( $image_url, $post_id  ){
    $upload_dir = wp_upload_dir();
    $this->log = array();
    if (file_exists($image_url))
    {
    	$image_data = file_get_contents($image_url);
    	$filename = basename($image_url);
	    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
	    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    	file_put_contents($file, $image_data);

	    $wp_filetype = wp_check_filetype($filename, null );
	    $attachment = array(
	        'post_mime_type' => $wp_filetype['type'],
	        'post_title' => sanitize_file_name($filename),
	        'post_content' => '',
	        'post_status' => 'inherit'
	    );

	    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
	    require_once(ABSPATH . 'wp-admin/includes/image.php');
	    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
	    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
	    $res2= set_post_thumbnail( $post_id, $attach_id );
	}
	else
	{
		$this->log['error'][] = '#'.$post_id.' Featured image not assign to post. Image listed in CSV not found';
        $this->print_messages();
        return;
	}
}

public function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}

}


$plugin = plugin_basename( __FILE__ );

function wp_csv_import_admin_menu() {
    $plugin = new WpCsvImporter;
    $parentSlug = '#';
    add_submenu_page( $parentSlug, 'Import Communities', 'Import Communities', 'manage_options','wp-csv-importer',
        array($plugin, 'wp_csv_importer_form'));
}

add_action('admin_menu', 'wp_csv_import_admin_menu');

if (isset($_GET['page']) && $_GET['page'] == 'wp-csv-importer') {
   add_action('admin_footer','init_wp_csv_importer_admin_scripts');
}

if(!function_exists('init_wp_csv_importer_admin_scripts')):
function init_wp_csv_importer_admin_scripts()
{

	echo $script='<script type="text/javascript">
	/* Wp Importer js for admin */
	jQuery(document).ready(function(){
		jQuery(".wpimporter-tab").hide();
		jQuery("#div-wpimporter-general").show();
	    jQuery(".wpimporter-tab-links").click(function(){
		var divid=jQuery(this).attr("id");
		jQuery(".wpimporter-tab-links").removeClass("active");
		jQuery(".wpimporter-tab").hide();
		jQuery("#"+divid).addClass("active");
		jQuery("#div-"+divid).fadeIn();
		});
	}); 
	</script>'  ;
}
endif;

function deleteDirectory($dir) {
    if (!file_exists($dir)) {
        return true;
    }

    if (!is_dir($dir)) {
        return unlink($dir);
    }

    foreach (scandir($dir) as $item) {
        if ($item == '.' || $item == '..') {
            continue;
        }

        if (!deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
            return false;
        }

    }

    return rmdir($dir);
}