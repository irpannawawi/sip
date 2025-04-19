<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Models\req;
use Illuminate\Support\Facades\Hash;

class ReqController extends Controller
{
    public function index(){
        $reqs = Maintenance::all();
        return view('request.index',compact('reqs'));
    }

    public function create(){
        return view('request.create');
    }

    public function store(Request $request){
        $request->validate([
            'request_date' => 'required|date',
            'requester_name' => 'required',
            'perihal' => 'required',
            'problem' => 'required',
            'location' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'no_mwo' => $this->getMwo(),
            'request_date' => $request->request_date,
            'requester_name' => $request->requester_name,
            'input_by' => auth()->user()->id,
            'perihal' => $request->perihal,
            'problem' => $request->problem,
            'location' => $request->location,
            'status' => 'Open',
        ];
      
        
        // save the image to the public folder
        $filename = $data['no_mwo'] .'.'.$request->foto->extension();
        $data['foto'] = $filename;
        $request->foto->move(public_path('../../images'), $filename);
        // save the data to the database
        Maintenance::create($data);
        return redirect()->route('request.index')->with('success','req created successfully');
    }

    public function print($id){
        $maintenance = Maintenance::find($id);
        return view('request.print', compact('maintenance'));
    }

    public function edit($id){
        $maintenance = Maintenance::find($id);
        return view('request.edit',compact('maintenance'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'request_date' => 'required|date',
            'requester_name' => 'required',
            'perihal' => 'required',
            'problem' => 'required',
            'location' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $maintenance = Maintenance::find($id);
        $maintenance->request_date = $request->request_date;
        $maintenance->requester_name = $request->requester_name;
        $maintenance->perihal = $request->perihal;
        $maintenance->problem = $request->problem;
        $maintenance->location = $request->location;
        if($request->hasFile('foto')){
            // remove the old image from the public folder
            $image_path = public_path('../../images').'/'.$maintenance->foto;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            
            $filename = $maintenance->no_mwo .'.'.$request->foto->extension();
            $maintenance->foto = $filename;
            $request->foto->move(public_path('../../images'), $filename);
        }
        $maintenance->save();
        return redirect()->route('request.index')->with('info','req updated successfully');
    }

    public function destroy($mwo){

        $req = Maintenance::find($mwo);
        // remove the image from the public folder
        $image_path = public_path('../../images').'/'.$req->foto;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        // delete the data from the database
        $req->delete();

        return redirect()->route('request.index')->with('info','req deleted successfully');

    }

    public function getMwo(){
        $req = Maintenance::orderBy('no_mwo','desc')->first();
        
        if($req == null){
            return date('dmY').'-001';
        }else{
            $no_mwo = substr($req->no_mwo, 9, 3);
            $no_mwo = (int)$no_mwo;
            $no_mwo = $no_mwo + 1;
            
            return date('dmY').'-'.str_pad($no_mwo, 3, '0', STR_PAD_LEFT);
        }
    }
}
