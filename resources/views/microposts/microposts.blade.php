<ul class="media-list">
@foreach ($microposts as $micropost)
    <?php $user = $micropost->user; ?>
    <li class="media">
        <div class="media-body">
            <div class="center jumbotron" style = "padding:10px 20px;margin-bottom:0px;">
                <p style="font-size:12px;color:gray;">{!! nl2br(e($micropost->date)) !!}</p>
                <br>
                <p style="font-size:14px;color:#333333;">{!! nl2br(e($micropost->content)) !!}</p>
                <br>
                @if (Auth::user()->id == $micropost->user_id)
                    <p style="font-size:12px; margin-bottom:0px;">{!! link_to_route('microposts.edit', '編集', ['id' => $micropost->id]) !!}</p>
                @endif
            </div>
        </div>
    </li>
@endforeach
</ul>
{!! $microposts->render() !!}