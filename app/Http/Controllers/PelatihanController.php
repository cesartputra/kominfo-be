<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use Illuminate\Http\Request;

class PelatihanController extends Controller
{
    public function index(){
        $pelatihan = Pelatihan::all();
        $approvedPelatihan = Pelatihan::where('is_approved', '=', 'approved')->get();
        $rejectedPelatihan = Pelatihan::where('is_approved', '=', 'reject')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Pelatihan Berhasil Ditambahkan',
            'data' => [
                'pelatihan_data' => $pelatihan,
                'approved_pelatihan' => $approvedPelatihan,
                'rejected_pelatihan' => $rejectedPelatihan
            ] 
        ]);
    }

    public function addPelatihan(Request $request){
        $request->validate([
            'nama_pelatihan' => 'required',
            'deskripsi_pelatihan' => 'required',
            'tanggal_mulai_pelatihan' => 'required',
            'tanggal_selesai_pelatihan' => 'required'
        ]);

        $pelatihan = Pelatihan::create([
            'user_id',
            'nama_pelatihan' => $request->nama_pelatihan,
            'deskripsi_pelatihan' => $request->deskripsi_pelatihan,
            'tanggal_mulai_pelatihan' => $request->tanggal_mulai_pelatihan,
            'tanggal_selesai_pelatihan' => $request->tanggal_selesai_pelatihan
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pelatihan Berhasil Ditambahkan',
            'data' => $pelatihan 
        ]);
    }

    public function editPelatihan(Request $request, $id){
        $pelatihan = Pelatihan::findOrFail($id);
        if($pelatihan->is_approved == 'approved'){
            return response()->json([
                'status' => 'failed',
                'message' => 'Status Pelatihan Sudah Disetujui'
            ]);
        }
        $request->validate([
            'nama_pelatihan' => 'required',
            'deskripsi_pelatihan' => 'required',
            'tanggal_mulai_pelatihan' => 'required',
            'tanggal_selesai_pelatihan' => 'required'
        ]);

        $updatedPelatihan = $pelatihan->update([
            'nama_pelatihan' => $request->nama_pelatihan,
            'deskripsi_pelatihan' => $request->deskripsi_pelatihan,
            'tanggal_mulai_pelatihan' => $request->tanggal_mulai_pelatihan,
            'tanggal_selesai_pelatihan' => $request->tanggal_selesai_pelatihan
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Pelatihan Berhasil Diubah',
            'data' => $updatedPelatihan 
        ]);
    }

    public function deletePelatihan($id){
        $pelatihan = Pelatihan::findOrFail($id);
        if($pelatihan->is_approved == 'approved'){
            return response()->json([
                'status' => 'failed',
                'message' => 'Status Pelatihan Sudah Disetujui'
            ]);
        }

        $pelatihan->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Pelatihan Berhasil Dihapus'
        ]);
    }

    public function approvalPelatihan(Request $request, $id){
        $pelatihan = Pelatihan::findOrFail($id);

        $statusApproval = $request->status_approval;

        $updatedPelatihan = $pelatihan->update([
            'is_approved' => $statusApproval
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Status Pelatihan Berhasil Diperbaharui',
            'data' => $updatedPelatihan
        ]);
    }
}
