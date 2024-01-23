<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DocumentController extends Controller
{
    /**
     * Return docx file (1st other task)
     * @return BinaryFileResponse
     * @throws \PhpOffice\PhpWord\Exception\Exception
     */
    public function generateDocx(): BinaryFileResponse
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $description = "To Do List";
        $tasks = collect(Task::all())->all();
        foreach ($tasks as $item){
            $description .= "$item->id -> $item->creator -> $item->executor -> $item->name -> $item->status;  ";
        }

        $section->addText($description);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {
        }
        return response()->download(storage_path('helloWorld.docx'));
    }
}
