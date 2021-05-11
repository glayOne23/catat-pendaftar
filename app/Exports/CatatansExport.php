<?php

namespace App\Exports;

use App\Models\Catatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CatatansExport implements FromView
{

    public function view(): View
    {
        $catatans = Catatan::latest()->get();
        $all_catatan = [];
        for ($i=0; $i < count($catatans) ; $i++) {

            $bersihkan = ltrim($catatans[$i]["catatan"], '#');
            // dd($bersihkan);
            $catatan = explode("#", $bersihkan);

            $temp = [
                'id' => $catatans[$i]["id"],
                'created_at' => $catatans[$i]["created_at"],
                'updated_at' => $catatans[$i]["updated_at"],
                'catatan' => $catatan,
                'original_catatan' => $catatans[$i]["catatan"]
            ];
            array_push($all_catatan, $temp);
        }

        return view('exports.catatans', compact('all_catatan'));
    }
}
