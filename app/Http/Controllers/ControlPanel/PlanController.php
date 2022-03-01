<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlaneRequest;
use App\Models\Feature;
use App\Models\Plan;
use App\Models\SubService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function show(SubService $service)
    {
        # code...
        return view('control-panel.plans.index',[
            'sub_service' => $service,
        ]);
    }

    public function create(SubService $service)
    {
        # code...
        return view('control-panel.plans.create',[
            'sub_service' => $service,
        ]);
    }

    public function store(StorePlaneRequest $request)
    {
        # code...
        $data = $request->validated();

        //dd($data);
        $plan = Plan::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'sub_service_id' => $data['sub_service_id'],
            'during' => $data['during'],
        ]);

        for($i = 0;$i<count($data['featureName']);++$i)
        {
            $plan->features()->create([
                'name' => $data['featureName'][$i],
                'value' => $data['featureValue'][$i],
            ]);
        }

        return redirect()->route('plans.show',$plan->sub_service_id)
                        ->with('success','Plan created successfully');
    }

    public function edit(Plan $plan)
    {
        # code...
        return view('control-panel.plans.edit',[
            'plan' => $plan,
        ]);
    }

    public function update(StorePlaneRequest $request,Plan $plan)
    {
        //dd($request->validated());
        $data = $request->validated();
        $plan->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'type' => $data['type'],
            'sub_service_id' => $data['sub_service_id'],
            'during' => $data['during'],
        ]);

        Feature::where('plan_id',$plan->id)->delete();

        for($i = 0;$i<count($data['featureName']);++$i)
        {
            $plan->features()->create([
                'name' => $data['featureName'][$i],
                'value' => $data['featureValue'][$i],
            ]);
        }

        return redirect()->route('plans.show',$plan->sub_service_id)
                        ->with('success','Plan updated successfully');
    }

    public function destroy(Plan $plan)
    {
        # code...
        $plan->delete();
        return redirect()->route('plans.show',$plan->sub_service_id)
                        ->with('success','Plan deleted successfully');
    }
}
