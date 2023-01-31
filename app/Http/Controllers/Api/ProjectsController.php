<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;
use Illuminate\Database\Eloquent\Builder;
class ProjectsController extends Controller
{
    public function index(){

        $projects = Project::with(['type','technologies'])->paginate(6);
        $types =  Type::all();
        $technologies = Technology::all();
        return response()->json(compact('projects','types','technologies'));
    }

    public function show($slug){
        $project = Project::where('slug', $slug)->with(['type','technologies'])->first();
        if($project->cover_image){
            $project->cover_image = url("storage/" . $project->cover_image);
        }else{
            $project->cover_image = url("storage/uploads/placeholder.jpg");
        }

        return response()->json($project);
    }

    public function search(){

        $tosearch = $_POST['tosearch'];

        $projects = Project::where('name','like', "%$tosearch%")->with(['type','technologies'])->find();

        return response()->json(compact('projects'));
    }

    public function searchByType($id){

        $projects = Project::where('type_id', $id)->with(['type','technologies'])->get();

        return response()->json(compact('projects'));
    }

    public function searchByTechnology($id){

        // $projects = [];

        // $technology = Technology::where('id',$id)->with(['projects'])->first();

        // foreach ($technology->projects as $project) {
        //     $projects[] = Project::where('id', $project->id)->with(['type','technologies'])->first();
        // }

        $projects = Project::with(['type','technologies'])->whereHas('technologies', function(Builder $query) use($id){
            $query->where('technology_id',$id);
        })->get();

        return response()->json($projects);
    }
}
