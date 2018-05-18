<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <!--<div class="media-left">-->
        <!--    <img class="media-object img-rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">-->
        <!--</div>-->
        <div class="media-body">
            <!--<div>-->
            <!--    {!! link_to_route('users.show', $user->name, ['id' => $user->id]) !!} <span class="text-muted">posted at {{ $micropost->created_at }}</span>-->
            <!--</div>-->
            <div class="center jumbotron" style = "padding:10px 20px;">
                <p style="font-size:14px;color:gray;">{!! nl2br(e($micropost->date)) !!}</p>
                <br>
                <p style="font-size:18px;color:#333333;">{!! nl2br(e($micropost->content)) !!}</p>
                <br>
                @if (Auth::user()->id == $micropost->user_id)
                    {!! link_to_route('microposts.edit', '編集', ['id' => $micropost->id]) !!}
                @endif 
                
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}