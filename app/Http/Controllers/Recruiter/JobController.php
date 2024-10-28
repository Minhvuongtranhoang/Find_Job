<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
  public function store(Request $request)
  {
      $request->validate([
          'title' => 'required',
          'location_id' => 'required|exists:company_locations,id',
          'deadline' => 'required|date',
          'description' => 'required',
          'requirements' => 'required',
          'benefits' => 'required',
          'working_hours' => 'required',
          'salary' => 'required',
          'categories' => 'required|array'
      ]);

      $job = auth()->guard()->user()->recruiter->company->jobs()->create($request->except('categories'));
      $job->categories()->attach($request->categories);

      return redirect()->route('recruiter.jobs.index')
          ->with('success', 'Job posted successfully and pending approval');
  }

  public function update(Request $request, Job $job)
  {
      $this->authorize('update', $job);

      $request->validate([
          'title' => 'required',
          'location_id' => 'required|exists:company_locations,id',
          'deadline' => 'required|date',
          'description' => 'required',
          'requirements' => 'required',
          'benefits' => 'required',
          'working_hours' => 'required',
          'salary' => 'required',
          'categories' => 'required|array'
      ]);

      $job->update($request->except('categories'));
      $job->categories()->sync($request->categories);

      return back()->with('success', 'Job updated successfully');
  }

  public function destroy(Job $job)
  {
      $this->authorize('delete', $job);

      $job->delete();
      return redirect()->route('recruiter.jobs.index')
          ->with('success', 'Job deleted successfully');
  }
}
