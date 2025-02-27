<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;


class FileController extends Controller
{
    
    public function upload(Request $request)
    {
       
        $request->validate([
            'applicantname' => 'required|string|max:255',
            'applicationType' => 'required|string',
            'files' => 'required|array',
            'files.*' => 'file|mimes:pdf|max:20240', 
        ], [
            'applicantname.required' => 'Applicant name is required.',
            'applicationType.required' => 'Please select an application type.',
            'files.required' => 'Please select at least one file to upload.',
            'files.*.mimes' => 'Only PDF files are allowed.',
            'files.*.max' => 'File size must not exceed 20MB.',
        ]);
    
       
        if (!$request->hasFile('files')) {
            return back()->with('error', 'No files selected for upload.');
        }
    
        
        $applicantName = $request->input('applicantname');
        $applicationType = $request->input('applicationType');
    
        foreach ($request->file('files') as $file) {
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $fileName = $originalName . '.' . $extension;
    
         
            $counter = 1;
            while (Files::where('file_name', $fileName)->exists()) {
                $fileName = $originalName . " ($counter)." . $extension;
                $counter++;
            }
    
            
            $filePath = $file->storeAs('uploads', $fileName, 'public');
    
            
            Files::create([
                'applicantname' => $applicantName,
                'applicationType' => $applicationType,
                'file_name' => $fileName,
                'file_path' => $filePath,
            ]);
        }
    
        return back()->with('success', 'Files uploaded successfully!');
    }

//for scanning pdf
//     public function upload(Request $request)
// {
//     $request->validate([
//         'files' => 'required|array',
//         'files.*' => 'file|mimes:docx|max:20240',
//     ]);

//     if (!$request->hasFile('files')) {
//         return back()->with('error', 'No files selected for upload.');
//     }

//     foreach ($request->file('files') as $file) {
//         $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
//         $extension = $file->getClientOriginalExtension();
//         $fileName = $originalName . '.' . $extension;
        
//         
//         $counter = 1;
//         while (Files::where('file_name', $fileName)->exists()) {
//             $fileName = $originalName . " ($counter)." . $extension;
//             $counter++;
//         }

//         
//         $filePath = $file->storeAs('uploads', $fileName, 'public');

//         
//         $pdfFilePath = 'uploads/' . $originalName . '.pdf';
//         $this->convertDocxToPdf(storage_path("app/public/{$filePath}"), storage_path("app/public/{$pdfFilePath}"));

       
//         Files::create([
//             'file_name' => $fileName,
//             'file_path' => $filePath,
//         ]);

//         return back()->with('success', 'File uploaded and converted to scanned PDF successfully!');
//     }
// }

//docx to pdf
// private function convertDocxToPdf($docxPath, $pdfPath)
// {
//     
//     $phpWord = \PhpOffice\PhpWord\IOFactory::load($docxPath);

//   
//     $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
//     ob_start();
//     $htmlWriter->save('php://output');
//     $htmlContent = ob_get_clean();

//   
//     $dompdf = new \Dompdf\Dompdf();
//     $dompdf->loadHtml($htmlContent);

//    
//     $dompdf->setPaper('A4'); 

//     $dompdf->render();

//     file_put_contents($pdfPath, $dompdf->output());
// }

    public function listFiles()
    {
        $files = Files::all();
        return view('files', compact('files'));
    }

    public function download($files_id)
    {
        $file = Files::where('files_id', $files_id)->firstOrFail(); 
    
        $filePath = storage_path("app/public/{$file->file_path}"); 
    
        if (file_exists($filePath)) {
            return response()->download($filePath, $file->file_name);
        } else {
            return back()->with('error', 'File not found.');
        }
    }

    public function viewFile($id)
    {
        $file = Files::where('files_id', $id)->firstOrFail(); 
    
        return response()->file(storage_path("app/public/{$file->file_path}"));
    }
}
