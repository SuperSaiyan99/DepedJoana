<?php

namespace App\Livewire\SelectionBoard;

use Livewire\Component;
use Org_Heigl\Ghostscript\Ghostscript;
use Spatie\PdfToImage\Pdf;

class PdfCarousel extends Component
{
    public $pdfFile;
    public $images = [];
    private $GsExecutableLocation = "C:\Program Files\gs\gs9.24\bin\gswin64c.exe";

    public function mount()
    {
        // TODO: ADD APPLICANTS ID FOR PDF STORAGE
        $this->pdfFile = 'J:\laravel-projects\DepedJoana\public\storage\isko.pdf';  // example file path
        $this->convertPdfToImages();
    }

    #TODO: PUT THIS ON SUBMIT FORM IN APPLICANTS SIDE
    public function convertPdfToImages()
    {
        Ghostscript::setGsPath($this->GsExecutableLocation);
        $pdf = new Pdf($this->pdfFile);

        $totalPages = $pdf->getNumberOfPages();
        for ($page = 1; $page <= $totalPages; $page++) {

            $pdf->setPage($page);

            #TODO: Change image name into format APPLICANT ID-UUID-TIME-PAGE FORMAT
            $imageName = uuid_create() . '-page-' . $page . '.jpg';
            $imagePath = 'app/public/pdf-images/' . $imageName;
            $pdf->saveImage(storage_path($imagePath));

            // Store the URLs for the carousel display
            $this->images[] = route('selection-board.image', ['filename' => $imageName]);
        }
    }

    public function render()
    {
        return view('livewire.selection-board.pdf-carousel');
    }
}