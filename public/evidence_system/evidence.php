<?php
    if($_SERVER["REQUEST_METHOD"] === "POST") {

        if($_POST["action"] == "create_folder"):
           
            $folderPath = $base_path = "file_manager/main_drive/".$_POST['folder']; // Get the full folder path
    //  dump($folderPath);
            if (!file_exists($folderPath)) {
                // Create folder if it doesn't exist
                if (mkdir($folderPath, 0777, true)) {
                    echo "success"; // Return success message
                } else {
                    echo "error"; // Return error message
                }
            } else {
                echo "exists"; // Folder already exists
            }
    

		elseif($_POST["action"] == "access_folder"):
            // phpinfo();
            $base_path = "file_manager/main_drive/";
            if($_SESSION["dnsc_audit"]["role"] != 3):
                $myArea = query("select ua.*,a.area_name from users_area ua left join areas a on a.id = ua.area_id
                where ua.user_id = ?", $_SESSION["dnsc_audit"]["userid"]);
                $MyArea = [];
                foreach($myArea as $row):
                    $MyArea[$row["area_id"]] = $row;
                endforeach;
                
            else:
                $myArea = query("select ua.*,a.area_name from users_area ua left join areas a on a.id = ua.area_id
                where a.id = ?", $_POST["root"]);
                $MyArea = [];
                foreach($myArea as $row):
                    $MyArea[$row["area_id"]] = $row;
                endforeach;
            endif;
           
            // dump($base_path);


  // Root directory
$current_path = isset($_POST['folder']) ? $_POST['folder'] : "";
$full_path = $base_path . $current_path;

if (!is_dir($full_path)) {
    echo "<tr><td colspan='3' class='text-danger'>Invalid directory</td></tr>";
    exit;
}

$items = array_diff(scandir($full_path), array('.', '..'));

// Separate folders and files
$folders = [];
$files = [];

foreach ($items as $item) {
    $item_path = $full_path . DIRECTORY_SEPARATOR . $item;
    if (is_dir($item_path)) {
        $folders[] = $item;
    } else {
        $files[] = $item;
    }
}

// Sort folders and files alphabetically
sort($folders);
sort($files);

// Merge the folders and files
$sorted_items = array_merge($folders, $files);
if($current_path == ""):


    echo('<div class="row">');

    foreach ($sorted_items as $item) {
        
        // dump($item);

        // $item = "awit";

        if(isset($MyArea[$item])):
            $item_path = $full_path . DIRECTORY_SEPARATOR . $item;
            $is_dir = is_dir($item_path);

            
            echo('
            <div class="col-md-3 col-12 col-sm-6">');
            echo("<a href='#' onclick='openFolder(\"$current_path$item/\")'>");
            echo('
            <div class="info-box">
              <span class="info-box-icon bg-success"><i class="far fa-folder"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><b>'.$MyArea[$item]["area_name"].'</b></span>
              </div>
            </div>
            </a>
            </div>
            
            ');

        
           
        endif;
    
        
    }

echo("</div>");

else:

    if($_SESSION["dnsc_audit"]["role"] != 3):
        echo('
        <div class="row">
            <div class="col-md-3 col-12 col-sm-6">
                <div class="row">
                    <div class="col">
                        <a href="#" onclick="showCreateFolderModal()" class="btn btn-block btn-sm btn-info mb-2">New Folder</a>
                    </div>
                    <div class="col">
                        <a href="#" onclick="showFileUploadModal()" class="btn btn-block btn-sm btn-info mb-2">File Upload</a>
                    </div>
                </div>
            </div>
        </div>
        ');
    endif;
    

    if(empty($sorted_items)):
        echo('
        <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                  No Folder / Files Here!
                </div>
        ');
    endif;
    

    echo('<div class="row">');


    
    foreach ($sorted_items as $item) {
        // Determine the path of the item
        $item_path = $full_path . DIRECTORY_SEPARATOR . $item;
    
        // Check if it's a folder
        if (is_dir($item_path)) {
            // For folders, add a class and data-path attribute
            echo '<div title="'.$item.'" class="col-md-3 col-12 col-sm-6 folder-item" data-fullpath="'.$item_path.'" data-path="' . $item . '/">';
            echo '<div class="info-box">';
            echo '<span class="info-box-icon bg-success"><i class="far fa-folder"></i></span>';
            echo '<div class="info-box-content">';
            echo '<span class="info-box-text"><b>' . $item . '</b></span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            // dump($full_path);
            // For files, add a class and data-path attribute
            echo '<div title="'.$item.'" class="col-md-3 col-12 col-sm-6 file-item" data-fullpath="'.$item_path.'" data-path="' .$item_path . '">';
            echo '<div class="info-box">';
            echo '<span class="info-box-icon bg-info"><i class="far fa-file"></i></span>';
            echo '<div class="info-box-content">';
            echo '<span class="info-box-text"><b>' . $item . '</b></span>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
    }
    echo("</div>");





endif;

elseif($_POST["action"] == "upload"):
    $current_path = isset($_POST['current_path']) ? $_POST['current_path'] : '';
    $target_dir = "file_manager/main_drive/" . $current_path; // Define the target directory

    // Check if the directory exists
    if (!is_dir($target_dir)) {
        echo "Directory does not exist!";
        exit;
    }

    // Handle file upload
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];
        $target_file = $target_dir . DIRECTORY_SEPARATOR . basename($file['name']);
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            exit;
        }

        // Try to upload the file
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            echo "File uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or error in file.";
    }



    elseif($_POST["action"] == "get_folder_structure"):
        // dump($_POST);
        
        function compareDirectories($dir1, $dir2) {
            // Get the absolute paths
            $realDir1 = realpath($dir1);
            $realDir2 = realpath($dir2);
        
            // Check if both paths are valid
            if ($realDir1 === false || $realDir2 === false) {
                return "One or both directories do not exist.";
            }
        
            // Compare the directories
            if ($realDir1 === $realDir2) {
                return 1;
            } else {
                return 0;
            }
        }


        function getRootDirectories($dir) {
            $folders = [];
            $directory = opendir($dir);
            
            while (($file = readdir($directory)) !== false) {
                $path = $dir . '/' . $file;
                
                // Check if the file is a directory (and not . or ..)
                if ($file !== '.' && $file !== '..' && is_dir($path)) {
                    // Check if it's a root directory (directly inside the root, not a subfolder)
                    $folders[] = $path;
                }
            }
            
            closedir($directory);
            return $folders;
        }
        $rootDir = 'file_manager/main_drive';
        $rootFolders = getRootDirectories($rootDir);
        // dump($rootFolders);

        $myArea = query("select ua.*,a.area_name from users_area ua left join areas a on a.id = ua.area_id
                            where ua.user_id = ?", $_SESSION["dnsc_audit"]["userid"]);
            $MyArea = [];
            foreach($myArea as $row):
                $MyArea["file_manager/main_drive//".$row["area_id"]] = $row;
            endforeach;
            // dump($MyArea);
        function getFolderStructure($dir, $myAllowedRoot) {

            

            $rootDir = 'file_manager/main_drive';
        $rootFolders = getRootDirectories($rootDir);
            $folders = [];
            $directory = opendir($dir);
            
            while (($file = readdir($directory)) !== false) {
                if ($file !== '.' && $file !== '..') {
                    $path = $dir . "/" .  $file;
                    

                    // dump($folders);
                    // echo(is_dir("file_manager/main_drive//2/Internal Audit 2024 1st Semester"));
                    if (is_dir($path)) {

                        
                    $folders[$path]["path"] = $path;
                    $folders[$path]["name"] = $file;
                    $subfolders = getFolderStructure($path, $myAllowedRoot); // Recurse into subdirectories
                    $folders = array_merge($folders, $subfolders);
                        // $bool = 0;
                        foreach($rootFolders as $f):
                            
                            if(compareDirectories($f, $path)):
                                // dump($myAllowedRoot);
                                if(!isset($myAllowedRoot[$path])):
                                    unset($folders[$path]);
                                else:
                                    $folders[$path]["path"] = $path;
                                    $folders[$path]["name"] = $myAllowedRoot[$path]["area_name"] . " (Root Folder)";
                                endif;
                            endif;
                            
                            
                        endforeach;
                        

                        // echo($path . "<br>");
                        

                    }
                    
                }
               
            }
        
            closedir($directory);
            return $folders;
        }
        $base_path = 'file_manager/main_drive/';



// Get the folder structure for modal (including subfolders)
    // $folder = isset($_POST['folder']) ? $_POST['folder'] : '';

    // Get all folders inside the base folder (including subfolders)
    $directory = $base_path;
    $folders = getFolderStructure($directory, $MyArea);
    // dump($folders);

    // Output folder structure for modal
    echo '<table class="table">';
    echo '<thead><tr><th>Path</th><th>Action</th></tr></thead>';
    echo '<tbody>';

    foreach ($folders as $folderPath) {
        // dump($folderPath);
        echo '<tr>';
        echo '<td title="'.$folderPath["path"].'">' . $folderPath["name"] . '</td>';
        echo '<td><button class="btn btn-primary" onclick="moveToFolder(\'' . $folderPath["path"] . '\')">Move Here</button></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';

// Recursive function to get all folders
elseif($_POST["action"] == "archiveFolder"):
    
    $path = $_POST["source"];
    preg_match('/file_manager\/main_drive\/([^\/]+)/', $path, $matches);
    $base_path = 'file_manager/archive_drive/'.$matches[1];
    // dump($matches[1]); // Output: 2
    $source = isset($_POST['source']) ? $_POST['source'] : '';
    $destination = $base_path;
    $destinationPath = $destination . '/' . basename($source);
    $sourcePath = $source;
    // dump($destinationPath);


    if (file_exists($sourcePath) && is_dir($destination)) {
        // Try to move the file using rename()
        if (rename($sourcePath, $destinationPath)) {
            echo 'File moved successfully!';
        } else {
            echo 'Failed to move the file.';
        }
    } else {
        echo 'Invalid source or destination.';
    }




elseif($_POST["action"] == "move_file"):

    $base_path = 'file_manager/main_drive/';
    // dump($_POST);
    // dump($_POST);
// Handle the move file request
    $source = isset($_POST['source']) ? $_POST['source'] : ''; // The selected file
    $destination = isset($_POST['destination']) ? $_POST['destination'] : ''; // The target folder

    // Get full file paths
    $sourcePath = $source;
    $destinationPath = $destination . '/' . basename($source);
    dump($destination);

    // Check if the source file exists and the destination folder is valid
    if (file_exists($sourcePath) && is_dir($destination)) {
        // Try to move the file using rename()
        if (rename($sourcePath, $destinationPath)) {
            echo 'File moved successfully!';
        } else {
            echo 'Failed to move the file.';
        }
    } else {
        echo 'Invalid source or destination.';
    }


    elseif($_POST["action"] == "deleteFolder"):


    // Define the folder path
    $folderPath = $_POST["source"];

    // Function to delete folder and its contents recursively

    if(is_dir($folderPath)):
        function deleteFolder($folderPath) {
            // Check if the folder exists
            if (is_dir($folderPath)) {
                // Get all files and folders inside the directory
                $files = array_diff(scandir($folderPath), array('.', '..')); // Exclude '.' and '..'
    
                foreach ($files as $file) {
                    // Get the full path of the file/folder
                    $filePath = $folderPath . DIRECTORY_SEPARATOR . $file;
    
                    // If it's a directory, recursively delete its contents
                    if (is_dir($filePath)) {
                        deleteFolder($filePath); // Recursively delete subdirectory
                    } else {
                        // If it's a file, delete it
                        unlink($filePath);
                    }
                }
                // After deleting all files and subdirectories, remove the empty folder
                rmdir($folderPath);
                return true;
            }
            return false;
        }
    
        // Call the function to delete the folder
        if (deleteFolder($folderPath)) {
            echo 'Folder and its contents deleted successfully!';
        } else {
            echo 'Failed to delete the folder or folder does not exist.';
        }
    else:

        if (file_exists($folderPath)) {
            // Try to delete the file
            if (unlink($folderPath)) {
                echo 'File deleted successfully!';
            } else {
                echo 'Failed to delete the file.';
            }
        } else {
            echo 'File does not exist.';
        }

    endif;

    




        endif;
		
		
    }


    
	else {

			if(!isset($_GET["action"])):
				$users = query("select * from users");
				render("public/users_system/users_list.php",[
				]);
			else:
				if($_GET["action"] == "myEvidence"):
			
					render("public/evidence_system/evidence_form.php",[
					]);

                    elseif($_GET["action"] == "download"):
                        $filePath = urldecode($_GET['file']);
                        $fullPath = $filePath;
                        
                        if (file_exists($fullPath)) {
                            header('Content-Type: application/octet-stream');
                            header('Content-Disposition: attachment; filename="' . basename($fullPath) . '"');
                            readfile($fullPath);
                            exit;
                        } else {
                            echo "File not found!";
                        }
				endif;
			endif;

			
	}
?>
