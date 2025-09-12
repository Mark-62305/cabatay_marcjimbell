<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class FileUpload extends Controller {

    public function __construct() {
        parent::__construct();
    }

    // Show upload form
    public function index() {
        $this->call->view('upload_form');
    }

    // Handle upload
    public function store() {
        // Load the Upload library with the file
        $upload = new Upload($_FILES['userfile']);

        // Configure upload rules
        $upload->set_dir('./public/uploads')
               ->allowed_extensions(['jpg','jpeg','png','gif','pdf'])
               ->allowed_mimes(['image/jpg','image/jpeg','image/png','image/gif','application/pdf'])
               ->max_size(2)      // 2MB
               ->encrypt_name();  // randomize filename

        if ($upload->do_upload()) {
            $data['success'] = "Upload successful! Saved as: " . $upload->get_filename();
        } else {
            $errors = $upload->get_errors();
            $data['error'] = implode("<br>", $errors);
        }

        $this->call->view('upload_form', $data);
    }
}
