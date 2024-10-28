<?php

namespace App\Http\Controllers\Recruiter;

use Illuminate\Routing\Controller;
use App\Http\Requests\Company\UpdateRequest;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function update(UpdateRequest $request): CompanyResource
    {
        $company = auth()->guard()->user()->company;

        if ($request->hasFile('logo')) {
            Storage::delete($company->logo);
            $company->logo = $request->file('logo')->store('company_logos');
        }

        if ($request->hasFile('banner_image')) {
            Storage::delete($company->banner_image);
            $company->banner_image = $request->file('banner_image')->store('company_banners');
        }

        $company->update($request->except(['logo', 'banner_image', 'locations']));

        if ($request->has('locations')) {
            $company->locations()->delete();
            $company->locations()->createMany($request->locations);
        }

        return new CompanyResource($company->load('locations'));
    }
}
?>
