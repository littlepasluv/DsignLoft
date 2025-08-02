<div class="brief-container">
    <div class="brief-left-column">
        <div class="brief-section">
            <h3 class="brief-section-title">General Information</h3>
            <div class="brief-field">
                <label class="brief-label">PROJECT TITLE</label>
                <div class="brief-value" id="brief-project-title">{{ $projectTitle ?? 'Loading...' }}</div>
            </div>
            <div class="brief-field">
                <label class="brief-label">PACKAGE</label>
                <div class="brief-value package-display" id="brief-package">{{ $package ?? 'Loading...' }}</div>
            </div>
            <div class="brief-section">
                <h3 class="brief-section-title">Language</h3>
                <div class="brief-field">
                    <select class="brief-select" id="brief-language" disabled>
                        <option value="English" {{ ($language ?? 'English') === 'English' ? 'selected' : '' }}>English</option>
                        <option value="Spanish" {{ ($language ?? '') === 'Spanish' ? 'selected' : '' }}>Spanish</option>
                        <option value="French" {{ ($language ?? '') === 'French' ? 'selected' : '' }}>French</option>
                        <option value="German" {{ ($language ?? '') === 'German' ? 'selected' : '' }}>German</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="brief-right-column">
        <div class="brief-section">
            <h3 class="brief-section-title">Background information</h3>
            <div class="brief-field">
                <label class="brief-label">NAME TO INCORPORATE IN THE LOGO</label>
                <div class="brief-value" id="brief-brand-name">{{ $brandName ?? '' }}</div>
            </div>
            <div class="brief-field">
                <label class="brief-label">SLOGAN</label>
                <div class="brief-value" id="brief-slogan">{{ $slogan ?? '' }}</div>
            </div>
            <div class="brief-field">
                <label class="brief-label">DESCRIPTION</label>
                <div class="brief-value" id="brief-description">{{ $description ?? '' }}</div>
            </div>
            <div class="brief-field">
                <label class="brief-label">INDUSTRY</label>
                <div class="brief-value" id="brief-industry">{{ $industry ?? '' }}</div>
            </div>
            <div class="brief-field">
                <label class="brief-label">NOTES</label>
                <div class="brief-value" id="brief-notes">{{ $notes ?? '' }}</div>
            </div>
        </div>

        <div class="brief-section">
            <h3 class="brief-section-title">Visual style</h3>
            <div class="brief-field">
                <label class="brief-label">COLORS</label>
                <div class="brief-color-palette" id="brief-colors">
                    @if(isset($colors) && is_array($colors))
                        @foreach($colors as $color)
                            <div class="color-swatch" style="background-color: {{ $color }}"></div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="brief-field">
                <label class="brief-label">STYLE ATTRIBUTES</label>
                <div class="brief-style-sliders" id="brief-style-attributes">
                    @if(isset($styleAttributes) && is_array($styleAttributes))
                        @foreach($styleAttributes as $attribute => $value)
                            <div class="style-slider">
                                <span>{{ $attribute }}</span>
                                <div class="slider-value">{{ $value }}%</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="brief-section">
            <h3 class="brief-section-title">Design Inspiration</h3>
            <div class="brief-field">
                <label class="brief-label">DESIGN INSPIRATION</label>
                <div class="brief-inspiration-grid" id="brief-design-inspiration">
                    @if(isset($designInspiration) && is_array($designInspiration))
                        @foreach($designInspiration as $inspiration)
                            <img src="{{ $inspiration }}" alt="Design Inspiration" class="inspiration-image">
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="brief-section">
            <h3 class="brief-section-title">Deliverables</h3>
            <div class="brief-field">
                <label class="brief-label">DELIVERABLES</label>
                <div class="brief-value" id="brief-deliverables">
                    @if(isset($deliverables) && is_array($deliverables))
                        <ul>
                            @foreach($deliverables as $deliverable)
                                <li>{{ $deliverable }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

