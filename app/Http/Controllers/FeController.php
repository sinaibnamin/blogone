<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Post;
 use App\Tag;
 use App\Category;
use DB;

class FeController extends Controller
{
    public function home(){

      $rposts = Post::orderby('created_at','desc')->paginate(5);

      return view('website.home',compact('rposts'));
    }
    public function category($slug){
      $category=Category::where('slug',$slug)->first();
      $posts=Post::where('category_id',$category->id)->paginate(5);
      return view('website.category',compact('category','posts'));
    }
    public function tag($slug){
      $tag=Tag::where('slug',$slug)->first();
      $posts= $tag->posts()->orderby('created_at','asc')->get();
      //dd($posts);
      return view('website.tag',compact('posts'));
    }
    public function post($slug){
      $tags=Tag::all();
      $categories=Category::all();
      $post = Post::with('category','user')->where('slug',$slug)->first();


      $post_tags = $post->tags;

      foreach ($post_tags as $key => $id) {
        $ids[] = $id->id;
      }
      //dd($ids);
      $post_category = $post->category;

      //dd($post_category->id);

      $trp = DB::table('posts')
          //  ->Join('post_tag', 'posts.id', '=', 'post_tag.post_id')
            ->Where('posts.category_id', '=', $post_category->id)
          //  ->WhereIn('post_tag.tag_id', $ids)
            //->groupBy('posts.id')
            ->get();



      $releted_posts = Post::where('category_id', $post->category_id)->limit(5)->get();






      return view('website.post',compact('post','categories','tags','post_tags','post_category','releted_posts','trp'));
    }






}
