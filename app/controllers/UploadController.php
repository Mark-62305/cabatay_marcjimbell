<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UploadController extends Controller
{
    public function index()
    {
        // Show upload form
        return $this->call->view('upload_form');
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
            // Load Upload library
            $this->call->library('upload', $_FILES['file']);

            $upload = new Upload($_FILES['file']);

            $upload->set_dir(__DIR__ . '/../../public/uploads') // Save to public/uploads
                   ->allowed_extensions(['jpg','png','jpeg','gif'])
                   ->allowed_mimes(['image/jpg','image/jpeg','image/png','image/gif'])
                   ->max_size(5) // 2 MB
                   ->is_image();

            if($upload->do_upload()) {
                $filename = $upload->get_filename();
                $url = '/public/uploads/' . $filename; // Accessible in browser

                return $this->call->view('upload_success', ['url' => $url]);
            } else {
                print_r($upload->get_errors());
            }
        } else {
            echo "❌ No file uploaded.";
        }
    }
}
