<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
class FileController extends Controller
{
	public function index()
	{
		return view('files.index');
	}

	public function file(Request $request)
	{
		if(! $request->hasFile('images')){
			return redirect()->back();
		}

		foreach ($request->file('images') as $image) {
			$dirname = 'article_images';
			$fileName = time() . '_' . $image->getClientOriginalName();
			$filePath = $images->storeAs($dirname, $fileName, ['disk' => 'article']);
			$pathToFile = \Storage::disk('article')->getDriver()->getAdapter()->getPathPrefix();
			$whereToSave = $pathToFile . $dirname. '/' .  'th-' . $fileName;            
			Image::make($pathToFile.$filePath)->fit(40)->save($whereToSave);
		}

		return redirect()->back();

	}
}