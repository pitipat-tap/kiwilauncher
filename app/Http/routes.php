<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get("/", "WebController@index");
Route::get("skills-and-process", array("as" => "skills", "uses" => "WebController@skills"));
Route::get("works", array("as" => "works", "uses" => "WebController@works"));
Route::get("works/{category}", array("as" => "works-category", "uses" => "WebController@workCategory"));
Route::get("works/drseoul", array("as" => "worksDrseoul", "uses" => "WebController@works_drseoul"));
Route::get("work/{url}", array("as" => "work-post", "uses" => "WebController@workPost"));
Route::get("blog", array("as" => "blog", "uses" => "WebController@blog"));
Route::get("blog/{url}", array("as" => "blog-post", "uses" => "WebController@blogPost"));
Route::get("contact-us", array("as" => "contact", "uses" => "WebController@contact"));

Route::group(array('middleware' => 'auth.staff.already', 'prefix' => 'admin'), function(){
	Route::get("login", array("as" => "admin-login", "uses" => "AdminAuthController@login"));
    Route::post("login", array("as" => "admin-auth", "uses" => "AdminAuthController@authenticate"));
    Route::get("register", array("as" => "admin-register", "uses" => "AdminAuthController@register"));
    Route::post("register", array("as" => "admin-create", "uses" => "AdminAuthController@create"));
});

Route::group(array('middleware' => 'auth.staff', 'prefix' => 'admin'), function(){
	// Commons
	Route::get('/', array("as" => "admin", "uses" => 'AdminCommonController@index'));
	Route::get("editprofile", array("as" => "admin-profile-edit", "uses" => "AdminCommonController@editProfile"));
	Route::patch("editprofile", array("as" => "admin-profile-update", "uses" => "AdminCommonController@updateProfile"));
	Route::get("logout", array("as" => "admin-logout", "uses" => "AdminAuthController@logout"));
	
	
	// Blog Post
	Route::get("blogposts", array("as" => "admin-blog-posts", "uses" => "AdminBlogController@blogPosts"));
	Route::get("blogposts/new", array("as" => "admin-blog-post-new", "uses" => "AdminBlogController@newBlogPost"));
	Route::post("blogposts/new", array("as" => "admin-blog-post-create", "uses" => "AdminBlogController@createBlogPost"));
	Route::get("blogposts/{id}", array("as" => "admin-blog-post-preview", "uses" => "AdminBlogController@previewBlogPost"));
    Route::post("blogposts/livepreview", array("as" => "admin-blog-post-livepreview", "uses" => "AdminBlogController@livePreviewBlogPost"));
	Route::get("blogposts/{id}/edit", array("as" => "admin-blog-post-edit", "uses" => "AdminBlogController@editBlogPost"));
	Route::patch("blogposts/{id}", array("as" => "admin-blog-post-update", "uses" => "AdminBlogController@updateBlogPost"));
	Route::delete("blogposts/{id}", array("as" => "admin-blog-post-delete", "uses" => "AdminBlogController@deleteBlogPost"));
	
	
	// Blog Tag
	Route::get("blogtags", array("as" => "admin-blog-tags", "uses" => "AdminBlogController@blogTags"));
	
	
	// Image Post
	Route::get("imageposts", array("as" => "admin-image-posts", "uses" => "AdminImageController@imagePosts"));
	Route::get("imageposts/new", array("as" => "admin-image-post-new", "uses" => "AdminImageController@newImagePost"));
	Route::post("imageposts/new", array("as" => "admin-image-post-create", "uses" => "AdminImageController@createImagePost"));
	Route::get("imageposts/{id}", array("as" => "admin-image-post-preview", "uses" => "AdminImageController@previewImagePost"));
    Route::post("imageposts/livepreview", array("as" => "admin-image-post-livepreview", "uses" => "AdminImageController@livePreviewImagePost"));
	Route::get("imageposts/{id}/edit", array("as" => "admin-image-post-edit", "uses" => "AdminImageController@editImagePost"));
	Route::patch("imageposts/{id}", array("as" => "admin-image-post-update", "uses" => "AdminImageController@updateImagePost"));
	Route::delete("imageposts/{id}", array("as" => "admin-image-post-delete", "uses" => "AdminImageController@deleteImagePost"));
	
	
	// Image Tag
	Route::get("imagetags", array("as" => "admin-image-tags", "uses" => "AdminImageController@imageTags"));
	Route::delete("imagetags/{id}", array("as" => "admin-blog-tag-delete", "uses" => "AdminImageController@deleteImageTag"));
	
	
	// File manager
	Route::get("filemanager", array("as" => "admin-filemanager", "uses" => "AdminCommonController@fileManager"));
	
	
	// Ajax
	// Dashboard
	Route::post("statistic-graph", array("as" => "admin-statistic-graph", "uses" => "AdminCommonController@statisticGraph"));
});

Route::group(array('middleware' => 'auth.admin', 'prefix' => 'admin'), function(){
	// Blog post
	Route::get("blogposts/{id}/togglefeatured", array("as" => "admin-blog-post-togglefeatured", 
		"uses" => "AdminBlogController@toggleFeaturedBlogPost"));
		
	
	// Blog tag
	Route::delete("blogtags/{id}", array("as" => "admin-blog-tag-delete", "uses" => "AdminBlogController@deleteBlogTag"));
	Route::get("blogtags/{id}/togglefeatured", array("as" => "admin-blog-tag-togglefeatured", 
		"uses" => "AdminBlogController@toggleFeaturedBlogTag"));
		
		
	// Image post
	Route::get("imageposts/{id}/togglefeatured", array("as" => "admin-image-post-togglefeatured", 
		"uses" => "AdminImageController@toggleFeaturedImagePost"));
		
		
	// Image tag
	Route::delete("imagetags/{id}", array("as" => "admin-image-tag-delete", "uses" => "AdminImageController@deleteImageTag"));
	Route::get("imagetags/{id}/togglefeatured", array("as" => "admin-image-tag-togglefeatured", 
		"uses" => "AdminImageController@toggleFeaturedImageTag"));
	
	
	// User
	Route::get("users", array("as" => "admin-users", "uses" => "AdminUserController@users"));
	Route::get("users/new", array("as" => "admin-user-new", "uses" => "AdminUserController@newUser"));
	Route::post("users/new", array("as" => "admin-user-create", "uses" => "AdminUserController@createUser"));
	Route::get("users/{id}/edit", array("as" => "admin-user-edit", "uses" => "AdminUserController@editUser"));
	Route::patch("users/{id}", array("as" => "admin-user-update", "uses" => "AdminUserController@updateUser"));
	Route::delete("users/{id}", array("as" => "admin-user-delete", "uses" => "AdminUserController@deleteUser"));

	//Work Post
	Route::get("workposts", array("as" => "adminWorkPosts", "uses" => "AdminWorkController@workPosts"));
	Route::get("workposts/new", array("as" => "adminWorkPostNew", "uses" => "AdminWorkController@newWorkPost"));
	Route::post("workposts/new", array("as" => "adminWorkPostCreate", "uses" => "AdminWorkController@createWorkPost"));
	Route::get("workposts/{id}", array("as" => "adminWorkPostPreview", "uses" => "AdminWorkController@previewWorkPost"));
	Route::post("workposts/livepreview", array("as" => "adminWorkPostLivePreview", "uses" => "AdminWorkController@livePreviewWorkPost"));
	Route::get("workposts/{id}/edit", array("as" => "adminWorkPostEdit", "uses" => "AdminWorkController@editWorkPost"));
	Route::patch("workposts/{id}", array("as" => "adminWorkPostUpdate", "uses" => "AdminWorkController@updateWorkPost"));
	Route::delete("workposts/{id}", array("as" => "adminWorkPostDelete", "uses" => "AdminWorkController@deleteWorkPost"));

	Route::get("workposts/{id}/togglefeatured", array("as" => "adminWorkPostTogglefeatured", 
		"uses" => "AdminBlogController@toggleFeaturedBlogPost"));

});
