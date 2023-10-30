<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        <div class="chatlist_header">

            <div class="title">
                Chat
            </div>
            <div class="img_container">
                <img src="https://picsum.photos/id/14/200/390" alt="">
            </div>

        </div>
        <div class="chatlist_body">

            @if (count($conversations) > 0)
            @foreach ($conversations as $conversation)
            <div class="chatlist_item">
                <div class="chatlist_img_container">
                    <img src="https://picsum.photos/{{ $this->getChatUserInstance($conversation, $name='id') }}/190/200/390" alt="">
                </div>

                <div class="chatlist_info">
                    <div class="top_row">
                        <div class="list_username">{{ $this->getChatUserInstance($conversation, $name='name') }}</div>
                            <span class="date">{{ $conversation->messages->last() ?->created_at->shortAbsoluteDiffForHumans() }}</span>
                    </div>

                    <div class="bottom_row">
                        <div class="message_body text-truncate">
                            {{ $conversation->messages->last()->body }}
                        </div>

                        <div class="unread_count">
                            56
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @else
              You have no conversation
            @endif

        </div>
    </h2>
</div>
