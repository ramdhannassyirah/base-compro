<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index(){
        $setting = Setting::first();
        return Inertia::render('Admin/Setting/Index',[
            'setting' => $setting
        ]);
    }

    public function update(Request $request, Setting $setting)
{
    $data = $request->all();

    if ($request->hasFile('logo')) {
        if ($setting->logo) {
            Storage::disk('public')->delete($setting->logo);
        }
        $data['logo'] = $request->file('logo')->store('website', 'public');
    }

    $setting->update($data);

    return back()->with('success', 'Pengaturan website berhasil diperbarui.');
}

public function deleteLogo(Setting $setting)
{
    if ($setting->logo) {
        Storage::disk('public')->delete($setting->logo);
        $setting->update(['logo' => null]);
    }

    return back()->with('success', 'Logo berhasil dihapus.');
}



}