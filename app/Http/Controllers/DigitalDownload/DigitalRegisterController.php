<?php

namespace App\Http\Controllers\DigitalDownload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Band;
use Session;

class DigitalRegisterController extends Controller
{
    //
	public function simpan_band(Request $request){
		$this->validate($request,[
			'nama_band' => 'required',
			'genre' => 'required',
			'deskripsi' => 'required',
		]);

		$band = new Band;
		$band->id = $this->autocode('BND-');
		$band->users_id = Auth()->User()->id;
        $band->username = $this->get_username($request->nama_band);
		$band->nama_band = $request->nama_band;
		$band->genre = $request->genre;
		$band->deskripsi = $request->deskripsi;
		$band->status = "Aktif";
		$band->save();  	
		return redirect('digital-download/akun');
	}

	public function autocode($kode){
		$timestamp = time(); 
		$random = rand(10, 100);
		$current_date = date('mdYs'.$random, $timestamp); 
		return $kode.$current_date;
	}

    public function get_username($nama_band){
        $jumlah_kata = str_word_count($nama_band);
        // 1
        if($jumlah_kata == 1){
            $username = $nama_band;
            $band = Band::where('username', $username)->get();
            if(count($band)==0){
                return $username;
            }
            $angka = 1;
            $bool = "false";
            while($bool == "false"){
                $username = $nama_band.$angka;
                $band = band::where('username', $username)->get();
                if(count($band)==0){
                    return $username;
                    $bool = "true";
                }
                else{
                    $angka++;
                }
            }
        }
        // 2
        $username = str_replace(' ', '_', $nama_band);
        $band = band::where('username', $username)->get();
        if(count($band)==0){
            return $username;
        }
        $username = str_replace(' ', '', $nama_band);
        $band = band::where('username', $username)->get();
        if(count($band)==0){
            return $username;
        }

        $angka = 1;
        $bool = "false";
        while($bool == "false"){
            $username = $username.$angka;
            $band = band::where('username', $username)->get();
            if(count($band)==0){
                return $username;
                $bool = "true";
            }
            else{
                $angka++;
            }
        }
    }	

}

