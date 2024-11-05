<?php
// app/Http/Controllers/JobSeeker/HomeController.php
namespace App\Http\Controllers\JobSeeker;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;
use App\Models\Category;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $featuredJobs = Job::where('is_featured', true)
            ->where('status', 'approved')
            ->limit(5)
            ->get();
        $popularCategories = Category::all();
        $featuredCompanies = Company::limit(5)->get();
        $jobs = Job::where('status', 'approved')->get(); // Lấy danh sách tất cả công việc

        return view('job_seekr.home', compact('featuredJobs', 'popularCategories', 'featuredCompanies', 'jobs'));
    }
}
