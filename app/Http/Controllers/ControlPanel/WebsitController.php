<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Websit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsitController extends Controller
{
    /**
     * this function for view website edit page
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $websit = Websit::latest()->first();

        return view('control-panel.setting.websit.edit',[
            'website' => $websit,
        ]);
    }


    /**
     * this function for update website setting in database or create new setting
     *
     * @param Illuminate\Http\Request $request
     *
     * @return \Illuminate\View\View
     */
    public function update(Request $request){

        $websit = Websit::latest()->first();

        if(!$websit){
            $request->validate([
                'websit_title' => 'required |string',
                'favicon_image' => 'image |required |mimes:png',
                'logo' => 'image |required |mimes:png',
                'email' => 'required |email |unique:websits',
                'telephone_number' => 'required |numeric |min:5 |unique:websits',
                'phone' => 'required |numeric |min:7 |unique:websits',
                'seo_keyword' => 'string |nullable',
                'facebook' => 'nullable |url',
                'twitter' => 'nullable |url',
                'youtube' => 'nullable |url',
                'whatsapp' => 'nullable |url',
                'instagram' => 'nullable |url',
                'linkedin' => 'nullable |url',
                'behance' => 'nullable |url',
            ]);
            $data = $request->all();

            $favicon_image = null;
            $logo = null;

            if($request->hasFile('favicon_image') && $request->file('favicon_image')->isValid()){
                $favicon_image = $request->file('favicon_image')->store('favicon_image','public');
            }

            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                $logo = $request->file('logo')->store('logo','public');
            }

            $data['favicon_image'] = $favicon_image;
            $data['logo'] = $logo;

            $webSetting = Websit::create($data);
        }else{
            $request->validate([
                'websit_title' => 'required |string',
                'favicon_image' => 'image |mimes:png',
                'logo' => 'image |mimes:png',
                'email' => ['required','email', "unique:websits,email,".$websit->id],
                'telephone_number' => ["numeric", "min:7"],
                'phone' => ["numeric", "min:7"],
                'seo_keyword' => 'string |nullable',
                'facebook' => 'nullable |url',
                'twitter' => 'nullable |url',
                'youtube' => 'nullable |url',
                'whatsapp' => 'nullable |url',
                'instagram' => 'nullable |url',
                'linkedin' => 'nullable |url',
                'behance' => 'nullable |url',
            ]);
            $data = $request->all();

            $favicon_image = $websit->favicon_image;
            $logo = $websit->logo;

            if($request->hasFile('favicon_image') && $request->file('favicon_image')->isValid()){
                Storage::disk('public')->delete($favicon_image);
                $favicon_image = $request->file('favicon_image')->store('favicon_image','public');
            }

            if($request->hasFile('logo') && $request->file('logo')->isValid()){
                Storage::disk('public')->delete($logo);
                $logo = $request->file('logo')->store('logo','public');
            }

            $data['favicon_image'] = $favicon_image;
            $data['logo'] = $logo;

            if(!$data['favicon_image']){
                $data['favicon_image'] = $websit->favicon_image;
            }

            if(!$data['logo']){
                $data['logo'] = $websit->logo;
            }

            $webSetting = $websit;

            $webSetting->update($data);
        }

        return redirect()->route('setting-website-edit',[
            'website' => $webSetting
        ])->with('success',__('Update Done!'));

    }
}
