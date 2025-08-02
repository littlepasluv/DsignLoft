<div class="brief-container">
    <div class="brief-column">
        <div class="brief-section">
            <h4>Messages</h4>
            @if(isset($projectMessages) && count($projectMessages) > 0)
                <div class="messages-list">
                    @foreach($projectMessages as $message)
                        <div class="message-item">
                            <div class="message-header">
                                <span class="message-sender">{{ $message['sender'] }}</span>
                                <span class="message-date">{{ $message['date'] }}</span>
                            </div>
                            <div class="message-content">{{ $message['content'] }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No messages yet. Your designer will contact you here when they have questions or updates.</p>
            @endif
        </div>
    </div>
    <div class="brief-column">
        <div class="brief-section">
            <h4>Project Updates</h4>
            @if(isset($projectUpdates) && count($projectUpdates) > 0)
                <div class="updates-list">
                    @foreach($projectUpdates as $update)
                        <div class="update-item">
                            <div class="update-status">{{ $update['status'] }}</div>
                            <div class="update-date">{{ $update['date'] }}</div>
                            <div class="update-description">{{ $update['description'] }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Project status updates will appear here.</p>
            @endif
        </div>
    </div>
</div>

