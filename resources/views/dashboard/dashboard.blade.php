<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>DsignLoft Client</title>
    <link href="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/favicon-dsignloft-YKbl23wxwNT9WK37.png" rel="icon" type="image/png"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="loading-overlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(255,255,255,0.95); z-index:9999; display:flex; align-items:center; justify-content:center;"><p style="font-size: 18px;">Loading Dashboard...</p></div>

    <header class="header">
        <div class="header-content-grid">
            <div class="header-top-row">
                <div class="logo">
                    <img src="https://assets.zyrosite.com/YleqxM2lNkfl3kLp/logo_dsignloft-Y4LxQ4REjXhxO2a5.svg" alt="DsignLoft Logo" style="width: 180px;"></div>
                <div class="user-section">
                    <div class="user-name" id="headerUserName" onclick="toggleUserDropdown()"></div>
                    <div class="profile-photo" id="headerProfilePhoto" onclick="toggleUserDropdown()"></div>
                    <div class="user-dropdown" id="userDropdown">
                    <div class="dropdown-item" onclick="signOut()">Sign Out</div>
            </div>
        </div>
            </div>
            <div class="header-bottom-row">
                <div class="project-title-container">
                    <h2 id="projectTitle">Your Project Dashboard</h2>
                </div>
                <div class="nav-tabs">
                    <div class="nav-tab active" onclick="switchTab('brief')">Brief</div>
                    <div class="nav-tab" onclick="switchTab('files')">Files</div>
                    <div class="nav-tab" onclick="switchTab('messages')">Messages</div>
                    <div class="nav-tab" onclick="switchTab('payment')">Payments</div>
                </div>
            </div>
        </div>
    </header>

    <main class="main-container">
        <div class="tab-content active" id="brief-tab">
            <div class="info-bar">
              100% money back guarantee. 
              <a 
                href="https://dsignloft.com/dsignloft-refund-policy" 
                target="_blank" 
                rel="noopener noreferrer" 
                style="color: #53AB81; text-decoration: underline;">
                Read our Terms and Conditions.
              </a>
            </div>
        
            <div class="brief-container">
                <div class="brief-left-column">
                    <div class="brief-section">
                        <h3 class="brief-section-title">General Information</h3>
                        <div class="brief-field">
                            <label class="brief-label">PROJECT TITLE</label>
                            <div class="brief-value" id="brief-project-title">Loading...</div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">PACKAGE</label>
                            <div class="brief-value package-display" id="brief-package">Loading...</div>
                        </div>
                        <div class="brief-field" id="brief-project-duration-website-container" style="display:none;">
                            <label class="brief-label">PROJECT DURATION FOR WEBSITE</label>
                            <div class="brief-value" id="brief-project-duration-website"></div>
                        </div>
                        <div class="brief-field" id="brief-project-duration-container" style="display:none;">
                            <label class="brief-label">PROJECT DURATION</label>
                            <div class="brief-value" id="brief-project-duration"></div>
                        </div>
                        <div class="brief-field" id="brief-guaranteed-container" style="display:none;">
                            <label class="brief-label">GUARANTEED</label>
                            <div class="brief-value" id="brief-guaranteed"></div>
                        </div>
                        <div class="brief-field" id="brief-nda-container" style="display:none;">
                            <label class="brief-label">NDA</label>
                            <div class="brief-value" id="brief-nda"></div>
                        </div>
                        <div class="brief-field" id="brief-print-options-container" style="display:none;">
                            <label class="brief-label">Print Options (Indonesia only)</label>
                            <div class="brief-value" id="brief-print-options"></div>
                        </div>
                        <div class="brief-section">
                            <h3 class="brief-section-title">Language</h3>
                            <div class="brief-field">
                                <select class="brief-select" id="brief-language" disabled>
                                    <option value="English">English</option>
                                    <option value="Spanish">Spanish</option>
                                    <option value="French">French</option>
                                    <option value="German">German</option>
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
                            <div class="brief-value" id="brief-brand-name"></div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">SLOGAN</label>
                            <div class="brief-value" id="brief-slogan"></div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">DESCRIPTION</label>
                            <div class="brief-value" id="brief-description"></div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">INDUSTRY</label>
                            <div class="brief-value" id="brief-industry"></div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">NOTES</label>
                            <div class="brief-value" id="brief-notes"></div>
                        </div>
                    </div>

                    <div class="brief-section">
                        <h3 class="brief-section-title">Visual style</h3>
                        <div class="brief-field">
                            <label class="brief-label">COLORS</label>
                            <div class="brief-color-palette" id="brief-colors">
                                </div>
                        </div>
                        <div class="brief-field">
                            <label class="brief-label">STYLE ATTRIBUTES</label>
                            <div class="brief-style-sliders" id="brief-style-attributes">
                                </div>
                        </div>
                    </div>

                    <div class="brief-section">
                        <h3 class="brief-section-title">Design Inspiration</h3>
                        <div class="brief-field">
                            <label class="brief-label">DESIGN INSPIRATION</label>
                            <div class="brief-inspiration-grid" id="brief-design-inspiration">
                                </div>
                        </div>
                    </div>
        
                    <div class="brief-section">
                        <h3 class="brief-section-title">Deliverables</h3>
                        <div class="brief-field">
                            <label class="brief-label">DELIVERABLES</label>
                            <div class="brief-value" id="brief-deliverables">
                                </div>
                        </div>
                    </div>
        
                    <div class="brief-section">
                        <h3 class="brief-section-title">Files deliverables</h3>
                        <div id="brief-files-deliverables">
                            </div>
                    </div>
        
                    <div class="brief-section">
                        <h3 class="brief-section-title">Final files</h3>
                        <div id="brief-final-files">
                            </div>
                    </div>
                </div>
            </div>
        
            <div class="button-group">
                <a href="#" class="btn btn-secondary" id="editBriefBtn">Edit Brief</a>
                <button class="btn btn-primary" onclick="switchTab('payment')">Proceed to Payments</button>
            </div>
        </div>

        <div class="tab-content" id="files-tab">
            <div class="info-bar">You will receive design drafts shortly after payment is complete.</div>
            <div class="brief-container">
                <div class="brief-column">
                    <div class="brief-section">
                        <h4>Project Files</h4>
                        <p>No files have been uploaded yet.</p>
                    </div>
                </div>
                <div class="brief-column">
                    <div class="brief-section">
                        <h4>Deliverables</h4>
                        <p>Your project deliverables will appear here once the designer begins work.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="messages-tab">
            <div class="brief-container">
                <div class="brief-column">
                    <div class="brief-section">
                        <h4>Messages</h4>
                        <p>No messages yet. Your designer will contact you here when they have questions or updates.</p>
                    </div>
                </div>
                <div class="brief-column">
                    <div class="brief-section">
                        <h4>Project Updates</h4>
                        <p>Project status updates will appear here.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="payment-tab-content">
            <div class="payment-layout">
                <div class="payment-summary-cards">
                    <div class="summary-card">
                        <div class="card-label">Total</div>
                        <div class="card-value" id="payment-total">$0.00</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-label">Secured by DsignLoft</div>
                        <div class="card-value" id="payment-secured">$0.00</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-label">Released to designer</div>
                        <div class="card-value" id="payment-released">$0.00</div>
                    </div>
                    <div class="summary-card">
                        <div class="card-label">Earnings</div>
                        <div class="card-value" id="payment-earnings">$0.00</div>
                    </div>
                </div>

                <div class="invoice-container">
                    <div class="invoice-header">
                        <div class="invoice-column-service">Service</div>
                        <div class="invoice-column-amount">Amount</div>
                    </div>
                    <div class="invoice-body" id="invoice-items">
                        <p>Loading invoice details...</p>
                    </div>
                    <div class="invoice-footer">
                        <div class="invoice-column-service">Total</div>
                        <div class="invoice-column-amount" id="invoice-total">$0.00</div>
                    </div>
                </div>

                 <div class="button-group">
                    <button class="btn btn-secondary">Complete Project</button>
                    <button class="btn btn-primary">Create New Quote</button>
                </div>
            </div>
        </div>
    </main>

    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.22.2/firebase-auth-compat.js"></script>
    <script src="js/firebase-config.js"></script>
    <script src="js/dashboard.js"></script>
</body>
</html>