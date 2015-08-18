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
Route::get("blog", array("as" => "blog", "uses" => "WebController@blog"));
Route::get("contact-us", array("as" => "contact", "uses" => "WebController@contact"));

Route::group(array('middleware' => 'auth.staff.already', 'prefix' => 'admin'), function(){
	Route::get("login", array("as" => "adminLogin", "uses" => "AdminAuthController@login"));
    Route::post("login", array("as" => "adminAuth", "uses" => "AdminAuthController@authenticate"));
    Route::get("register", array("as" => "adminRegister", "uses" => "AdminAuthController@register"));
    Route::post("register", array("as" => "adminCreate", "uses" => "AdminAuthController@create"));
});

Route::group(array('middleware' => 'auth.staff', 'prefix' => 'admin'), function(){
	// Commons
	Route::get('/', array("as" => "admin", "uses" => 'AdminCommonController@index'));
	Route::get("editprofile", array("as" => "adminProfileEdit", "uses" => "AdminCommonController@editProfile"));
	Route::patch("editprofile", array("as" => "adminProfileUpdate", "uses" => "AdminCommonController@updateProfile"));
	Route::get("logout", array("as" => "adminLogout", "uses" => "AdminAuthController@logout"));
	
	
	// Blog Post
	Route::get("blogposts", array("as" => "adminBlogPosts", "uses" => "AdminBlogController@blogPosts"));
	Route::get("blogposts/new", array("as" => "adminBlogPostNew", "uses" => "AdminBlogController@newBlogPost"));
	Route::post("blogposts/new", array("as" => "adminBlogPostCreate", "uses" => "AdminBlogController@createBlogPost"));
	Route::get("blogposts/{id}", array("as" => "adminBlogPostPreview", "uses" => "AdminBlogController@previewBlogPost"));
    Route::post("blogposts/livepreview", array("as" => "adminBlogPostLivepreview", "uses" => "AdminBlogController@livePreviewBlogPost"));
	Route::get("blogposts/{id}/edit", array("as" => "adminBlogPostEdit", "uses" => "AdminBlogController@editBlogPost"));
	Route::patch("blogposts/{id}", array("as" => "adminBlogPostUpdate", "uses" => "AdminBlogController@updateBlogPost"));
	Route::delete("blogposts/{id}", array("as" => "adminBlogPostDelete", "uses" => "AdminBlogController@deleteBlogPost"));
	
	
	// Blog Tag
	Route::get("blogtags", array("as" => "adminBlogTags", "uses" => "AdminBlogController@blogTags"));
	
	
	// Image Post
	Route::get("imageposts", array("as" => "adminImagePosts", "uses" => "AdminImageController@imagePosts"));
	Route::get("imageposts/new", array("as" => "adminImagePostNew", "uses" => "AdminImageController@newImagePost"));
	Route::post("imageposts/new", array("as" => "adminImagePostCreate", "uses" => "AdminImageController@createImagePost"));
	Route::get("imageposts/{id}", array("as" => "adminImagePostPreview", "uses" => "AdminImageController@previewImagePost"));
    Route::post("imageposts/livepreview", array("as" => "adminImagePostLivepreview", "uses" => "AdminImageController@livePreviewImagePost"));
	Route::get("imageposts/{id}/edit", array("as" => "adminImagePostEdit", "uses" => "AdminImageController@editImagePost"));
	Route::patch("imageposts/{id}", array("as" => "adminImagePostUpdate", "uses" => "AdminImageController@updateImagePost"));
	Route::delete("imageposts/{id}", array("as" => "adminImagePostDelete", "uses" => "AdminImageController@deleteImagePost"));
	
	
	// Image Tag
	Route::get("imagetags", array("as" => "adminImageTags", "uses" => "AdminImageController@imageTags"));
	Route::delete("imagetags/{id}", array("as" => "adminBlogTagDelete", "uses" => "AdminImageController@deleteImageTag"));
	
	
	// File manager
	Route::get("filemanager", array("as" => "adminFilemanager", "uses" => "AdminCommonController@fileManager"));
	
	
	// Ajax
	// Dashboard
	Route::post("statistic-graph", array("as" => "adminStatisticGraph", "uses" => "AdminCommonController@statisticGraph"));
});

Route::group(array('middleware' => 'auth.admin', 'prefix' => 'admin'), function(){
	// Blog post
	Route::get("blogposts/{id}/togglefeatured", array("as" => "adminBlogPostTogglefeatured", 
		"uses" => "AdminBlogController@toggleFeaturedBlogPost"));
		
	
	// Blog tag
	Route::delete("blogtags/{id}", array("as" => "adminBlogTagDelete", "uses" => "AdminBlogController@deleteBlogTag"));
	Route::get("blogtags/{id}/togglefeatured", array("as" => "adminBlogTagTogglefeatured", 
		"uses" => "AdminBlogController@toggleFeaturedBlogTag"));
		
		
	// Image post
	Route::get("imageposts/{id}/togglefeatured", array("as" => "adminImagePostTogglefeatured", 
		"uses" => "AdminImageController@toggleFeaturedImagePost"));
		
		
	// Image tag
	Route::delete("imagetags/{id}", array("as" => "adminImageTagDelete", "uses" => "AdminImageController@deleteImageTag"));
	Route::get("imagetags/{id}/togglefeatured", array("as" => "adminImageTagTogglefeatured", 
		"uses" => "AdminImageController@toggleFeaturedImageTag"));
	
	
	// User
	Route::get("users", array("as" => "adminUsers", "uses" => "AdminUserController@users"));
	Route::get("users/new", array("as" => "adminUserNew", "uses" => "AdminUserController@newUser"));
	Route::post("users/new", array("as" => "adminUserCreate", "uses" => "AdminUserController@createUser"));
	Route::get("users/{id}/edit", array("as" => "adminUserEdit", "uses" => "AdminUserController@editUser"));
	Route::patch("users/{id}", array("as" => "adminUserUpdate", "uses" => "AdminUserController@updateUser"));
	Route::delete("users/{id}", array("as" => "adminUserDelete", "uses" => "AdminUserController@deleteUser"));

	//Work Post
	Route::get("workposts", array("as" => "adminWorkPosts", "uses" => "AdminWorkController@workPosts"));
	Route::get("workposts/new", array("as" => "adminWorkPostNew", "uses" => "AdminWorkController@newWorkPost"));
	Route::post("workposts/new", array("as" => "adminWorkPostCreate", "uses" => "AdminWorkController@createWorkPost"));
});// Blog Post
	// Route::get("blogposts", array("as" => "adminBlogPosts", "uses" => "AdminBlogController@blogPosts"));
	// Route::get("blogposts/new", array("as" => "adminBlogPostNew", "uses" => "AdminBlogController@newBlogPost"));
	// Route::post("blogposts/new", array("as" => "adminBlogPostCreate", "uses" => "AdminBlogController@createBlogPost"));
	// Route::get("blogposts/{id}", array("as" => "adminBlogPostPreview", "uses" => "AdminBlogController@previewBlogPost"));
 //    Route::post("blogposts/livepreview", array("as" => "adminBlogPostLivepreview", "uses" => "AdminBlogController@livePreviewBlogPost"));
	// Route::get("blogposts/{id}/edit", array("as" => "adminBlogPostEdit", "uses" => "AdminBlogController@editBlogPost"));
	// Route::patch("blogposts/{id}", array("as" => "adminBlogPostUpdate", "uses" => "AdminBlogController@updateBlogPost"));
	// Route::delete("blogposts/{id}", array("as" => "adminBlogPostDelete", "uses" => "AdminBlogController@deleteBlogPost"));
	// 