
       
    <div id="{{$post->id}}" class=" col-sm-12">
        <div class="panel  panel-white post panel-shadow">
@if(Auth::check() && $post->user->id == Auth::user()->id)
          <div style="margin-right: 10px;" class="float-right ">
           <div class="dropdown">
<span class="dropdown-toggle " data-toggle="dropdown">  </span>
  <ul class="dropdown-menu">

    
    <li data-id="" onclick="deleted({{$post->id}}, 'post')" id="" >Delete </li>

  </ul>
</div> </div> 
@endif()
            <div class="post-heading">
                <div class="pull-left image">
                   <a href="/profile/{{$post->user->id}}"> <img src="/{{$post->user->picture}}" class="img-circle avatar" alt="user profile image"> </a>
                </div>
                <div class="pull-left meta">
                    <div class="title h5">
                        <a href="/profile/{{$post->user->id}}"><b> {{$post->user->name}} </b></a>
                       @ {{$post->user->username}}
                    </div>
                    <h6 class="text-muted time">{{ date_format($post->created_at, 'j F')}}</h6>
                </div>
            </div> 
            <div class="post-description"> 
                <p>{{$post->content}}</p>

@if(isset($post->PostContent[0]->content) && $post->type != 3) 
<div class="PostContent"> 
  <img class="PostImage" src="/{{$post->PostContent[0]->content}}" >
</div>  
@endif()
@if($post->type == 3)
  <div class="PostContent"> 
  <video width="100%" height="100%" controls>
  <source src="/{{$post->PostContent[0]->content}}" type="video/mp4">
  <source src="/{{$post->PostContent[0]->content}}" type="video/ogg">
  </video> 
  </div>
@endif()

                <div class="stats">
              @if(Auth::check() && $post->user->id != Auth::user()->id)
                    <span  data-id="{{$post->id}}" class="like_post {{$class}} cursor btn btn-default stat-item">
                        <i class="fa fa-thumbs-up icon"></i>  {{$post->like->count()}}
                    </span>
                    @endif()
               @if(Auth::check() && $post->user->id == Auth::user()->id)
                    <span data-id="{{$post->id}}" class="{{$class}} reblog btn btn-default stat-item">
                        <i class="  fa fa-share-square-o"></i> Re-blog
                    </span>
                  @endif()
                    <span class="{{$class}} btn btn-default stat-item">
                        <i class="fa fa-comments"></i>  {{$post->comment->count()}}
                    </span>

                </div>
            </div>
                    <div class="post-footer">
       <form class="comment{{$key}}" method="post" >
                    {{csrf_field()}}
                <div class="{{$class}} write_comment input-group"> 
                    <input id="comment{{$key}}"  name="comment" class="form-control" placeholder="Add a comment" type="text">
                  
              <span type="submit"  onclick="comment({{$key}})" class="cursor input-group-addon">
                        <i class=" fa fa-paper-plane"></i>  
                    </span>




                </div>

                 <input value="post" id="post" style="display: none" class="bottom-right btn btn-primary" type="submit" name="">
                   <br>
@if($post->comment->count() > 0)
        <section class="comments">
         
          @foreach($post->comment as $comment)  
             <article class="comment">
            <a class="comment-img" href="/profile/{{$post->user->id}}">
              <img src="/{{$comment->user->picture}}" alt="" width="50" height="50" />
            </a>
              
            <div class="comment-body">
              <div class="text">
                <p>{{$comment->comment}}</p>
              </div>
              <p class="attribution">by <a href="/profile/{{$post->user->id}}">{{$post->user->name}}</a> at {{ date_format($post->created_at, 'j F')}}</p>
            </div>
             </article>
        @endforeach()

        </section>
@endif()
                 <input type="hidden" name="type" value="1">

                 <input type="hidden" name="id" value="{{$post->id}}">

              </form>

                <ul class="comments-list">

                </ul>
            </div>
       </div> </div> 

