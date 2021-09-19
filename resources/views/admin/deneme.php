//            $find=Category::find($key);
//            $find->category_name=$value;
//            $find->save();
}

/*  foreach ($request->input("sub_category") as $value)
{
$categorysave = Category::create(
['id' => $value],
[
'category_name' => $value,
]
);
}*/

// name=sub_category[]
/* $subeditcategory = DB::table('category')
->where('top_id', $request->input('id'))
->pluck('id');*/

//            $categorysave = Category::updateOrCreate(
//                ['id' => $request->id],
//                [
//                    'category_name' => $request->category_name,
//                ]
//            );
