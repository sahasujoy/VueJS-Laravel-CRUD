<?php

namespace App\Http\Controllers;

use App\Models\Land;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LandController extends Controller
{
    //
    public function landViewApi()
    {
        $lands = Land::all();
        return $lands;
    }

    public function storeLandApi(Request $req)
    {
        // print_r($_POST); // print js console.log
        // print_r($_FILES); // print js console.log
        $file = $req->file('image');
        $filename = '';
        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
        } else {
            $filename = '';
        }

        $landData = [
            'mouza_name' => $req->mouza_name,
            'size' => $req->size,
            'kcs' => $req->kcs,
            'ksa' => $req->ksa,
            'krs' => $req->krs,
            'kbs' => $req->kbs,
            'dcs' => $req->dcs,
            'dsa' => $req->dsa,
            'drs' => $req->drs,
            'dbs' => $req->dbs,
            'address' => $req->address,
            'image' => $filename,
        ];

        Land::create($landData);
        return response()->json([
            'status' => 200
        ]);
    }

    public function editLandApi($id)
    {
        $land = Land::find($id);
        return response()->json($land);
    }

    public function updateLandApi(Request $req, $id)
    {
        $filename = '';
        $land = Land::find($id);
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/images', $filename);
            if ($land->image) {
                Storage::delete('public/images', $land->image);
            }
        } else {
            $filename = $req->image;
        }
        $landData = [
            'mouza_name' => $req->mouza_name,
            'size' => $req->size,
            'kcs' => $req->kcs,
            'ksa' => $req->ksa,
            'krs' => $req->krs,
            'kbs' => $req->kbs,
            'dcs' => $req->dcs,
            'dsa' => $req->dsa,
            'drs' => $req->drs,
            'dbs' => $req->dbs,
            'address' => $req->address,
            'image' => $filename,
        ];

        $land->update($landData);
        return response()->json([
            'status' => 200,
            'message' => "Land data updated successfully!"
        ]);
    }

    public function deleteLandApi($id)
    {
        $land = Land::find($id);
        if ($land) {
            $land->delete();
            return response()->json([
                'message' => "Land Deleted Successfully!",
                'status' => 200
            ]);
        } else {
            return response()->json([
                'message' => "Land with id:$id does not exist!"
            ]);
        }
    }
}
