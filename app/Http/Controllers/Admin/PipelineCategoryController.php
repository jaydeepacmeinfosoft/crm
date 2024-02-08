<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PipelineCategory;
use Illuminate\Support\Facades\Validator;
class PipelineCategoryController extends Controller
{
    public function showpage()
    {

        return view('admin.pipeline_category', ['category' => PipelineCategory::orderBy('id', 'desc')->get()]);
    }


    //edit code
    public function edit(PipelineCategory $item)
    {
        return response()->json($item);
    }

    //store code
    public function store(Request $request)
    {
        $rules = [
            'category' => [
                'required',
                PipelineCategory::unique('pipelinecategories')->where(function ($query) use ($request) {
                    return $query->where('company_id', $request->company_id);
                }),
            ],
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->messages(),
            ], 500);
        }
    
        $data = [
            'category' => $request->category,
            'company_id' => $request->company_id,
        ];
    
        $category = PipelineCategory::updateOrCreate(
            ['id' => $request->id],
            $data
        );
    
        return response()->json($category);
    }
    
    


    //delete code
    public function destroy($id)
    {
        $item = PipelineCategory::where('id', $id)->first();
        $item->delete();
        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }
}
