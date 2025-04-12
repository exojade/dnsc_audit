<link rel="stylesheet" href="AdminLTE_new/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="AdminLTE_new/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<link rel="stylesheet" href="AdminLTE_new/dist/css/adminlte.min.css">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <!-- <div class="col-sm-6">
            <h1>archivess</h1>
          </div> -->
          <div class="col-sm-12">
            <ol class="breadcrumb" id="breadcrumb" style="font-size: 180%; color: #000;">
              <li class="breadcrumb-item"><a href="#" onclick="loadFiles('')">archives</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div id="file-list"></div>

    <div id="context-menu" class="dropdown-menu" style="display: none;">
        <a class="dropdown-item" href="#" onclick="showMoveDialog()">Move</a>
        <a class="dropdown-item" href="#" onclick="showCopyDialog()">Copy</a>
        <a class="dropdown-item" href="#" onclick="deleteFolder()">Delete</a>
    </div>

    <!-- Modal for Create Folder -->

    <div class="modal" id="moveCopyModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Select Destination Folder</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="folderStructure">
                        <!-- Folder structure will be injected here -->
                    </div>
                </div>
            </div>
        </div>




    <div class="modal" id="createFolderModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Folder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" id="newFolderName" class="form-control" placeholder="Folder Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="createNewFolder()">Create</button>
                </div>
            </div>
        </div>
    </div>

    <div id="fileUploadModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Upload File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="fileUploadForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fileInput">Choose File</label>
                        <input type="file" class="form-control" id="fileInput" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>
</div>
<script src="AdminLTE_new/plugins/select2/js/select2.full.min.js"></script>
<?php require("layouts/footer.php") ?>





<script>
    let currentPath = ""; // To track the directory
    let selectedFile = ""; // To store selected file or folder path
    let selectedPath = "";

    // Function to load files and folders
    function loadFiles(folder = "") {
        $.ajax({
            url: "archives",
            type: "post",
            data: { 

              <?php if(isset($_GET["root"])): ?>
                action: "access_folder",
                folder: folder,
                root: "<?php echo($_GET["root"]); ?>",
              <?php else: ?>
                action: "access_folder",
                folder: folder
              <?php endif; ?>
                
            },
            success: function(response) {
                $("#file-list").html(response);
                currentPath = folder;
                updateBreadcrumb(folder);

                $("#search-input").select2({
        placeholder: "Search files...",
        allowClear: true,
        minimumInputLength: 2, // Start searching after 2 characters
        ajax: {
            url: "archives", // Backend PHP script
            type: "POST",
            dataType: "json",
            delay: 250, // Reduce request spam
            data: function(params) {
                return {
                    action: "search_files",
                    query: params.term // Search term
                };
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.parent_folder, // Full file path
                            text: item.name, // Display name
                            icon: item.is_folder ? "📂" : "📄" // Folder or file emoji
                        };
                    })
                };
            },
            cache: true
        }
    });

    // When a file is selected
    $("#search-input").on("select2:select", function(e) {
        let filePath = e.params.data.id;
        // console.log();
        // openFile(filePath);
        openMasterFolder(filePath)
    });
            }
        });
    }

    // Function to open folder on double-click
    function openFolder(folder) {
        loadFiles(currentPath + folder + "/");
    }

    function openMasterFolder(folder) {
        loadFiles(folder + "/");
    }

    // Function to handle right-click context menu
    function handleRightClick(event, filePath, fullPath) {
        event.preventDefault(); // Prevent default context menu

        // Set the selected file or folder
        selectedFile = filePath;
        selectedPath = fullPath;
        // alert(filePath);

        // Show context menu
        $("#context-menu").css({
            top: event.pageY + "px",
            left: event.pageX + "px"
        }).show();
    }

    function showMoveDialog() {
        // Fetch all folders inside the base directory
        $.ajax({
            url: 'archives', 
            type: 'POST',
            data: {
                action: 'get_folder_structure',
                folder: currentPath
            },
            success: function(response) {
                // Populate the modal with folder structure
                $('#folderStructure').html(response);
                $('#moveCopyModal').modal('show');
            }
        });

        // Hide context menu
        $("#context-menu").hide();
    }

    // Function to hide context menu
    function hideContextMenu() {
        $("#context-menu").hide();
    }

    // Function to update breadcrumb
    function updateBreadcrumb(folder) {
        let pathSegments = folder.split("/").filter(segment => segment !== "");
        let breadcrumbHtml = `<li class="breadcrumb-item"><a href="#" onclick="loadFiles('')">Archives</a></li>`;

        let path = "";
        pathSegments.forEach((segment, index) => {
            path += segment + "/";
            breadcrumbHtml += `<li class="breadcrumb-item"><a href="#" onclick="loadFiles('${path}')">${segment}</a></li>`;
        });

        $("#breadcrumb").html(breadcrumbHtml);
    }

    // Functions for context menu actions (Move, Copy, Delete)
    // function showMoveDialog() {
    //     alert("Move file: " + selectedFile);
    //     hideContextMenu();
    // }

    function showCopyDialog() {
        alert("Copy file: " + selectedFile);
        hideContextMenu();
    }

    function showDeleteDialog() {
        alert("Delete file: " + selectedFile);
        hideContextMenu();
    }

    // Function to show modal to create a new folder
    function showCreateFolderModal() {
        $('#createFolderModal').modal('show'); // Show modal
        hideContextMenu(); // Hide context menu
    }

    // Function to create new folder
    function createNewFolder() {
        const folderName = $('#newFolderName').val().trim();
        if (folderName === "") {
            alert("Please enter a folder name.");
            return;
        }

        $.ajax({
            url: "archives",
            type: "post",
            data: { 
                action: "create_folder",
                folder: currentPath + folderName + "/"
            },
            success: function(response) {
                if (response === "success") {
                    $('#createFolderModal').modal('hide');
                    loadFiles(currentPath); // Reload files and folders
                } else {
                    alert("Error creating folder.");
                }
            }
        });
    }

    // Function to handle back navigation
    function navigateBack() {
        if (currentPath !== "") {
            let parentPath = currentPath.split("/").slice(0, -2).join("/") + "/";
            loadFiles(parentPath);
        }
    }

    // Function to download a file when double-clicked
    function downloadFile(filePath) {
    const encodedFilePath = encodeURIComponent(filePath);
    const fileExtension = filePath.split('.').pop().toLowerCase();

    const inlineTypes = ['pdf', 'jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'];

    if (inlineTypes.includes(fileExtension)) {
        // Open in new tab for viewable files
        window.open("archives?action=download&file=" + encodedFilePath, '_blank');
    } else {
        // Trigger download for other file types
        window.location.href = "archives?action=download&file=" + encodedFilePath;
    }
}

    $(document).ready(function () {
        loadFiles(); // Load root directory initially

        // Hide context menu when clicking elsewhere
        $(document).click(function () {
            hideContextMenu();
        });

        // Prevent hiding context menu when clicking inside
        $("#context-menu").click(function (event) {
            event.stopPropagation();
        });

        // Attach right-click event to all file/folder items
        $(document).on("contextmenu", ".file-item, .folder-item", function (event) {
            let filePath = $(this).data("path");
            let fullPath = $(this).data("fullpath");
            handleRightClick(event, filePath, fullPath);
        });

        // Handle double-click to open folder
        $(document).on("dblclick", ".folder-item", function () {
            let folder = $(this).data("path");
            openFolder(folder);
        });

        // Handle double-click to download file
        $(document).on("dblclick", ".file-item", function () {
            let filePath = $(this).data("path");
            downloadFile(filePath); // Trigger download
        });
    });

    function showFileUploadModal() {
    $("#fileUploadModal").modal('show');
}

// Handle file upload form submission
$(document).on("submit", "#fileUploadForm", function(event) {
    event.preventDefault();

    // Create FormData object to send the file
    var formData = new FormData(this);
    formData.append('action', 'upload'); // Add the action to identify this as an upload

    // Include the current path to upload the file to the correct folder
    formData.append('current_path', currentPath);

    // Make AJAX request to upload the file
    $.ajax({
        url: 'archives',  // Adjust this to your PHP script's URL
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            alert(response); // Handle success response
            $("#fileUploadModal").modal('hide');  // Hide the modal after upload
            loadFiles(currentPath); // Reload files in the current folder
        },
        error: function() {
            alert('There was an error uploading the file!');
        }
    });
});

function moveToFolder(folder) {
    // Perform the move action here
    $.ajax({
        url: 'archives', // Your server-side PHP file
        type: 'POST',
        data: {
            action: 'move_file',  // Action type
            source: selectedPath, // Source file to move
            destination: folder  // Destination folder
        },
        success: function(response) {
            alert(response); // Show success or error message
            $('#moveCopyModal').modal('hide'); // Close the modal after moving
            loadFiles(currentPath); // Reload the file list after move
        },
        error: function() {
            alert('An error occurred while moving the file.');
        }
    });
}



function deleteFolder() {


  Swal.fire({
        title: "Alert Warning!",
        showClass: {
    popup: `
      animate__animated
      animate__bounceIn
      animate__faster
    `
  },
  hideClass: {
    popup: `
      animate__animated
      animate__bounceOut
      animate__faster
    `
  },
        text: "Are you sure you want to delete this?",
        // type: 'info',
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.value) {
            Swal.fire({ title: 'Please wait...', 
              showClass: {
    popup: `
      animate__animated
      animate__bounceIn
      animate__faster
    `
  },
  hideClass: {
    popup: `
      animate__animated
      animate__bounceOut
      animate__faster
    `
  },
              imageUrl: '<?= asset("AdminLTE_new/dist/img/loader.gif");?>', showConfirmButton: false });
              $.ajax({
                  url: 'archives', // Your server-side PHP file
                  type: 'POST',
                  data: {
                      action: 'deleteFolder',  // Action type
                      source: selectedPath, // Source file to move
                  },
                  success: function(response) {
                      Swal.fire("Success!", response, "success");
                      $('#moveCopyModal').modal('hide'); // Close the modal after moving
                      loadFiles(currentPath); // Reload the file list after move
                  },
                  error: function() {
                      alert('An error occurred while moving the file.');
                  }
              });
        }
    });
    // Perform the move action here
    
}

</script>

