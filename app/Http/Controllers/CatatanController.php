<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catatan;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CatatansExport;

class CatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            // array_push($temp, $catatans[$i]["id"]);
            // array_push($temp, $catatans[$i]["created_at"]);
            // array_push($temp, $catatans[$i]["updated_at"]);
            // array_push($temp, $catatan);
            array_push($all_catatan, $temp);
        }
        // dd($all_catatan);
        return view('index', compact('all_catatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $errors = $request->validate([
            'catatan' => 'required',
        ]);

        DB::beginTransaction();
        $all_catatan = explode(",", $request->catatan);
        for ($i=0; $i < count($all_catatan) ; $i++) {
            $catatan = str_replace(array("\r", "\n"), '', $all_catatan[$i]);
            $catatan = trim($catatan);
            if ($catatan == "") {
                //
            }
            else{
                Catatan::create([
                    'catatan' => $catatan,
                ]);
            }
            // array_push($data, $catatan);
        }
        #Muhammad Hammam Islami#A#20000,
        #Anto Kewer#B#12000,
        #Budi Sutanto#A#30000,
        // dd($data);
        DB::commit();
        return redirect()->route('index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catatan $catatan)
    {
        $errors = $request->validate([
            'catatan' => 'required',
        ]);

        $temp_catatan = str_replace(array("\r", "\n"), '', $request->catatan);
        $temp_catatan = trim($temp_catatan);
        $catatan->update([
            'catatan' => $temp_catatan,
        ]);

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Catatan $catatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catatan $catatan)
    {
        $catatan->delete();
        return redirect()->route('index');
    }

    public function export(){
        return Excel::download(new CatatansExport, "catatan.xlsx");
    }
}
