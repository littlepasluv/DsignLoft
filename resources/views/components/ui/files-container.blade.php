<div class="brief-container">
    <div class="brief-column">
        <div class="brief-section">
            <h4>Project Files</h4>
            @if(isset($projectFiles) && count($projectFiles) > 0)
                <div class="files-list">
                    @foreach($projectFiles as $file)
                        <div class="file-item">
                            <span class="file-name">{{ $file['name'] }}</span>
                            <span class="file-size">{{ $file['size'] }}</span>
                            <a href="{{ $file['url'] }}" class="file-download" download>Download</a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>No files have been uploaded yet.</p>
            @endif
        </div>
    </div>
    <div class="brief-column">
        <div class="brief-section">
            <h4>Deliverables</h4>
            @if(isset($deliverableFiles) && count($deliverableFiles) > 0)
                <div class="files-list">
                    @foreach($deliverableFiles as $file)
                        <div class="file-item">
                            <span class="file-name">{{ $file['name'] }}</span>
                            <span class="file-status">{{ $file['status'] }}</span>
                            @if($file['status'] === 'completed')
                                <a href="{{ $file['url'] }}" class="file-download" download>Download</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <p>Your project deliverables will appear here once the designer begins work.</p>
            @endif
        </div>
    </div>
</div>

